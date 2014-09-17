<form role="search" method="get" id="witgetsearch" action="<?php echo home_url( '/' ); ?>">
    <div class="input-append">
		<input type="text" value="<?php echo get_search_query(); ?>"  placeholder="Entre ta recherche..." name="s" id="s" />
		<button class="btn btn-primary" type="submit">Cherche</button>
    </div>
</form>   