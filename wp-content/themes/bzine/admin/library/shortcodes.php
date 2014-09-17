<?php

/* Custom Shortcodes */


// Buttons
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'default', /* primary, default, info, success, danger, warning, inverse */
	'size' => 'default', /* mini, small, default, large */
	'url'  => '',
	'text' => '', 
	), $atts ) );
	
	if($type == "default"){
		$type = "";
	}
	else{ 
		$type = "btn-" . $type;
	}
	
	if($size == "default"){
		$size = "";
	}
	else{
		$size = "btn-" . $size;
	}
	
	$output = '<a href="' . $url . '" class="btn '. $type . ' ' . $size . '">';
	$output .= $text;
	$output .= '</a>';
	
	return $output;
}
add_shortcode('button', 'buttons'); 




// Alerts
function alerts( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'alert-info', /* alert-info, alert-success, alert-error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	
	$output = '<div class="fade in alert alert-'. $type . '">';
	if($close == 'true') {
		$output .= '<a class="close" data-dismiss="alert">&times;</a>';
	}
	$output .= $text . '</div>';
	
	return $output;
}
add_shortcode('alert', 'alerts');





// Block Messages
function block_messages( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'alert-info', /* alert-info, alert-success, alert-error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	
	$output = '<div class="fade in alert alert-block alert-'. $type . '">';
	if($close == 'true') {
		$output .= '<a class="close" data-dismiss="alert">&times;</a>';
	}
	$output .= '<p>' . $text . '</p></div>';
	
	return $output;
}
add_shortcode('block-message', 'block_messages'); 






// Block Messages
function blockquotes( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'float' => '', /* left, right */
	'cite' => '', /* text for cite */
	), $atts ) );
	
	$output = '<blockquote';
	if($float == 'left') {
		$output .= ' class="pull-left"';
	}
	elseif($float == 'right'){
		$output .= ' class="pull-right"';
	}
	$output .= '><p>' . $content . '</p>';
	
	if($cite){
		$output .= '<small>' . $cite . '</small>';
	}
	
	$output .= '</blockquote>';
	
	return $output;
}
add_shortcode('blockquote', 'blockquotes'); 
 

 
 
 
 
 
 
 
 
function headermenus( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => '', 
		), $atts ) );
	$output ='<h3>'. $title .'</h3>';
	$output .='<ul class="menulist unstyled">' . trim( do_shortcode( shortcode_unautop( $content ) ) ) . '</ul>';
	return $output;
}
add_shortcode('headermenu', 'headermenus'); 






function accordion_shortcode_mtc($atts, $content = null){
	extract( shortcode_atts( array(
		'id' => '',
	), $atts ) );
	return '<div class="accordion" id="accordion'.$id.'">'. do_shortcode($content) .'</div>';
}
add_shortcode('accordion', 'accordion_shortcode_mtc');






function subaccordion_shortcode_mtc($atts, $content=null){
	extract(shortcode_atts(array(
			'header'=>'',
			'state'	=>'',
			'id' 	=> '',
		), $atts ));
		
		
		STATIC $i = 0;
		$i++;
		if ($state == 'open'){
			$state = 'in';
		} else {
			$state = '';
		}
	return '<div class="accordion-group"><div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$id.'" href="#collapse'.$i.'">'
						.$header.'</a></div>
					<div id="collapse'.$i.'" class="accordion-body collapse '.$state.'">
						<div class="accordion-inner">
						<p>'.$content.'</p></div></div></div>';

}
add_shortcode('subaccordion','subaccordion_shortcode_mtc');


