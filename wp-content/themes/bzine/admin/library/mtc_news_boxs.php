<?php 
if(!function_exists('mtc_news_boxs_shortcode')){
	function mtc_news_boxs_shortcode($args) {
		$sc =  ($args['shortcode'])?($args['shortcode']):'';
		$sccap =  ($args['sccap'])?($args['sccap']):'shortcode';
		?>
		<div class="post_row clearfix block_news mb0">
			<h2 class="ribbon ribbon-green"><?php echo $sccap;?></h2>
			<div class="row-fluid">
				<div class="span12">
					<div class="list-more">
							<?php echo do_shortcode($sc); ?>
					</div>
				</div>
			</div>
		</div>
		<?php 
		
	}
}
if(!function_exists('mtc_news_boxs_v3_shortcode')){
	function mtc_news_boxs_v3_shortcode($args) {
		$sc =  ($args['shortcode'])?($args['shortcode']):'';
		$sccap =  ($args['sccap'])?($args['sccap']):'shortcode';
		?>
		<div class="post_row clearfix block_news mb0">
			<h2 class="ribbon-v3"><span><?php echo $sccap;?></span></h2>
			<div class="row-fluid">
				<div class="span12">
					<div class="box-list-v3">
							<?php echo do_shortcode($sc); ?>
					</div>
				</div>
			</div>
		</div>
		<?php 
	}
}

if(!function_exists('mtc_news_boxs_feed')){
	function mtc_news_boxs_feed($args) { 
		 $url = ($args['feed'])?($args['feed']):'https://news.google.com/?output=rss';
		 $cap = ($args['cap'])?($args['cap']):'feed';
		include_once( ABSPATH . WPINC . '/feed.php' );
		$rss = fetch_feed($url);
		//var_dump($rss);
		if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly
			// Figure out how many total items there are, but limit it to 5. 
			$maxitems = $rss->get_item_quantity( 12 ); 
			// Build an array of all the items, starting with element 0 (first element).
			$rss_items = $rss->get_items( 0, $maxitems );
		endif;
			?>

			
		<div class="post_row clearfix block_news mb0">
		<h2 class="ribbon ribbon-green"><?php echo $cap;?></h2>
			<div class="row-fluid">
				<?php if ( $maxitems == 0 ) : ?>
					<?php _e( 'No items', 'mtcframework' ); ?>
				<?php else : ?>
				<?php // Loop through each feed item and display each item as a hyperlink. ?>
				
				<?php 
				$juduls = array();
				$rsslink = array();
				$rssnum = count($rss_items);
				$halfrss = $rssnum /2;
				
				foreach ( $rss_items as $item ) : 
					$juduls[] = $item->get_title();
					$rsslink[] =  $item->get_permalink();
				endforeach; 
					//var_dump($juduls);
					if ($rssnum >= 1){
					$i=0;
				?>
				<div class="span6">
					<div class="list-more">
					<ul>
					<?php 
					for($i=0; $i < $halfrss; $i++){
					?>
						<li>
							<a href="<?php echo esc_url( $rsslink[$i] ); ?>"
								title="<?php //printf( __( 'Posted %s', 'mtcframework' ), $item->get_date('j F Y | g:i a') ); ?>">
								<?php echo esc_html( $juduls[$i] ); ?>
							</a>
							<p><?php //esc_html( $item->get_description());?></p>
						</li>
								<?php }?>
					</ul>
					</div>
				</div>
				<div class="span6">
					<div class="list-more">
						<ul>
							<?php for($i > $halfrss; $i < $rssnum; $i++){								?>
								<li>
									<a href="<?php echo esc_url( $rsslink[$i] ); ?>"
										title="<?php //printf( __( 'Posted %s', 'mtcframework' ), $item->get_date('j F Y | g:i a') ); ?>">
										<?php echo esc_html( $juduls[$i] ); ?>
									</a>
									<p><?php //esc_html( $item->get_description());?></p>
								</li>
								<?php }?>
						</ul>
					</div>
				</div>
				
					<?php } ?>
			<?php endif; ?>
			</div>
		</div>
		
		<?php 
		
	}
}

