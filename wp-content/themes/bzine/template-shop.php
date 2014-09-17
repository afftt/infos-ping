<?php 
/*
	Template name: Shop
*/
get_header(); ?>
<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="main">
					<?php while (have_posts()) : the_post(); ?> 	
						<?php the_title('<h2 class="ribbon ribbon-green"><span>','</span></h2>'); ?>	
						<?php the_content();?>	
					<?php endwhile; ?>
				</div><!-- end main -->					
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>