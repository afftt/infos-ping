<?php 


global $smof_data; 
$footer = (isset($smof_data['layout_footer'])) ? $smof_data['layout_footer'] : 'default';


?>
<footer itemscope="" itemtype="http://schema.org/WPFooter">

	<?php get_template_part('footer-'.$footer); ?>
	
	<?php if('default' != $footer) : ?>
	<div class="wrapper _copy">
		<div class="container">
			<div class="row-fluid">
				<?php if(!$smof_data['show_icon_social_footer']): ?>
				<div class="span10 offset1 text-center">
				<?php else: ?>
				<div class="span6">
				<?php endif; ?>
				<?php 
					
					wp_nav_menu( array( 'theme_location' => 'footer-nav',
										'menu'            => '',
										'container'       => 'nav',
										'container_class' => 'footer-navigation',
										'container_id'    => 'footer-navigation',
										'menu_class'      => 'nav',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul id="%1$s" class="%2$s main-menu">%3$s</ul>',
										'depth'           => 0,
										'walker'          => ''
									)); 
					?>
					<div class="clearfix"></div>
					<div class="credits">
						<?php if(!empty($smof_data['footer_text'])) echo $smof_data['footer_text']; ?>
					</div>	
				</div>
				<?php if($smof_data['show_icon_social_footer']): ?>
				<div class="span6">
					<?php echo mtc_social_media('footer'); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

</footer>
</div><!-- end boxed -->
<?php wp_footer(); ?>
</body></html>		