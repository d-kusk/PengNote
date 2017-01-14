<div class="search-area">
  <form action="/" method="get">
		<input class="search-input" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
		<input class="btn-submit" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
  </form>
</div>
