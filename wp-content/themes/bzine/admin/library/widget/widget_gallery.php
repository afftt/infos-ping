<?php 
/**
 * Adds Gallery_Widget widget.
 */
class Gallery_Widget extends WP_Widget {
  /**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'gallery_widget', // Base ID
			'MTC::Gallery Post Widget', // Name
			array( 
				'classname' => 'mtc_image_slideshow',
				'description' => __( 'Show posts in the slideshow and the option to set it', 'mtcframework' )
			) // Args
		);
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		
		$title 		= apply_filters( 'widget_title', $instance['title'] );
		$number 	= (int) strip_tags($instance['number']);
		$format = (isset($instance[ 'format' ])) ? (strip_tags($instance[ 'format' ])) :'';
		$slider_id 	= $this->id . '-post-slider';
		
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		

		$args = array(
				'orderby' =>'post_date',
				'order' =>'DESC',
				'post_format' => 'post-format-'.$format,
				'posts_per_page' => $number,
				'post_type' => 'post',
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1
			);
		
		$gallery = new WP_Query($args);
		
		if($gallery->have_posts()):
			$indikator = $item = '';
			$no = 0;
			global $post;
			while($gallery->have_posts()): $gallery->the_post();
				if ( has_post_thumbnail() ) {
				$class_indikator 	= ( 0==$no) ? ' class="active"' : '';
				$class_item 		= ( 0==$no) ? 'active item' : 'item';
				
				$img = get_the_post_thumbnail( $post->ID,'blog-thumb' );
				$permalink = get_permalink($post->ID);
				
				$indikator 	.= '<li data-target="#'.$slider_id.'" data-slide-to="'.$no.'" '.$class_indikator.'></li>';
				$item 		.= '<div class="'.$class_item.'"><a href="'.$permalink.'">'.$img.'</a></div>';
				$no++;
				}
			endwhile; 
			wp_reset_query();
		endif;	
		?>
		
		
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
		
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] 	= strip_tags( $new_instance['title'] );
		$instance['number'] = (int) strip_tags($new_instance['number']);
		$instance['format'] = strip_tags($new_instance['format']);
		return $instance;
	}
	
	
	
	
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ( isset( $instance[ 'title' ] ) ) ? ($instance[ 'title' ]) : ( __( 'Widget Gallery', 'mtcframework' ));
		$number = (isset($instance[ 'number' ])) ? (strip_tags($instance[ 'number' ])) :'';
		$format = (isset($instance[ 'format' ])) ? (strip_tags($instance[ 'format' ])) :'';
		
		if ( current_theme_supports( 'post-formats' ) ) {
			$post_formats = get_theme_support( 'post-formats' );
			if ( is_array( $post_formats[0] ) ) {
				$post_format = $post_formats[0];
			}
		}
		
		
		
		
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'mtcframework' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('format'); ?>"><?php _e('Post Format: ', 'mtcframework'); ?></label>
			<select  class="widefat" id="<?php echo $this->get_field_id('format'); ?>" name="<?php echo $this->get_field_name('format'); ?>">
			<?php foreach ( $post_format as $tval ) : ?>
				<option value="<?php echo esc_attr($tval) ?>" <?php selected($format, $tval) ?>><?php echo $tval; ?></option>
			<?php endforeach; ?>
			</select>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('number'); ?>">
		<?php _e('Limit :', 'mtcframework'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" /></p>
		<?php
	}
} // class Gallery_Widget
/* function myplugin_register_widgets() {
	register_widget( 'Gallery_Widget' );
} */


add_action( 'widgets_init', create_function('', 'return register_widget("Gallery_Widget");') );
