<?php 


/******************************************
	MTC Banner Widget
	author : mastrayasa
******************************************/




/* Banner 120 x 240 * 2 */
class mtc_banner_widget_120240 extends WP_Widget {

	function mtc_banner_widget_120240() {

	// define widget title and description
	$widget_ops = array('classname' => 'mtc_banner_120_240','description' => __( 'Widget display 120 x 240 Ads	.','mtcframework'));
	// register the widget
	$this->WP_Widget('mtc_banner_widget_120_240', __('MTC : Ads 120 x 240', 'mtcframework'), $widget_ops);

	}

	// display the widget in the theme
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		

		$title 	= apply_filters('widget_title', $instance['title']);
		$image1 	= strip_tags($instance['image1']);
		$image2 	= strip_tags($instance['image2']);
		
		$link1 		= strip_tags($instance['link1']);
		$link2 		= strip_tags($instance['link2']);
		
		$code1 		= strip_tags($instance['code1']);
		$code2 		= strip_tags($instance['code2']);

		echo $before_widget; 
		if ( $title )
		echo $before_title . $title . $after_title; ?>
		<div class="ads120240">
			<?php if(!empty($image1)) { ?>
			<a href="<?php echo $link1; ?>"><img src="<?php echo $image1; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code1; ?></div>
			<?php } ?>
			
			<?php if(!empty($image2)) { ?>
			<a href="<?php echo $link2; ?>"><img src="<?php echo $image2; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code2; ?></div>
			<?php } ?>
		</div>
		
		<?php