if(!function_exists('mtc_news_boxs_v3_feed')){
	function mtc_news_boxs_v3_feed($args) { 
		 $url = ($args['feed'])?($args['feed']):'https://news.google.com/?output=rss';
		 $cap = ($args['cap'])?($args['cap']):'feed';
		include_once( ABSPATH . WPINC . '/feed.php' );
		$rss = fetch_feed($url);
		//var_dump($rss);
		if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly
			// Figure out how many total items there are, but limit it to 5. 
			$maxitems = $rss->get_item_quantity( 12 ); 
			// Build an array of all the items, starting with element 0 (first element).
			$rss_items = $rss->get_items( 0, $maxitems );
		endif;
			?>

			
		<div class="post_row clearfix block_news mb0">
		<h2 class="ribbon-v3"><span><?php echo $cap;?></span></h2>
			<div class="row-fluid">
				<?php if ( $maxitems == 0 ) : ?>
					<?php _e( 'No items', 'mtcframework' ); ?>
				<?php else : ?>
				<?php // Loop through each feed item and display each item as a hyperlink. ?>
				
				<?php 
				$juduls = array();
				$rsslink = array();
				$rssnum = count($rss_items);
				$halfrss = $rssnum /2;
				
				foreach ( $rss_items as $item ) : 
					$juduls[] = $item->get_title();
					$rsslink[] =  $item->get_permalink();
				endforeach; 
					//var_dump($juduls);
					if ($rssnum >= 1){
					$i=0;
				?>
				<div class="span6">
					<div class="list-more">
					<ul>
					<?php 
					for($i=0; $i < $halfrss; $i++){
					?>
						<li>
							<a href="<?php echo esc_url( $rsslink[$i] ); ?>"
								title="<?php //printf( __( 'Posted %s', 'mtcframework' ), $item->get_date('j F Y | g:i a') ); ?>">
								<?php echo esc_html( $juduls[$i] ); ?>
							</a>
							<p><?php //esc_html( $item->get_description());?></p>
						</li>
								<?php }?>
					</ul>
					</div>
				</div>
				<div class="span6">
					<div class="list-more">
						<ul>
							<?php for($i > $halfrss; $i < $rssnum; $i++){								?>
								<li>
									<a href="<?php echo esc_url( $rsslink[$i] ); ?>"
										title="<?php //printf( __( 'Posted %s', 'mtcframework' ), $item->get_date('j F Y | g:i a') ); ?>">
										<?php echo esc_html( $juduls[$i] ); ?>
									</a>
									<p><?php //esc_html( $item->get_description());?></p>
								</li>
								<?php }?>
						</ul>
					</div>
				</div>
				
					<?php } ?>
			<?php endif; ?>
			</div>
		</div>
		
		<?php 
		
	}
}

if(!function_exists('mtc_news_boxs_list')){
function mtc_news_boxs_list($args) { 
	/* set data cate */
	$data_cat = $args['list'];
	foreach($data_cat as $key_cat=>$cat){
		if($cat=='none'){
			unset($data_cat[$key_cat]);
		}
	}
	
	if(!empty($data_cat)){ ?>
		<div class="wrapper _content">
		<div class="container">
		<div class="row-fluid">
		<?php 
		
		$count_box = count($data_cat);
		$iterasi = 0;
			if(!empty($data_cat)){	
		foreach($data_cat as $key_cat=>$cat_id){ ?>
			<div class="main">
				<h2 class="ribbon ribbon-green">Les dernières actualités</h2><?php 
				
				$num_box 	= 1;
				$more_list 	= '';
				
				query_posts(array('showposts' => 15,  'cat' => $cat_id,'post_status' => 'publish' ));

				while (have_posts()) : the_post(); 
/* ---------------------------------Affichage spécial - style cat en home page --------------------------------------------------*/
				?>
					
					<div <?php post_class('list_post'); ?>>
						<div class="list_post_thumb">
							<a href="<?php echo get_permalink(); ?>" title="<?php the_title( ); ?>" >
							
							<?php if ( has_post_thumbnail() ) { ?>
								<?php the_post_thumbnail('blog-small'); ?>
							<?php } else{ ?>
								<img src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
							<?php } ?>
							</a>
						</div>
						<div class="list_post_content">
							<h2>
								<a href="<?php echo get_permalink(); ?>"><?php the_title( ); ?></a>
							</h2>
							<?php the_excerpt();?>
						<p class="panel">
							<?php //comments_popup_link('0 Comments ', '1 Comment', '% Comments'); ?> 
							<?php// echo mtc_get_postmeta_views($post->ID) . ' ' . __('Vue(s)','mtcframework'); ?> 
						<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
							<?php echo get_mtc_rating_sys('span',' / ',''); ?>
						</p>
			
					</div>
					<div class="spacer"></div>
				</div>
					
					<?php 
/* --------------------------------------------------------------END --------------------------------------------------------------*/
					$num_box ++;
				endwhile;
			}
		}
					
				/* Reset Query */
				wp_reset_query(); ?>
				</ul>
					<div class="clearfix"></div>
					<div class="list-more">
					<ul><?php echo $more_list; ?></ul>
				</div>
			</div> <?php
			
			
			$count_box--; 
			
			if($iterasi==1){
				$iterasi = 0;
				if(1<=$count_box){
					echo '</div><div class="row-fluid">'; }
				
			} else{
				$iterasi++;
			}
		
		
		?>
		</div>
		</div>
		</div><?php 
	}
	
} /* end mtc_news_boxs_list() */
}


