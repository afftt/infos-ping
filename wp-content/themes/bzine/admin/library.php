<?php 
global $smof_data;
if (!defined('ABSPATH')) die('-1'); 
define( 'ADMIN_LIB', dirname(__file__) . '/library/' );
define( 'ADMIN_LIB_URI', ADMIN_DIR . 'library/' );

/* Include Bzine Library for news list */
require_once (ADMIN_LIB . 'meta-box/meta-box.php');
require_once (ADMIN_LIB . 'costumize.php');
require_once (ADMIN_LIB . 'woocomerce-function.php');
require_once (ADMIN_LIB . 'helper/update_notifier.php');
require_once (ADMIN_LIB . 'plugins/importer/importer.php');
require_once (ADMIN_LIB . 'plugin-includes.php');
require_once (ADMIN_LIB . 'meta-box.php');
require_once (ADMIN_LIB . 'mtcrating.php');
require_once (ADMIN_LIB . 'plugins/dynamic-image-resizer.php');

/* Library for news list */
require_once (ADMIN_LIB . 'mtc_news_tab.php');
require_once (ADMIN_LIB . 'mtc_news_boxs.php');
require_once (ADMIN_LIB . 'mtc_scrolling_box.php');
require_once (ADMIN_LIB . 'mtc_news_in_picture.php');
require_once (ADMIN_LIB . 'mtc_newsticker.php');



# CUSTOM WIDGET HERE
require_once (ADMIN_LIB . 'widget/widget_flickr.php');
require_once (ADMIN_LIB . 'widget/widget_banner.php');
require_once (ADMIN_LIB . 'widget/widget-tab-post.php');
require_once (ADMIN_LIB . 'widget/widget_video.php');
require_once (ADMIN_LIB . 'widget/google_badge.php');
require_once (ADMIN_LIB . 'widget/facebook_like.php');
require_once (ADMIN_LIB . 'widget/widget_image_slideshow.php');
require_once (ADMIN_LIB . 'widget/widget_recent_post.php');
require_once (ADMIN_LIB . 'widget/widget_popular_post.php');
require_once (ADMIN_LIB . 'widget/mtc_post_widget.php');
require_once (ADMIN_LIB . 'widget/widget_gallery.php');

if (defined( 'EASY_INSTAGRAM_PLUGIN_PATH' ) ){
	require_once (ADMIN_LIB . 'widget/widget_instagram.php');
} 


/* ADD SHORTCODE FUNCTIONALITY TO WIDGETS */
add_filter('widget_text', 'do_shortcode');

/* enable action dan filter */
add_action( 'init', 'mtc_register_menus' );
add_action( 'after_setup_theme', 'mtc_setup' );

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
add_filter( 'excerpt_more', 'new_excerpt_more');
add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );

/*
 * Register option
 * When Theme selected
 */
function mtc_setup(){
	add_theme_support( 'post-thumbnails' );
	add_theme_support('automatic-feed-links');
	add_theme_support( 'woocommerce' );
	/* add_theme_support( 'custom-background'); */
	/* add_theme_support( 'custom-header' ); */
	add_image_size( 'blog-thumb', 760, 430,true ); 
	add_image_size( 'slider-big', 1080, 460,true ); 
	add_image_size( 'blog-small', 280, 222,true ); 
	add_image_size( 'small', 420, 99999); 	
}


add_theme_support( 'post-formats', array(
	'audio',  'gallery', 'image', 'video'
) );
	
	
	
/* = Register Menu */
function mtc_register_menus() {
	register_nav_menus(
		array(
			'main-nav' 		=> __( 'Main Navigation','mtcframework' ),
			'footer-nav' 	=> __( 'Footer Navigation' ,'mtcframework' )
		)
	);
}


/* = Register Sidebar */
register_sidebar(array(
	'id' 			=> 'widget_sidebar',
	'name' 			=> 'Right Sidebar',
	'description' 	=> 'Used on every page BUT the homepage page template.',
	'class'			=> 'widget',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' 	=> '</aside>',
	'before_title' 	=> '<h2 class="widget_title">',
	'after_title' 	=> '</h2>',
));
	
