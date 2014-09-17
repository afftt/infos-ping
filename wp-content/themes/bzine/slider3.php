<div class="slider3">
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
		$excerpt 	= excerpt(20);
		
		if ( has_post_thumbnail() ) {
			$carousel .= get_the_post_thumbnail($post->ID, 'slider-big');
		}
		else{
			$image 		= get_template_directory_uri().'/img/default_slidefixed.jpg';
			$carousel .='<img src="'.$image .'"   alt="slide_'. $s .'"  />';
		}
		$single_cate = single_category_post($post);	
		$caption.='<div class="caption slide_'. $s .'">';
			if(!empty($single_cate)){
				/* $caption.='<div class="cate">'.$single_cate.'</div>'; */
			}
			
			$caption.='<h3><a href="'.get_permalink().'" title="'.$title.'">'.$title.'</a></h3>';
			$caption.='<p>'. $excerpt .'<br /><br /><a href="'.get_permalink().'" class="btn btn-success btn-large">'.__('Read More','mtcframework').'</a></p>';
		$caption.='</div>';
		
	$s++;
	endwhile; 
	wp_reset_query();
	
	
	
	?>
	<div id="carousel-3">
		<div class="moouse"><?php echo $carousel; ?></div>
	</div>
	<div class="slider3-overlay"></div>
	
	<div id="captions-3">
		<div class="list_c"><?php echo $caption;?></div>
	</div>
	<div class="pager-nav">
		<a href="#" class="nav-prev"><i class="icon-angle-left"></i></a>
		<a href="#" class="nav-next"><i class="icon-angle-right"></i></a>
	</div>
</div><!-- END slider-->

<div class="more-slider">
	<ul class="foo2">
		<?php 
		$args_slider = array(	
			'posts_per_page'	=> 12, 
			'post_type' 		=> 'post',
			'order'				=> 'DESC', 
			'orderby' 			=> 'post_date',
			'ignore_sticky_posts' => 1
		);
		
		query_posts($args_slider);
	
		global $post;
		while (have_posts()) : the_post();
			if ( has_post_thumbnail() ) {
				$carousel = get_the_post_thumbnail($post->ID, 'blog-small');
			}
			else{
				$image 		= get_template_directory_uri().'/img/default_slide.jpg';
				$carousel ='<img src="'.$image .'"   alt="slide_'. $s .'"  />';
			}
			$single_cate = single_category_post($post);	
		?>
		<li>
			<div class="overlay"></div>
			<!--<div class="more-cate"><?php echo $single_cate;?></div>-->
			<div class="more-content">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<span class="line">&nbsp;</span>
				<div class="meta">
					<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
					<?php echo get_mtc_rating_sys('span',' &nbsp;&nbsp; ',''); ?>
					
				</div>
			</div>
			<?php echo $carousel; ?>
		</li>
		<?php 
		endwhile; 
		wp_reset_query();
		?>
	</ul>
	<div class="clearfix"></div>
	<a class="prev" id="foo2_prev" href="#"><i class="icon-angle-left"></i></a>
	<a class="next" id="foo2_next" href="#"><i class="icon-angle-right"></i></a>
</div>