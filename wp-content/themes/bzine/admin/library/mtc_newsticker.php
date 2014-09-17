<?php

if ( !function_exists('mtc_newsticker') ) { 
	function mtc_newsticker(){ 
		global $smof_data;
		
		$count_ticker = (!empty($smof_data['news_ticker_number'])) ? $smof_data['news_ticker_number'] : 5;
		
		switch($smof_data['news_ticker_selection']){
			default:
			case "recent_post":
				$args = array( 'numberposts' => $count_ticker );
				$recent_posts = wp_get_recent_posts( $args );
				echo '<ul id="js-news" class="js-hidden">';
				foreach( $recent_posts as $recent ){
					echo '<li class="news-item"><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
				}
				echo '</ul>';
			break;
			
			
			case "most_commented_posts":
			
				$most_commented_posts = get_posts(
					array(
						'numberposts' => $count_ticker,
						'orderby' => 'comment_count',
						'suppress_filters' => 0,
					)
				);
				
				echo '<ul id="js-news" class="js-hidden">';
					foreach( $most_commented_posts as $recent ){
						echo '<li class="news-item"><a href="' . get_permalink($recent->ID) . '" title="Look '.esc_attr($recent->post_title).'" >' .   $recent->post_title.'</a> </li> ';
					}
				echo '</ul>'; 
			
			break;
		}
	}
} 