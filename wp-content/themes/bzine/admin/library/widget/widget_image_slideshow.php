<?php
/* Widget Images Slide Show */
class mtc_widget_image_slideshow extends WP_Widget {

	function mtc_widget_image_slideshow() {

	// define widget title and description
	$widget_ops = array('classname' => 'mtc_image_slideshow','description' => __( 'Widget display image slideshow','mtcframework'));
	// register the widget
	$this->WP_Widget('mtc_image_slideshow', __('MTC : Image SlideShow', 'mtcframework'), $widget_ops);
	add_action('admin_head', array( $this, 'mtc_add_ok' ) );
	}

	// display the widget in the theme
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		
		$slider_id = $this->id . '-slider';

		$title 	= apply_filters('widget_title', $instance['title']);
		$indikator = $item = '';
		$no = 0;
		for($i=1; $i <=10; $i++){ 
			$url 	= strip_tags($instance['url'.$i]);
			$alt 	= strip_tags($instance['alt'.$i]);
			$link 	= strip_tags($instance['link'.$i]); 
			
			if(!empty($url)){
				$class_indikator 	= ( 0==$no) ? ' class="active"' : '';
				$class_item 		= ( 0==$no) ? 'active item' : 'item';
			
				$indikator 	.= '<li data-target="#'.$slider_id.'" data-slide-to="'.$no.'" '.$class_indikator.'></li>';
				$item 		.= '<div class="'.$class_item.'"><img src="'.$url.'" alt="'.$alt.'"></div>';
				$no++;
			}
		}

		echo $before_widget; 
		if ( $title )
		echo $before_title . $title . $after_title; ?>
		
		<div id="<?php echo $slider_id; ?>" class="carousel slide">
			 <ol class="carousel-indicators"><?php echo $indikator ; ?></ol>
			<div class="carousel-inner">
				<?php echo $item  ; ?>
			</div>
			<a class="carousel-control left" href="#<?php echo $slider_id; ?>" data-slide="prev">&lsaquo;</a>
			<a class="carousel-control right" href="#<?php echo $slider_id; ?>" data-slide="next">&rsaquo;</a>
		</div>
	
		
		<?php

