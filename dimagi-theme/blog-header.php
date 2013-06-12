<?php

$bannerImages = array(
  'staff' => '/img/blog/blog-staff.jpg',
  'dev' => '/img/blog/blog-dev.jpg',
  'news' => '/img/blog/blog-news.jpg',
  'tech-updates' => '/img/blog/blog-tech.jpg'
);

$rowSpans = array (
  'staff' => 3,
  'dev' => 4,
  'news' => 3,
  'tech-updates' => 4
);

$rowSpan = $rowSpans[$parentCat->slug];
$bannerImage = $bannerImages[$parentCat->slug];

$blogNav = array('staff', 'news', 'tech-updates', 'dev');

?>

<section class="blog-<?=$parentCat->slug;?>">
  <div class="row row-blog">
    <div class="span<?=$rowSpan?>">
      <hgroup class="header-blog">
        <h1><?=$parentCat->cat_name;?></h1>
        <?php if ($parentCat->slug != $cat->slug) { ?><h2><?= $cat->cat_name; ?></h2><?php } ?>
      </hgroup>
    </div>
    <div class="span<?=12-$rowSpan?>">
      <img src="<?php bloginfo('template_directory'); ?><?=$bannerImage?>" alt="<?=$parentCat->cat_name;?>" />
    </div>
  </div>
</section>

<nav class="nav-blog">
  <div class="navbar">
    <div class="blog-navbar-inner">
      <ul class="nav">
        <?php foreach($blogNav as &$bSlug) { 
          $bCat = get_category_by_slug($bSlug);
        ?>
          <li><a href="<?= get_category_link($bCat->cat_ID); ?>"><?= $bCat->cat_name; ?></a></li>
        <?php } ?>
      </ul>
      <ul class="nav pull-right">       
        <li><a href="http://twitter.com/dimagi"><i class="icon-twitter"></i> @dimagi</a></li>
        <li><a href="http://facebook.com/dimagi.inc"><i class="icon-facebook"></i> dimagi</a></li>
      </ul>
    </div>
  </div>
</nav>

