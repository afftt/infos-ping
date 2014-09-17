<?php get_header(); ?>

<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="n404">
					<p class="notfound">404</p>
					<p>
						Cette page n'existe pas.<br /><br />
						Retournez sur la page d'accueil
					</p>
					<p>&nbsp;</p>
					
					<p>
					<form method="get" id="searchform_404" action="<?php echo home_url( '/' ); ?>">
						<input name="s" type="text" size="30" value="" placeholder="Entrez votre recherche..." />
					</form>
					</p>
					
				</div>	
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>