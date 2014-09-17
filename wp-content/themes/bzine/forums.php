<?php get_header(); ?>
<?php global $smof_data; ?>
<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<?php if ( have_posts() ) : ?>
					<?php while (have_posts()) : the_post(); ?> 
						
						<h2 class="ribbon-v3"><span><?php echo __('Forum ' ,'mtcframework'); ?></span> 
						<?php 
						if(!empty($smof_data['forum_welcome_text'])){
							echo $smof_data['forum_welcome_text'];;
						}
						?></h2>
						
						<div class="main">	
							<div <?php post_class(); ?>>	
								<?php the_content();?>
								<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages : ', 'mtcframework' ), 'after' => '</div>' ) ); ?>
							</div>
						</div><!-- end main -->	
					<?php endwhile; ?>		
				<?php else : ?>
					<div class="main">
					<?php  get_template_part( 'content', 'none' ); ?>
					</div><!-- end main -->
				<?php endif; ?>
				
				<?php get_sidebar('forum');?>
					
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>