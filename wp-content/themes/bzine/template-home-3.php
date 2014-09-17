<?php 
/*
	Template name: Home - Diagonal
*/


get_header(); ?>
<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<?php 
					/* Load Slideshow */
					if($smof_data['switch_slider']){
						get_template_part('slider3');
					}
				
				?>
				<div class="main">
					<?php

					/* Load Scroll Box */
					if($smof_data['switch_scrolling_box']){
						$args = array(
							'style'		=> $smof_data['scrolling_box_style'], 
							'per_page'	=> $smof_data['scrolling_box_count'], 
							'title'		=> $smof_data['scrolling_box_title']
						);
						mtc_scrolling_box_v3($args); 
					}
					
					/* Load News Box v3*/					
					mtc_news_boxs_v3(); 
					
					/* Load News Tabs */	
					mtc_news_tab_v3(); 
					
					
					mtc_news_in_picture_v3();
					
					
					
					?>
				</div><!-- end main -->				
				
				<?php get_template_part('sidebar');?>
					
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>