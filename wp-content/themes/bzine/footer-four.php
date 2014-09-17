<div class="wrapper _footer">
	<div class="container container-footer-4col">
		<div class="row-fluid">
			<div class="span3">
				<?php if ( is_active_sidebar( 'widget_footer1' ) ) : ?>
					<?php dynamic_sidebar( 'widget_footer1' ); ?>
				<?php endif; ?>
			</div>
			<div class="span3">
				<?php if ( is_active_sidebar( 'widget_footer2' ) ) : ?>
					<?php dynamic_sidebar( 'widget_footer2' ); ?>
				<?php endif; ?>
			</div>
			<div class="span3">
				<?php if ( is_active_sidebar( 'widget_footer3' ) ) : ?>
					<?php dynamic_sidebar( 'widget_footer3' ); ?>
				<?php endif; ?>
			</div>
			<div class="span3">
				<?php if ( is_active_sidebar( 'widget_footer4' ) ) : ?>
					<?php dynamic_sidebar( 'widget_footer4' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>