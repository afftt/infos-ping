<?php 
/*
	Template name: Home - Masonry
*/


get_header(); ?>
<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content content2" id="content-home-2">
			<?php 
			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => false 
			); 
				$categories = get_categories( $args );
				
				foreach($categories as $cat){ ?>
				<div class="post-list">
					<h2 class="list-title"><?php echo get_cat_name( $cat->cat_ID ); ?></h2>
					<?php 
					global $post;
					wp_reset_query();
					query_posts(array('showposts' => 5, 'cat' => $cat->cat_ID ));
					$num_box 	= 1;
					while (have_posts()) : the_post(); 
					if(1 == $num_box){ ?>
						<article <?php post_class('post_list'); ?>>
							<div class="thumb">
								<a href="<?php echo get_permalink(); ?>" title="<?php the_title( ); ?>" >
									<?php if ( has_post_thumbnail() ) { ?>
										<?php the_post_thumbnail('small'); ?>
									<?php } else{ ?>
										<img src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
									<?php } ?>
								</a>
							</div>
							<div class="entry">
								<h2>
									<a href="<?php echo get_permalink(); ?>"><?php the_title( ); ?></a>
								</h2>
								<div class="box-line"><span class="line">&nbsp;</span></div>
								<div class="panel-v">
									<ul>
										<li><i class="icon-time"></i> <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a></li>
										<?php echo get_mtc_rating_sys('span','<li>','</li>'); ?>
									</ul>	
								</div>
								<p><?php echo excerpt(26);?></p>
							</div>
						</article>
					
					<?php } else { ?>
					
						<article <?php post_class('post_list_mini'); ?>>
							<div class="item">
								<div class="thumb">
									<a href="<?php echo get_permalink(); ?>" title="<?php the_title( ); ?>" >
										<?php if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail('thumbnail'); ?>
										<?php } else{ ?>
											<img src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
										<?php } ?>
									</a>
								</div>
								<h2><a href="<?php echo get_permalink(); ?>"><?php the_title( ); ?></a></h2>
								<div class="panel-v">
									<ul>
										<li><i class="icon-time"></i> <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a></li>
										<?php echo get_mtc_rating_sys('span','<li>','</li>'); ?>
									</ul>	
								</div>
							</div>
							<div class="clearfix"></div>
							<p><?php echo excerpt(15);?></p>
							<div class="clearfix"></div>
						</article>

					<?php } 

					$num_box ++;
					endwhile; 
					wp_reset_query();
					
					?>
				</div>
				<?php }
				
				
			
			?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>