<?php
get_header(); 

the_post();

if (post_is_in_descendant_category(46) || in_category('news')) {
  $parentCat = get_category_by_slug('news');
  
} else if (post_is_in_descendant_category(39) || in_category('staff')) {
  $parentCat = get_category_by_slug('staff');
  
} else if (post_is_in_descendant_category(114) || in_category('dev')) {
  $parentCat = get_category_by_slug('dev');
  
} else if (post_is_in_descendant_category(119) || in_category('tech-updates')) {
  $parentCat = get_category_by_slug('tech-updates');
  
}

if ($parentCat) {
  $cat = get_category($parentCat->cat_ID);
  include (TEMPLATEPATH . '/single-blog.php');
}
else { 
  include (TEMPLATEPATH . '/single-default.php');
}

get_footer();
?>