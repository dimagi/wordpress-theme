<?php
/*
Template Name: Bio Page
*/

get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="row">
  <div class="span12">
    <hgroup>
      <h1><?= $post->post_title; ?></h1>
      <h2><?= $post->_subheading; ?></h2>
    </hgroup>
  </div>
</div>
<div class="row">
  <div class="span8">
    <article class="about-page-blurb">
          <?php the_content(); ?>
    </article>
  </div>
  <div class="span4">
    <?php 
      $twitter = get_post_meta($post->ID, 'twitter_username', '');
      $linkedIn = get_post_meta($post->ID, 'linkedin_username', '');
     ?>
     <?php if ($twitter) : ?>
     
     <?php endif; %?
  </div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>