<?php  
/*
* Mediatechindo framework V.1.0 
*/
global $socmed_user;

if ( get_stylesheet_directory() ==  get_template_directory() ) {
	define('DEN_ROOT',  get_template_directory());
	define('DEN_DIRECTORY', get_template_directory());
	define('DEN_INIT', get_template_directory() . '/init/');
	define('DEN_INCLUDE_URI', get_template_directory_uri() . '/include/');
	define('DEN_INCLUDE', get_template_directory() . '/include/');
	define('DEN_JS', get_template_directory_uri() . '/js/');
	define('DEN_CSS', get_template_directory_uri() . '/css/');
	define('DEN_URI', get_template_directory_uri() );


} else {
	define('DEN_ROOT', get_stylesheet_directory());
	define('DEN_DIRECTORY', get_stylesheet_directory());
	define('DEN_INIT', get_stylesheet_directory() . '/init/');
	define('DEN_INCLUDE_URI', get_stylesheet_directory_uri() . '/include/');
	define('DEN_INCLUDE', get_stylesheet_directory() . '/include/');
	define('DEN_JS', get_stylesheet_directory_uri() . '/js/');
	define('DEN_CSS', get_stylesheet_directory_uri() . '/css/');
	define('DEN_URI', get_stylesheet_directory_uri() );

}

/* set yor language */
load_theme_textdomain('mtcframework', get_template_directory() . '/languages');



require_once ('admin/index.php');
require_once ('admin/library.php');


global $is_diagonal;
$is_diagonal = false;
$front = get_option( 'show_on_front' );



if('page' == $front){
	$fron_page = get_option('page_on_front');
	$page_front_page = get_post( $fron_page );
	$meta_values = get_post_meta( $page_front_page->ID, '_wp_page_template', true );
	if('template-home-3.php' == $meta_values){
		// Add class bzine-diagonal to body
		add_filter('body_class','bzine_add_diagonal_class');
		$is_diagonal = true;
	}	
} 




/* Add class diagonal if user select page for front_page and it template is template-home-3.php */
function bzine_add_diagonal_class($classes) {
	// add 'class-name' to the $classes array
	$classes[] = 'bzine-diagonal';
	// return the $classes array
	return $classes;
}



add_action('wp_enqueue_scripts', 'mtc_enq_style',100);
add_action( 'wp_enqueue_scripts', 'mtc_enq_scripts' );
add_action( 'login_enqueue_scripts', 'mtc_custom_login_logo');

function mtc_enq_style() {
	wp_register_style('style', DEN_URI . '/style.css', 'style');
	wp_register_style('bootstrap', DEN_CSS . 'bootstrap.min.css', 'style');
	wp_register_style('bootstrap-responsive', DEN_CSS . 'bootstrap-responsive.min.css', 'style');
	wp_register_style('font-awesome', DEN_CSS . 'font-awesome.min.css', 'style');
	wp_register_style('animate', DEN_CSS . 'animate.css', 'style');
	
	wp_enqueue_style( 'font-awesome');
	wp_enqueue_style( 'bootstrap');
	wp_enqueue_style( 'bootstrap-responsive');
	wp_enqueue_style( 'animate');
	wp_enqueue_style( 'jquery.fancybox',DEN_CSS . 'jquery.fancybox.css', '','2.1.4','screen',TRUE);
	wp_enqueue_style( 'jquery.bxslider',DEN_CSS . 'jquery.bxslider.css', '','4.1','screen',TRUE);
	wp_enqueue_style( 'style');
	wp_enqueue_style( 'custumizer',DEN_CSS . 'customizer.css.php', 'style','1.0','screen',TRUE);
	do_action('bzine_after_enqueue_style');
}

