<?php /*
Plugin Name: Dynamic Image Resizer
Plugin URI: http://ottopress.com
Author: Otto42 / Modified by JochenT
Author URI: http://ottodestruct.com
Version: 1.0.0.1.jt-3 (11.10.2013)
Description: Change the WordPress image uploader system to do image resizing on the fly.
*/

/*
Included: wordpress.org/support/topic/plugin-dynamic-image-resizer-problems-with-four-letter-file-extensions
Included: wordpress.org/support/topic/plugin-dynamic-image-resizer-images-with-special-characters-are-not-resized
Included: wordpress.org/support/topic/bug-report-workaround [function image_resize() is deprecated since WP 3.5]
Included: wordpress.org/support/topic/bug-report-workaround [change returning status code to 200]
Added : Now all image formats supported which can be handled by new class WP_Image_Editor
Added : Function dynimg_add_missing_size() which adds/changes image sizes in the meta data of already uploaded images, too
Added : Three defines which enable the new functionality. Should be implemented as options later.
*/

/*
 * The next three defines enable additional features which are only usefull if intermediate image sizes have been 
 * added or changed. To add/change image sizes use function add_image_size() or a plugin like "Simple Image Sizes".
*/

// If adding a NEW image size, WP does not create resized image files for already uploaded images. 
// Set this constant to TRUE, to create resized image files for already uploaded images, too.
define('DYNIMG_CREATE_IMAGE_FOR_ADDED_SIZE_ALWAYS', false);

// If an existing image size is CHANGED, WP does not create resized versions for already uploaded images. 
// Set this constant to TRUE, to create resized image files for already uploaded images for changed image sizes, too. 
// Also constant DYNIMG_CREATE_IMAGE_FOR_ADDED_SIZE_ALWAYS has to be set to TRUE to enable this feature. 
// 
// Existing image files of the old size will not be deleted but the meta entry may be deleted. Thus you should not use 
// this option if you have manually created cropped versions for any of the intermediate sizes and want to be able to 
// display them further.
define('DYNIMG_CREATE_IMAGE_FOR_CHANGED_SIZE_ALWAYS', false);

// If an existing image size has been changed and the image files with the old size dimensions will not be 
// used anymore, they may be removed. Nevertheless, the originally uploded image file will never be deleted.
// This option can not be used to delete obsolete resized image files afterwards. The deletion of an old image 
// file has always to take place simultaneously with the creation of the new resized image file. 
// 
// In the case the old resized image file is still referenced directly from any post content or some image sizes 
// have been set to the same dimensions (e.g. post-thumbnail=1000x300 and large=1000x300) this will not result 
// in problems as the 404 handler of this plugin will regenerate that sizes on the fly again, if needed. 
// 
// Set this constant to TRUE, to delete existing old image files for a changed image size. 
// Also constants DYNIMG_CREATE_IMAGE_FOR_ADDED_SIZE_ALWAYS and DYNIMG_CREATE_IMAGE_FOR_CHANGED_SIZE_ALWAYS have 
// to be set to TRUE to enable this feature.
define('DYNIMG_DELETE_OLD_IMAGE_IF_SIZE_CHANGED', true);

// disable plugin on multisite
if (is_multisite()) return;

// do the dynamic resizing of the image when the 404 handler is invoked and it's for a non-existant image
add_action('template_redirect', 'dynimg_404_handler');
function dynimg_404_handler() {
	if ( !is_404() )  { return; }
	
	// Has the file name the proper format for this handler?
	if ( !preg_match('/(.*)-([0-9]+)x([0-9]+)(c)?\.(\w+)($|\?|#)/i', $_SERVER['REQUEST_URI'], $matches) ) {
		return;
	}

	$mime_types = wp_get_mime_types();
	$img_ext    = $matches[5];
	$ext_known  = false;
	// The extensions for some MIME types are set as regular expression (PCRE).
	foreach( $mime_types as $rgx_ext => $mime_type ) {
		if ( preg_match( "/{$rgx_ext}/i", $img_ext ) ) {
	    	if ( wp_image_editor_supports( array( 'mime_type' => $mime_type ) ) ) { 
	    		$ext_known = true;
				break;
	    	}
		}
	}
	if ( !$ext_known)  { return; }

	$filename    = urldecode($matches[1].'.'.$img_ext);
	$width       = $matches[2];
	$height      = $matches[3];
	$crop        = !empty($matches[4]);

	$uploads_dir = wp_upload_dir();
	$temp        = parse_url($uploads_dir['baseurl']);
	$upload_path = $temp['path'];
	$findfile    = str_replace($upload_path, '', $filename);
	$basefile    = $uploads_dir['basedir'].$findfile;
	
	// Serve the image this one time (next time the webserver will do it for us)
	dynimg_create_save_stream( $basefile, $width, $height, $crop);
}

