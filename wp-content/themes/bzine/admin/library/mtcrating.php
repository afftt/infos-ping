<?php

define('MTC_RATING_COOKIE_PREFIX',"mtcrate_");


if(!function_exists('mtc_is_rate')){
	function mtc_is_rate($postID){
		$cookie_name = MTC_RATING_COOKIE_PREFIX.$postID;
		
		if(isset($_COOKIE[$cookie_name])){ 
			return true;
		}
		else{ 
			return false;
		}
	}
}




/* Load js for sent ratting to server */
if(!function_exists('mtc_rating_scripts')){
	function mtc_rating_scripts(){
		if(is_single()){
			wp_enqueue_script( 'mtc-rating-sys', get_template_directory_uri() . '/js/mtc-rating-sys.js', array( 'jquery' ) ,'',true);

			// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
			$data_mtcRating = array('ajaxurl' => admin_url( 'admin-ajax.php' ));
			wp_localize_script( 'mtc-rating-sys', 'mtcRating', $data_mtcRating );
		}
	}
	add_action( 'wp_enqueue_scripts', 'mtc_rating_scripts' );
}




add_action('mtc_rating_form','mtc_rating_sys_form');
/* Function for show form ratting input */
if(!function_exists('mtc_rating_sys_form')){
function mtc_rating_sys_form(){
	global $post;
	$rate_count = 'mtc_rating_count';
	$rate_data 	= 'mtc_rating_data';
	
	$count 		= get_post_meta($post->ID, $rate_count, true);
	$val	 	= get_post_meta($post->ID, $rate_data, true);
	
	$rate = 0;
	
	if(!empty($count) && !empty($count)){
		$rate = ceil($val/$count);
	}
	
	$str = '';
	$str .='<div class="rating-loading"></div>';
	$str .='<div class="rating" data-post="' . $post->ID . '">';
	$str .='<span data-rate="0" class="star" style="display:none;"></span>';
	
		$ratec = 5;
		for($r=$ratec; $r>=1; $r--){
			$class = '';
			if($rate == $r ){
				/* $class = ' active'; */
			}
			$str .='<span data-rate="' . $r . '" class="star'.$class.'" title="Rate ' . $r . '"></span>';
		}

	$str .='</div>';
	echo $str;
}
}