function mtc_enq_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('selectnav', DEN_JS  . 'selectnav.min.js',array( 'jquery' ), '1', TRUE); 
	wp_enqueue_script('jquery.ticker', DEN_JS  . 'jquery.ticker.js','','',TRUE);
	wp_enqueue_script('bootstrap', DEN_JS  . 'bootstrap.min.js',array( 'jquery' ), '20120206', TRUE);
	wp_enqueue_script('jquery.bxslider', DEN_JS  . 'jquery.bxslider.min.js','4.1','',TRUE);
	wp_enqueue_script('jquery.carouFredSel', DEN_JS  . 'jquery.carouFredSel.js','6.2.1','',TRUE);
	wp_enqueue_script('jquery.fancybox', DEN_JS  . 'jquery.fancybox.pack.js','2.1.4','',TRUE);
	wp_enqueue_script('jquery.sticky', DEN_JS  . 'jquery.sticky.js','2.1.4','',TRUE);
	wp_enqueue_script('fluidvids', DEN_JS  . 'fluidvids.min.js','2.0.0','',TRUE);
	wp_enqueue_script('waypoints', DEN_JS  . 'waypoints.min.js','2.0.0','',TRUE);
	wp_enqueue_script('imagesloaded', DEN_JS  . 'imagesloaded.pkgd.min.js','2.0.0','',TRUE);
	wp_enqueue_script('masonry', DEN_JS  . 'masonry.pkgd.min.js','2.0.0','',TRUE);
	
	if ( is_page_template('template-contact.php') ) {
		wp_enqueue_script('gmapsapi','http://maps.google.com/maps/api/js?sensor=false','','',true);
		wp_enqueue_script('gmaps',get_template_directory_uri() . '/js/gmaps.js','','',true);
	}
	
	wp_enqueue_script('bzine', DEN_JS  . 'bzine.js','','',TRUE);
}


/* custom login */
function mtc_custom_login_logo() {
	global $smof_data;
	$custom_logo = $smof_data['login_logo'];
	if ($custom_logo) {		
	echo '<style type="text/css">
		.login h1 a { background-image:url('. $custom_logo .') !important; height: 95px!important; background-size: auto; width:auto;}
	</style>';
	} else {
	echo '<style type="text/css">
		.login h1 a { background-image:url('. get_template_directory_uri() .'/img/login-logo.png) !important; height: 95px!important; background-size: auto; width:auto;}
	</style>';
	}
}




/* add favicon standar and apple touch icon */
if(!function_exists('mtc_favicon')){
	function mtc_favicon(){
		global $smof_data;
		if(!empty($smof_data['custom_favicon'])){ 
			?><link rel="shortcut icon" href="<?php echo $smof_data['custom_favicon']; ?>" /><?php 
		} else { 
			?><link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" /><?php
		} 
		
		if(!empty($smof_data['appletouchicon_57'])) 	: ?><link rel="apple-touch-icon-precomposed" href="<?php echo $smof_data['appletouchicon_57']; ?>" /><?php endif;
		if(!empty($smof_data['appletouchicon_72'])) 	: ?><link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $smof_data['appletouchicon_72']; ?>" /><?php endif; 
		if(!empty($smof_data['appletouchicon_114'])) 	: ?><link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $smof_data['appletouchicon_114']; ?>" /><?php endif; 
		if(!empty($smof_data['appletouchicon_144'])) 	: ?><link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $smof_data['appletouchicon_144']; ?>" /><?php endif; 
		
	}
	add_action( 'wp_head', 'mtc_favicon' );
}




/* add fancybox link support */
if(!function_exists('add_data_fancybox_group_galery')){
	function add_data_fancybox_group_galery($content) {
		$content = preg_replace("/<a/","<a data-fancybox-group=\"gallery-fancybox-group\"",$content,1);
		return $content;
	}
	add_filter( 'wp_get_attachment_link', 'add_data_fancybox_group_galery'); 
}


if(!function_exists('mtc_filter_widget_title')){
	function mtc_filter_widget_title($title) {
		if ( $title)
		$title = '<span class="outer">'.$title.'</span>';
		
		return $title;
	}
	add_filter( 'widget_title', 'mtc_filter_widget_title'); 
}





/* 
 * this function for fallback_cb on wp_nav_menu() 
 * default menu if it is empty
 */
