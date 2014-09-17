<?php 
/*
	Template name: Archives
*/
get_header(); ?>

<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="main">
					<?php while (have_posts()) : the_post(); ?> 	
						<?php the_title('<h2 class="ribbon  ribbon-green"><span>','</span></h2>'); ?>	
						<div class="box_list_post">		
							<?php the_content(); ?>
							<?php 
							global $wpdb;
							$query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, date_format(post_date,'%M') AS `month_text` FROM $wpdb->posts  WHERE post_type = 'post' AND post_status = 'publish' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC";
							$archive = $wpdb->get_results($query);
							echo'<ul class="list_archive">';
							foreach($archive as $ar){
								echo'<li> <h3>'.$ar->month_text.' '.$ar->year.'</h3>';
								$query = "SELECT DISTINCT ID, post_title,DAY(post_date) AS post_date FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND YEAR(post_date)='".$ar->year."' AND MONTH(post_date)='".$ar->month."' ORDER BY DAY(post_date) DESC";
								$post_archive = $wpdb->get_results($query);
								echo '<ul>';
								foreach($post_archive as $pa){
								echo'<li><a href="'. post_permalink( $pa->ID ) .'" title="'.$pa->post_title.'">'.$pa->post_date.' : '.$pa->post_title.'</a></li>';
								
								}
								echo'</ul>';
								echo'</li>';
							}
							echo'</ul>';
							?>
							
						</div>
					<?php endwhile; ?>
				</div><!-- end main -->				
	
				<?php get_template_part('sidebar');?>
					
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
