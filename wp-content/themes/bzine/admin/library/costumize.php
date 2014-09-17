<?php 
/**
 * Add Customizer option
 * @since v1.0
 */
add_action( 'customize_register', 'mtc_theme_customizer' );

function mtc_theme_customizer( $wp_customize ) {
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';
	$wp_customize->get_setting('header_textcolor')->transport='postMessage';
	
	
	/* custom_set section */
	$wp_customize->add_section( 'custom_set', array(
		'title' => 'Custom', // The title of section
		'description' => 'Settings main style section', // The description of section
	) );

		// The latter code snippets go here.
		$wp_customize->add_setting( 'custom_set[body]', array(
			'default' => '#FFFFFF',
			'type' => 'option',
			'transport'      => 'postMessage',
			'capability'     => 'edit_theme_options',
			'sanitize_callback'    => 'sanitize_hex_color_no_hash',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_set[body]', array(
			'label'   => 'Body Color',
			'section' => 'custom_set',
		) ) ); 
	

	
		$wp_customize->add_setting( 'custom_set[color]', array(
			'default' => '#11AA72',
			'type' => 'option',
			'transport'      => 'postMessage',
			'capability'     => 'edit_theme_options',
			'sanitize_callback'    => 'sanitize_hex_color_no_hash',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_set[color]', array(
			'label'   => 'Themes Color',
			'section' => 'custom_set',
		) ) );
	

	
		$wp_customize->add_setting( 'custom_set[color2]', array(
			'default' => '#0b905f',
			'type' => 'option',
			'transport'      => 'postMessage',
			'capability'     => 'edit_theme_options',
			'sanitize_callback'    => 'sanitize_hex_color_no_hash',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_set[color2]', array(
			'label'   => 'Themes Color 2',
			'section' => 'custom_set',
		) ) );

		
		
		$wp_customize->add_setting( 'custom_set[content]', array(
			'default' => '#f6f7f9',
			'type' => 'option',
			'transport'      => 'postMessage',
			'capability'     => 'edit_theme_options',
			'sanitize_callback'    => 'sanitize_hex_color_no_hash',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_set[content]', array(
			'label'   => 'Content Background',
			'section' => 'custom_set',
		) ) );
	
	
	
	/* add js to footer. to live change */
	if ( $wp_customize->is_preview() && ! is_admin() ) {
			add_action( 'wp_footer', 'mtc_preview', 21);
	}

}




/**
 * Load js ke footer untuk menerima perubahan variable dari custumizer
 * @since v1.0 fix
 */
function mtc_preview(){
?><script type="text/javascript">
wp.customize('custom_set[body]',function( value ) {
			value.bind(function(to) {
				jQuery('body').css('background-color', to ? to : ''  ); 
			});
		});



		
wp.customize('custom_set[color]',function( value ) {
			value.bind(function(to) {
				jQuery('div.box_breaking_news div.breaking_news_ribbon, nav.main-navigation ul.nav li.current-menu-item, #witgetsearch button.btn, .post-pager .bx-pager.bx-default-pager a:hover, .post-pager .bx-pager.bx-default-pager a.active, .tagcloud a:hover, #timer, .caption h3, .pager-nav, .btn-contact, #back-top a').css('background', to ? to : '' );
			});
			
			value.bind(function(to) {
				jQuery('._main_navigation,input[type="text"]:focus, input:focus, textarea:focus, select:focus, ._main_navigation, ._footer, h2.ribbon-green, .nav-tabs.news_tabs, h2.widget_title, ul.tabs, #witgetsearch button.btn, .post-pager .bx-pager.bx-default-pager a.active, #dropmenu select:focus').css('border-color', to ? to : '' );
			});
			value.bind(function(to) {
				jQuery('nav.main-navigation > ul li > ul').css('border-top-color', to ? to : '' );
			});
			
			value.bind(function(to) {
				jQuery('.recentcomments a, p.author a,.post-meta a, .tab_archive a, ul.tabs li.active a, .clock, .list_home_content p.author, .tab_list_content p.panel, .tab_list_content p.panel a,.list_post_content p.panel, .list_post_content p.panel a, .storycontent p.panel, .storycontent p.panel a , .post_panel, h3#comments, h3#reply-title, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span, ul.list-mini li p.author').css('color', to ? to : '' );
			});
			
			
		});

		
wp.customize('custom_set[content]',function( value ) {
			value.bind(function(to) {
				jQuery('._content').css('background', to ? to : ''  ); 
			});
		});




		
</script><?php }




function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}