/**
 * Create a resized image, then save and stream it to the web browser.
 *
 * @param string $file File path.
 * @param int $width Image width.
 * @param int $height Image height.
 * @param bool $crop Optional, default is false. Whether to crop image to specified height and width or resize.
 */
function dynimg_create_save_stream( $file, $width, $height, $crop = false ) {
	if ( !$width && !$height )  { return; }

	$editor = wp_get_image_editor( $file );

	if ( is_wp_error( $editor ) )  { return; }

	// Allow to configure custom image quality (WP default = 90)
	// For examples see http://bhoover.com/wp_image_editor-wordpress-image-editing-tutorial/
	// $editor->set_quality( 90 );

	// Alternatively the WP filter hook 'jpeg_quality' may be used
	// http://wordpress.org/support/topic/setting-jpeg_quality#post-1709221
	
	if ( is_wp_error( $editor->resize( $width, $height, $crop ) ) ) {
		return;
	}

	$suffix = $editor->get_suffix();
	if ($crop)  { $suffix .='c'; }

	$dest_file    = $editor->generate_filename( $suffix );
	$resized_file = $editor->save( $dest_file );

	if ( ! is_wp_error( $resized_file ) && $resized_file ) {
		header_remove();
		flush();
		ob_end_clean();
		status_header( '200' );

		$editor->stream();
		exit;
	}
}

// Prevent WP from generating resized images on upload. Hook in very late.
add_filter( 'intermediate_image_sizes_advanced', 'dynimg_image_sizes_advanced', 999);
function dynimg_image_sizes_advanced( $sizes) {
	global $dynimg_image_sizes;
	
	// Save the sizes to a global, because the next function needs them to lie to WP about what sizes were generated
	$dynimg_image_sizes = $sizes;

	// Force WP to not make sizes by telling it there's no sizes to make
	return array();
}

// Trick WP into thinking images were generated anyway. Hook in very early.
add_filter( 'wp_generate_attachment_metadata', 'dynimg_generate_metadata', 5);
function dynimg_generate_metadata( $meta) {
	global $dynimg_image_sizes;
			
	foreach ($dynimg_image_sizes as $size_name => $preset_size) {
		// Build the fake meta entry for the size
		$resized = dynimg_get_resized_image( $meta, $size_name, $preset_size);

		if ( !empty($resized) && is_array($resized)) {
			$meta['sizes'][$size_name] = $resized;
		}
	}
	return $meta;
}

/**
 * If an intermediate size of an image is not available, then add it to the meta data. Hook in 
 * very early to provide the missing meta data to other filters, too. 
 * If $size is an array, return FALSE.
 *
 * @param bool|array    $prev_result  Result of previous filters or the initial value from the hook.
 * @param int           $post_id      Attachment ID
 * @param array|string  $size         Optional, default is 'medium'. Size of image, either array or string.
 * @return bool|array                 False to let calling function continue, array if a new size is added.
 */
if (DYNIMG_CREATE_IMAGE_FOR_ADDED_SIZE_ALWAYS) {
	add_filter('image_downsize', 'dynimg_add_missing_size', 4, 3);
}
function dynimg_add_missing_size( $prev_result, $post_id, $size_name = 'medium') {
	if ($prev_result !== false || is_array($size_name))  { return $prev_result; }

	$attach_meta = wp_get_attachment_metadata( $post_id);

	// Check if the requested size name already exists in the meta data.
	$intermediate_size = array();
	if ( !empty($attach_meta['sizes'][$size_name])) {

		// Return, if changed sizes should be ignored
		if ( !DYNIMG_CREATE_IMAGE_FOR_CHANGED_SIZE_ALWAYS )  { return false; }

		$intermediate_size = $attach_meta['sizes'][$size_name];
	}
	
	// Get the preset dimensions of the requested image size
	$preset_sizes = dynimg_get_preset_sizes();
	$preset_size  = $preset_sizes[$size_name];

	$upload_info = wp_upload_dir();

	// Calculate the size the image will have based on the dimensions of the original unresized 
	// image and the requested preset size.
	$resized = dynimg_get_resized_image( $attach_meta, $size_name, $preset_size);

	if ( empty($resized) || !is_array($resized)) {
		if ( !empty($intermediate_size)) {
			// The modification of the preset dimensions of this $size_name actually results in the use of the original image

			// Delete the resized image file for this $size_name, if exists
			if (DYNIMG_DELETE_OLD_IMAGE_IF_SIZE_CHANGED) {
				@unlink($upload_info['basedir'].'/'.dirname($attach_meta['file']).'/'.$intermediate_size['file']);
			}

			// No entry for this intermediate size should be maintained any more
			unset( $attach_meta['sizes'][$size_name]);
			// Update the meta data of the attachment. In case of failure, continue.
			wp_update_attachment_metadata( $post_id, $attach_meta);
		}

		return false;
	}


	$do_meta_update = true;
	if ( !empty($intermediate_size) && is_array($intermediate_size)) {
		// An intermediate image size has been found
		if ( $intermediate_size['width']  == $resized['width']  && 
		 	 $intermediate_size['height'] == $resized['height'] && 
		 	 $intermediate_size['crop']   == $resized['crop']
		) {

			$do_meta_update = false;

		} else {
			// The size stored in the meta data of the attachment for $size_name is different from the value 
			// in $resized. This happens only once after a change of the dimensions of a predetermed image size.
			if (DYNIMG_DELETE_OLD_IMAGE_IF_SIZE_CHANGED) {
				@unlink($upload_info['basedir'].'/'.dirname($attach_meta['file']).'/'.$intermediate_size['file']);
			}
		}
	} 

	if ($do_meta_update) {
		// A resized image with the requested dimensions can be created from the original. This image is always smaller.
		$attach_meta['sizes'][$size_name] = $resized;

		// Save the new/modified size to the meta data of the attachment.
		if ( !wp_update_attachment_metadata( $post_id, $attach_meta))  { return false; }
    }

	return false;
}