if(!function_exists('bzine_default_menu')){
	function bzine_default_menu(){ 
		echo '<nav id="main-navigation" class="main-navigation">
			<ul id="menu-menu-top" class="nav main-menu">
				<li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home active menu-item-11">
					<a href="'. home_url() .'" >Home</a>
				</li>
			</ul>
		</nav>';
	}
}





if(!function_exists('mtc_custom_style')){
	function mtc_custom_style(){
		global $smof_data;
		
		$css = '';
		
		if('left'==$smof_data['scroll_pos']){
			$css.='#back-top { '. $smof_data['scroll_pos'] .':30px; right:auto }';
		}
		
		if($smof_data['switch_ad_post']){
			if((600 == $smof_data['ad_post_size'])){
				$css.='.post .storycontent .entry{min-height:770px }';
			} else if((240 == $smof_data['ad_post_size'])){
				$css.='.post .storycontent .entry{min-height:415px }';
			}
		}

		wp_add_inline_style( 'custumizer', $css );
	}
	
	add_action( 'wp_print_styles', 'mtc_custom_style' );
}




if(!function_exists('bzine_ads_single_post')){
function bzine_ads_single_post(){
	global $smof_data;
	if($smof_data['switch_ad_post']) { 
		$class_size_banner = (240 == $smof_data['ad_post_size']) ? ' size240' :'' ;  ?>
		<div class="post_ad<?php echo $class_size_banner; ?>">
			<?php if(!empty($smof_data['ad_post_img'])) :?>
				<a target="_blank" href="<?php echo $smof_data['ad_post_url'];?>"><img src="<?php echo $smof_data['ad_post_img'];?>" alt="" /></a>
			<?php else :?>
				<?php echo $smof_data['ad_post_code'];?>
			<?php endif;?>
		</div><?php
	} 
}
}
					
					

					
					
					
					
if(!function_exists('mtc_custom_css_and_script')){
	function mtc_custom_css_and_script(){
		global $smof_data;
		/* Custom Tracking Code */
		if(!empty($smof_data['google_analytics'])) {
			echo $smof_data['google_analytics']; 	
		}

		/* Custom  CSS */
		if(!empty($smof_data['custom_css'])) {
			echo '<style type="text/css" media="all">'.$smof_data['custom_css'].'</style>';
		}
	}
	
	add_action( 'wp_footer', 'mtc_custom_css_and_script' );
}







if(!function_exists('bzine_var_localize_script')){
	function bzine_var_localize_script(){
		global $smof_data;
		
		wp_localize_script( 'bzine', 'bzine', array (
		  'news_ticker_animation' 	=> $smof_data['news_ticker_animation'] ,
		  'slider_effect' 			=> $smof_data['slider_effect'] ,
		  'slider_timeoutDuration' 	=> $smof_data['slider_timeoutDuration'] ,
		));
		
	}
	add_action( 'wp_footer', 'bzine_var_localize_script' );
}









if(!function_exists('pagination')){
function pagination($pages = '', $range = 4) { 	
	$prev = get_previous_posts_link('PREV');
	$next = get_next_posts_link('NEXT');
	
	
    $showitems = ($range * 2)+1; 
 
    global $paged;
    if(empty($paged)) $paged = 1;
 
    if($pages == ''){
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages){
             $pages = 1;
         }
     }  

			
    if(1 != $pages){
        echo '<ul>';
		if(!empty($prev)){
			echo '<li>'.$prev.'</li>';
		}

		for ($i=1; $i <= $pages; $i++){
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                 echo ($paged == $i)? "<li class=\"disabled\"><a href=\"#\">".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' >".$i."</a></li>";
            }
        }
 
		if(!empty($next)){
			echo '<li>'.$next.'</li>';
		}
		 echo '</ul>';
     }
}
}

