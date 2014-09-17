<?php
/* 
	5:27 PM 7/8/2013
*/
class mtc_tabpost_widget extends WP_Widget {

    function mtc_tabpost_widget() {
		# Constructor
		$widget_ops = array( 'classname' => 'widget_mtc_tabpost_widget', 'description' => __( 'Widget for Show Post in Tab.','mtcframework' ) );
		$this->WP_Widget( 'mtc-tabpost-widget', __( 'MTC : Post Tab','mtcframework' ), $widget_ops );
	} 	# end of function mtc_tabpost_widget()
    

    function widget($args, $instance) {
		// prints the widget
		extract( $args, EXTR_SKIP );
	

		$show_popular 	= (!empty($instance['popular'])) 	? esc_attr($instance['popular']) 	: 4 ;
		$show_checkbox 	= (!empty($instance['checkbox'])) 	? esc_attr($instance['checkbox']) 	: 0 ;
		$show_recent 	= (!empty($instance['recent'])) 	? esc_attr($instance['recent']) 	: 4 ;
		/* $title 			= (!empty($instance['title'])) 		? esc_attr($instance['title']) 		: 4 ; */
		
		$unik_kode_widget = rand(0,999);
	
		echo $before_widget;
		?>

		<ul class="tabs tabs_<?php echo $unik_kode_widget;?>">
			<li class="active"><a class="popular" href="#tab1_<?php echo $unik_kode_widget;?>">Populaires</a></li>
			<li class=""><a class="recent" href="#tab2_<?php echo $unik_kode_widget;?>">Recents</a></li>
			<li class=""><a class="archives" href="#tab3_<?php echo $unik_kode_widget;?>">Archives</a></li>
		</ul><div class="spacer"></div>
		
		<div class="tab_container">
			<div id="tab1_<?php echo $unik_kode_widget;?>" class="tab_content tab_content_<?php echo $unik_kode_widget;?>">
				<ul>
				<?php
					$args=array(
					  'orderby'=>'m',
					  'order'=>'DESC',
					  'post_type' => 'post',
					  'post_status' => 'publish',
					  'posts_per_page' => $show_popular,
					  'ignore_sticky_posts' => 1
					);
					if( $show_checkbox AND $show_checkbox == '1' ) {
						add_filter('posts_where', 'filter_where');
					}
					
						
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
					</li>	
				<?php  endwhile; endif; wp_reset_query();
				
					if( $show_checkbox AND $show_checkbox == '1' ) {
						remove_filter('posts_where', 'filter_where');
					}
				
				?>					
				</ul>
			</div>
			
			
			
			<div id="tab2_<?php echo $unik_kode_widget;?>" class="tab_content tab_content_<?php echo $unik_kode_widget;?>">
				<ul>
				<?php
				/* GET recent_posts */
				$args = array( 'numberposts' => $show_recent,'post_status' => 'publish', );
				$recent_posts = wp_get_recent_posts( $args,OBJECT);
				foreach( $recent_posts as $recent ){
					
					echo '<li>';
					echo'<div class="post-imgthumb">';
						?><a href="<?php echo get_permalink($recent->ID); ?>" title="<?php the_title( ); ?>" ><?php
							if ( has_post_thumbnail($recent->ID) ) {
								 echo get_the_post_thumbnail($recent->ID, 'thumbnail');}
							else{ 
								?><img src="<?php echo get_template_directory_uri();?>/img/thumb_150.jpg" alt="image"/><?php }
						?></a><?php
					echo'</div>';
					
					echo'<div class="post-title">
						<a href="' . get_permalink($recent->ID) . '" title="Look '.esc_attr($recent->post_title).'" >'.$recent->post_title.'</a>
					</div>';
					?>
					<div class="post-meta">
						<a href="<?php echo get_day_link(get_the_time('Y',$recent), get_the_time('m',$recent), get_the_time('d',$recent)); ?>"><?php echo get_the_time(get_option('date_format') ,$recent); ?></a>
					</div>
					<?php
					
					echo'</li>';
				}
				
				?>
				</ul>
			</div>
				
				
			<div id="tab3_<?php echo $unik_kode_widget;?>" class="tab_content tab_content_<?php echo $unik_kode_widget;?>">
				<ul>
					<?php wp_get_archives( 
						array( 
							'type' 				=> 'monthly', 
							'limit' 			=> 12 ,
							'format'    		=> 'custom', 
							'before'          	=> '<li class="tab_archive">',
							'after'           	=> '</li>',
							'show_post_count' 	=> false,
							'echo'            	=> 1,
							'order'           	=> 'DESC') 
					); ?>
				</ul>
			</div>
		</div>
		<div class="spacer"></div><?php 
		
		add_script_mtc_tabpost_widget($unik_kode_widget);
		echo $after_widget;
	
	
    }

	
	
	
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		/* $instance['title'] 		= strip_tags($new_instance['title']); */
		$instance['popular'] 	= strip_tags($new_instance['popular']);
		$instance['checkbox']   = strip_tags($new_instance['checkbox']);
		$instance['recent'] 	= strip_tags($new_instance['recent']);
        return $instance;
    }

	
	
	
	
    function form($instance)
	{
		/* $title 		= (!empty($instance['title'])) ? esc_attr($instance['title']) : '' ; */
		$popular 	= (!empty($instance['popular'])) ? esc_attr($instance['popular']) : 4 ;
		$recent 	= (!empty($instance['recent'])) ? esc_attr($instance['recent']) : 4 ;
		$checkbox  	= (!empty($instance['checkbox'])) ? esc_attr($instance['checkbox']) : 0 ; ?>
		
		<p>
			
			<input id="<?php echo $this->get_field_id('checkbox'); ?>" name="<?php echo $this->get_field_name('checkbox'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?> />
			<label for="<?php echo $this->get_field_id('checkbox'); ?>"><?php _e('Display Popular Posts newer than 30 days', 'mtcframework'); ?></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('popular'); ?>"><?php _e('Number of popular to show :','mtcframework'); ?></label>
			<input id="<?php echo $this->get_field_id('popular'); ?>" name="<?php echo $this->get_field_name('popular'); ?>" value="<?php echo $popular; ?>"  maxlength="2" type="text">
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('recent'); ?>"><?php _e('Number of recent to show :','mtcframework'); ?></label> 
			<input id="<?php echo $this->get_field_id('recent'); ?>" name="<?php echo $this->get_field_name('recent'); ?>" value="<?php echo $recent; ?>"  maxlength="2" type="text">
        </p><?php
    }
	
	
}

add_action( 'widgets_init', create_function( '', 'return register_widget("mtc_tabpost_widget");' ) );



function add_script_mtc_tabpost_widget($id){ ?><script type="text/javascript">
	jQuery(function () {
		 /* Default Action */
		jQuery(".tab_content_<?php echo $id;?>").hide();
		jQuery("ul.tabs_<?php echo $id;?> li:first").addClass("active").show(); 
		jQuery(".tab_content_<?php echo $id;?>:first").show(); 
		/* On Click Event */
		jQuery("ul.tabs_<?php echo $id;?> li").click(function() {
			jQuery("ul.tabs_<?php echo $id;?> li").removeClass("active"); 
			jQuery(this).addClass("active"); 
			jQuery(".tab_content_<?php echo $id;?>").hide(); 
			var activeTab = jQuery(this).find("a").attr("href"); 
			jQuery(activeTab).fadeIn(); 
			return false;
		}); 
    });
</script><?php  }
