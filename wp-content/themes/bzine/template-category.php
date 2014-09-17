<?php 
/*
	Template name: Category
*/
get_header(); ?>

<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="main">
					<?php while (have_posts()) : the_post(); ?> 	
						<?php the_title('<h2 class="ribbon"><span>','</span></h2>'); ?>	
						<div class="box_list_post">		
							<?php the_content();?>
							<ul class="list_category">
							<?php
							$args=array(
							  'orderby' => 'name',
							  'order' => 'ASC'
							  );
							$categories=get_categories($args);
							  foreach($categories as $category) { 
								echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s",'mtcframework'), $category->name ) . '" ' . '> <i class="icon-bookmark-empty"></i> ' . $category->name.'</a></li> ';
								
								
								  } 
							?>
							</ul>
						</div>
					<?php endwhile; ?>
				</div><!-- end main -->				
	
				<?php get_template_part('sidebar');?>
					
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