/* show social icon */
if(!function_exists('mtc_social_media')){
	function mtc_social_media($locations=''){
		global $smof_data;
		
		if(empty($locations)) {
			return '';
		}
		
		if('header'==$locations){
			if(!$smof_data['show_icon_social_header']){
				return '';
			}
		}
		
		if('footer'==$locations){
			if(!$smof_data['show_icon_social_footer']){
				return '';
			}
		}
		
		
		$social = array(
					's_facebook' 	=>array('Facebook','icon-facebook'),
					's_twitter'		=>array('Twitter','icon-twitter'),
					's_instagram'	=>array('Instagram','icon-instagram'),
					's_Linkedin'	=>array('Linkedin','icon-linkedin'),
					's_Dribbble'	=>array('Dribbble','icon-dribbble'),
					's_YouTube'		=>array('YouTube','icon-youtube'),
					's_Pinterest'	=>array('Pinterest','icon-pinterest'),
					's_Flickr'		=>array('Flickr','icon-flickr'),
					's_Tumblr'		=>array('Tumblr','icon-tumblr'),
					's_Rss'			=>array('RSS','icon-rss'),
					's_github'		=>array('Github','icon-github'),
					's_Google'		=>array('Circle G+','icon-google-plus-sign')
				);
				
		$output = '<div class="social_media">';
		$output .= '<ul class="socmed">';
		
		foreach($social as $key=>$val){
		
			if(isset($smof_data[$key])){
			
				if(!empty($smof_data[$key])){ 
				
					$class 	 = 'social_'.str_replace('-','_', $val[1]);
					$output .= '<li>';	
					$output .= '<a target="_blank" class="'.$class.'" href="' . $smof_data[$key] . '" title="' . $val[0] . '"><i class="icon ' . $val[1] . '"></i></a>';	
					$output .= '</li>';	
				}
			}
		}	
		
		$output .= '</ul>';			
		$output .= '</div>';			

		return $output;
	}
}

/* add bottom scroll top */
if(!function_exists('mtc_back_to_top')){
	function mtc_back_to_top(){
		global $smof_data;
		
		if($smof_data['switch_scrooltop']) : 
			?><div id="back-top"><a href="#top"><i class="icon-angle-up"></i></a></div><?php 
		endif; 

	}
	add_action( 'wp_footer', 'mtc_back_to_top',999 );
}



/* = MTC POST VIEW 
*******************************************************/
function mtc_get_postmeta_views($postID){
	$count_key = 'mtc_views';
    $count = get_post_meta($postID, $count_key, true);
	if($count==''){
		return '0';
	}else{
		return $count;
	}
}

function mtc_set_postmeta_views($postID) {
    $count_key = 'mtc_views';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        update_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}



if(!function_exists('mtc_add_postmeta_views')){
	function mtc_add_postmeta_views( $post_id ) {
		 $count_key = 'mtc_views';
		 update_post_meta($post_id, $count_key, '0');
	}
	add_action( 'save_post', 'mtc_add_postmeta_views' );
}


/* 
	if both logged in and not logged in users can send this AJAX request,
	add both of these actions, otherwise add only the appropriate one 
*/
add_action( 'wp_ajax_nopriv_mtc-counter-view', 'mtc_handle_counter_views' );
add_action( 'wp_ajax_mtc-counter-view', 'mtc_handle_counter_views' );
 
function mtc_handle_counter_views() {
	// get the submitted parameters
	$postID = $_POST['postID'];
	 mtc_set_postmeta_views($postID);
	exit;
}



/* End POST VIEW */







if(!function_exists('_mtc_add_style_custom_list_table')){
	function _mtc_add_style_custom_list_table(){
	?><style type="text/css" media="all">
		.column-mtc_views{width:50px;}
		.column-mtc_icon{width:50px;}
	</style><?php
	}
	add_action('admin_head', '_mtc_add_style_custom_list_table');
}

