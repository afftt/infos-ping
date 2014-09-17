<?php get_header(); ?>

<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="main">
					<h2 class="ribbon ribbon-green mb0">
						<span><?php echo __('Author Page','mtcframework'); ?></span>
					</h2>
					<div class="box_author mb20 mt0">
						<div class="author_side text-center">
							<?php 
						
							$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
					
							echo get_avatar( $curauth->user_email, '150' ); 
							
							?>
						
							<span class="num_of_entry">
							<?php echo number_format_i18n( get_the_author_posts() ); ?>
							<?php _e(' Entries', 'mtcframework'); ?>
							</span>
						</div>
						
						
						<div class="author_info">
							<h5 class="author_name"><?php  echo $curauth->display_name; ?></h5>
							<p><?php echo $curauth->description; ?></p>
							<ul class="mtc_social">
							<?php 
								global $socmed_user;
								foreach($socmed_user as $soc){
									$socmed_link = get_the_author_meta($soc['id'],$curauth->ID);
									if(!empty($socmed_link)){
										$class_icon = str_replace('-','_',$soc['icon']);
										echo'<li><a class="mtc_social_icon social_'.$class_icon.'" 
										href="'.$socmed_link.'" target="_blank"><i class="icon '.$soc['icon'].'" title="'.$soc['title'].'"></i>&nbsp;</a></li>';
									}
								}
							/* <span class="num_of_entry"><?php _e('Number of Entries', 'mtcframework'); ?> :
							<?php echo number_format_i18n( get_the_author_posts() ); ?>
							</span> */
							?>
							</ul>
						</div>
					</div> 
	
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