/**
 * If a downsized version of an image is not available, then create the necessary meta data.
 *
 * @param array        $attach_meta    Array with the values of key '_wp_attachment_metadata' from table post_meta
 * @param string       $size_name      Name of a size as set with function add_image_size()
 * @param array        $preset_size    Values for named size $size_name
 * @return bool|array                  False | Array if a new size has been calculated.
 */
function dynimg_get_resized_image( $attach_meta, $size_name, $preset_size) {
	$has_intermediate_size = false;

	$intermediate_size = $attach_meta['sizes'][$size_name];
	if ( !empty($intermediate_size)  &&  is_array($intermediate_size)) {
		// Check if the intermediate size already matches the preset size sufficiently. This is the case if the preset size 
		// hasn't been changed since last access or due to previous modifications by other plugins like 'Crop Thumbnails'.
		$filename = $intermediate_size['file'];
		$width    = $intermediate_size['width'];
		$height   = $intermediate_size['height'];
		$crop     = $intermediate_size['crop'];

		if ($preset_size['crop'] == $crop) {
			if ( $crop && ($preset_size['width']==$width  &&  $preset_size['height']==$height)) {
				$has_intermediate_size = true;
			} elseif ( !$crop && ($preset_size['width']==$width  ||  $preset_size['height']==$height)) {
				$has_intermediate_size = true;
			}
		}
	}

	if ( !$has_intermediate_size) {
		// Figure out what size WP would make this
		$newsize = image_resize_dimensions( 
			$attach_meta['width'], $attach_meta['height'], // dimensions of the originally uploaded unresized image
			$preset_size['width'], $preset_size['height'], $preset_size['crop'] // requested size
		);

		if ( !empty($newsize) && is_array($newsize)) {
			$width  = $newsize[4];
			$height = $newsize[5];

			$suffix = "{$width}x{$height}";
			$crop   = $preset_size['crop'];
			if ($crop)  { $suffix .='c'; }

			$info   = pathinfo($attach_meta['file']);
			$ext    = $info['extension'];
			$name   = wp_basename($attach_meta['file'], ".$ext");

			$filename = "{$name}-{$suffix}.{$ext}";
			$has_intermediate_size = true;
		}
	}

	if ( !$has_intermediate_size) {
		// The original image can not be resized to $preset_size or it matches already sufficiently
		return false;
	}

	// Build the meta entry for $size_name
	return array(
		'file'   => $filename,
		'width'  => $width,
		'height' => $height,
		'crop'   => $crop,
	);
}

/**
 * Evaluates the dimensions of standard (thumbnail, medium, large) and user defined image sizes.
 * Copied from function /wp-admin/includes/image.php#wp_generate_attachment_metadata()
 *
 * @return array         The actual dimensions and crop values of all preset image sizes.
 */
function dynimg_get_preset_sizes() {
	global $_wp_additional_image_sizes;

	$sizes = array();
	foreach ( get_intermediate_image_sizes() as $s ) {
		$sizes[$s] = array( 'width' => '', 'height' => '', 'crop' => false );
		if ( isset( $_wp_additional_image_sizes[$s]['width'] ) )
			$sizes[$s]['width'] = intval( $_wp_additional_image_sizes[$s]['width'] ); // For theme-added sizes
		else
			$sizes[$s]['width'] = get_option( "{$s}_size_w" ); // For default sizes set in options
		if ( isset( $_wp_additional_image_sizes[$s]['height'] ) )
			$sizes[$s]['height'] = intval( $_wp_additional_image_sizes[$s]['height'] ); // For theme-added sizes
		else
			$sizes[$s]['height'] = get_option( "{$s}_size_h" ); // For default sizes set in options
		if ( isset( $_wp_additional_image_sizes[$s]['crop'] ) )
			$sizes[$s]['crop'] = intval( $_wp_additional_image_sizes[$s]['crop'] ); // For theme-added sizes
		else
			$sizes[$s]['crop'] = get_option( "{$s}_crop" ); // For default sizes set in options
	}
	return $sizes;
}