if(!function_exists('set_custom_edit_book_columns')){
	function set_custom_edit_book_columns($columns) {
		$new_columns = array();
		$new_columns['cb'] = $columns['cb'];
		$new_columns['mtc_icon'] = __( '&nbsp;', 'mtcframework' );
		
		foreach($columns as $key=>$val){
			 $new_columns[$key] =$val;
		}
		$new_columns['mtc_views'] = __( 'View', 'mtcframework' );
		return $new_columns;
	}
	add_filter( 'manage_edit-post_columns', 'set_custom_edit_book_columns' );
}

if(!function_exists('custom_book_column')){
	function custom_book_column( $column, $post_id ) {
		switch ( $column ) {

			case 'mtc_icon' :
				if ( has_post_thumbnail() ) {
					the_post_thumbnail(array(50,50));
				}else{
					echo ' ';
				}
				break;
			case'mtc_views':
			
				 echo mtc_get_postmeta_views(get_the_ID());
			break;
		}
	}
	add_action( 'manage_post_posts_custom_column' , 'custom_book_column', 10, 2 );
}





/* = Boxed and Wide Layout Class 
***************************************************/
if(!function_exists('mtc_boxed_class')){
	function mtc_boxed_class(){
		global $smof_data; 
			 $class = '';
			 
			if($smof_data['layout_style']=='wide'){
				$class = 'boxed';
			}

			else{
				$class = 'boxed active';
			}	

			echo 'class="'. $class .'"';	
	}
}







/**
* Extended Walker class for use with the
* Twitter Bootstrap toolkit Dropdown menus in Wordpress.
* Edited to support n-levels submenu.
* @author johnmegahan https://gist.github.com/1597994, Emanuele 'Tex' Tessore https://gist.github.com/3765640
*/
class Mtc_Nav_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {

		$indent = str_repeat( "\t", $depth );
		/* $submenu = ($depth > 0) ? ' sub-menu' : ''; */
		$output	   .= "\n$indent<ul class=\" depth_$depth\">\n";

	}
	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$li_attributes = '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		// managing divider: add divider class to an element to get a divider before it.
		$divider_class_position = array_search('divider', $classes);
		if($divider_class_position !== false){
			$output .= "<li class=\"divider\"></li>\n";
			unset($classes[$divider_class_position]);
		}
		
		$classes[] = ($args->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		if($depth && $args->has_children){
			/* $classes[] = 'dropdown-submenu'; */
		}


		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		/* $attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle bl-dropdown" data-toggle="dropdown"' : ''; */

		$item_output = $args->before;
		$item_output .= '<a'. $attributes;

		$item_output .= ' >';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($depth == 0 && $args->has_children) ? ' <i class="icon-angle-down"></i></a>' : '</a>';
		
		$item_output .= $args->after;


		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	
	
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		//v($element);
		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) )
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);

	}

}






/* define a socmed data for user meta socmed */
$socmed_user = array(
	array(
		'title'		=>'Twitter',
		'id'		=> 'twitter',
		'icon'		=> 'icon-twitter',
		'message' 	=> __('Your profile link on Twitter. ex : https://twitter.com/username','mtcframework')
	),
	array(
		'title'		=>'Facebook',
		'id'		=> 'facebook',
		'icon'		=> 'icon-facebook',
		'message' 	=> __('Your profile link on Facebook. ex : http://www.facebook.com/username','mtcframework')
	),
	array(
		'title'		=>'Google Plus',
		'id'		=> 'google_plus',
		'icon'		=> 'icon-google-plus-sign',
		'message' 	=> __('Your profile link on Google Plus. ex : https://plus.google.com/+username','mtcframework')
	),
	array(
		'title'		=>'Linkedin',
		'id'		=> 'linkedin',
		'icon'		=> 'icon-linkedin',
		'message' 	=> __('Your profile link on Linkedin. ex : http://www.facebook.com/username','mtcframework')
	),
	array(
		'title'		=>'Dribbble',
		'id'		=> 'dribbble',
		'icon'		=> 'icon-dribbble',
		'message' 	=> __('Your profile link on Dribbble. ex : http://www.dribbble.com/username','mtcframework')
	),array(
		'title'		=>'Pinterest',
		'id'		=> 'pinterest',
		'icon'		=> 'icon-pinterest',
		'message' 	=> __('Your profile link on Pinterest. ex : http://www.pinterest.com/username','mtcframework')
	),array(
		'title'		=>'Flickr',
		'id'		=> 'flickr',
		'icon'		=> 'icon-flickr',
		'message' 	=> __('Your profile link on Flickr. ex : http://www.flickr.com/username','mtcframework')
	),array(
		'title'		=>'Tumblr',
		'id'		=> 'tumblr',
		'icon'		=> 'icon-tumblr',
		'message' 	=> __('Your profile link on Tumblr. ex : http://www.tumblr.com/username','mtcframework')
	),array(
		'title'		=>'Github',
		'id'		=> 'github',
		'icon'		=> 'icon-github',
		'message' 	=> __('Your profile link on Github. ex : http://www.github.com/username','mtcframework')
	),
	array(
		'title'		=>'Youtube',
		'id'		=> 'youtube',
		'icon'		=> 'icon-youtube',
		'message' 	=> __('Your profile link on Youtube. ex : http://www.youtube.com/user/username','mtcframework')
	)
);



