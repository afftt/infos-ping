<?php 

header("Content-type: text/css; charset: UTF-8");
require_once('../../../../wp-load.php');

global $smof_data;





/* load customizer options */
$custom_set = get_option( 'custom_set' );


echo "/* CUSTOM STYLE */\n";

if(isset($smof_data['switch_typography']) && $smof_data['switch_typography']==1) {
	$c ="\n";
	$c .= mtc_print_css_typo('body','general_typo');
	$c .= mtc_print_css_typo('h2._title,h2._title a','f_post');
	$c .= mtc_print_css_typo('.storycontent .entry, .box_post_full_width','f_postentry');
	$c .= mtc_print_css_typo('.widget h2.widget_title, h2.ribbon-v3 span','f_widget');
	echo $c."\n";
}else{
	?>@import url(http://fonts.googleapis.com/css?family=Raleway:400,500,600);<?php
}




echo "\n";





/* = Show custom background images from theme options
*********************************************************/
if(!empty($smof_data['switch_custom_bg'])) {
	echo 'body{';
	
	if(!empty($smof_data['custom_bg_upload'])) :
		echo 'background:url('.$smof_data['custom_bg_upload'].');';
	else: 
		if(!empty($smof_data['custom_bg'])) :
			echo 'background:url('.$smof_data['custom_bg'].');';
		endif;
	endif;
		echo 'background-repeat:'.$smof_data['custom_bg_repeat'].';';
		echo 'background-position:'.$smof_data['custom_bg_pos'].';';
		echo 'background-attachment:'.$smof_data['custom_bg_attach'].';';
		
		if('fixed' == $smof_data['custom_bg_attach']){
			echo 'background-size:cover;';
		}
	echo '}';
	
} else { 
	
}
	
	
function hex2rgba($hex,$alpha = '0.8'){
	$rgb = hex2rgb($hex);
	return 'rgba('.$rgb[0].','.$rgb[1].','.$rgb[2].','.$alpha.')';
}
	
	
/* Show custom  themes from Themes Customize */
/* = COLOR 
*************************************  */
if(!empty($custom_set['color'])): 

echo'
	div.box_breaking_news div.breaking_news_ribbon,
	nav.main-navigation ul.nav li.current-menu-item,
	#witgetsearch button.btn,
	.post-pager .bx-pager.bx-default-pager a:hover,
	.post-pager .bx-pager.bx-default-pager a.active,
	.tagcloud a:hover,
	#timer,
	.btn-contact,
	#back-top a,
	article.post_list div.entry span.line:after,
	h2.ribbon-v3,
	.more-cate a,
	.slider3 .caption .cate,
	.woocommerce span.onsale, .woocommerce-page span.onsale,
	.woocommerce ul.products li.product a:hover img, .woocommerce-page ul.products li.product a:hover img,
	.woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce nav.woocommerce-pagination ul li a:hover,.woocommerce nav.woocommerce-pagination ul li a:focus,.woocommerce #content nav.woocommerce-pagination ul li span.current,.woocommerce #content nav.woocommerce-pagination ul li a:hover,.woocommerce #content nav.woocommerce-pagination ul li a:focus,.woocommerce-page nav.woocommerce-pagination ul li span.current,.woocommerce-page nav.woocommerce-pagination ul li a:hover,.woocommerce-page nav.woocommerce-pagination ul li a:focus,.woocommerce-page #content nav.woocommerce-pagination ul li span.current,.woocommerce-page #content nav.woocommerce-pagination ul li a:hover,.woocommerce-page #content nav.woocommerce-pagination ul li a:focus,
	.woocommerce .quantity .plus,
	.woocommerce .quantity .minus,
	.woocommerce #content .quantity .plus,
	.woocommerce #content .quantity .minus,
	.woocommerce-page .quantity .plus,
	.woocommerce-page .quantity .minus,
	.woocommerce-page #content .quantity .plus,
	.woocommerce-page #content .quantity .minus,
	#bbp-search-form input.button,
	#bbpress-forums fieldset.bbp-form legend,
	.bbp-submit-wrapper button.submit ,
	.nav-tabs.news_tabs.diagonal,
	.page-template-template-home-3-php .sidebar h2.widget_title,
	div.review-item .progress .bar,.summary-score,
	body.bzine-diagonal h2.ribbon,
	.bzine-diagonal .sidebar h2.widget_title
		{ background:#'.$custom_set['color'].'}'; 

$rgba = hex2rgba($custom_set['color'],'0.9');		
echo'
	.slider .pager-nav a,
	.slider .caption h3,
	.slider3 .pager-nav a,
	.mtc_image_slideshow a.carousel-control
		{ background:'.$rgba.'}'; 
		
echo'
	#commentform p.form-submit input[type="submit"],
	.pagination ul > .disabled > span,
	.pagination ul > .disabled > a,
	.pagination ul > .disabled > a:hover,
	.pagination ul > .disabled > a:focus,
	.btn-success
		{ background-color:#'.$custom_set['color'].';}'; 
		
echo'a,
	nav.main-navigation li:hover > a,
	nav.main-navigation ul ul :hover > a,
	.list_home_content p.author,
	.tab_list_content p.panel,
	.tab_list_content p.panel a,
	nav.footer-navigation li:hover > a,
	.list_post_content p.panel,
	.list_post_content p.panel a,
	.storycontent p.panel,
	.storycontent p.panel a ,
	.post_panel,
	h3#comments, h3#reply-title,
	.pagination ul > li > a:focus,
	.pagination ul > .active > a,
	.pagination ul > .active > span,
	ul.list-mini li p.author,
	div.list-more ul li:after,
	.large_vid p.author,
	ul.tabs li.active a,
	ul.tabs li a:hover,
	.clock,
	.rating-view span.star.active ~ span.star:before,
	.rating span.star:hover:before,
	.rating span.star:hover ~ span.star:before,
	.rating span.star.active ~ span.star:before,
	.list-v3-small h3 a:hover
		{color: #'.$custom_set['color'].'}';

echo 'nav.main-navigation ul.nav ul li.current-menu-item a
		{color: #'.$custom_set['color'].'!important}';
		
		
echo'input[type="text"]:focus,
	input:focus:invalid:focus,
	textarea:focus:invalid:focus,
	select:focus:invalid:focus,
	._main_navigation,
	._footer,
	h2.ribbon-green,
	.nav-tabs.news_tabs,
	h2.widget_title,
	ul.tabs,
	#witgetsearch button.btn,
	.post-pager .bx-pager.bx-default-pager a:hover,
	.post-pager .bx-pager.bx-default-pager a.active,div.post-list h2.list-title,
	#dropmenu select:focus,
	#bbp-search-form input.button,
	.bbp-submit-wrapper button.submit 
		{border-color: #'.$custom_set['color'].' }';
		
		
echo '#data-cart,
	nav.main-navigation > ul li > ul
	{border-top-color: #'.$custom_set['color'].' }';
echo '
	.sidebar h2.widget_title
	{border-left-color: #'.$custom_set['color'].' }';


endif; 
/* END COLOR */



/* COLOR 2 */
if(!empty($custom_set['color2'])) {

echo '
	.pager-nav a:hover,
	#witgetsearch button.btn:hover,
	#commentform p.form-submit input[type="submit"]:hover,
	.btn-contact:hover,
	.btn-success:hover,
	#bbp-search-form input.button:hover,
	.bbp-submit-wrapper button.submit:hover,
	.woocommerce .woocommerce-ordering .orderby, .woocommerce-page .woocommerce-ordering .orderby,
	.woocommerce .quantity .plus:hover,.woocommerce .quantity .minus:hover,.woocommerce #content .quantity .plus:hover,.woocommerce #content .quantity .minus:hover,.woocommerce-page .quantity .plus:hover,.woocommerce-page .quantity .minus:hover,.woocommerce-page #content .quantity .plus:hover,.woocommerce-page #content .quantity .minus:hover
	{ background:#'.$custom_set['color2'].'}'; 	

echo'
	#witgetsearch button.btn:hover
	{border-color: #'.$custom_set['color2'].'!important }'; 	
	
echo 'a:hover,
	.box-vid ul li .list_post_thumb a:hover,
	.list_post_content h2 a:hover,
	ul.list-mini li h3 a:hover,
	.list_post_content p.panel a:hover,
	.list_home_content h2 a:hover,
	div.list-more ul li a:hover,
	.tab_list_content h2 a:hover,
	article.post_list_mini h2 a:hover,
	article.post_list div.entry h2 a:hover,
	.content-vid-v3 h2:hover,
	.content-v1 h2 a:hover,
	.list_mini p a:hover
	{ color:#'.$custom_set['color2'].'}'; 
	
$rgba = hex2rgba($custom_set['color2'],'0.9');		
echo'
	.slider .pager-nav a:hover,
	.slider3 .pager-nav a:hover
		{ background:'.$rgba.'}'; 

}
/* END COLOR 2*/
	
	
	
	
	
	
/* = content
****************************************************/
if(!empty($custom_set['content'])) {
	echo'._content{ background:#'.$custom_set['content'].' }';
}
	

	

/* = layout_style
**********************************************/
if('wide'==$smof_data['layout_style']){
	echo '.boxed ._content{background:transparent!important}';
	echo '.boxed:not(.active){background:transparent!important}';
	echo '.boxed{background:transparent!important}';
}