register_sidebar(array(
	'id' 			=> 'widget_sidebar_contact',
	'name' 			=> 'Widget Contact',
	'description' 	=> 'This widget only display on page with contact template.',
	'class'			=> 'widget',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' 	=> '</aside>',
	'before_title' 	=> '<h2 class="widget_title">',
	'after_title' 	=> '</h2>',
));

register_sidebar(array(
	'id' 			=> 'widget_sidebar_forum',
	'name' 			=> 'Widget Forum',
	'description' 	=> 'This widget only display on page with Forum.',
	'class'			=> 'widget',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' 	=> '</aside>',
	'before_title' 	=> '<h2 class="widget_title">',
	'after_title' 	=> '</h2>',
));

/* Widget Footer */
register_sidebar(array(
	'id' 			=> 'widget_footer1',
	'name' 			=> 'Widget Footer 1',
	'description' 	=> 'This widget display on footer',
	'class'			=> 'kangmas',
	'before_widget' => '<aside id="%1$s" class="widget widget_footer widget_footer4 %2$s">',
	'after_widget' 	=> '</aside>',
	'before_title' 	=> '<h2 class="widget_title">',
	'after_title' 	=> '</h2>',
));
register_sidebar(array(
	'id' 			=> 'widget_footer2',
	'name' 			=> 'Widget Footer 2',
	'description' 	=> 'This widget display on footer',
	'class'			=> '',
	'before_widget' => '<aside id="%1$s" class="widget widget_footer widget_footer4 %2$s">',
	'after_widget' 	=> '</aside>',
	'before_title' 	=> '<h2 class="widget_title">',
	'after_title' 	=> '</h2>',
));
register_sidebar(array(
	'id' 			=> 'widget_footer3',
	'name' 			=> 'Widget Footer 3',
	'description' 	=> 'This widget display on footer',
	'class'			=> '',
	'before_widget' => '<aside id="%1$s" class="widget widget_footer widget_footer4 %2$s">',
	'after_widget' 	=> '</aside>',
	'before_title' 	=> '<h2 class="widget_title">',
	'after_title' 	=> '</h2>',
));
register_sidebar(array(
	'id' 			=> 'widget_footer4',
	'name' 			=> 'Widget Footer 4',
	'description' 	=> 'This widget display on footer',
	'class'			=> '',
	'before_widget' => '<aside id="%1$s" class="widget widget_footer widget_footer4 %2$s">',
	'after_widget' 	=> '</aside>',
	'before_title' 	=> '<h2 class="widget_title">',
	'after_title' 	=> '</h2>',
));
	
	
/* content width */
if ( ! isset( $content_width ) ) $content_width = 560;



	


# CUSTOM LENGTH THE EXCERPT
function custom_excerpt_length( $length ) {
	return 40;
}

function new_excerpt_more( $more ) {
	return '...';
}


function excerpt($limit=10) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}
	 
