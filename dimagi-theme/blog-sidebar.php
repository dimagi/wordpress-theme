<?php  
  $recentPostsArgs = array(
    'numberposts' => 10,
    'category' => $parentCat->cat_ID,
    'post_status' => 'publish',
  );
  $recentPosts = wp_get_recent_posts($recentPostsArgs, OBJECT);
?>
<div class="span4" id="blog-sidebar">

  <?php if (is_archive()): ?>
  <ul class="pager">
    <li class="previous">
      <?php next_posts_link('<i class="icon-arrow-left"></i> Older'); ?>
    </li>
    <?php if ($currentPage): ?><li class="page-number">Page <?= $currentPage; ?></li><?php endif; ?>
    <li class="next">
      <?php previous_posts_link('Newer <i class="icon-arrow-right"></i>'); ?>
    </li>
  </ul>
  <?php endif; ?>
  
  <?php if (is_single()): ?>
  <nav class="well well-nav">
    <ul class="nav nav-list nav-post">
      <?php previous_post_link('<li class="nav-header">Previous Post</li><li>%link</li>', '%title', true); ?>
      <?php next_post_link('<li class="nav-header">Next Post</li><li>%link</li>', '%title', true); ?>
    </ul>
	</nav>
  <?php endif; ?>
  
  
  <form class="form-search" method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
    <input type="hidden" value="<?=$parentCat->cat_ID;?>,<?=$cat->cat_ID;?>" name="cat" id="scat" />
    <div class="input-append">
      <input type="text" value="<?php the_search_query(); ?>" class="span3 search-query" name="s" id="s" />
      <button type="submit" id="searchsubmit" class="btn">Search</button>
    </div>
  </form>
  
  <nav class="well well-nav">
		<ul class="nav nav-list">
			<li class="nav-header">Recently on <?=$parentCat->cat_name;?></li>
      <? foreach($recentPosts as $recentPost): ?>
        <li><a href="<?=get_permalink($recentPost->ID);?>"><strong><?=mysql2date('j M Y', $recentPost->post_date);?></strong> - <?=$recentPost->post_title;?></a></li>
      <? endforeach; ?>
    </ul>
	</nav>
</div>

<script>
$(function () {
  setTimeout(function () {
      var stopHeight = $(document).height() - $('#blog-sidebar').height() - 480;
      $('#blog-sidebar').affix({
        offset: {
          top: function () { return 314 }
        , bottom: function () {
          if ($(document).scrollTop() >= stopHeight) {
            $('#blog-sidebar').addClass('affix-bottom');
          } else {
            $('#blog-sidebar').removeClass('affix-bottom');
          }
          return null;
        }
        }
      })
    }, 100)
});
</script>