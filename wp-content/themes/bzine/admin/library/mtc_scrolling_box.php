<?php


 
function mtc_scrolling_box_large($args){ ?>
	<div class="post_row">
		<h2 class="ribbon ribbon-green mb0">
			<span><?php echo $args['title']; ?></span>
		</h2>
		<div class="box-vid">
			<ul>
			<?php 
				wp_reset_query();
				
				$post_args = array(
					'posts_per_page' 	=> 3,
					'post_format' 		=> 'post-format-video', 
					'orderby' 			=> 'post_date',
					'ignore_sticky_posts' => 1,
					'order' 			=> 'DESC' 
				);
					
				query_posts($post_args);
				$no = 1;
				while (have_posts()) : the_post();
			
				if(1 == $no){ ?>
				<li class="large_vid">
					<?php 
					
						$the_content = get_the_content('',true) ;
						$the_content = apply_filters( 'the_content', $the_content );
						$the_content = str_replace( ']]>', ']]&gt;', $the_content );
						$embed_code = rwmb_meta( 'mtc_embed_code', 'type=text' ); 
						
						if(function_exists('get_media_embedded_in_content')){
							$media = get_media_embedded_in_content($the_content,'iframe');
							
							if(!empty($media)){
							
								$pc = explode('</iframe>',$media[0]);
								
								$embed_code = $pc[0].'</iframe>';
							} 
						}
						
						
						if(!empty($embed_code)){
						
							echo $embed_code;
						} 
					?>
					<h2><a href="<?php echo get_permalink(); ?>"><?php the_title( ); ?></a></h2>
					<p class="author">
						<?php // echo __( 'by ', 'mtcframework' ); the_author_posts_link(); ?>  
						<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
					</p>		
				</li>
				<?php } else { ?>
				<li class="small_vid">
					<div class="list_post_thumb">
					<a href="<?php echo get_permalink(); ?>"><i class="icon-play-sign"></i></a>
						<?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail('blog-small'); ?>
						<?php } else{ ?>
							<img src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
						<?php } ?>	
					</div>
					<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
				</li>
				<?php } $no++; endwhile; ?>
			</ul>
			<div class="spacer"></div>
		</div>
	</div>
<?php }



function mtc_scrolling_box_grid($args) { ?>
<div class="post_row">
	<div class="post-pager" id="news-latest"></div>
	<h2 class="ribbon ribbon-green"><?php echo $args['title']; ?></h2>
	<div class="box_list_home">
		<?php 
		wp_reset_query();
			
		$post_args = array(
				'posts_per_page' 	=> $args['per_page'],
				'post_format' 		=> 'post-format-video', 
				'orderby' 			=> 'post_date',
				'ignore_sticky_posts' => 1,
				'order' 			=> 'DESC' 
			);
				
		query_posts($post_args);
		while (have_posts()) : the_post();  ?> 	
		<div class="list_home">
			<div class="list_home_thumb">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail('blog-thumb'); ?>
				<?php } else{ ?>
				<img src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
				<?php } ?>
				<!--<div class="list_home_meta">
					<span class="tags">
						<i class="icon-tag"></i> <?php // the_tags('',', ',''); ?>
					</span>-->
					<!--<span class="count_comments">
						<i class="icon-comments"></i> <a href="<?php comments_link();?>"><?php comments_number( '0', '1', '%' ); ?></a>
					</span>
				</div>-->
			</div>
			
			<div class="list_home_content">
				<h2><a href="<?php echo get_permalink(); ?>"><?php the_title( ); ?></a></h2>
				<p class="author">
					<?php // echo __( 'by ', 'mtcframework' ); the_author_posts_link(); ?>  
					<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
				</p>
				<p><?php  echo excerpt(12); ?></p>
			</div>	
			
		</div>
		<?php endwhile; ?>
	</div>
</div>
<?php }


function mtc_scrolling_box_small($args) { ?>
<div class="post_row">
	<div class="post-pager" id="latest2"></div>
	<h2 class="ribbon ribbon-green mb0"><?php echo $args['title']; ?></h2>
	<div class="box_list_mini">
		<div class="box_list_mini_slider" id="latest_vid">
			<?php  
			
			wp_reset_query();
			
			$post_args = array(
				'posts_per_page' 	=> $args['per_page'],
				'post_format' 		=> 'post-format-video', 
				'orderby' 			=> 'post_date',
				'ignore_sticky_posts' => 1,
				'order' 			=> 'DESC' 
			);
				
			query_posts($post_args);
			while (have_posts()) : the_post(); ?>
				<div class="list_mini scrool-box">
					<a class="thumb" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail('thumbnail'); ?>
						<?php } else{ ?>
							<img src="<?php echo get_template_directory_uri().'/img/thumb_150.jpg'; ?>" alt="<?php the_title( ); ?>">
						<?php } ?>
					</a>
					<p><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
				</div>
			<?php endwhile; wp_reset_query(); ?>
		</div>
	</div>
</div>
<?php

}





 

