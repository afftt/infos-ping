<?php 
/*
	Template name: Full Width
*/
get_header(); ?>

<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="main_full_width">
					<?php while (have_posts()) : the_post(); ?> 	
						<?php the_title('<h2 class="ribbon"><span>','</span></h2>'); ?>	
						<div class="box_post_full_width">		
							<?php the_content();?>
						</div>
					<?php endwhile; ?>
				</div><!-- end main -->				
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
