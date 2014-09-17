<div class="wrapper _footer">
	<div class="container container-footer-2col">
		<div class="row-fluid">
			<div class="span6">
				<?php if ( is_active_sidebar( 'widget_footer1' ) ) : ?>
					<?php dynamic_sidebar( 'widget_footer1' ); ?>
				<?php endif; ?>
			</div>
			<div class="span6">
				<?php if ( is_active_sidebar( 'widget_footer2' ) ) : ?>
					<?php dynamic_sidebar( 'widget_footer2' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>