<?php 

/* scripts for post counter view */
wp_enqueue_script( 'bzine-ajax-request', get_template_directory_uri() . '/js/bzine-ajax.js', array( 'jquery' ) ,'',true);

/* declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php) */
global $post;
$data_ajax = array(
	'postID' => $post->ID,
	'ajaxurl' => admin_url( 'admin-ajax.php' )
);
wp_localize_script( 'bzine-ajax-request', 'bzineAjax', $data_ajax );


get_header();   ?> 
<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="main">
					<?php if ( have_posts() ) : ?>
						
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>
						
					<?php else : ?>
					
						<?php  get_template_part( 'content', 'none' ); ?>
						
					<?php endif; ?>
					
				</div><!-- end main -->	
				
				<?php get_template_part('sidebar');?>
					
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>