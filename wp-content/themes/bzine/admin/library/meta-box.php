<?php
/**
 * This file show you an improvement of better include meta box in some pages
 * based on post ID, post slug, page template and page parent
 *
 * @author Charlie Rosenbury <charlie@40digits.com>
 */

global $meta_boxes;

$meta_boxes = array();

$meta_boxes[] = array(
	'title'  => __('Contact','mtcframework'),
	'pages'  => array( 'page' ),
	'fields' => array(
			array(
				'id'            => 'contact_phone',
				'name'          => __('Phone','mtcframework'),
				'type'          => 'text',
				'std'           => '',
			),
			array(
				'id'            => 'contact_mobile',
				'name'          => __('Mobile','mtcframework'),
				'type'          => 'text',
				'std'           => '',
			),
			array(
				'id'            => 'contact_email',
				'name'          => __('Email','mtcframework'),
				'type'          => 'text',
				'std'           => '',
			),
			array(
				'id'            => 'contact_email_subject',
				'name'          => __('Subject Email','mtcframework'),
				'type'          => 'textarea',
				'std'          => '',
				'desc'           => __('Insert email subject for options at form contact. Separated by <code>||</code>EX :  <code>Friendship||Blogwalking||Offers Cooperation</code>','mtcframework'),
			),
			array(
				'id'            => 'contact_site',
				'name'          => __('Website','mtcframework'),
				'type'          => 'text',
				'std'           => '',
			),
			array(
				'id'            => 'contact_address',
				'name'          => __('Address','mtcframework'),
				'type'          => 'textarea',
				'std'           => '',
			),
			array(
				'id' 			=> 'address',
				'name' 			=> 'Find on map',
				'type' 			=> 'text',
				'std' 			=> 'Hanoi, Vietnam',
			),
			array(
				'id'            => 'map_loc',
				'name'          => __('Location','mtcframework'),
				'type'          => 'map',
				'std'           => '-6.233406,-35.049906,15',     // 'latitude,longitude[,zoom]' (zoom is optional)
				'style'         => 'width: 500px; height: 500px',
				'address_field' => 'address',                     // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
			)
	),
	'only_on'    => array(
		'template' => array( 'template-contact.php' )
	)
);