/* Show review from author in post review is active */
if(!function_exists('mtc_show_review')){
	function mtc_show_review(){ 

		global $post;
		
		$rev_is_enable 	= rwmb_meta( 'mtc_review_is_enable', 'type=checkbox',$post->ID );
		
		if( 1 == $rev_is_enable) 
		{ 
			$cookie_name 	= MTC_RATING_COOKIE_PREFIX.$post->ID;

			
			$rev_header 	= rwmb_meta( 'mtc_review_header', 'type=text',$post->ID );
			$review_name 	= rwmb_meta( 'mtc_review_name', 'type=text',$post->ID );
			$review_item 	= rwmb_meta( 'mtc_review_item', 'type=text',$post->ID );
			$rev_summary 	= rwmb_meta( 'mtc_review_summary', 'type=text',$post->ID );
			$rev_footer 	= rwmb_meta( 'mtc_review_footer', 'type=text',$post->ID );
			$rev_score 		= rwmb_meta( 'mtc_review_score_title', 'type=text',$post->ID );
			$rev_score		= (int) $rev_score;
			
			$data_urt		= mtc_get_data_post_rating($post->ID);
			if(!empty($data_urt['val']) && !empty($data_urt['val'])) {
				$rate			= ($data_urt['val']/$data_urt['count']);
			}else{
				$rate			= 0;
			}
			
			
			$rev_name		= array();
			$rev_rate		= array();
			
			$show_review = false;
			$ratingCount = 0;
			for($i=1; $i <10; $i++){
				$data_rate 	= rwmb_meta( 'mtc_criteria_rate'. $i, 'type=text',$post->ID );
				if(!empty($data_rate)){
					$show_review = true;
					$ratingCount++;
					$rev_name[] = rwmb_meta( 'mtc_criteria_name'. $i, 'type=text',$post->ID );
					$rev_rate[] = (int) $data_rate;
				}
				
			}

			
			?>
			
			<?php if( true == $show_review) { ?>
			<div class="review_wrap" itemscope itemtype="http://schema.org/Review">
				
				<div class="hide" itemprop="reviewBody"><?php echo esc_html($rev_header); ?></div>
				<?php if(!empty($review_name)) { ?>
					<div class="hide name entry-title" itemprop="name"><?php echo $review_name; ?></div>
				<?php }  ?>
				
				<div class="hide entry-title"  itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing">
					<span itemprop="name"><?php echo $review_item; ?></span>
				</div>
				
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail('thumbnail' , array( 'class'	=> "hide", 'itemprop'=> 'image')); ?>
				<?php }  ?>
				
				
				<div class="hide updated"><?php the_time('Y-m-j'); ?></div>
				<div class="hide"  itemprop="author" itemscope itemtype="http://schema.org/Person"><strong  itemprop="name"><?php the_author(); ?></strong></div>
				<meta itemprop="datePublished" content="<?php the_time('Y-m-j'); ?>" />
				
				<div class="mtc-box-review" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
					<meta content="1" itemprop="worstRating" />
					<meta content="100" itemprop="bestRating" />
					
					<div>
						<h2 class="review-header"><?php echo esc_html($rev_header); ?></h2>
						<div class="review-body">
							<div class="review-item review-summary">
								<div class="summary-item" ><?php echo esc_html($rev_summary); ?></div>
								<div class="summary-score"><?php echo esc_html($rev_score); ?>%</div>
							</div>
						</div>
					</div>
					<span class="hide" itemprop="description"><?php echo esc_html($rev_summary); ?></span>
					
					<div class="review-body">
						<?php 
						$ratingVal = 0;
						
						foreach($rev_name as $key_rev => $name){ 
							if(!empty($name)){ 
							}
							$ratingVal = $ratingVal + $rev_rate[$key_rev];
							?>
							<div class="review-item">
								<div class="progress">
									<div class="bar" style="width: <?php echo $rev_rate[$key_rev]; ?>%;">
										<?php echo esc_html($name.' '.$rev_rate[$key_rev]); ?> %
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					
					<?php $ratingValue = ceil($ratingVal/$ratingCount);?>
					<span  class="hide" itemprop="ratingValue"><?php echo $ratingValue; ?></span>
					
					<?php if(!empty($rev_footer)) { ?>
						<div class="review-footer"><?php echo esc_html($rev_footer); ?></div>
					<?php } ?>
					<div class="box-user-rate">
						<div class="user-rate-text" data-count-rate="<?php echo esc_html($data_urt['count']);?>">
							<span id="user-rating">
								<strong><?php echo __('User Rating :','mtcframework'); ?></strong> <?php echo round($rate,2); ?> 
								( <small class="count"><?php echo esc_html($data_urt['count']);?></small><?php echo __(' votes','mtcframework'); ?>)
								<?php  
									if(mtc_is_rate($post->ID)){ 
										echo '<small>Your Rate : '.$_COOKIE[$cookie_name] . '</small>';
									}
									?>
							</span> 
							<span id="your-rating">
								<strong><?php echo __('Your Rating :','mtcframework'); ?> </strong> <small class="will-rate">0</small>
								( <small class="count"><?php echo esc_html($data_urt['count']);?></small> <?php echo __(' votes','mtcframework'); ?>)
							</span>
						</div>
						
						<div class="user-rate-form">
							<?php 
							if(mtc_is_rate($post->ID)){  
								do_action('mtc_rating'); 
							}else{
								do_action('mtc_rating_form'); 
							}
							?>
						</div>
					</div>
				</div><span class="hide" itemprop="reviewRating"><?php echo esc_html($rev_score); ?></span>
			</div><!-- end Review -->
			<?php } ?>
			<?php 
		}
	}
	add_action('bzine_after_content','mtc_show_review');
}