		echo $after_widget;
	}

	// update the widget when new options have been entered
	function update( $new_instance, $old_instance ) {

		$instance 			= $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['image1'] 	= strip_tags($new_instance['image1']);
		$instance['image2'] 	= strip_tags($new_instance['image2']);
		
		$instance['link1'] 		= strip_tags($new_instance['link1']);
		$instance['link2'] 		= strip_tags($new_instance['link2']);
		
		$instance['code1'] 		= strip_tags($new_instance['code1']);
		$instance['code2'] 		= strip_tags($new_instance['code2']);
		return $instance;
	}

	// print the widget option form on the widget management screen
	function form( $instance ) {

	// combine provided fields with defaults
	$instance 	= wp_parse_args( (array) $instance, 
		array( 
			'title' 	=> 'Advertisement', 
			'image1' 	=> get_template_directory_uri().'/img/ads120240.png', 
			'link1'		=> '#',
			'code1'		=> '',

			'image2' 	=> get_template_directory_uri().'/img/ads120240.png',  
			'link2'		=> '#',
			'code2'		=> ''		
		) );
		
		
	$title 		= strip_tags($instance['title']);
	$image1 	= strip_tags($instance['image1']);
	$image2 	= strip_tags($instance['image2']);
	
	$link1 		= strip_tags($instance['link1']);
	$link2 		= strip_tags($instance['link2']);
	
	$code1 		= strip_tags($instance['code1']);
	$code2 		= strip_tags($instance['code2']);
	
	/* print the form fields  */
	?>

	<p><label for="<?php echo $this->get_field_id('title'); ?>">
	<?php _e('Title:', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo
	esc_attr($title); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('image1'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo esc_attr($image1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link1'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo esc_attr($link1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code1'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code1'); ?>" id="<?php echo $this->get_field_id('code1'); ?>" cols="30" rows="10"><?php echo esc_attr($code1); ?></textarea></p>
	
	
	
	
	<p><label for="<?php echo $this->get_field_id('image2'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image2'); ?>" name="<?php echo $this->get_field_name('image2'); ?>" type="text" value="<?php echo esc_attr($image2); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link2'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo esc_attr($link2); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code2'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code2'); ?>" id="<?php echo $this->get_field_id('code2'); ?>" cols="30" rows="10"><?php echo esc_attr($code2); ?></textarea></p>
	
	<?php
	}
}
// register mtc_banner_widget_120240
add_action('widgets_init', create_function('', 'return register_widget("mtc_banner_widget_120240");'));



/* Banner 120 x 140 * 2 */
class mtc_banner_widget_120140 extends WP_Widget {

	function mtc_banner_widget_120140() {

	// define widget title and description
	$widget_ops = array('classname' => 'mtc_banner_120_140','description' => __( 'Widget display 120 x 140 Ads	.','mtcframework'));
	// register the widget
	$this->WP_Widget('mtc_banner_widget_120140', __('MTC : Ads 120 x 140', 'mtcframework'), $widget_ops);

	}

	// display the widget in the theme
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		

		$title 	= apply_filters('widget_title', $instance['title']);
		$image1 	= strip_tags($instance['image1']);
		$image2 	= strip_tags($instance['image2']);
		
		$link1 		= strip_tags($instance['link1']);
		$link2 		= strip_tags($instance['link2']);
		
		$code1 		= strip_tags($instance['code1']);
		$code2 		= strip_tags($instance['code2']);

		echo $before_widget; 
		if ( $title )
		echo $before_title . $title . $after_title; ?>
		<div class="ads120140">
			<?php if(!empty($image1)) { ?>
			<a href="<?php echo $link1; ?>"><img src="<?php echo $image1; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code1; ?></div>
			<?php } ?>
			
			<?php if(!empty($image2)) { ?>
			<a href="<?php echo $link2; ?>"><img src="<?php echo $image2; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code2; ?></div>
			<?php } ?>
		</div>
		
		<?php

		echo $after_widget;
	}

	// update the widget when new options have been entered
	function update( $new_instance, $old_instance ) {

		$instance 			= $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['image1'] 	= strip_tags($new_instance['image1']);
		$instance['image2'] 	= strip_tags($new_instance['image2']);
		
		$instance['link1'] 		= strip_tags($new_instance['link1']);
		$instance['link2'] 		= strip_tags($new_instance['link2']);
		
		$instance['code1'] 		= strip_tags($new_instance['code1']);
		$instance['code2'] 		= strip_tags($new_instance['code2']);
		return $instance;
	}

	// print the widget option form on the widget management screen
	function form( $instance ) {

	// combine provided fields with defaults
	$instance 	= wp_parse_args( (array) $instance, 
		array( 
			'title' 	=> 'Advertisement', 
			'image1' 	=> get_template_directory_uri().'/img/ads120140.png', 
			'link1'		=> '#',
			'code1'		=> '',

			'image2' 	=> get_template_directory_uri().'/img/ads120140.png',  
			'link2'		=> '#',
			'code2'		=> ''		
		) );
		
		
	$title 		= strip_tags($instance['title']);
	$image1 	= strip_tags($instance['image1']);
	$image2 	= strip_tags($instance['image2']);
	
	$link1 		= strip_tags($instance['link1']);
	$link2 		= strip_tags($instance['link2']);
	
	$code1 		= strip_tags($instance['code1']);
	$code2 		= strip_tags($instance['code2']);
	
	/* print the form fields  */
	?>

	<p><label for="<?php echo $this->get_field_id('title'); ?>">
	<?php _e('Title:', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo
	esc_attr($title); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('image1'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo esc_attr($image1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link1'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo esc_attr($link1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code1'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code1'); ?>" id="<?php echo $this->get_field_id('code1'); ?>" cols="30" rows="10"><?php echo esc_attr($code1); ?></textarea></p>
	
	
	
	
	<p><label for="<?php echo $this->get_field_id('image2'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image2'); ?>" name="<?php echo $this->get_field_name('image2'); ?>" type="text" value="<?php echo esc_attr($image2); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link2'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo esc_attr($link2); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code2'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code2'); ?>" id="<?php echo $this->get_field_id('code2'); ?>" cols="30" rows="10"><?php echo esc_attr($code2); ?></textarea></p>
	
	<?php
	}
}
// register mtc_banner_widget_120140
add_action('widgets_init', create_function('', 'return register_widget("mtc_banner_widget_120140");'));






/* Banner 120 x 600 * 2 */
class mtc_banner_widget_120600 extends WP_Widget {

	function mtc_banner_widget_120600() {

	// define widget title and description
	$widget_ops = array('classname' => 'mtc_banner_120_600','description' => __( 'Widget display 120 x 600 Ads	.','mtcframework'));
	// register the widget
	$this->WP_Widget('mtc_banner_widget_120600', __('MTC : Ads 120 x 600', 'mtcframework'), $widget_ops);

	}

	// display the widget in the theme
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		

		$title 	= apply_filters('widget_title', $instance['title']);
		$image1 	= strip_tags($instance['image1']);
		$image2 	= strip_tags($instance['image2']);
		
		$link1 		= strip_tags($instance['link1']);
		$link2 		= strip_tags($instance['link2']);
		
		$code1 		= strip_tags($instance['code1']);
		$code2 		= strip_tags($instance['code2']);

		echo $before_widget; 
		if ( $title )
		echo $before_title . $title . $after_title; ?>
		<div class="ads120600">
			<?php if(!empty($image1)) { ?>
			<a href="<?php echo $link1; ?>"><img src="<?php echo $image1; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code1; ?></div>
			<?php } ?>
			
			<?php if(!empty($image2)) { ?>
			<a href="<?php echo $link2; ?>"><img src="<?php echo $image2; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code2; ?></div>
			<?php } ?>
		</div>
		
		<?php

		echo $after_widget;
	}

	// update the widget when new options have been entered
	function update( $new_instance, $old_instance ) {

		$instance 			= $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['image1'] 	= strip_tags($new_instance['image1']);
		$instance['image2'] 	= strip_tags($new_instance['image2']);
		
		$instance['link1'] 		= strip_tags($new_instance['link1']);
		$instance['link2'] 		= strip_tags($new_instance['link2']);
		
		$instance['code1'] 		= strip_tags($new_instance['code1']);
		$instance['code2'] 		= strip_tags($new_instance['code2']);
		return $instance;
	}

	// print the widget option form on the widget management screen
	function form( $instance ) {

	// combine provided fields with defaults
	$instance 	= wp_parse_args( (array) $instance, 
		array( 
			'title' 	=> 'Advertisement', 
			'image1' 	=> get_template_directory_uri().'/img/ads120600.png', 
			'link1'		=> '#',
			'code1'		=> '',

			'image2' 	=> get_template_directory_uri().'/img/ads120600.png',  
			'link2'		=> '#',
			'code2'		=> ''		
		) );
		
		
	$title 		= strip_tags($instance['title']);
	$image1 	= strip_tags($instance['image1']);
	$image2 	= strip_tags($instance['image2']);
	
	$link1 		= strip_tags($instance['link1']);
	$link2 		= strip_tags($instance['link2']);
	
	$code1 		= strip_tags($instance['code1']);
	$code2 		= strip_tags($instance['code2']);
	
	/* print the form fields  */
	?>

	<p><label for="<?php echo $this->get_field_id('title'); ?>">
	<?php _e('Title:', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo
	esc_attr($title); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('image1'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo esc_attr($image1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link1'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo esc_attr($link1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code1'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code1'); ?>" id="<?php echo $this->get_field_id('code1'); ?>" cols="30" rows="10"><?php echo esc_attr($code1); ?></textarea></p>
	
	
	
	
	<p><label for="<?php echo $this->get_field_id('image2'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image2'); ?>" name="<?php echo $this->get_field_name('image2'); ?>" type="text" value="<?php echo esc_attr($image2); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link2'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo esc_attr($link2); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code2'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code2'); ?>" id="<?php echo $this->get_field_id('code2'); ?>" cols="30" rows="10"><?php echo esc_attr($code2); ?></textarea></p>
	
	<?php
	}
}
// register mtc_banner_widget_120600
add_action('widgets_init', create_function('', 'return register_widget("mtc_banner_widget_120600");'));






/* Banner 120 x 90 * 4 */
class mtc_banner_widget_12090 extends WP_Widget {

	function mtc_banner_widget_12090() {

	// define widget title and description
	$widget_ops = array('classname' => 'mtc_banner_120_90','description' => __( 'Widget display 120 x 90 Ads	.','mtcframework'));
	// register the widget
	$this->WP_Widget('mtc_banner_widget_12090', __('MTC : Ads 120 x 90', 'mtcframework'), $widget_ops);

	}

	// display the widget in the theme
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		

		$title 	= apply_filters('widget_title', $instance['title']);
		$image1 	= strip_tags($instance['image1']);
		$image2 	= strip_tags($instance['image2']);
		$image3 	= strip_tags($instance['image3']);
		$image4 	= strip_tags($instance['image4']);
		
		$link1 		= strip_tags($instance['link1']);
		$link2 		= strip_tags($instance['link2']);
		$link3 		= strip_tags($instance['link3']);
		$link4 		= strip_tags($instance['link4']);
		
		$code1 		= strip_tags($instance['code1']);
		$code2 		= strip_tags($instance['code2']);
		$code3 		= strip_tags($instance['code3']);
		$code4 		= strip_tags($instance['code4']);

		echo $before_widget; 
		if ( $title )
		echo $before_title . $title . $after_title; ?>
		<div class="ads12090">
			<?php if(!empty($image1)) { ?>
			<a href="<?php echo $link1; ?>"><img src="<?php echo $image1; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code1; ?></div>
			<?php } ?>
			
			<?php if(!empty($image2)) { ?>
			<a href="<?php echo $link2; ?>"><img src="<?php echo $image2; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code2; ?></div>
			<?php } ?>
			
			<?php if(!empty($image3)) { ?>
			<a href="<?php echo $link3; ?>"><img src="<?php echo $image3; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code3; ?></div>
			<?php } ?>
			
			<?php if(!empty($image4)) { ?>
			<a href="<?php echo $link4; ?>"><img src="<?php echo $image4; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code4; ?></div>
			<?php } ?>
		</div>
		
		<?php

		echo $after_widget;
	}

	// update the widget when new options have been entered
	function update( $new_instance, $old_instance ) {

		$instance 			= $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['image1'] 	= strip_tags($new_instance['image1']);
		$instance['image2'] 	= strip_tags($new_instance['image2']);
		$instance['image3'] 	= strip_tags($new_instance['image3']);
		$instance['image4'] 	= strip_tags($new_instance['image4']);
		
		$instance['link1'] 		= strip_tags($new_instance['link1']);
		$instance['link2'] 		= strip_tags($new_instance['link2']);
		$instance['link3'] 		= strip_tags($new_instance['link3']);
		$instance['link4'] 		= strip_tags($new_instance['link4']);
		
		$instance['code1'] 		= strip_tags($new_instance['code1']);
		$instance['code2'] 		= strip_tags($new_instance['code2']);
		$instance['code3'] 		= strip_tags($new_instance['code3']);
		$instance['code4'] 		= strip_tags($new_instance['code4']);
		return $instance;
	}

	// print the widget option form on the widget management screen
	function form( $instance ) {

	// combine provided fields with defaults
	$instance 	= wp_parse_args( (array) $instance, 
		array( 
			'title' 	=> 'Advertisement', 
			'image1' 	=> get_template_directory_uri().'/img/ads12090.png', 
			'link1'		=> '#',
			'code1'		=> '',

			'image2' 	=> get_template_directory_uri().'/img/ads12090.png',  
			'link2'		=> '#',
			'code2'		=> '',

			'image3' 	=> get_template_directory_uri().'/img/ads12090.png', 
			'link3'		=> '#',
			'code3'		=> '',

			'image4' 	=> get_template_directory_uri().'/img/ads12090.png',  
			'link4'		=> '#',
			'code4'		=> ''			
		) );
		
		
	$title 		= strip_tags($instance['title']);
	$image1 	= strip_tags($instance['image1']);
	$image2 	= strip_tags($instance['image2']);
	$image3 	= strip_tags($instance['image3']);
	$image4 	= strip_tags($instance['image4']);
	
	$link1 		= strip_tags($instance['link1']);
	$link2 		= strip_tags($instance['link2']);
	$link3 		= strip_tags($instance['link3']);
	$link4 		= strip_tags($instance['link4']);
	
	$code1 		= strip_tags($instance['code1']);
	$code2 		= strip_tags($instance['code2']);
	$code3 		= strip_tags($instance['code3']);
	$code4 		= strip_tags($instance['code4']);
	
	/* print the form fields  */
	?>

	<p><label for="<?php echo $this->get_field_id('title'); ?>">
	<?php _e('Title:', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo
	esc_attr($title); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('image1'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo esc_attr($image1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link1'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo esc_attr($link1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code1'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code1'); ?>" id="<?php echo $this->get_field_id('code1'); ?>" cols="30" rows="10"><?php echo esc_attr($code1); ?></textarea></p>
	
	
	
	
	<p><label for="<?php echo $this->get_field_id('image2'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image2'); ?>" name="<?php echo $this->get_field_name('image2'); ?>" type="text" value="<?php echo esc_attr($image2); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link2'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo esc_attr($link2); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code2'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code2'); ?>" id="<?php echo $this->get_field_id('code2'); ?>" cols="30" rows="10"><?php echo esc_attr($code2); ?></textarea></p>
	
	
	
	
	<p><label for="<?php echo $this->get_field_id('image3'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image3'); ?>" name="<?php echo $this->get_field_name('image3'); ?>" type="text" value="<?php echo esc_attr($image3); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link3'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link3'); ?>" name="<?php echo $this->get_field_name('link3'); ?>" type="text" value="<?php echo esc_attr($link3); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code3'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code3'); ?>" id="<?php echo $this->get_field_id('code3'); ?>" cols="30" rows="10"><?php echo esc_attr($code3); ?></textarea></p>
	
	
	
	<p><label for="<?php echo $this->get_field_id('image4'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image4'); ?>" name="<?php echo $this->get_field_name('image4'); ?>" type="text" value="<?php echo esc_attr($image4); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link4'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link4'); ?>" name="<?php echo $this->get_field_name('link4'); ?>" type="text" value="<?php echo esc_attr($link4); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code4'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code4'); ?>" id="<?php echo $this->get_field_id('code4'); ?>" cols="30" rows="10"><?php echo esc_attr($code4); ?></textarea></p>

	<?php
	}
}
// register mtc_banner_widget_12090
add_action('widgets_init', create_function('', 'return register_widget("mtc_banner_widget_12090");'));







/* Banner 125 x 125 * 4 */
class mtc_banner_widget125 extends WP_Widget {

	function mtc_banner_widget125() {

	// define widget title and description
	$widget_ops = array('classname' => 'mtc_banner125','description' => __( 'Widget display 125 x 125 Ads	.','mtcframework'));
	// register the widget
	$this->WP_Widget('mtc_banner_widget125', __('MTC : Ads 125 x 125', 'mtcframework'), $widget_ops);

	}

	// display the widget in the theme
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		

		$title 	= apply_filters('widget_title', $instance['title']);
		$image1 	= strip_tags($instance['image1']);
		$image2 	= strip_tags($instance['image2']);
		$image3 	= strip_tags($instance['image3']);
		$image4 	= strip_tags($instance['image4']);
		
		$link1 		= strip_tags($instance['link1']);
		$link2 		= strip_tags($instance['link2']);
		$link3 		= strip_tags($instance['link3']);
		$link4 		= strip_tags($instance['link4']);
		
		$code1 		= strip_tags($instance['code1']);
		$code2 		= strip_tags($instance['code2']);
		$code3 		= strip_tags($instance['code3']);
		$code4 		= strip_tags($instance['code4']);

		echo $before_widget; 
		if ( $title )
		echo $before_title . $title . $after_title; ?>
		<div class="ads125">
			<?php if(!empty($image1)) { ?>
			<a href="<?php echo $link1; ?>"><img src="<?php echo $image1; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code1; ?></div>
			<?php } ?>
			
			<?php if(!empty($image2)) { ?>
			<a href="<?php echo $link2; ?>"><img src="<?php echo $image2; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code2; ?></div>
			<?php } ?>
			
			<?php if(!empty($image3)) { ?>
			<a href="<?php echo $link3; ?>"><img src="<?php echo $image3; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code3; ?></div>
			<?php } ?>
			
			<?php if(!empty($image4)) { ?>
			<a href="<?php echo $link4; ?>"><img src="<?php echo $image4; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code4; ?></div>
			<?php } ?>
		</div>
		
		<?php

		echo $after_widget;
	}

	// update the widget when new options have been entered
	function update( $new_instance, $old_instance ) {

		$instance 			= $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['image1'] 	= strip_tags($new_instance['image1']);
		$instance['image2'] 	= strip_tags($new_instance['image2']);
		$instance['image3'] 	= strip_tags($new_instance['image3']);
		$instance['image4'] 	= strip_tags($new_instance['image4']);
		
		$instance['link1'] 		= strip_tags($new_instance['link1']);
		$instance['link2'] 		= strip_tags($new_instance['link2']);
		$instance['link3'] 		= strip_tags($new_instance['link3']);
		$instance['link4'] 		= strip_tags($new_instance['link4']);
		
		$instance['code1'] 		= strip_tags($new_instance['code1']);
		$instance['code2'] 		= strip_tags($new_instance['code2']);
		$instance['code3'] 		= strip_tags($new_instance['code3']);
		$instance['code4'] 		= strip_tags($new_instance['code4']);
		return $instance;
	}

	// print the widget option form on the widget management screen
	function form( $instance ) {

	// combine provided fields with defaults
	$instance 	= wp_parse_args( (array) $instance, 
		array( 
			'title' 	=> 'Advertisement', 
			'image1' 	=> get_template_directory_uri().'/img/ads125.png', 
			'link1'		=> '#',
			'code1'		=> '',

			'image2' 	=> get_template_directory_uri().'/img/ads125.png',  
			'link2'		=> '#',
			'code2'		=> '',

			'image3' 	=> get_template_directory_uri().'/img/ads125.png', 
			'link3'		=> '#',
			'code3'		=> '',

			'image4' 	=> get_template_directory_uri().'/img/ads125.png',  
			'link4'		=> '#',
			'code4'		=> ''			
		) );
		
		
	$title 		= strip_tags($instance['title']);
	$image1 	= strip_tags($instance['image1']);
	$image2 	= strip_tags($instance['image2']);
	$image3 	= strip_tags($instance['image3']);
	$image4 	= strip_tags($instance['image4']);
	
	$link1 		= strip_tags($instance['link1']);
	$link2 		= strip_tags($instance['link2']);
	$link3 		= strip_tags($instance['link3']);
	$link4 		= strip_tags($instance['link4']);
	
	$code1 		= strip_tags($instance['code1']);
	$code2 		= strip_tags($instance['code2']);
	$code3 		= strip_tags($instance['code3']);
	$code4 		= strip_tags($instance['code4']);
	
	/* print the form fields  */
	?>

	<p><label for="<?php echo $this->get_field_id('title'); ?>">
	<?php _e('Title:', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo
	esc_attr($title); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('image1'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo esc_attr($image1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link1'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo esc_attr($link1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code1'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code1'); ?>" id="<?php echo $this->get_field_id('code1'); ?>" cols="30" rows="10"><?php echo esc_attr($code1); ?></textarea></p>
	
	
	
	
	<p><label for="<?php echo $this->get_field_id('image2'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image2'); ?>" name="<?php echo $this->get_field_name('image2'); ?>" type="text" value="<?php echo esc_attr($image2); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link2'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo esc_attr($link2); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code2'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code2'); ?>" id="<?php echo $this->get_field_id('code2'); ?>" cols="30" rows="10"><?php echo esc_attr($code2); ?></textarea></p>
	
	
	
	
	<p><label for="<?php echo $this->get_field_id('image3'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image3'); ?>" name="<?php echo $this->get_field_name('image3'); ?>" type="text" value="<?php echo esc_attr($image3); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link3'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link3'); ?>" name="<?php echo $this->get_field_name('link3'); ?>" type="text" value="<?php echo esc_attr($link3); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code3'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code3'); ?>" id="<?php echo $this->get_field_id('code3'); ?>" cols="30" rows="10"><?php echo esc_attr($code3); ?></textarea></p>
	
	
	
	<p><label for="<?php echo $this->get_field_id('image4'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image4'); ?>" name="<?php echo $this->get_field_name('image4'); ?>" type="text" value="<?php echo esc_attr($image4); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link4'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link4'); ?>" name="<?php echo $this->get_field_name('link4'); ?>" type="text" value="<?php echo esc_attr($link4); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code4'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code4'); ?>" id="<?php echo $this->get_field_id('code4'); ?>" cols="30" rows="10"><?php echo esc_attr($code4); ?></textarea></p>

	<?php
	}
}
// register mtc_banner_widget125
add_action('widgets_init', create_function('', 'return register_widget("mtc_banner_widget125");'));








/* Banner 160 x 600 * 1 */
class mtc_banner_widget_160600 extends WP_Widget {

	function mtc_banner_widget_160600() {

	// define widget title and description
	$widget_ops = array('classname' => 'mtc_banner_160_600','description' => __( 'Widget display 160 x 600 Ads	.','mtcframework'));
	// register the widget
	$this->WP_Widget('mtc_banner_widget_160600', __('MTC : Ads 160 x 600', 'mtcframework'), $widget_ops);

	}

	// display the widget in the theme
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		

		$title 	= apply_filters('widget_title', $instance['title']);
		$image1 	= strip_tags($instance['image1']);
		$link1 		= strip_tags($instance['link1']);
		$code1 		= strip_tags($instance['code1']);
		
		echo $before_widget; 
		if ( $title )
		echo $before_title . $title . $after_title; ?>
		<div class="ads160600">
			<?php if(!empty($image1)) { ?>
			<a href="<?php echo $link1; ?>"><img src="<?php echo $image1; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code1; ?></div>
			<?php } ?>
		</div>
		<?php

		echo $after_widget;
	}

	// update the widget when new options have been entered
	function update( $new_instance, $old_instance ) {

		$instance 			= $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['image1'] 	= strip_tags($new_instance['image1']);
		$instance['link1'] 		= strip_tags($new_instance['link1']);
		$instance['code1'] 		= strip_tags($new_instance['code1']);
		return $instance;
	}

	// print the widget option form on the widget management screen
	function form( $instance ) {

	// combine provided fields with defaults
	$instance 	= wp_parse_args( (array) $instance, 
		array( 
			'title' 	=> 'Advertisement', 
			'image1' 	=> get_template_directory_uri().'/img/ads160600.png', 
			'link1'		=> '#',
			'code1'		=> ''			
		) );
		
		
	$title 		= strip_tags($instance['title']);
	$image1 	= strip_tags($instance['image1']);
	
	$link1 		= strip_tags($instance['link1']);

	
	$code1 		= strip_tags($instance['code1']);

	
	/* print the form fields  */
	?>

	<p><label for="<?php echo $this->get_field_id('title'); ?>">
	<?php _e('Title:', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo
	esc_attr($title); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('image1'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo esc_attr($image1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link1'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo esc_attr($link1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code1'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code1'); ?>" id="<?php echo $this->get_field_id('code1'); ?>" cols="30" rows="10"><?php echo esc_attr($code1); ?></textarea></p>
	<?php
	}
}
// register mtc_banner_widget_160600
add_action('widgets_init', create_function('', 'return register_widget("mtc_banner_widget_160600");'));








/* Banner 250 x 250 * 1 */
class mtc_banner_widget250 extends WP_Widget {

	function mtc_banner_widget250() {

	// define widget title and description
	$widget_ops = array('classname' => 'mtc_banner250','description' => __( 'Widget display 250 x 250 Ads	.','mtcframework'));
	// register the widget
	$this->WP_Widget('mtc_banner_widget250', __('MTC : Ads 250 x 250', 'mtcframework'), $widget_ops);

	}

	// display the widget in the theme
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		

		$title 	= apply_filters('widget_title', $instance['title']);
		$image1 	= strip_tags($instance['image1']);
		$link1 		= strip_tags($instance['link1']);
		$code1 		= strip_tags($instance['code1']);
		
		echo $before_widget; 
		if ( $title )
		echo $before_title . $title . $after_title; ?>
		<div class="ads250">
			<?php if(!empty($image1)) { ?>
			<a href="<?php echo $link1; ?>"><img src="<?php echo $image1; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code1; ?></div>
			<?php } ?>
		</div>
		<?php

		echo $after_widget;
	}

	// update the widget when new options have been entered
	function update( $new_instance, $old_instance ) {

		$instance 			= $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['image1'] 	= strip_tags($new_instance['image1']);
		$instance['link1'] 		= strip_tags($new_instance['link1']);
		$instance['code1'] 		= strip_tags($new_instance['code1']);
		return $instance;
	}

	// print the widget option form on the widget management screen
	function form( $instance ) {

	// combine provided fields with defaults
	$instance 	= wp_parse_args( (array) $instance, 
		array( 
			'title' 	=> 'Advertisement', 
			'image1' 	=> get_template_directory_uri().'/img/ads250.png', 
			'link1'		=> '#',
			'code1'		=> ''			
		) );
		
		
	$title 		= strip_tags($instance['title']);
	$image1 	= strip_tags($instance['image1']);
	
	$link1 		= strip_tags($instance['link1']);

	
	$code1 		= strip_tags($instance['code1']);

	
	/* print the form fields  */
	?>

	<p><label for="<?php echo $this->get_field_id('title'); ?>">
	<?php _e('Title:', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo
	esc_attr($title); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('image1'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo esc_attr($image1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link1'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo esc_attr($link1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code1'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code1'); ?>" id="<?php echo $this->get_field_id('code1'); ?>" cols="30" rows="10"><?php echo esc_attr($code1); ?></textarea></p>
	<?php
	}
}
// register mtc_banner_widget250
add_action('widgets_init', create_function('', 'return register_widget("mtc_banner_widget250");'));








/* Banner 300 x 250 * 1 */
class mtc_banner_widget_300250 extends WP_Widget {

	function mtc_banner_widget_300250() {

	// define widget title and description
	$widget_ops = array('classname' => 'mtc_banner300250','description' => __( 'Widget display 300 x 250 Ads	.','mtcframework'));
	// register the widget
	$this->WP_Widget('mtc_banner_widget_300250', __('MTC : Ads 300 x 250', 'mtcframework'), $widget_ops);

	}

	// display the widget in the theme
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		

		$title 	= apply_filters('widget_title', $instance['title']);
		$image1 	= strip_tags($instance['image1']);
		$link1 		= strip_tags($instance['link1']);
		$code1 		= strip_tags($instance['code1']);
		
		echo $before_widget; 
		if ( $title )
		echo $before_title . $title . $after_title; ?>
		<div class="ads300250">
			<?php if(!empty($image1)) { ?>
			<a href="<?php echo $link1; ?>"><img src="<?php echo $image1; ?>" alt="banner" /></a>
			<?php } else { ?>
				<div class="ads_code"><?php echo $code1; ?></div>
			<?php } ?>
		</div>
		<?php

		echo $after_widget;
	}

	// update the widget when new options have been entered
	function update( $new_instance, $old_instance ) {

		$instance 			= $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['image1'] 	= strip_tags($new_instance['image1']);
		$instance['link1'] 		= strip_tags($new_instance['link1']);
		$instance['code1'] 		= strip_tags($new_instance['code1']);
		return $instance;
	}

	// print the widget option form on the widget management screen
	function form( $instance ) {

	// combine provided fields with defaults
	$instance 	= wp_parse_args( (array) $instance, 
		array( 
			'title' 	=> 'Advertisement', 
			'image1' 	=> get_template_directory_uri().'/img/ads300250.png', 
			'link1'		=> '#',
			'code1'		=> ''			
		) );
		
		
	$title 		= strip_tags($instance['title']);
	$image1 	= strip_tags($instance['image1']);
	
	$link1 		= strip_tags($instance['link1']);

	
	$code1 		= strip_tags($instance['code1']);

	
	/* print the form fields  */
	?>

	<p><label for="<?php echo $this->get_field_id('title'); ?>">
	<?php _e('Title:', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo
	esc_attr($title); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('image1'); ?>">
	<?php _e('Image ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo esc_attr($image1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('link1'); ?>">
	<?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo esc_attr($link1); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('code1'); ?>">
	<?php _e('Code Ads :', 'mtcframework'); ?></label>
	<textarea class="widefat"  name="<?php echo $this->get_field_name('code1'); ?>" id="<?php echo $this->get_field_id('code1'); ?>" cols="30" rows="10"><?php echo esc_attr($code1); ?></textarea></p>
	<?php
	}
}
// register mtc_banner_widget_300250
add_action('widgets_init', create_function('', 'return register_widget("mtc_banner_widget_300250");'));


