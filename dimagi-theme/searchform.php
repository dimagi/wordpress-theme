<form class="form-search" method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
  <div class="input-append">
    <input type="text" value="<?php the_search_query(); ?>" class="span3 search-query" name="s" id="s" />
    <button type="submit" id="searchsubmit" class="btn">Search</button>
  </div>
</form>