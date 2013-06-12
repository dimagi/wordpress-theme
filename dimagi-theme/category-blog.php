<?php
get_header(); 

$blogCategories = array('staff', 'news', 'tech-updates', 'dev');
?>
<div class="page-header">
  <h1>Dimagi Blogs</h1>
</div>

<div class="row all-blogs">
  <?php foreach($blogCategories as &$bSlug) { 
    $bCat = get_category_by_slug($bSlug);
  ?>
    <div class="span6">
      <h2><a href="<?= get_category_link($bCat->cat_ID); ?>"><?= $bCat->cat_name; ?></a></h2>
      <p><?=$bCat->category_description;?></p>
    </div>
  <?php } ?>
</div>
<?php 
get_footer(); ?>
