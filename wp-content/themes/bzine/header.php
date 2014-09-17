<?php global $smof_data; ?><!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44932547-2', 'auto');
  ga('send', 'pageview');

</script>
<title><?php 

if(is_home()) { 
	 bloginfo("name"); echo " | ";  bloginfo("description"); 
} else { 
	echo wp_title(" | ", false, 'right');  bloginfo("name");
} 

?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php 

	/* popup comment */
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	/* show wp head */
	wp_head();  
?>
<!--[if IE 7]>
	<link rel='stylesheet' id='font-awesome-ie7'  href='<?php  echo get_template_directory_uri(); ?>/css/font-awesome-ie7.min.css' type='text/css' media='all' />
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body <?php body_class(); ?> id="top" >
<div <?php mtc_boxed_class(); ?>>
<header itemscope itemtype="http://schema.org/WPHeader">
	<div class="wrapper _header_top">
		<div class="container">
			<div class="row-fluid">
				<div class="span12 header_top">
					<?php if($smof_data['switch_news_ticker']) { ?>
						<div class="box_breaking_news">
							<div class="breaking_news_ribbon"><?php echo $smof_data['news_ticker_label']; ?></div>
							<div class="breaking_news_content">
								<?php if ( function_exists('mtc_newsticker') ) { mtc_newsticker(); } ?>
							</div>
						</div><?php
					}
					echo mtc_social_media('header'); ?>
				</div>
			</div>
		</div>
	</div><!-- end _header_top -->
	
	<div class="wrapper _header">
		<div class="container">
			<div class="row-fluid">
				<div class="span12 header">
					<h1 class="logo<?php if(!$smof_data['switch_ad_header']) echo ' lc';?>">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo("name");?>">
						<?php if(!empty($smof_data['logo'])) :?>
							<img src="<?php echo $smof_data['logo'];?>" alt="Logo" />
						<?php else :?>
							<img src="<?php get_template_directory_uri();;?>/img/logo.png" alt="Logo" />
						<?php endif;?>
						</a>
					</h1>
					<?php 
					
					/* Banner Header */
					if($smof_data['switch_ad_header']) { 
					
						$class_size_banner = (468 == $smof_data['ad_header_size']) ? ' size468' :'' ;  ?>
						<div class="header_ad<?php echo $class_size_banner; ?>">
							<?php if(!empty($smof_data['ad_header_img'])) :?>
								<a href="<?php echo $smof_data['ad_header_url'];?>" target="_blank"><img src="<?php echo $smof_data['ad_header_img'];?>" alt="" /></a>
							<?php else :?>
								<?php echo $smof_data['ad_header_code'];?>
							<?php endif;?>
						</div><?php
					} 
					
					?>
				</div>
			</div>
		</div>
	</div>	
	
	<div class="wrapper _main_navigation">
		<div class="container main_navigation">
			<div class="row-fluid">
				<div class="span12"><?php  
					wp_nav_menu( array( 'theme_location' => 'main-nav',
										'menu'            => '',
										'container'       => 'nav',
										'container_class' => 'main-navigation',
										'container_id'    => 'main-navigation',
										'menu_class'      => 'nav',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'bzine_default_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul id="%1$s" class="%2$s main-menu">%3$s</ul>',
										'depth'           => 0,
										'walker'          => new Mtc_Nav_Menu_Walker
									)); 
					?>
					<div class="smallmenu"><div id="dropmenu"></div></div>
				</div>
			</div><?php mtc_btn_show_cart(); ?>
		</div><!-- end main_navigation -->
	</div>
</header><!-- END header-->