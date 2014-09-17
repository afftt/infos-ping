<?php 
/**
 * Adds mtc_video_wg widget.
 */
class mtc_video_wg extends WP_Widget {
  /**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'mtc_video_wg', // Base ID
			'MTC::Video widget', // Name
			array( 'description' => __( 'Video Widget', 'mtcframework' ), ) // Args
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
		$title = apply_filters( 'widget_title', $instance['title'] );
		$videosrc =  ($instance['videosrc']);
		
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		?>
		<div class="entry-media">
		<?php echo $videosrc;?>
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
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['videosrc'] =  ($new_instance['videosrc']);
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
		
		$title = ( isset( $instance[ 'title' ] ) ) ? ($instance[ 'title' ]) : ( __( 'Video Widget', 'mtcframework' ));
		$videosrc = (isset($instance[ 'videosrc' ])) ? (($instance[ 'videosrc' ])) :'';
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'mtcframework' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p><label for="<?php echo $this->get_field_id('videosrc'); ?>">
		<?php _e('Video Source:', 'mtcframework'); ?></label>
		
		<textarea class="widefat" id="<?php echo $this->get_field_id('videosrc'); ?>" name="<?php echo $this->get_field_name('videosrc'); ?>" type="text" ><?php echo esc_attr($videosrc); ?></textarea>
		</p>
		<?php
	}
} // class mtc_video_wg



add_action( 'widgets_init', create_function('', 'return register_widget("mtc_video_wg");') );
?>