if(!function_exists('mtc_news_boxs_v3_list')){
function mtc_news_boxs_v3_list($args) { 
	/* set data cate */
	$data_cat = $args['list'];
	foreach($data_cat as $key_cat=>$cat){
		if($cat=='none'){
			unset($data_cat[$key_cat]);
		}
	}
	
	if(!empty($data_cat)){ 
		$count_box = count($data_cat);
		$iterasi = 0;
		foreach($data_cat as $cat){
	?>
	
	<h2 class="ribbon-v3"><span><?php echo get_cat_name( $cat ); ?></span></h2>
	<section id="latest-1">
	<?php
	query_posts(array('showposts' => 5, 'cat' => $cat,'post_status' => 'publish' ));
	while (have_posts()) : the_post();  ?> 	
		<article class="list-v1">
		<div class="thumb-v1">
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title( ); ?>" >
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail('blog-small'); ?>
				<?php } else{ ?>
					<img  class="respon" src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
				<?php } ?>
			</a>
		</div>
		<div class="content-v1">
			<h2><a href="<?php echo get_permalink(); ?>"><?php the_title( ); ?></a></h2>
			<div class="panel-v">
				<ul>
					<li><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a></li>
					<li class="link-author"><?php the_author_posts_link(); ?></li>
					<?php echo get_mtc_rating_sys('span','<li>','</li>'); ?>
				</ul>	
			</div>
			
			<p><?php echo excerpt(25);?></p>
		</div>
		</article>
		
		<?php 
	endwhile;
	
	/* Reset Query */
	wp_reset_query();
	?>
	</section>
	
	
	<?php }
	
	}
}
}

	
	
if(!function_exists('mtc_news_boxs_block')){
function mtc_news_boxs_block($args){
	/* set data cate */
	$data_cat = $args['block'];
	
	foreach($data_cat as $key_cat=>$cat){
		if($cat=='none'){
			unset($data_cat[$key_cat]);
		}
	}
	if(!empty($data_cat)){	
		foreach($data_cat as $key_cat=>$cat_id){ ?>
		<div class="post_row mb20 clearfix">
			<h2 class="ribbon ribbon-green"><?php echo get_cat_name( $cat_id ); ?></h2>
			<div class="box_list box_list1">
				<?php 
				$no = 1;
				$list_more = '';
				global $post;
				query_posts(array('showposts' => 6, 'cat' => $cat_id,'post_status' => 'publish' ));
				while (have_posts()) : the_post();
					if($no==1) { ?> 	
					<div class="list_home mr0">
							<div class="list_home_thumb">
								<a href="<?php echo get_permalink(); ?>" title="<?php the_title( ); ?>" >
									<?php if ( has_post_thumbnail() ) { ?>
									<?php the_post_thumbnail('blog-thumb'); ?>
									<?php } else{ ?>
									<img src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
									<?php } ?>
								</a>
								<!--<div class="list_home_meta">
									<span class="tags">
										<i class="icon-tag"></i> <?php  the_tags('',', ',''); ?>
									</span>
									<span class="count_comments">
										<i class="icon-comments"></i> <a href="<?php comments_link();?>"><?php comments_number( '0', '1', '%' ); ?></a>
									</span>
								</div>-->
							</div>
						<div class="list_home_content">
							<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p class="author">
								<?php // echo __( 'by ', 'mtcframework' ); the_author_posts_link(); ?>  
								<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
							</p>
							<p><?php echo excerpt(45); ?></p>
						</div>	
					</div>
					<?php 
					} else{
						$list_more .='<li>';
						$list_more .='<div class="item">';
							$list_more .='<div class="newsImg pull-left"><a href="'.get_permalink().'" title="'.get_the_title( ).'" >'. get_the_post_thumbnail($post->ID,'thumbnail') .'</a></div>';
							$list_more .='<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
						
						$list_more .='<p class="author">';
							$list_more .= __( 'by ', 'mtcframework' );
							$list_more .= '<a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'">' . get_the_author_meta('display_name') . '</a> - ';
							$list_more .= '<a href="'.get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')).'">'.get_the_time(get_option('date_format')).'</a>';
						$list_more .='</p>';
						$list_more .='</div>';
						$list_more .='<p>'.excerpt(15).'</p>';
						$list_more .='</li>';
					}
					$no++;
				endwhile;
				wp_reset_query(); ?>
				<div class="box_list1_more">
				<ul class="list-mini">
					<?php echo $list_more; ?>
					
				</ul>
				</div>
			</div>
		</div>
		<?php
		} 
	}
}  
/* END mtc_news_boxs_block() */
}

