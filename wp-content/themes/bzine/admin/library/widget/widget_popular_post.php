<?php





class mtc_popular_post_widget extends WP_Widget {

    function mtc_popular_post_widget() {
		# Constructor
		$widget_ops = array( 'classname' => 'mtc_recent_post_widget', 'description' => __( 'Widget popular post with media' ,'mtcframework') );
		$this->WP_Widget( 'mtc-popular-post', __( 'MTC : Popular Post with media' ,'mtcframework'), $widget_ops );
	} 	# end of function mtc_popular_post_widget()
    

    function widget($args, $instance) {
		global $smof_data;
		
		// prints the widget
		extract( $args, EXTR_SKIP );
		
		$title 	= esc_attr($instance['title']);
		$limit 		= (!empty($instance['limit'])) ? esc_attr($instance['limit']) : 4 ;
			
		echo $before_widget;
		
		if ( isset($title) && !empty($title) ) echo $before_title . $title . $after_title; 
		?>
		<ul>
			<?php

				
				
				$args=array(
					'orderby'=>'comment_count',
					'order'=>'DESC',
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => $limit,
					'ignore_sticky_posts' => 1
				);
				global $post;
				
				add_filter('posts_where', 'filter_where');
				
				$my_query = null;
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) : while ($my_query->have_posts()) : $my_query->the_post();  ?>
				<li>
					<div class="post-imgthumb">
						<a href="<?php echo get_permalink(); ?>" title="<?php the_title( ); ?>" >
							<?php if ( has_post_thumbnail() ) :   the_post_thumbnail('thumbnail');  else :  ?>
								<img src="<?php echo get_template_directory_uri();?>/img/thumb_150.jpg" alt="image"/>
							<?php endif;?>
						</a>
					</div>
					<div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
					<div class="post-meta">
						<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
					</div>
					<div class="clearfix"></div>
				</li>	
			<?php  endwhile; endif; wp_reset_query(); remove_filter('posts_where', 'filter_where'); ?>					
			</ul>
		
		
		
		
		<?php
			
		

		echo $after_widget;
    }

	
	
	
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['limit'] 		= strip_tags($new_instance['limit']);
        return $instance; 

    }

    function form($instance) {
		
		$title 		= (!empty($instance['title'])) ? esc_attr($instance['title']) : 'Popular Post' ;
		$limit 		= (!empty($instance['limit'])) ? esc_attr($instance['limit']) : 4 ;
        ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title :','mtcframework'); ?></label><br />
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>"   type="text">
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Count Foto :','mtcframework'); ?></label><br />
			<input id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" value="<?php echo $limit; ?>"   type="text">
        </p>
		<?php 
    }
}

add_action( 'widgets_init', create_function( '', 'return register_widget("mtc_popular_post_widget");' ) );

