<?php
defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );
// Demo Data Importer
// ?import_data_content=true
// Hook importer into admin init


add_action( 'admin_init', 'mtc_importer' );
function mtc_importer() {
	global $wpdb;
	
	
	if ( current_user_can( 'manage_options' ) && isset( $_GET['import_data_content'] ) ) {
		
		
		if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true); // we are loading importers
		if ( ! class_exists( 'WP_Importer' ) ) { // if main importer class doesn't exist
			$wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
			include $wp_importer;
		}

		if ( ! class_exists('WP_Import') ) { // if WP importer doesn't exist
			$wp_import = get_template_directory() . '/admin/library/plugins/importer/wordpress-importer.php';
			include $wp_import;
		}

		if ( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ) { // check for main import class and wp import class

			$importer = new WP_Import();
			$import_message = array();
			
			
			
			/* First Import Posts, Pages, Portfolio Content, FAQ, Images, Menus */
			$import_message[] = 'First Import Posts, Pages, Portfolio Content, FAQ, Images, Menus';
  			
			$theme_xml = get_template_directory() . '/admin/library/plugins/importer/data/bzine.xml.gz';
			$importer->fetch_attachments = true;
			ob_start();
			$importer->import($theme_xml);
			ob_end_clean(); 

			
			
			
			
			 /* Import Theme Options */
			$import_message[] = 'Import Theme Options';
			
			$theme_options_txt = get_template_directory_uri() . '/admin/library/plugins/importer/data/theme_options.txt'; // theme options data file
			$theme_options_txt = wp_remote_get( $theme_options_txt );
			$data = unserialize( base64_decode( $theme_options_txt['body'])  );
			
			update_option( OPTIONS, $data ); // update theme options
			
			
			
			
			
			/* Add data to widgets */
			$import_message[] = 'Add data to widgets';
			
			$widgets_json 	= get_template_directory_uri() . '/admin/library/plugins/importer/data/bzine_widget.json'; // widgets data file
			$widgets_json 	= wp_remote_get( $widgets_json );
			$widget_data 	= $widgets_json['body'];
			$widget_data 	= json_decode($widget_data, true);
			
			update_option( 'sidebars_widgets', $widget_data['setting'] );
			
			foreach($widget_data['data'] as  $key=>$widget){
				$dada = serialize($widget);
				update_option( $key, $widget );
			}  
			

			
			
			
			// finally redirect to success page
			wp_redirect( admin_url( 'themes.php?page=optionsframework&imported=success#of-option-generaloptions' ) );
		}
	}
}