if(!function_exists('mtc_news_boxs_v3_block')){
function mtc_news_boxs_v3_block($args){
	/* set data cate */
	$data_cat = $args['block'];
	
	foreach($data_cat as $key_cat=>$cat){
		if($cat=='none'){
			unset($data_cat[$key_cat]);
		}
	}
	if(!empty($data_cat)){	
		foreach($data_cat as $key_cat=>$cat_id){ ?>
		<h2 class="ribbon-v3"><span><?php echo get_cat_name( $cat_id ); ?></span></h2>
			
		<section id="latest-3">
			<div class="box-list-v3">
			<?php 
			$no = 1;
			$list_more = '';
			global $post;
			query_posts(array('showposts' => 6, 'cat' => $cat_id,'post_status' => 'publish' ));
			while (have_posts()) : the_post();
				if($no==1) { ?> 	
					<div class="list-v3-large news-50">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail('blog-thumb'); ?>
						<?php } else{ ?>
							<img class="respon" src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
						<?php } ?>
						<div class="overlay"></div>
						<div class="content-v3">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<span class="line">&nbsp;</span>
							<div class="panel-v">
								<ul>
									<li><i class="icon-time"></i> <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time('M y'); ?></a></li>
									<!--<li><?php the_author_posts_link(); ?></li>-->
									<?php echo get_mtc_rating_sys('span','<li>','</li>'); ?>
								</ul>	
							</div>
						</div>		
					</div>
				<?php 
				} else{
						$list_more .='<article class="list-v3-small">
							<div class="thumb-v3"><a href="'.get_permalink().'" title="'.get_the_title().'" >
								'. get_the_post_thumbnail($post->ID,'thumbnail') .'
							</a></div>
							<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
							<div class="panel-v">
								<ul>
									<li><i class="icon-time"></i> <a href="'.get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')).'">'.get_the_time(get_option('date_format')).'</a></li>
									<!--<li><a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'">' . get_the_author_meta('display_name') . '</a></li>-->
									'. get_mtc_rating_sys('span',' <li> ','</li>').'
									
								</ul>	
							</div>
						</article>';
							
							
					
				}
				$no++;
			endwhile;
			wp_reset_query(); ?>
			<div class="box-list-v3-small news-50">
				<?php echo $list_more; ?>
			</div>
			<div class="clearfix"></div>
			</div>
		</section>
		
		<?php
		} 
	}
}  
/* END mtc_news_boxs_block() */
}



if(!function_exists('mtc_news_boxs')){
function mtc_news_boxs() { 
	global $smof_data;
	
	
	
	/* news box 1 */
	if($smof_data['switch_news_box1']){
		$args 	= $smof_data['news_box_1'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 2 */
	if($smof_data['switch_news_box2']){
		$args 	= $smof_data['news_box_2'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 3 */
	if($smof_data['switch_news_box3']){
		$args 	= $smof_data['news_box_3'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 4 */
	if($smof_data['switch_news_box4']){
		$args 	= $smof_data['news_box_4'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 5 */
	if($smof_data['switch_news_box5']){
		$args 	= $smof_data['news_box_5'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 6 */
	if($smof_data['switch_news_box6']){
		$args 	= $smof_data['news_box_6'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func	= 'mtc_news_boxs_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 7 */
	if($smof_data['switch_news_box7']){
		$args 	= $smof_data['news_box_7'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 8 */
	if($smof_data['switch_news_box8']){
		$args 	= $smof_data['news_box_8'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}	
} 

}



if(!function_exists('mtc_news_boxs_v3')){
function mtc_news_boxs_v3() { 
	global $smof_data;
	
	
	
	/* news box 1 */
	if($smof_data['switch_news_box1']){
		$args 	= $smof_data['news_box_1'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		
		$func 	= 'mtc_news_boxs_v3_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 2 */
	if($smof_data['switch_news_box2']){
		$args 	= $smof_data['news_box_2'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_v3_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 3 */
	if($smof_data['switch_news_box3']){
		$args 	= $smof_data['news_box_3'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_v3_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 4 */
	if($smof_data['switch_news_box4']){
		$args 	= $smof_data['news_box_4'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_v3_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 5 */
	if($smof_data['switch_news_box5']){
		$args 	= $smof_data['news_box_5'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_v3_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 6 */
	if($smof_data['switch_news_box6']){
		$args 	= $smof_data['news_box_6'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func	= 'mtc_news_boxs_v3_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 7 */
	if($smof_data['switch_news_box7']){
		$args 	= $smof_data['news_box_7'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_v3_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}
	
	/* news box 8 */
	if($smof_data['switch_news_box8']){
		$args 	= $smof_data['news_box_8'];
		$style 	= (isset($args['op'])) ? $args['op'] : 'list';
		$func 	= 'mtc_news_boxs_v3_'.$style;
		
		if(function_exists($func)){
			call_user_func($func, $args); }
	}	
} 

}