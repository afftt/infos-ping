<?php get_header(); ?>

<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="main">
					<?php if ( have_posts() ) : ?>
						<h2 class="ribbon ribbon-green">
							<span>
								<?php echo __('Search Results For :', 'mtcframework') . get_search_query(); ?>
							</span>
						</h2>
					
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