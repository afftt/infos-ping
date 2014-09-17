<?php 

if(!function_exists('mtc_news_in_picture_v3')){
	function mtc_news_in_picture_v3(){ 
	global $smof_data;
	if($smof_data['switch_news_in_picture']){ 
	?>
		<h2 class="ribbon-v3 mb0"><span><?php echo $smof_data['news_in_picture_title']; ?></span></h2>
		<div class="post_row row-pict-v3">
			<?php 
			$args = array(
						'posts_per_page' 		=> $smof_data['news_in_picture_count'],
						'orderby' 				=> 'post_date',
						'ignore_sticky_posts' 	=> 1,
						'order' 				=> 'DESC' );
			$content = $smof_data['news_in_picture_content'];
					
			if('latest' == $content['content']){
			
			}
			else if('category' == $content['content']){
				$args['cat'] = $content['category'];
			}
			
			else if('tag' == $content['content']){
				$args['tag'] = $content['tag'];
			}
					
			wp_reset_query(); 		
			query_posts($args);
			
			
			?>
			<section id="latest-picture" class="">
				<?php while (have_posts()) : the_post(); ?>
				<div class="news-pict-v3">
					<a class="thumb" href="<?php echo get_permalink(); ?>" data-toggle="tooltip" data-original-title="<?php the_title(); ?>" title="<?php the_title(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail('thumbnail'); ?>
					<?php } else{ ?>
						<img src="<?php echo get_template_directory_uri().'/img/thumb_150.jpg'; ?>" alt="<?php the_title( ); ?>">
					<?php } ?>
					</a>
				</div>
				<?php endwhile; wp_reset_query(); ?>
			</section>
			<div class="clearfix"></div>
		</div>
	
	<?php 
	}
	}
}



if(!function_exists('mtc_news_in_picture')){
	function mtc_news_in_picture(){ 
		global $smof_data;
		if($smof_data['switch_news_in_picture']){ ?>
			<div class="post_row mt10">
				<h2 class="ribbon ribbon-green mb0"><?php echo $smof_data['news_in_picture_title']; ?></h2>
				<div class="box_list_mini news_pictures">
					<?php 
					
					$args = array(
						'posts_per_page' 		=> $smof_data['news_in_picture_count'],
						'orderby' 				=> 'post_date',
						'ignore_sticky_posts' 	=> 1,
						'order' 				=> 'DESC' );
					
					$content = $smof_data['news_in_picture_content'];
					
					if('latest' == $content['content']){
					
					}
					else if('category' == $content['content']){
						$args['cat'] = $content['category'];
					}
					
					else if('tag' == $content['content']){
						$args['tag'] = $content['tag'];
					}
					
					wp_reset_query(); 	
					query_posts($args);
					while (have_posts()) : the_post(); ?>
						<div class="list_mini news-pict">
						<a class="thumb" href="<?php echo get_permalink(); ?>" data-toggle="tooltip" data-original-title="<?php the_title(); ?>" title="<?php the_title(); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail('thumbnail'); ?>
						<?php } else{ ?>
							<img src="<?php echo get_template_directory_uri().'/img/thumb_150.jpg'; ?>" alt="<?php the_title( ); ?>">
						<?php } ?>
						</a>
					</div>
					<?php endwhile; wp_reset_query(); ?>
				</div>
			</div><?php
		} 
	} 

} 