<?php get_header(); ?>

<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="main">
					<h2 class="ribbon ribbon-green"><span><?php
						printf( __( 'Tag : %s', 'mtcframework' ), '' . single_tag_title( '', false ) . '' );
					?></span></h2>
					
					<?php if ( have_posts() ) : ?>
						<div class="box_list_post">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>
						</div><div class="spacer"></div>
					<?php else : ?>
					
						<?php  get_template_part( 'content', 'none' ); ?>
						
					<?php endif; ?>
					
					<div class="pagination">
						<?php if (function_exists("pagination")) { pagination(); } ?>
					</div>
					
				</div><!-- end main -->				
				<?php get_template_part('sidebar');?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>