function mtc_scrolling_box($args=array()) { 
	
	if(empty($args)){ 
		$args = array(
			'style'		=> 'small', 
			'per_page'	=> 10, 
			'title'		=> 'Latest Video'
		);
	}
	
	$func = 'mtc_scrolling_box_'.$args['style'];
	
	if(function_exists($func)){
		call_user_func($func, $args);
	}
	
} 




function mtc_scrolling_box_v3($args=array()) { 
	
	if(empty($args)){ 
		$args = array(
			'style'		=> 'small', 
			'per_page'	=> 10, 
			'title'		=> 'Latest Video'
		);
	}
	
	$func = 'mtc_scrolling_box_v3_'.$args['style'];
	
	if(function_exists($func)){
		call_user_func($func, $args);
	}
	
} 


function mtc_scrolling_box_v3_small($args) { ?>
	<h2 class="ribbon-v3"><span><?php echo $args['title']; ?></span></h2>
	<div class="wrapper-vid-v3">
		<section id="latest-vid" class="box-list-vid-v3">
			<?php 
			$post_args = array(
				'posts_per_page' 	=> $args['per_page'],
				'post_format' 		=> 'post-format-video', 
				'orderby' 			=> 'post_date',
				'ignore_sticky_posts' => 1,
				'order' 			=> 'DESC');
				
				
			wp_reset_query();
					
			query_posts($post_args);
			$no = 1;
			while (have_posts()) : the_post();
			
			?>
			<article class="list-vid-v3">
				<div class="thumb-vid-v3">
				<?php 
				$the_content = get_the_content('',true) ;
					$the_content = apply_filters( 'the_content', $the_content );
					$the_content = str_replace( ']]>', ']]&gt;', $the_content );
					$embed_code  = rwmb_meta( 'mtc_embed_code', 'type=text' ); 
					
					if(function_exists('get_media_embedded_in_content')){
						$media = get_media_embedded_in_content($the_content,'iframe');
						
						if(!empty($media)){
							$pc = explode('</iframe>',$media[0]);
							$embed_code = $pc[0].'</iframe>';
						} 
					}
					
					
					if(!empty($embed_code)){
						echo $embed_code;
					}
				
				
				?>
				</div>
				<div class="content-vid-v3">
					<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="panel-v">
						<ul>
							<li><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time('M y'); ?></a></li>
							<li><?php the_author_posts_link(); ?></li>
							<?php echo get_mtc_rating_sys('span','<li>','</li>'); ?>
						</ul>	
					</div>
				</div>
			</article>
			<?php endwhile; ?>
		</section>
		<div class="clearfix"></div>
		<a class="prev" id="vid-v3_prev" href="#"><i class="icon-angle-left"></i></a>
		<a class="next" id="vid-v3_next" href="#"><i class="icon-angle-right"></i></a>
	</div>
<?php 

}

function mtc_scrolling_box_v3_grid($args) { ?>
<div class="post_row">
	<div class="post-pager" id="news-latest"></div>
	<h2 class="ribbon-v3"><span><?php echo $args['title']; ?></span></h2>
	<div class="box-latest-2">
	<section id="latest-2">
	<?php
	
	$post_args = array(
				'posts_per_page' 	=> $args['per_page'],
				'post_format' 		=> 'post-format-video', 
				'orderby' 			=> 'post_date',
				'ignore_sticky_posts' => 1,
				'order' 			=> 'DESC' 
			);
	wp_reset_query();			
	query_posts($post_args);
	while (have_posts()) : the_post();  ?> 	
		<article class="list-v2">
			<?php 
			if('video' == get_post_format()) { 
				$the_content = get_the_content('',true) ;
				$the_content = apply_filters( 'the_content', $the_content );
				$the_content = str_replace( ']]>', ']]&gt;', $the_content );
				$embed_code  = rwmb_meta( 'mtc_embed_code', 'type=text' ); 
				
				if(function_exists('get_media_embedded_in_content')){
					$media = get_media_embedded_in_content($the_content,'iframe');
					
					if(!empty($media)){
						$pc = explode('</iframe>',$media[0]);
						$embed_code = $pc[0].'</iframe>';
					} 
				}
				
				
				if(!empty($embed_code)){
					echo $embed_code;
				}else{
					the_title();
				}
			
			
			} else { ?>
				<div class="thumb-v2">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail('blog-thumb'); ?>
				<?php } else{ ?>
					<img src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
				<?php } ?>
				</div>
				<div class="overlay"></div>
				
				<div class="content-v2">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<span class="line">&nbsp;</span>
					<div class="panel-v">
						<ul>
							<li><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a></li>
							<li><?php the_author_posts_link(); ?></li>
							<?php echo get_mtc_rating_sys('span','<li>','</li>'); ?>
						</ul>	
					</div>
				</div>
			<?php } ?>
		</article>
		<?php 
	endwhile;
	
	/* Reset Query */
	wp_reset_query(); ?>
	</section>
		<div class="clearfix"></div>
		<a class="prev" id="latest-2_prev" href="#"><i class="icon-angle-left"></i></a>
		<a class="next" id="latest-2_next" href="#"><i class="icon-angle-right"></i></a>
	</div>
</div>
<?php 

}