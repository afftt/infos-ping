<?php 
/*
	Template name: Home - Standard
*/


get_header(); ?>
<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="main">
					<?php

					/* Load Slideshow */
					if($smof_data['switch_slider']){
						get_template_part('slider');
					}
					
					/* Load Scroll Box */
					if($smof_data['switch_scrolling_box']){
						$args = array(
							'style'		=> $smof_data['scrolling_box_style'], 
							'per_page'	=> $smof_data['scrolling_box_count'], 
							'title'		=> $smof_data['scrolling_box_title']
						);
						mtc_scrolling_box($args); 
					}


					/*-----------------------------------------------------*/



					/*-----------------------------------------------------*/
					/* Load News Box */					
					mtc_news_boxs(); 

				
					/* Load News Tabs */	
					mtc_news_tab(); 
									
					/* Load News in Picture */
					mtc_news_in_picture();
					
					?>		
				</div><!-- end main -->				
				
				<?php get_template_part('sidebar');?>
					
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>