<?php
get_header(); 

// current category information
$cat = get_category(get_query_var('cat'));


if (cat_is_ancestor_of(46, $cat) || is_category('news')) {
  $parentCat = get_category_by_slug('news');
  
} else if (cat_is_ancestor_of(39, $cat) || is_category('staff')) {
  $parentCat = get_category_by_slug('staff');
  
} else if (cat_is_ancestor_of(114, $cat) || is_category('dev')) {
  $parentCat = get_category_by_slug('dev');
  
} else if (cat_is_ancestor_of(119, $cat) || is_category('tech-updates')) {
  $parentCat = get_category_by_slug('tech-updates');
  
}

if ($parentCat) {
  include(TEMPLATEPATH . '/archive-blog.php');
} else {
  include(TEMPLATEPATH . '/archive-other.php');
}

get_footer(); ?>
