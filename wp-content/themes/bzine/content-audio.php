<?php if ( !is_single() ) { ?>
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
				<?php// comments_popup_link('0 Comments ', '1 Comment', '% Comments'); ?> 
				<?php //echo mtc_get_postmeta_views($post->ID) . ' ' . __('Vue(s)','mtcframework'); ?>  
				<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
				<?php echo get_mtc_rating_sys('span',' / ',''); ?>
			</p>		
	</div>
	<div class="spacer"></div>
</div>
<?php } else {  	
	global $post; 
	
	$the_content = get_the_content('',true) ;
	$the_content = apply_filters( 'the_content', $the_content );
	$the_content = str_replace( ']]>', ']]&gt;', $the_content );
	$embed_code  = rwmb_meta( 'mtc_embed_code', 'type=text' ); 
	
	
	if(function_exists('get_media_embedded_in_content')){
		$media = get_media_embedded_in_content($the_content,'iframe');
		if(!empty($media)){
			$pc = explode('</iframe>',$media[0]);
			$embed_code = $pc[0].'</iframe>';
			$the_content = str_replace( $embed_code, '', $the_content );
		} 
	}
	
	
	if(!empty($embed_code)){
		echo $embed_code;
	}
	
	/*

	?><div class="post_thumb">
		<div class="mask"></div>
		<?php if ( has_post_thumbnail() ) { ?>
			<?php the_post_thumbnail('large'); ?>
		<?php } else{ ?>
			<img src="<?php echo get_template_directory_uri().'/img/default_thumbnail_large.jpg'; ?>" alt="<?php the_title( ); ?>">
		<?php } ?>
	</div><?php
	
	*/ ?>
	
	<div <?php post_class(); ?>>	
		<div class="storycontent">
			<?php the_title('<h2 class="_title">','</h2>'); ?>
			<p class="panel">
				<?php // echo __('Par','mtcframework');?> <?php // the_author_posts_link(); ?> 
				<?php //comments_popup_link('0 Comments ', '1 Comment', '% Comments'); ?> 
				<?php //echo mtc_get_postmeta_views($post->ID) . ' ' . __('View','mtcframework'); ?> 
				<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time(get_option('date_format')); ?></a>
			</p>
			
			<div class="entry">
				
			
				<?php 
				the_content();
				wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages : ', 'mtcframework' ), 'after' => '</div>' ) ); 
				/* Show the Rev */
				do_action('bzine_after_content'); ?>
				
				<div class="clearfix"></div>
				<div class="post_panel">
					<?php the_tags('<div class="post_tags"><i class="icon-tag"></i> ',', ','</div>'); ?> 
					<?php get_template_part('sharebutton'); ?>
				</div>
			</div>	
		</div>
		
		<div class="storycontent">
			<?php comments_template(); ?> <div class="spacer"></div>
		</div>
	</div>
<?php }   ?>