$meta_boxes[] = array(
	'id' 		=> 'featured_post',
	'title' 	=> __('Featured Post','mtcframework'),
	'pages' 	=> array( 'post' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'fields' 	=> array(
					array(
						'name' => __('Embed Code','mtcframework'),
						'id'   => "mtc_embed_code",
						'type' => 'textarea'
					)
			)
	);
	
	
$meta_boxes[] = array(
	'id' 		=> 'review_setting',
	'title' 	=> __('Review Setting','mtcframework'),
	'pages' 	=> array( 'post' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'fields' 	=> array(
					array(
						'name' => __('Enable Review','mtcframework'),
						'id'   => __("mtc_review_is_enable",'mtcframework'),
						'type' => 'checkbox'
					),
					array(
						'name' => __('Review header','mtcframework'),
						'id'   => __("mtc_review_header",'mtcframework'),
						'type' => 'text'
					),
					array(
						'name' => __('Review Name','mtcframework'),
						'desc' => __('The name of the item.','mtcframework'),
						'id'   => "mtc_review_name",
						'type' => 'text'
					),
					array(
						'name' => __('Item Reviewed','mtcframework'),
						'desc' => __('The item that is being reviewed/rated.','mtcframework'),
						'id'   => "mtc_review_item",
						'type' => 'text'
					),
					array(
						'name' => __('Review Summary','mtcframework'),
						'desc' => __('A short description of the item.','mtcframework'),
						'id'   => "mtc_review_summary",
						'type' => 'textarea'
					)
					,array(
						'name' => __('Review Footer','mtcframework'),
						'id'   => "mtc_review_footer",
						'type' => 'textarea'
					),array(
						'name' => __('Score Title','mtcframework'),
						'id'   => "mtc_review_score_title",
						'type' => 'text'
					)
			)
	);
	
$meta_boxes[] = array(
	'id' 		=> 'review_criteria',
	'title' 	=> __('Review Criteria','mtcframework'),
	'pages' 	=> array( 'post' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'clone'   => true,
	'fields' 	=> array(
					array(
						'name' => __('Criteria 1: Name','mtcframework'),
						'id'   => "mtc_criteria_name1",
						'desc'  => ' ',
						'type' => 'text'
					),array(
						'name' => __('Criteria 1: Rate','mtcframework'),
						'id'   => "mtc_criteria_rate1",
						'desc'  => ' ',
						'saparator'=> true,
						'type' => 'text'
					),
					
					array(
						'name' => __('Criteria 2: Name','mtcframework'),
						'id'   => "mtc_criteria_name2",
						'desc'  => ' ',
						'type' => 'text'
					),array(
						'name' => __('Criteria 2: Rate','mtcframework'),
						'id'   => "mtc_criteria_rate2",
						'desc'  => ' ',
						'saparator'=> true,
						'type' => 'text'
					),
					
					array(
						'name' => __('Criteria 3: Name','mtcframework'),
						'id'   => "mtc_criteria_name3",
						'desc'  => ' ',
						'type' => 'text'
					),array(
						'name' => __('Criteria 3: Rate','mtcframework'),
						'id'   => "mtc_criteria_rate3",
						'desc'  => ' ',
						'saparator'=> true,
						'type' => 'text'
					),
					
					array(
						'name' => __('Criteria 4: Name','mtcframework'),
						'id'   => "mtc_criteria_name4",
						'desc'  => ' ',
						'type' => 'text'
					),array(
						'name' => __('Criteria 4: Rate','mtcframework'),
						'id'   => "mtc_criteria_rate4",
						'desc'  => ' ',
						'saparator'=> true,
						'type' => 'text'
					),
					
					array(
						'name' => __('Criteria 5: Name','mtcframework'),
						'id'   => "mtc_criteria_name5",
						'desc'  => ' ',
						'type' => 'text'
					),array(
						'name' => __('Criteria 5: Rate','mtcframework'),
						'id'   => "mtc_criteria_rate5",
						'desc'  => ' ',
						'saparator'=> true,
						'type' => 'text'
					),
					
					array(
						'name' => __('Criteria 6: Name','mtcframework'),
						'id'   => "mtc_criteria_name6",
						'desc'  => ' ',
						'type' => 'text'
					),array(
						'name' => __('Criteria 6: Rate','mtcframework'),
						'id'   => "mtc_criteria_rate6",
						'desc'  => ' ',
						'saparator'=> true,
						'type' => 'text'
					),
					
					array(
						'name' => __('Criteria 7: Name','mtcframework'),
						'id'   => "mtc_criteria_name7",
						'desc'  => ' ',
						'type' => 'text'
					),array(
						'name' => __('Criteria 7: Rate','mtcframework'),
						'id'   => "mtc_criteria_rate7",
						'desc'  => ' ',
						'saparator'=> true,
						'type' => 'text'
					),
					
					array(
						'name' => __('Criteria 8: Name','mtcframework'),
						'id'   => "mtc_criteria_name8",
						'desc'  => ' ',
						'type' => 'text'
					),array(
						'name' => __('Criteria 8: Rate','mtcframework'),
						'id'   => "mtc_criteria_rate8",
						'desc'  => ' ',
						'saparator'=> true,
						'type' => 'text'
					),
					
					array(
						'name' => __('Criteria 9: Name','mtcframework'),
						'id'   => "mtc_criteria_name9",
						'desc'  => ' ',
						'type' => 'text'
					),array(
						'name' => __('Criteria 9: Rate','mtcframework'),
						'id'   => "mtc_criteria_rate9",
						'desc'  => ' ',
						'saparator'=> true,
						'type' => 'text'
					),
					
					array(
						'name' => __('Criteria 10: Name','mtcframework'),
						'id'   => "mtc_criteria_name10",
						'desc'  => ' ',
						'type' => 'text'
					),array(
						'name' => __('Criteria 10: Rate','mtcframework'),
						'id'   => "mtc_criteria_rate10",
						'desc'  => ' ',
						'type' => 'text'
					)
			)
	);





/**
 * Register meta boxes
 *
 * @return void
 */
function rw_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $meta_boxes as $meta_box ) {
			if ( isset( $meta_box['only_on'] ) && ! rw_maybe_include( $meta_box['only_on'] ) ) {
				continue;
			}
			new RW_Meta_Box( $meta_box );
		}
	}
}
add_action( 'admin_init', 'rw_register_meta_boxes' );


/**
 * Check if meta boxes is included
 *
 * @return bool
 */
function rw_maybe_include( $conditions ) {
	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}

	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}

	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}
	else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post    = get_post( $post_id );
	foreach ( $conditions as $cond => $v ) {
		// Catch non-arrays too
		if ( ! is_array( $v ) ) {
			$v = array( $v );
		}
		switch ( $cond ) {
			case 'id':
				if ( in_array( $post_id, $v ) ) {
					return true;
				}
			break;
			case 'parent':
				$post_parent = $post->post_parent;
				if ( in_array( $post_parent, $v ) ) {
					return true;
				}
			break;
			case 'slug':
				$post_slug = $post->post_name;
				if ( in_array( $post_slug, $v ) ) {
					return true;
				}
			break;
			case 'template':
				$template = get_post_meta( $post_id, '_wp_page_template', true );
				if ( in_array( $template, $v ) ) {
					return true;
				}
			break;
		}
	}

	// If no condition matched
	return false;
}