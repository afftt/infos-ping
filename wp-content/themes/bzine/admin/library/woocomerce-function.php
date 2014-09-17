<?php 

/* Remove Sidebar On Shop Page */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar',10 );

/*  Remove produk Tabs */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs',10 );

/* Remove Rating under title catalog */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating',5 );




add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60 );



function action_woocommerce_before_main_content(){ ?>
<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="main">
<?php }
add_action('woocommerce_before_main_content','action_woocommerce_before_main_content');




function action_woocommerce_after_main_content(){ ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }
add_action('woocommerce_after_main_content','action_woocommerce_after_main_content');




function mtc_btn_show_cart(){
if(function_exists('woocommerce_mini_cart')){
?>
<div class="button-user-cart">
	<a id="button-toggle-mini-cart" class="btn btn-success btn-block" href="#"><i class="icon-shopping-cart icon-large"></i> <span>Cart</span></a>
	<div id="data-cart" class="hide fast animated">
		<?php woocommerce_mini_cart(); ?>
	</div>
</div>
<?php } } 


