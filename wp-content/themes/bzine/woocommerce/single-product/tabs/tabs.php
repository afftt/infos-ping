<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>
	<div class="accordion" id="accordion2">
		<?php 
		$iterasi = 1;
		foreach ( $tabs as $key => $tab ) : 
			$class_open = (1== $iterasi) ?  ' in' : ''; 
			$accordionID = 'collapse'.$key; 
			
			$class_group = (1 == $iterasi) ?  ' ' : ' collapsed'; 
			 
			?>
			<div class="accordion-group">
				<div class="accordion-heading">
					<a class="accordion-toggle<?php echo $class_group; ?>" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo $accordionID ?>">
					<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?>
					</a>
				</div>
				<div id="<?php echo $accordionID ?>" class="accordion-body collapse<?php echo $class_open; ?>">
					<div class="accordion-inner">
						<?php call_user_func( $tab['callback'], $key, $tab ) ?>
					</div>
				</div>
			</div>
		<?php $iterasi++; endforeach; ?>
	</div><!-- end -->



<?php endif; ?>