/* 
	Add meta user on admin page
*/
if(!function_exists('mtc_input_user_socmed_link')){
	function mtc_input_user_socmed_link( $user ) { ?>
		<h3>Social Media Link</h3>
		<table class="form-table">
			<?php 
			global $socmed_user;
			
			/* Render the form */
			foreach($socmed_user as $soc){ ?>
				<tr>
					<th><label for="<?php echo $soc['id']; ?>"><?php echo $soc['title']; ?></label></th>
					<td>
						<input type="text" name="mtc_meta_socmed[<?php echo $soc['id']; ?>]" id="<?php echo $soc['id']; ?>" value="<?php echo esc_attr( get_the_author_meta( $soc['id'], $user->ID ) ); ?>" class="regular-text" /><br />
						<span class="description"><?php echo $soc['message']; ?></span>
					</td>
				</tr><?php
			} ?>
		</table>
	<?php }
	
	add_action( 'show_user_profile', 'mtc_input_user_socmed_link' );
	add_action( 'edit_user_profile', 'mtc_input_user_socmed_link' );
}




/* 
	PART of function mtc_input_user_socmed_link();
	this function is callback function for save the meta data user
*/
if(!function_exists('mtc_save_user_socmed_link')){
	function mtc_save_user_socmed_link( $user_id ) {

		if ( !current_user_can( 'edit_user', $user_id ) )
			return false;
		
		$meta_socmed = $_POST['mtc_meta_socmed'];
		
		foreach($meta_socmed as $id_socmed => $val_socmed){
			$val_socmed = trim($val_socmed);
			update_user_meta( $user_id, $id_socmed, $val_socmed );
		}
	}
	add_action( 'personal_options_update', 'mtc_save_user_socmed_link' );
	add_action( 'edit_user_profile_update', 'mtc_save_user_socmed_link' );
}

function filter_where($where = '') {
	//posts in the last 30 days
	$where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
	return $where;
}




/* = Comments list
************************************************************/
if(!function_exists('mtc_comments')){
function mtc_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" class="comment even thread-even depth-1">
	<div class="rapidx_comment" id="comment-2223">
		<div class="comment-meta commentmetadata">
			<cite class="fn"><?php printf(__('%s','mtcframework'), get_comment_author_link()) ?></cite>
			<div class="clock">
				<?php comment_time('F j, Y ');?> at <?php comment_time('H:i a'); ?>, 
				<?php //edit_comment_link(__(' Edit , '),'<span class="edit-comment">', '</span>'); ?>
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		</div>
		
		<div class="comment-body">
			<?php comment_text() ?>
		</div>
	</div>
	<div class="comment-author vcard"><?php echo get_avatar($comment,$size='125'); ?></div>						
	<div class="reply"></div>
	<?php 
	
	/* </li> is added  automatically */
	
} // don't remove this bracket! 
}