function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	}
	
	$content = preg_replace('/[.+]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}


	
if(!function_exists('mtc_social_share')){
	function mtc_social_share($link_share=false){
		$social_share = array(
			'facebook'=> array(
							'name'=>'Facebook',
							'icon'=>'icon-facebook',
							'url'=> 'http://www.facebook.com/sharer.php?u='
						),
			'googleplus'=> array(
							'name'=>'Google+',
							'icon'=>'icon-google-plus',
							'url'=> 'https://plus.google.com/share?url='
						),
			'twitter'=> array(
							'name'=>'Twitter',
							'icon'=>'icon-twitter',
							'url'=> 'http://twitter.com/intent/tweet?url='
						),
			'linkedin'=> array(
							'name'=>'Linkedin',
							'icon'=>'icon-linkedin',
							'url'=> 'http://www.linkedin.com/shareArticle?mini=true&url='
						),
			'email'=> array(
							'name'=>'Email',
							'icon'=>'icon-envelope-alt',
							'url'=> 'mailto:?subject='.get_the_title().'&body='
						),
		);

		if(!$link_share){
			$link_share = get_permalink();
		}
		
		$output = '<ul class="social_share">';
		
		foreach($social_share as $key_share => $val_share){
			$output.='<li><a class="mtc_social_icon2" ';
		
			if($key_share !='email'){
				$output.=' onclick="social_share(\''.$val_share['url'].$link_share.'\')" href="javascript:void(0);"';
			}else{
				$output.=' href="'.$val_share['url'].$link_share.'"';
			}
		
			$output.=' title="'.$val_share['name'].'"><i class="'.$val_share['icon'].'"></i>&nbsp;</a></li>';
		}
		
		$output.='</ul>';
		echo $output;
	}
}		




//set default tag size
function custom_tag_cloud_widget($args) {
	$args['largest'] = 14; //largest tag
	$args['smallest'] = 14; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	return $args;
}



/**
 * mtc_print_font
 * @param $font string, ex typhograpy id
 */
if(!function_exists('mtc_print_font')){
	function mtc_print_font($font){
		global $smof_data;
		if (!empty($smof_data[$font])){
			$font = $smof_data[$font];
			$print = 'font-size:'.$font['size'].';';
			$print .= 'font-family:'.$font['face2'].';';
			$print .= 'font-color:'.$font['color'].';';
				$style = $font['style'];
				switch ($style){
					case "normal":
						$print .= 'font-style:'.$font['style'].';';
						break;
					case "bold":
						$print .= 'font-weight:'.$font['style'].';';
						break;
					case "italic":
						$print .= 'font-style:italic;';
						break;
					case "bold italic":
						$print .= 'font-style:italic;';
						$print .= 'font-weight:bold;';
						break;
				}
				echo $print;
		}

	}
}



global $load_gf;
$load_gf = array();
if(!function_exists('mtc_gb_is_load')){
	function mtc_gb_is_load($name=''){
		global $load_gf;
		
		if(empty($name)){ return true; } 
		
		if(isset($load_gf[$name])){
			return true;
		}else{
			return false;
		}
	}
}

/**
 * mtc_print_css_typo
 * @param $propertie string , css ex. .class or body
 * @param $typo typography id , ex. f_navi
 */
if(!function_exists('mtc_print_css_typo')){
	function mtc_print_css_typo($propertie, $typo='')
	{
		global $smof_data;
		global $load_gf;
		
		if (!empty($smof_data[$typo])){
			$typo = $smof_data[$typo];
		}
		
		if(empty($propertie)) { return ''; }
		if(!is_array($typo)) { 	return ''; }
		
		$css = $propertie.'{';
		if($typo['face2']!='none') {
			$getfont = str_replace(' ', '+', $typo['face2'] );
			$css .= 'font-family: \''.$typo['face2'].'\';';
			if(!mtc_gb_is_load($getfont)){
				$load_gf[$getfont] = 1;
				echo '@import url(http://fonts.googleapis.com/css?family='.$getfont.');'."\n";
			}
			
		}else{
			$css .= 'font-family: inherit;';
		}

		$css .= 'font-size:'.$typo['size'].';';
		$css .= 'color:'.$typo['color'].';';
		
		$style = $typo['style'];
		switch($style){
			case "normal":
				$css .= 'font-weight:normal;';
				break;
			case "bold":
				$css .= 'font-weight:bold;';
				break;
			case "italic":
				$css .= 'font-style:italic;';
				break;
			case "bold italic":
				$css .= 'font-style:italic;';
				$css .= 'font-weight:bold;';
				break;
			case "underline":
				$css .= 'text-decoration:underline;';
				break;
			case "bold underline":
				$css .= 'text-decoration:underline;';
				$css .= 'font-weight:bold;';
				break;
				
		}

		$css .='}';

		return $css."\n";

	}
}



/* get a single categori on the post */
if(!function_exists('single_category_post')){
	function single_category_post($post){
		
		$cats = get_the_category($post->ID);
		if(is_array( $cats)){
			$count_categories = count($cats);
			if( 0  != $count_categories ){
				if( 1 == $count_categories ){
					$gg = 0; 
				}else{
					$gg = rand(0,count($cats)-1); 
				}
				$cat = $cats[$gg];
				return  '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';
			} else{ return ''; } 
		} return '';
	}
}

