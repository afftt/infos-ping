<?php if ( !is_single() ) { ?>
<div <?php post_class('list_post'); ?>>
	<div class="list_post_thumb">
		<a href="<?php echo get_permalink(); ?>" title="<?php the_title( ); ?>" >
			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('blog-small'); ?>
			<?php } else{ ?>
				<img src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
			<?php } ?>
		</a>
	</div>
	<div class="list_post_content">
		<h2>
			<a href="<?php echo get_permalink(); ?>"><?php the_title( ); ?></a>
		</h2>
		<?php the_excerpt();?>
		<p class="panel">
			<?php //comments_popup_link('0 Comments ', '1 Comment', '% Comments'); ?> 
			<?php// echo mtc_get_postmeta_views($post->ID) . ' ' . __('Vue(s)','mtcframework'); ?> 
			<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
			<?php echo get_mtc_rating_sys('span',' / ',''); ?>
		</p>
			
	</div>
	<div class="spacer"></div>
</div>
<?php } else {  ?>	
	<?php global $post;   ?>
	<div class="post_thumb">
		<div class="mask"></div>
		<?php if ( has_post_thumbnail() ) { ?>
			<?php the_post_thumbnail('large'); ?>
		<?php } else{ ?>
			<img src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
		<?php } ?>
	</div>
	
	<div <?php post_class(); ?>>	
		<div class="storycontent">
			<?php the_title('<h2 class="_title">','</h2>'); ?>
			<p class="panel">
				<?php // echo __('Par','mtcframework');?> <?php // the_author_posts_link(); ?> 
				<?php //comments_popup_link('0 Comments ', '1 Comment', '% Comments'); ?> 
				<?php //echo mtc_get_postmeta_views($post->ID) . ' ' . __('Vue(s)','mtcframework'); ?>   
				<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
			</p>
				
			
			<div class="entry">
				
			
				<?php 
				the_content();
				wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages : ', 'mtcframework' ), 'after' => '</div>' ) ); 
				/* Show the Rev */
				do_action('bzine_after_content'); ?>
				
				<div class="clearfix"></div>
				<div class="post_panel">
					<?php the_tags('<div class="post_tags"><i class="icon-tag"></i> ',', ','</div>'); ?> 
					<?php get_template_part('sharebutton'); ?>
				</div>
			</div>	
		</div>
		
		<div class="storycontent">
			<?php comments_template(); ?> <div class="spacer"></div>
		</div>
	</div>
<?php }   ?>