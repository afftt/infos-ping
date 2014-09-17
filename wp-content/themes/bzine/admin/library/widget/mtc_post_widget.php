<?php





class mtc_post_widget extends WP_Widget {

    function mtc_post_widget() {
		# Constructor
		$widget_ops = array( 'classname' => 'mtc_post_widget', 'description' => __( 'Display lates, popular and toprating post, with option' ,'mtcframework') );
		$this->WP_Widget( 'mtc_post_widget', __( 'MTC : Post Widget' ,'mtcframework'), $widget_ops );
	} 	# end of function mtc_post_widget()
    

    function widget($args, $instance) {
		global $smof_data;
		
		// prints the widget
		extract( $args, EXTR_SKIP );
		
		$title 		= esc_attr($instance['title']);
		$limit 		= (!empty($instance['limit'])) ? esc_attr($instance['limit']) : 4 ;
		$layout 	= (!empty($instance['layout'])) ? esc_attr($instance['layout']) : 'style1' ; ;	
		$content 	= (!empty($instance['content'])) ? esc_attr($instance['content']) : 'lates' ; ;	
		
		echo $before_widget;
		
		if ( isset($title) && !empty($title) ) echo $before_title . $title . $after_title; 
		
		
		
		if('popular' == $content){
			$args=array(
				'orderby'=>'comment_count',
				'order'=>'DESC',
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => $limit,
				'ignore_sticky_posts' => 1
			);
		}elseif('topreview' == $content){
			$args=array(
				'meta_key' => 'mtc_rating_average',
				'orderby' => 'meta_value_num',
				'order'=>'DESC',
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => $limit,
				'ignore_sticky_posts' => 1
			);
		}else{
			$args=array(
				'orderby'=>'post_date',
				'order'=>'DESC',
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => $limit,
				'ignore_sticky_posts' => 1
			);
		}
		
		
		
		
		if('style1' == $layout) { ?>
			<div class="post-big-media style1">
				<ul>
				<?php
					global $post;
					
					if('popular' == $content){
						add_filter('posts_where', 'filter_where');
					}
					
					$my_query = null;
					$my_query = new WP_Query($args);
					
					if( $my_query->have_posts() ) : 
						while ($my_query->have_posts()) : $my_query->the_post(); 
						?>
						<li>
							<div class="overlay"></div>
							<div class="more-content">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<span class="line">&nbsp;</span>
								<div class="meta">
									<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
									<?php echo get_mtc_rating_sys('span',' &nbsp;&nbsp;',' '); ?>
								</div>
							</div>
							<?php if ( has_post_thumbnail() ) :   the_post_thumbnail('blog-small');  else :  ?>
								<img src="<?php echo get_template_directory_uri();?>/img/thumb_150.jpg" alt="image"/>
							<?php endif;?>
							<div class="clearfix"></div>
						</li>
						<?php  endwhile; ?>
					<?php endif; wp_reset_query();
					if('popular' == $content){
						remove_filter('posts_where', 'filter_where');
					}
					?>					
				</ul>
			</div>
		<?php } else if('style2' == $layout) { ?>
			<div class="media-2col style2">
				<ul>
				<?php

					global $post;
					if('popular' == $content){
						add_filter('posts_where', 'filter_where');
					}
					$my_query = null;
					$my_query = new WP_Query($args);
					
					if( $my_query->have_posts() ) : 
						while ($my_query->have_posts()) : $my_query->the_post(); 
						?>
						<li class="item">
							<div class="post-imgthumb">
								<a href="<?php echo get_permalink(); ?>" title="<?php the_title( ); ?>" >
									<?php if ( has_post_thumbnail() ) :   the_post_thumbnail('medium');  else :  ?>
										<img src="<?php echo get_template_directory_uri();?>/img/thumb_150.jpg" alt="image"/>
									<?php endif;?>
								</a>
							</div>
							<div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
							<div class="panel-v">
								<ul>
									<li><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time('M y'); ?></a></li>
									<li class="link-author"><?php the_author_posts_link(); ?></li>
									<?php echo get_mtc_rating_sys('span','<li>','</li>'); ?>
								</ul>	
							</div>
							<div class="clearfix"></div>
						</li>
						<?php  endwhile; ?>
					<?php endif; wp_reset_query();
					if('popular' == $content){
						remove_filter('posts_where', 'filter_where');
					}
					?>					
				</ul><div class="clearfix"></div>
			</div>
		<?php } else if('style3' == $layout) { ?>
			<div class="post-widget style3">
				<ul>
				<?php

					global $post;
					if('popular' == $content){
						add_filter('posts_where', 'filter_where');
					}
					$my_query = null;
					$my_query = new WP_Query($args);
					
					if( $my_query->have_posts() ) : 
						while ($my_query->have_posts()) : $my_query->the_post(); 
						?>
						<li class="item">
							<div class="post-imgthumb">
								<a href="<?php echo get_permalink(); ?>" title="<?php the_title( ); ?>" >
									<?php if ( has_post_thumbnail() ) :   the_post_thumbnail('blog-small');  else :  ?>
										<img src="<?php echo get_template_directory_uri();?>/img/thumb_150.jpg" alt="image"/>
									<?php endif;?>
								</a>
							</div>
							<div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
							<div class="panel-v">
								<ul>
									<li><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time('M y'); ?></a></li>
									<li class="link-author"><?php the_author_posts_link(); ?></li>
									<?php echo get_mtc_rating_sys('span','<li>','</li>'); ?>
								</ul>	
							</div>
							<p><?php echo excerpt(15);?></p>
							<div class="clearfix"></div>
						</li>
						<?php  endwhile; ?>
					<?php endif; wp_reset_query();
					if('popular' == $content){
						remove_filter('posts_where', 'filter_where');
					}
					?>					
				</ul><div class="clearfix"></div>
			</div>
		<?php }
		
		
		
		
		
		echo $after_widget;
    }

	
	
	
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['limit'] 		= strip_tags($new_instance['limit']);
		$instance['layout'] 	= strip_tags($new_instance['layout']);
		$instance['content'] 	= strip_tags($new_instance['content']);
        return $instance; 

    }

    function form($instance) {
		
		$title 		= (!empty($instance['title'])) ? esc_attr($instance['title']) : 'Post Widget' ;
		$limit 		= (!empty($instance['limit'])) ? esc_attr($instance['limit']) : 4 ;
		$content 	= (!empty($instance['content'])) ? esc_attr($instance['content']) : '' ;
		$layout 	= (!empty($instance['layout'])) ? esc_attr($instance['layout']) : '' ;
		
		$data_layout = array(
			'style1' => 'Style 1',
			'style2' => 'Style 2',
			'style3' => 'Style 3'
		);
		
		$data_content = array(
			'lates' => 'Lates Post',
			'popular' => 'Popular Post',
			'topreview' => 'Top Review'
		);
		
        ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title :','mtcframework'); ?></label><br />
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>"   type="text">
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Count Foto :','mtcframework'); ?></label><br />
			<input id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" value="<?php echo $limit; ?>"   type="text">
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content: ', 'mtcframework'); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>">
			<?php foreach ( $data_content as $t=>$tval ) : ?>
				<option value="<?php echo esc_attr($t) ?>" <?php selected($content, $t) ?>><?php echo $tval; ?></option>
			<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('layout'); ?>"><?php _e('Layout: ', 'mtcframework'); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('layout'); ?>" name="<?php echo $this->get_field_name('layout'); ?>">
			<?php foreach ( $data_layout as $t=>$tval ) : ?>
				<option value="<?php echo esc_attr($t) ?>" <?php selected($layout, $t) ?>><?php echo $tval; ?></option>
			<?php endforeach; ?>
			</select>
		</p>
		<?php 
    }
}

add_action( 'widgets_init', create_function( '', 'return register_widget("mtc_post_widget");' ) );