		echo $after_widget;
	}

	// update the widget when new options have been entered
	function update( $new_instance, $old_instance ) {

		$instance 			= $old_instance;
		$instance['title'] 	= strip_tags($new_instance['title']);
		
		$instance['url1'] 	= strip_tags($new_instance['url1']);
		$instance['alt1'] 	= strip_tags($new_instance['alt1']);
		$instance['link1'] 	= strip_tags($new_instance['link1']);

		$instance['url2'] 	= strip_tags($new_instance['url2']);
		$instance['alt2'] 	= strip_tags($new_instance['alt2']);
		$instance['link2'] 	= strip_tags($new_instance['link2']);

		$instance['url3'] 	= strip_tags($new_instance['url3']);
		$instance['alt3'] 	= strip_tags($new_instance['alt3']);
		$instance['link3'] 	= strip_tags($new_instance['link3']);

		$instance['url4'] 	= strip_tags($new_instance['url4']);
		$instance['alt4'] 	= strip_tags($new_instance['alt4']);
		$instance['link4'] 	= strip_tags($new_instance['link4']);

		$instance['url5'] 	= strip_tags($new_instance['url5']);
		$instance['alt5'] 	= strip_tags($new_instance['alt5']);
		$instance['link5'] 	= strip_tags($new_instance['link5']);

		$instance['url6'] 	= strip_tags($new_instance['url6']);
		$instance['alt6'] 	= strip_tags($new_instance['alt6']);
		$instance['link6'] 	= strip_tags($new_instance['link6']);

		$instance['url7'] 	= strip_tags($new_instance['url7']);
		$instance['alt7'] 	= strip_tags($new_instance['alt7']);
		$instance['link7'] 	= strip_tags($new_instance['link7']);

		$instance['url8'] 	= strip_tags($new_instance['url8']);
		$instance['alt8'] 	= strip_tags($new_instance['alt8']);
		$instance['link8'] 	= strip_tags($new_instance['link8']);

		$instance['url9'] 	= strip_tags($new_instance['url9']);
		$instance['alt9'] 	= strip_tags($new_instance['alt9']);
		$instance['link9'] 	= strip_tags($new_instance['link9']);

		$instance['url10'] 	= strip_tags($new_instance['url10']);
		$instance['alt10'] 	= strip_tags($new_instance['alt10']);
		$instance['link10'] = strip_tags($new_instance['link10']);
		
		return $instance;
	}
	
	function mtc_add_ok(){ ?>
		<script type="text/javascript">
			jQuery(function(){
				jQuery('.btn-mtc-imgslideshow').on('click', function () {
					jQuery(this).next('p').toggle();
				});
		   });
		</script><?php 	
	
	
	}
	
	
	// print the widget option form on the widget management screen
	function form( $instance ) {
	
	
	// combine provided fields with defaults
	$instance 	= wp_parse_args( (array) $instance, 
		array( 
			'title' 	=> 'Image Slideshow', 
			'url1' 		=> '', 
			'alt1'		=> '',
			'link1'		=> '',

			'url2' 		=> '', 
			'alt2'		=> '',
			'link2'		=> '',

			'url3' 		=> '', 
			'alt3'		=> '',
			'link3'		=> '',

			'url4' 		=> '', 
			'alt4'		=> '',
			'link4'		=> '',

			'url5' 		=> '', 
			'alt5'		=> '',
			'link5'		=> '',

			'url6' 		=> '', 
			'alt6'		=> '',
			'link6'		=> '',

			'url7' 		=> '', 
			'alt7'		=> '',
			'link7'		=> '',

			'url8' 		=> '', 
			'alt8'		=> '',
			'link8'		=> '',

			'url9' 		=> '', 
			'alt9'		=> '',
			'link9'		=> '',

			'url10' 	=> '', 
			'alt10'		=> '',
			'link10'	=> ''	
	) );
		
		
	$title 	= strip_tags($instance['title']);
	
	
	
	$url1 	= strip_tags($instance['url1']);
	$alt1 	= strip_tags($instance['alt1']);
	$link1 	= strip_tags($instance['link1']);

	$url2 	= strip_tags($instance['url2']);
	$alt2 	= strip_tags($instance['alt2']);
	$link2 	= strip_tags($instance['link2']);

	$url3 	= strip_tags($instance['url3']);
	$alt3 	= strip_tags($instance['alt3']);
	$link3 	= strip_tags($instance['link3']);

	$url4 	= strip_tags($instance['url4']);
	$alt4 	= strip_tags($instance['alt4']);
	$link4 	= strip_tags($instance['link4']);

	$url5 	= strip_tags($instance['url5']);
	$alt5 	= strip_tags($instance['alt5']);
	$link5 	= strip_tags($instance['link5']);

	$url6 	= strip_tags($instance['url6']);
	$alt6 	= strip_tags($instance['alt6']);
	$link6 	= strip_tags($instance['link6']);

	$url7 	= strip_tags($instance['url7']);
	$alt7 	= strip_tags($instance['alt7']);
	$link7 	= strip_tags($instance['link7']);

	$url8 	= strip_tags($instance['url8']);
	$alt8 	= strip_tags($instance['alt8']);
	$link8 	= strip_tags($instance['link8']);

	$url9 	= strip_tags($instance['url9']);
	$alt9 	= strip_tags($instance['alt9']);
	$link9 	= strip_tags($instance['link9']);

	$url10 	= strip_tags($instance['url10']);
	$alt10 	= strip_tags($instance['alt10']);
	$link10 = strip_tags($instance['link10']);

	
	
	/* print the form fields  */
	?>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'mtcframework'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</p>
	<style>.wp-core-ui .button.btn-mtc-imgslideshow{ margin-top:10px;}</style>

	
<button class="btn-mtc-imgslideshow widefat button" type="button">Image 1</button>
<p style="background:#fafafa;padding:10px;border:1px solid #eee;margin:0; ">
	<label for="<?php echo $this->get_field_id('url1'); ?>"><?php _e('Image URl ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('url1'); ?>" name="<?php echo $this->get_field_name('url1'); ?>" type="text" value="<?php echo esc_attr($url1); ?>" />
	
	<label for="<?php echo $this->get_field_id('alt1'); ?>"><?php _e('Alt :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('alt1'); ?>" name="<?php echo $this->get_field_name('alt1'); ?>" type="text" value="<?php echo esc_attr($alt1); ?>" />
	
	<label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo esc_attr($link1); ?>" />
</p>


<button class="btn-mtc-imgslideshow widefat button" type="button">Image 2</button>
<p style="background:#fafafa;padding:10px;border:1px solid #eee;margin:0; ">
	<label for="<?php echo $this->get_field_id('url2'); ?>"><?php _e('Image URl ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('url2'); ?>" name="<?php echo $this->get_field_name('url2'); ?>" type="text" value="<?php echo esc_attr($url2); ?>" />
	
	<label for="<?php echo $this->get_field_id('alt2'); ?>"><?php _e('Alt :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('alt1'); ?>" name="<?php echo $this->get_field_name('alt2'); ?>" type="text" value="<?php echo esc_attr($alt2); ?>" />
	
	<label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo esc_attr($link2); ?>" />
</p>


<button class="btn-mtc-imgslideshow widefat button" type="button">Image 3</button>
<p style="background:#fafafa;padding:10px;border:1px solid #eee;margin:0; ">
	<label for="<?php echo $this->get_field_id('url3'); ?>"><?php _e('Image URl ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('url3'); ?>" name="<?php echo $this->get_field_name('url3'); ?>" type="text" value="<?php echo esc_attr($url3); ?>" />
	
	<label for="<?php echo $this->get_field_id('alt3'); ?>"><?php _e('Alt :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('alt1'); ?>" name="<?php echo $this->get_field_name('alt3'); ?>" type="text" value="<?php echo esc_attr($alt3); ?>" />
	
	<label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link3'); ?>" name="<?php echo $this->get_field_name('link3'); ?>" type="text" value="<?php echo esc_attr($link3); ?>" />
</p>


<button class="btn-mtc-imgslideshow widefat button" type="button">Image 4</button>
<p style="background:#fafafa;padding:10px;border:1px solid #eee;margin:0; ">
	<label for="<?php echo $this->get_field_id('url4'); ?>"><?php _e('Image URl ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('url4'); ?>" name="<?php echo $this->get_field_name('url4'); ?>" type="text" value="<?php echo esc_attr($url4); ?>" />
	
	<label for="<?php echo $this->get_field_id('alt4'); ?>"><?php _e('Alt :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('alt1'); ?>" name="<?php echo $this->get_field_name('alt4'); ?>" type="text" value="<?php echo esc_attr($alt4); ?>" />
	
	<label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link4'); ?>" name="<?php echo $this->get_field_name('link4'); ?>" type="text" value="<?php echo esc_attr($link4); ?>" />
</p>


<button class="btn-mtc-imgslideshow widefat button" type="button">Image 5</button>
<p style="background:#fafafa;padding:10px;border:1px solid #eee;margin:0; ">
	<label for="<?php echo $this->get_field_id('url5'); ?>"><?php _e('Image URl ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('url5'); ?>" name="<?php echo $this->get_field_name('url5'); ?>" type="text" value="<?php echo esc_attr($url5); ?>" />
	
	<label for="<?php echo $this->get_field_id('alt5'); ?>"><?php _e('Alt :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('alt1'); ?>" name="<?php echo $this->get_field_name('alt5'); ?>" type="text" value="<?php echo esc_attr($alt5); ?>" />
	
	<label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link5'); ?>" name="<?php echo $this->get_field_name('link5'); ?>" type="text" value="<?php echo esc_attr($link5); ?>" />
</p>


<button class="btn-mtc-imgslideshow widefat button" type="button">Image 6</button>
<p style="background:#fafafa;padding:10px;border:1px solid #eee;margin:0; ">
	<label for="<?php echo $this->get_field_id('url6'); ?>"><?php _e('Image URl ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('url6'); ?>" name="<?php echo $this->get_field_name('url6'); ?>" type="text" value="<?php echo esc_attr($url6); ?>" />
	
	<label for="<?php echo $this->get_field_id('alt6'); ?>"><?php _e('Alt :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('alt1'); ?>" name="<?php echo $this->get_field_name('alt6'); ?>" type="text" value="<?php echo esc_attr($alt6); ?>" />
	
	<label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link6'); ?>" name="<?php echo $this->get_field_name('link6'); ?>" type="text" value="<?php echo esc_attr($link6); ?>" />
</p>


<button class="btn-mtc-imgslideshow widefat button" type="button">Image 7</button>
<p style="background:#fafafa;padding:10px;border:1px solid #eee;margin:0; ">
	<label for="<?php echo $this->get_field_id('url7'); ?>"><?php _e('Image URl ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('url7'); ?>" name="<?php echo $this->get_field_name('url7'); ?>" type="text" value="<?php echo esc_attr($url7); ?>" />
	
	<label for="<?php echo $this->get_field_id('alt7'); ?>"><?php _e('Alt :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('alt1'); ?>" name="<?php echo $this->get_field_name('alt7'); ?>" type="text" value="<?php echo esc_attr($alt7); ?>" />
	
	<label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link7'); ?>" name="<?php echo $this->get_field_name('link7'); ?>" type="text" value="<?php echo esc_attr($link7); ?>" />
</p>


<button class="btn-mtc-imgslideshow widefat button" type="button">Image 8</button>
<p style="background:#fafafa;padding:10px;border:1px solid #eee;margin:0; ">
	<label for="<?php echo $this->get_field_id('url8'); ?>"><?php _e('Image URl ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('url8'); ?>" name="<?php echo $this->get_field_name('url8'); ?>" type="text" value="<?php echo esc_attr($url8); ?>" />
	
	<label for="<?php echo $this->get_field_id('alt8'); ?>"><?php _e('Alt :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('alt1'); ?>" name="<?php echo $this->get_field_name('alt8'); ?>" type="text" value="<?php echo esc_attr($alt8); ?>" />
	
	<label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link8'); ?>" name="<?php echo $this->get_field_name('link8'); ?>" type="text" value="<?php echo esc_attr($link8); ?>" />
</p>


<button class="btn-mtc-imgslideshow widefat button" type="button">Image 9</button>
<p style="background:#fafafa;padding:10px;border:1px solid #eee;margin:0; ">
	<label for="<?php echo $this->get_field_id('url9'); ?>"><?php _e('Image URl ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('url9'); ?>" name="<?php echo $this->get_field_name('url9'); ?>" type="text" value="<?php echo esc_attr($url9); ?>" />
	
	<label for="<?php echo $this->get_field_id('alt9'); ?>"><?php _e('Alt :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('alt1'); ?>" name="<?php echo $this->get_field_name('alt9'); ?>" type="text" value="<?php echo esc_attr($alt9); ?>" />
	
	<label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link9'); ?>" name="<?php echo $this->get_field_name('link9'); ?>" type="text" value="<?php echo esc_attr($link9); ?>" />
</p>


<button class="btn-mtc-imgslideshow widefat button" type="button">Image 10</button>
<p style="background:#fafafa;padding:10px;border:1px solid #eee;margin:0; ">
	<label for="<?php echo $this->get_field_id('url10'); ?>"><?php _e('Image URl ', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('url10'); ?>" name="<?php echo $this->get_field_name('url10'); ?>" type="text" value="<?php echo esc_attr($url10); ?>" />
	
	<label for="<?php echo $this->get_field_id('alt10'); ?>"><?php _e('Alt :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('alt1'); ?>" name="<?php echo $this->get_field_name('alt10'); ?>" type="text" value="<?php echo esc_attr($alt10); ?>" />
	
	<label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link :', 'mtcframework'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('link10'); ?>" name="<?php echo $this->get_field_name('link10'); ?>" type="text" value="<?php echo esc_attr($link10); ?>" />
</p>






	<p>&nbsp;</p>
	<?php
	}
}
// register mtc_widget_image_slideshow
add_action('widgets_init', create_function('', 'return register_widget("mtc_widget_image_slideshow");'));
