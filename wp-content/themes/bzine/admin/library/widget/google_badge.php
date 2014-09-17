<?php 
/**
 * Adds Google_Badge widget.
 */
class Google_Badge extends WP_Widget {
  /**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'google_badge_wg', // Base ID
			'MTC::Google Badge', // Name
			array( 'description' => __( 'Google Plus Badge', 'mtcframework' ), ) // Args
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
		$username = (strip_tags($instance['username'])) ? (strip_tags($instance['username'])): '';
		$type 		= ( isset( $instance[ 'type' ] ) ) ? (strip_tags($instance['type'])) : 'author';
		
		$gp_class = ('author'== $type) ? 'g-person' : 'g-page';
		
		
		if(!empty($username)){
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title; ?>
			
			<div class="mtc-plus-google-widget">
				<!-- Place this tag where you want the widget to render. -->
			<div class="<?php echo $gp_class; ?>" data-width="280" data-href="//plus.google.com/<?php echo $username;?>" data-rel="<?php echo $type; ?>"></div>

			<!-- Place this tag after the last widget tag. -->
			<script type="text/javascript">
			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/platform.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
			</div>
		<?php
		echo $after_widget;
		}
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
		$instance['title'] 		= strip_tags( $new_instance['title'] );
		$instance['username'] 	=  strip_tags($new_instance['username']);
		$instance['type'] 		=  strip_tags($new_instance['type']);
		
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
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Google Badge', 'mtcframework' );
		}
		$username 	= ( isset( $instance[ 'username' ] ) ) ? (strip_tags($instance['username'])) : '';
		$type 		= ( isset( $instance[ 'type' ] ) ) ? (strip_tags($instance['type'])) : 'author';
		
		$data_type = array(
			'author' => 'Profiles',
			'publisher' => 'Pages'
		);
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'mtcframework'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username id:', 'mtcframework'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo esc_attr($username); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Badge types: ', 'mtcframework'); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>">
			<?php foreach ( $data_type as $t=>$tval ) : ?>
				<option value="<?php echo esc_attr($t) ?>" <?php selected($type, $t) ?>><?php echo $tval; ?></option>
			<?php endforeach; ?>
			</select>
		</p>
		<?php
	}
} // class Google_Badge

function googlebadge_register_widgets() {
	register_widget( 'Google_Badge' );
}

add_action( 'widgets_init', 'googlebadge_register_widgets' );

