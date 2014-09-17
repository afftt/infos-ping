<?php 

if(!function_exists('mtc_news_tab_v3')){
function mtc_news_tab_v3(){
	global $smof_data;
	if($smof_data['switch_news_tab']){
		/* set data cate */
		$data_cat = array(
			$smof_data['news_tab_cat1'],
			$smof_data['news_tab_cat2'],
			$smof_data['news_tab_cat3'],
			$smof_data['news_tab_cat4'],
			$smof_data['news_tab_cat5'],
			$smof_data['news_tab_cat6'],
			$smof_data['news_tab_cat7'],
			$smof_data['news_tab_cat8']
		);
		
		foreach($data_cat as $key_cat=>$cat){
			if($cat=='none'){
				unset($data_cat[$key_cat]);
			}
		}
		
		if(!empty($data_cat)){
			?><!-- Tabs -->
			<div class="post_row">
				<ul class="nav nav-tabs news_tabs diagonal mb0">
					<?php 
						$tab_nav ='';
						$iterasi = 1;
						foreach($data_cat as $cat){
							$tab_nav .='<li '.(($iterasi==1) ? 'class="active"' : '' ).'><a data-toggle="tab" href="#tab-' .$cat. '">' .get_cat_name( $cat ). '</a></li>';
							$iterasi++; }
						
						echo $tab_nav; 
					?>
				</ul><!-- End Tab Nav -->
				
				<div class="tab-content news_tabs">
					<?php
					$iterasi = 1;
					foreach($data_cat as $cat){
						echo '<div class="tab-pane'.(($iterasi==1) ? ' active' : '' ).'" id="tab-' .$cat. '">';
						query_posts(array('showposts' => 4, 'cat' => $cat ));
						while (have_posts()) : the_post();  ?> 	
							<div class="tab_list">
							<div class="tab_list_thumb">
								<a href="<?php echo get_permalink(); ?>" title="<?php the_title( ); ?>" >
									<?php if ( has_post_thumbnail() ) { ?>
										<?php the_post_thumbnail('blog-small'); ?>
									<?php } else{ ?>
										<img src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
									<?php } ?>
								</a>
							</div>
							<div class="tab_list_content">
								<h2><a href="<?php echo get_permalink(); ?>"><?php the_title( ); ?></a></h2>
								<p><?php echo excerpt(22);?></p>
								<p class="panel">
									<?php echo __('by','mtcframework'); ?> <?php the_author_posts_link(); ?> - 
									<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
									<?php echo get_mtc_rating_sys('span',' - ',''); ?>
								</p>
									
							</div>
							</div><?php 
						endwhile;
						
						/* Reset Query */
						wp_reset_query();
						
						echo '</div>';
						$iterasi++;
					}
					?>
				</div><!-- END Tabs Content-->
			</div><!-- END Tabs--><?php 
		} 

	} 

} 
} 


if(!function_exists('mtc_news_tab')){
function mtc_news_tab(){
	global $smof_data;
	if($smof_data['switch_news_tab']){
		/* set data cate */
		$data_cat = array(
			$smof_data['news_tab_cat1'],
			$smof_data['news_tab_cat2'],
			$smof_data['news_tab_cat3'],
			$smof_data['news_tab_cat4'],
			$smof_data['news_tab_cat5'],
			$smof_data['news_tab_cat6'],
			$smof_data['news_tab_cat7'],
			$smof_data['news_tab_cat8']
		);
		
		foreach($data_cat as $key_cat=>$cat){
			if($cat=='none'){
				unset($data_cat[$key_cat]);
			}
		}
		
		if(!empty($data_cat)){
			?><!-- Tabs -->
			<div class="post_row">
				<ul class="nav nav-tabs news_tabs mb0">
					<?php 
						$tab_nav ='';
						$iterasi = 1;
						foreach($data_cat as $cat){
							$tab_nav .='<li '.(($iterasi==1) ? 'class="active"' : '' ).'><a data-toggle="tab" href="#tab-' .$cat. '">' .get_cat_name( $cat ). '</a></li>';
							$iterasi++; }
						
						echo $tab_nav; 
					?>
				</ul><!-- End Tab Nav -->
				
				<div class="tab-content news_tabs">
					<?php
					$iterasi = 1;
					foreach($data_cat as $cat){
						echo '<div class="tab-pane'.(($iterasi==1) ? ' active' : '' ).'" id="tab-' .$cat. '">';
						query_posts(array('showposts' => 4, 'cat' => $cat ));
						while (have_posts()) : the_post();  ?> 	
							<div class="tab_list">
								<div class="tab_list_thumb">
									<a href="<?php echo get_permalink(); ?>" title="<?php the_title( ); ?>" >
										<?php if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail('blog-small'); ?>
										<?php } else{ ?>
											<img src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
										<?php } ?>
									</a>
								</div>
								<div class="tab_list_content">
									<h2><a href="<?php echo get_permalink(); ?>"><?php the_title( ); ?></a></h2>
									<p><?php echo excerpt(22);?></p>
									<p class="panel">
										<?php echo __('by','mtcframework'); ?>  <?php the_author_posts_link(); ?> - 
										<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
										<?php echo get_mtc_rating_sys('span',' - ',''); ?>
									</p>	
								</div>
							</div><?php 
						endwhile;
						
						/* Reset Query */
						wp_reset_query();
						
						echo '</div>';
						$iterasi++;
					}
					?>
				</div><!-- END Tabs Content-->
			</div><!-- END Tabs--><?php 
		} 

	} 

} 
} 