/* Show rating star  */
if(!function_exists('get_mtc_rating_sys')){
	function get_mtc_rating_sys($container='span',$before='',$after=''){
		global $post;
		$rev_is_enable 	= rwmb_meta( 'mtc_review_is_enable', 'type=checkbox',$post->ID );
		
		if( 1 == $rev_is_enable) 
		{ 
			switch($container){
				default:
					$rating_wrap = 'span';
				break;
				case"div":
					$rating_wrap = 'div';
				break;
			}
			
			$rate_count = 'mtc_rating_count';
			$rate_data 	= 'mtc_rating_data';
			
			$count 		= get_post_meta($post->ID, $rate_count, true);
			$val	 	= get_post_meta($post->ID, $rate_data, true);
			
			$rate = 0;
			if(!empty($count) && !empty($count)){
				$rate = ceil($val/$count);
			}
			$str = $before.'<'.$rating_wrap.' class="rating-view" data-post="' . $post->ID . '">';
			$str .='<span data-rate="0" class="star" style="display:none;"></span>';
			
				$ratec = 5;
				for($r=$ratec; $r>=1; $r--){
					$class = '';
					if($rate == $r ){
						$class = ' active';
					}
					$str .='<span data-rate="' . $r . '" class="star'.$class.'" title="Rate ' . $r . '"></span>';
				}
			$str .= '</'.$rating_wrap.'>';
			$str .= $after;
			return $str;
		}
		return '';
	}
}



/* same with  get_mtc_rating_sys(), but this function will default echo value */
if(!function_exists('mtc_rating_sys')){
	function mtc_rating_sys(){ 
		$vv =  get_mtc_rating_sys();
		echo $vv;
	}
	add_action('mtc_rating','mtc_rating_sys');
}



/* this function for get data ratting from  post */
if(!function_exists('mtc_get_data_post_rating')){
	function mtc_get_data_post_rating($postID = false){
		if(!$postID)
			return false;
			
		$rate_count = 'mtc_rating_count';
		$rate_data 	= 'mtc_rating_data';
		
		$count 		= get_post_meta($postID, $rate_count, true);
		$rate_val 	= get_post_meta($postID, $rate_data, true);
		$result =  array(
			'count' => $count,
			'val' 	=> $rate_val
		);
		return $result;
	}
}






/* = Handle Rating
***************************************************************************/
add_action( 'wp_ajax_nopriv_mtc-rating-sys', 'mtc_handle_rating_sys' );
add_action( 'wp_ajax_mtc-rating-sys', 'mtc_handle_rating_sys' );



/* Set rating post */
if(!function_exists('mtc_set_rating')){
	function mtc_set_rating($postID,$rate) {
		$rate_count = 'mtc_rating_count';
		$rate_data 	= 'mtc_rating_data';
		$rate_average= 'mtc_rating_average';
		
		$count = get_post_meta($postID, $rate_count, true);
		if( empty( $count ) ) {
			$count = 1;
		}else{
			$count++;
		}
		
		$rate_val = get_post_meta($postID, $rate_data, true);
		if( empty( $rate_val ) ) {
			$rate_val = $rate;
		}else{
		   $rate_val = $rate_val + $rate;
		}
		
		$average = $rate_val/$count;
		
		update_post_meta($postID, $rate_count, $count);
		update_post_meta($postID, $rate_data, $rate_val);
		update_post_meta($postID, $rate_average, $average);
	}
}


/*  
	Handle ratting input from.
	From mtc_rating_scripts() recuest
*/
if(!function_exists('mtc_handle_rating_sys')){
	function mtc_handle_rating_sys(){
		$result = array(
			'status' => '0',
			'message' => ''
		);
		
		$postID = $_POST['post'];
		$rate 	= $_POST['rate'];
		
		
		if( true == mtc_is_rate($postID)){
			$result['message'] 	= 'Oops you\'ve ever fill this poll';
			echo json_encode($result);
			exit;
		}
		
		$cookie_name = MTC_RATING_COOKIE_PREFIX.$postID;
		setcookie($cookie_name, $rate, time() + 3600 ,  COOKIEPATH, COOKIE_DOMAIN, false);
		
		mtc_set_rating($postID,$rate);
		
		$rate_count = 'mtc_rating_count';
		$rate_data 	= 'mtc_rating_data';
		
		$count 		= get_post_meta($postID, $rate_count, true);
		$val	 	= get_post_meta($postID, $rate_data, true);
		
		$result['status'] 	= 1;
		$result['count'] 	= $count;
		$result['val'] 		= $val;
		$result['rate'] 	= $rate;
		
		echo json_encode($result);
		exit;
	}

}
