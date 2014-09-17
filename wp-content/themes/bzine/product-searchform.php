<form role="search" method="get" id="witgetsearch" action="<?php echo home_url( '/' ); ?>">
    <div class="input-append">
		<input type="text" value="<?php echo get_search_query(); ?>"  placeholder="Type here to search..." name="s" id="s" />
		<button class="btn btn-primary" type="submit">Search</button>
		<input type="hidden" name="post_type" value="product" />
    </div>
</form>  