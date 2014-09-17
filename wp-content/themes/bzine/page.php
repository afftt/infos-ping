<?php get_header(); ?>
<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="main">
					<?php while (have_posts()) : the_post(); ?> 	
						<?php the_title('<h2 class="ribbon ribbon-green"><span>','</span></h2>'); ?>	
						<div <?php post_class('box_list_post'); ?>>	
							<?php the_content();?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages : ', 'mtcframework' ), 'after' => '</div>' ) ); ?>
						</div>
					<?php endwhile; ?>
				</div><!-- end main -->				
	
				<?php get_template_part('sidebar');?>
					
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>