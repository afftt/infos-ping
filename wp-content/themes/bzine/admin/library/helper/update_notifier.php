<?php
/**
 * Provides a notification everytime the theme is updated
 * Original code courtesy of João Araújo of Unisphere Design - http://themeforest.net/user/unisphere
 */
global $mtcxml;

function update_notifier_menu() {  
	global $mtcxml;
	$xml 	= get_latest_theme_version(21600); // This tells the function to cache the remote call for 21600 seconds (6 hours)
	$mtcxml = $xml;
	$theme_data = wp_get_theme();
		
	if ( !is_super_admin() || !is_admin_bar_showing() || !is_admin() ) // Don't display notification in admin bar if it's disabled or the current user isn't an administrator
		return;
	
	//add_dashboard_page( $theme_data->get( 'Name' ) . 'Theme Updates', '', 'administrator', strtolower($theme_data->get( 'Name' )) . '-updates', 'update_notifier');
	
	
	if(TRUE == $xml){
		
		if(version_compare($theme_data->get( 'Version' ), $xml->latest) == -1) {
			add_dashboard_page( $theme_data->get( 'Name' ) . 'Theme Updates', $theme_data->get( 'Name' ) . '<span class="update-plugins count-1"><span class="update-count">New Updates</span></span>', 'administrator', strtolower($theme_data->get( 'Name' )) . '-updates', 'update_notifier');
			add_action( 'admin_notices', 'mtc_update_theme_notice' );
			add_action( 'admin_bar_menu', 'mtc_update_notifier_bar_menu', 1000 );
		}else{
			
		}
	}
	
			
}  

function mtc_update_notifier_bar_menu(){
	global $wp_admin_bar , $wpdb;
	$theme_data = wp_get_theme();
	$wp_admin_bar->add_menu( array( 'id' => 'plugin_update_notifier', 'title' => '<span>' .  $theme_data->get( 'Name' ) . ' <span id="ab-updates">New Updates</span></span>', 'href' => get_admin_url() . 'index.php?page='.strtolower($theme_data->get( 'Name' )) . '-updates' ) ); 
}

function mtc_update_theme_notice() {
	$theme_data = wp_get_theme();
	global $mtcxml;
	$xml = $mtcxml ;

	global $current_user ;
	$user_id = $current_user->ID;
	//delete_user_meta($user_id, 'mtc_ignore_theme__update_notice'); RESET DATAAA
	/* Check that the user hasn't already clicked to ignore the message */
	if ( ! get_user_meta($user_id, 'mtc_ignore_theme__update_notice') ): ?>
	<div class="updated"><p><strong>
	There is a new version of the <?php echo $theme_data->get( 'Name' ); ?>  theme available.</strong> You have version <?php echo $theme_data->get( 'Version' ); ?> installed. Update to version <?php echo $xml->latest; ?>.
	<strong><a href="<?php echo site_url(); ?>/wp-admin/index.php?page=<?php echo strtolower($theme_data->get( 'Name' )) . '-updates' ?>">Detail</a> | 
		<a href="?mtc_ignore_nag_theme_update_notice=0">Hide Notice</a></strong>
	</p></div>
   
	
	<?php endif; ?>
    <?php
}
function mtc_ignore_nag_theme_update_notice(){
	global $current_user ;
	$user_id = $current_user->ID;
	if ( isset($_GET['mtc_ignore_nag_theme_update_notice']) && '0' == $_GET['mtc_ignore_nag_theme_update_notice'] ) {
         add_user_meta($user_id, 'mtc_ignore_theme__update_notice', 'true', true);
	}
}


add_action('admin_init', 'mtc_ignore_nag_theme_update_notice');
add_action('admin_menu', 'update_notifier_menu');

function update_notifier() { 
	global $mtcxml;
	$xml = $mtcxml ;
	$theme_data = wp_get_theme(); ?>
	
	<style>
		.update-nag {display: none;}
		#instructions {max-width: 800px;}
		h3.title {margin: 30px 0 0 0; padding: 30px 0 0 0; border-top: 1px solid #ddd;}
	</style>

	<div class="wrap">
	
		<div id="icon-tools" class="icon32"></div>
		<h2><?php echo $theme_data->get( 'Name' ); ?> Theme Updates</h2>
	    
        
        <img style="float:left;width:320px; margin: 20px 20px 20px 0; border: 1px solid #ddd;" src="<?php echo get_template_directory_uri() . '/screenshot.png'; ?>" />
        
        <div id="instructions" style="max-width: 800px;">
            <h3>Update Download and Instructions</h3>
            <p><strong>Please note:</strong> make a <strong>backup</strong> of the Theme inside your WordPress installation folder <strong>/wp-content/themes/<?php echo strtolower($theme_data->get( 'Name' )); ?>/</strong></p>
            <p>To update the Theme, login to your account, head over to your <strong>downloads</strong> section and re-download the theme like you did when you bought it.</p>
            <p>Extract the zip's contents, look for the extracted theme folder, and after you have all the new files upload them using FTP to the <strong>/wp-content/themes/<?php echo strtolower($theme_data->get( 'Name' )); ?>/</strong> folder overwriting the old ones (this is why it's important to backup any changes you've made to the theme files).</p>
            <p>If you didn't make any changes to the theme files, you are free to overwrite them with the new ones without the risk of losing theme settings, pages, posts, etc, and backwards compatibility is guaranteed.</p>
		</div>
		<div>
			<a class="button button-primary" href="<?php echo '#'; ?>">Download</a>
		</div>
        
            <div class="clear"></div>
	    
	    <h3 class="title">Changelog</h3>
	    <?php echo $xml->changelog;  ?>

	</div>
    
<?php } 

// This function retrieves a remote xml file on my server to see if there's a new update 
// For performance reasons this function caches the xml content in the database for XX seconds ($interval variable)
function get_latest_theme_version($interval) {
	// remote xml file location
	$notifier_file_url 	= 'http://wpbootstrap.net/themesupdate/bzine.xml';
	$db_cache_field 	= 'contempo-notifier-cache';
	$db_cache_field_last_updated = 'contempo-notifier-last-updated';
	$last 				= get_option( $db_cache_field_last_updated );
	$now 				= time();
	
	// check the cache
	if ( !$last || (( $now - $last ) > $interval) ) {
		// cache doesn't exist, or is old, so refresh it
		$getXML = wp_remote_get( $notifier_file_url, array( 'timeout' => 5, 'httpversion' => '1.1' ) );
		
		if ( !is_wp_error($getXML) ){
			$cache = $getXML['body'];
			
			if ($cache) {			
				// we got good results
				update_option( $db_cache_field, $cache );
				update_option( $db_cache_field_last_updated, time() );			
			}
			
			// read from the cache file
			$notifier_data = get_option( $db_cache_field );
			
			// Let's see if the $xml data was returned as we expected it to.
			// If it didn't, use the default 1.0 as the latest version so that we don't have problems when the remote server hosting the XML file is down
			if( strpos((string)$notifier_data, '<notifier>') === false ) {
				$notifier_data = '<?xml version="1.0" encoding="UTF-8"?><notifier><latest>1.0</latest><changelog></changelog></notifier>';
			}
			
			$xml = simplexml_load_string($notifier_data); 
			
			return $xml;
		}
		else{
			return false;
		}
		
	}
	else {
		// cache file is fresh enough, so read from it
		$notifier_data = get_option( $db_cache_field );
		$xml = simplexml_load_string($notifier_data); 	
		return $xml;
		
	}
	
	
}

?>