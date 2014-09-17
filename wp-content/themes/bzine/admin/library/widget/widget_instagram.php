<?php
/* 
	5:27 PM 7/8/2013
*/ 

// fix SSL request error
add_action( 'http_request_args', 'no_ssl_http_request_args', 10, 2 );
function no_ssl_http_request_args( $args, $url ) {
	$args['sslverify'] = false;
	return $args;
}

// define shortcode
function mtc_instagram_widget_get_data($limit) {

	$str    = '';
	$easy 	= new Easy_Instagram;
	
	$access_token 	= $easy->get_access_token();
	$easy_setting 	= $easy->get_instagram_settings();
	$easy_user_data = $easy->get_instagram_user_data();
	
	$client_id 			= $easy_setting[0];
	$current_user_id 	= $easy_user_data[1];
	
	if(false == $current_user_id){
		mtc_instagram_message();
	}
	
	
	
	else {
	
		$data_user = wp_remote_get('https://api.instagram.com/v1/users/'.$current_user_id.'/?access_token='.$access_token);
		if ( !is_wp_error( $data_user ) ) {
			
			$data_user    = json_decode( $data_user['body'] );
			if(200 == $data_user->meta->code){
			
				$str.='
				<div class="mtc_box_instagram_profile">
					<img src="'.$data_user->data->profile_picture.'" alt="" />
					<div class="instagram_user_data">
						<div class="mtc_instg media"><b>'.$data_user->data->counts->media.'</b> <br />Photos</div>
						<div class="mtc_instg followed_by"><b>'.$data_user->data->counts->followed_by.'</b> <br />followers</div>
						<div class="mtc_instg follows"><b>'.$data_user->data->counts->follows.'</b> <br />following</div>
					</div>
				</div>';
				
				$result = wp_remote_get( "https://api.instagram.com/v1/users/".$current_user_id."/media/recent/?client_id=".$client_id."&count=".$limit );
			
			
				if ( is_wp_error( $result ) ) {
					// error handling
					$error_message = $result->get_error_message();
					$str           .= '<div class="alert alert-block" style="margin:20px">';
					$str           .= '</p>Something went wrong : '. $error_message .'</p>';
					$str           .= '</div>';
				} 
				
				else {
					// processing further
					$result    = json_decode( $result['body'] );
					
					$str .= '<div class="carousel slide" id="mtc-instagram">';
					$str .= '<ul class="carousel-inner">';
					foreach ( $result->data as $key=>$data ) {
						$c_class = ($key==0) ? ' active' :'';
						$str .= '<li class="item'.$c_class.'">
							<a target="_blank" href="http://instagram.com/'.$data->user->username.'">
								<img src="'.$data->images->standard_resolution->url.'" alt="'.$data->user->username.' pictures">
							</a>
							<div class="carousel-caption">
								<div class="instagram-comments"><i class="icon-comment"></i>  ' .$data->comments->count. '</div>
								<div class="instagram-likes text-right"><i class="icon-heart"></i>  ' .$data->likes->count. '</div>
								 
								
							</div>
						</li>';	
					}
					
					$str .= '</ul>
						<a class="carousel-control left" href="#mtc-instagram" data-slide="prev"><i class="icon-angle-left"></i></a>
						<a class="carousel-control right" href="#mtc-instagram" data-slide="next"><i class="icon-angle-right"></i></a>';
					$str .= '</div>';
				}
				echo  $str;
			}
			else {
			
				mtc_instagram_message();
				
			}
		}
	}
}


function mtc_instagram_message(){
	?>
	<div class="alert alert-block">
		<p><b>Oops! Something went wrong.</b></p>
		<p><small>Please check your instagram account setting, Go to Settings &rarr; Easy Instagram and complete the form, or read guide in tab help</small></p>
	</div>
	<?php
}

class mtc_instagram_widget extends WP_Widget {

    function mtc_instagram_widget() {
		# Constructor
		$widget_ops = array( 'classname' => 'mtc_instagram_widget', 'description' => __( 'Widget for Show instagram media.' ,'mtcframework') );
		$this->WP_Widget( 'mtc-instagram-widget', __( 'MTC : Instagram' ,'mtcframework'), $widget_ops );
	} 	# end of function mtc_instagram_widget()
    

    function widget($args, $instance) {
		global $smof_data;
		
		// prints the widget
		extract( $args, EXTR_SKIP );
		
		
		$title 		= apply_filters( 'widget_title', $instance['title'] );
		$limit 	= (!empty($instance['limit'])) ? esc_attr($instance['limit']) : 4 ;
			
		echo $before_widget;
		
		if ( isset($title) && !empty($title) ) echo $before_title . $title . $after_title; 
			
		mtc_instagram_widget_get_data($limit);

		echo $after_widget;
    }

	
	
	
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['limit'] 		= strip_tags($new_instance['limit']);
        return $instance; 

    }

    function form($instance) {
		
		$title 		= (!empty($instance['title'])) ? esc_attr($instance['title']) : 'Social Media' ;
		$limit 		= (!empty($instance['limit'])) ? esc_attr($instance['limit']) : 4 ;
        ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title :','mtcframework'); ?></label><br />
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>"   type="text">
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Count Foto :','mtcframework'); ?></label><br />
			<input id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" value="<?php echo $limit; ?>"   type="text">
        </p>
		<?php 
    }
}

add_action( 'widgets_init', create_function( '', 'return register_widget("mtc_instagram_widget");' ) );

