<div class="slider">
<?php 
	global $post;
	global $smof_data;
	$carousel = $caption = '';
	$s = 1;
	
	$args_slider = array(	
		'posts_per_page'	=> $smof_data['slider_count'], 
		'post_type' 		=> 'post',
		'order'				=> 'DESC', 
		'orderby' 			=> 'post_date',
		'ignore_sticky_posts' => 1
	);
	
	$content_slider = $smof_data['slider_content'];
					
	if('latest' == $content_slider['content']){
	
	}
	else if('category' == $content_slider['content']){
		$args_slider['cat'] = $content_slider['category'];
		
	}
	
	else if('tag' == $content_slider['content']){
		$args_slider['tag'] = $content_slider['tag'];
	}
					
	query_posts($args_slider);
	
	global $post;
	while (have_posts()) : the_post();
		
		$title 		= get_the_title();
		$excerpt 	= get_the_excerpt();
		
		if ( has_post_thumbnail() ) {
			 $carousel .= get_the_post_thumbnail($post->ID, 'blog-thumb');
		}
		else{
			$image 		= get_template_directory_uri().'/img/default_slide.jpg';
			$carousel .='<img src="'.$image .'"   alt="slide_'. $s .'"  />';
		}
				
		$caption.='<div class="caption slide_'. $s .'">';
			$caption.='<h3><a href="'.get_permalink().'">'.$title.'</a></h3>';
			$caption.='<p>'. $excerpt .'</p>';
		$caption.='</div>';
		
	$s++;
	endwhile; 
	wp_reset_query();
	
	
	
	?>
	<div id="carousel">
		<div><?php echo $carousel; ?></div>
	</div>
	<div id="timer"></div>
	<div id="captions">
		<div class="list_c"><?php echo $caption;?></div>
	</div>
	<div class="pager-nav">
		<a href="#" class="nav-prev"><i class="icon-angle-left"></i></a>
		<a href="#" class="nav-next"><i class="icon-angle-right"></i></a>
	</div>
</div><!-- END slider-->