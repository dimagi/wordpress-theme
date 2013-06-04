<?php
/*
Template Name: Bio Page
*/

get_header(); 
the_post(); 

$page_id = $post->ID;
$header_image = get_post_meta($page_id, 'page_image_url', true);

$staff_photo = get_post_meta($page_id, 'staff_photo', true);
$twitter = get_post_meta($post->ID, 'username_twitter', true);
$linkedin = get_post_meta($post->ID, 'username_linkedin', true);
$github = get_post_meta($post->ID, 'username_github', true);
$facebook = get_post_meta($post->ID, 'username_facebook', true);
$blog_user = get_post_meta($post->ID, 'username_blog', true);

$nickname = get_post_meta($post->ID, 'staff_nickname', true);

$office = get_post($post->post_parent);

?> 
<ul class="breadcrumb" style="margin-top: 10px;">
  <li><a href="/team/">Meet Dimagi</a> <span class="divider">&gt;</span></li>
  <li><a href="/team/#<?= $office->post_name; ?>"><?= $office->post_title; ?></a> <span class="divider">&gt;</span></li>
  <li class="active"><?= $post->post_title; ?></li>
</ul>
<div class="row">
  <div class="span12">
    <hgroup class="bio-header">
      <h1><?= $post->post_title; ?></h1>
      <h2><?= $post->_subheading; ?></h2>
    </hgroup>
  </div>
</div>
<div class="row">
  <div class="span3">
    <?php if ($staff_photo): ?>
    <div class="staff-image staff-image-main">
      <img src="<?=$staff_photo?>" alt="<?= $post->post_title; ?>" />
    </div>
    <?php endif; ?>
    <?php if ($twitter || $linkedin || $github || $facebook): ?>
    <?php if($staff_photo) : ?><hr /><?php endif; ?>
      <aside class="staff-social">
        <h5>Follow<?php if ($nickname): ?> <?= $nickname ?><?php endif; ?>...</h5>
        <?php if ($github): ?>
        <p><a class="btn btn-primary" href="http://github.com/<?= $github ?>/"><i class="icon-github"></i> <?= $github ?></a></p>
        <?php endif; ?>
        <?php if ($linkedin): ?>
        <p><a class="btn btn-primary" href="http://linkedin.com/<?= $linkedin ?>/"><i class="icon-linkedin"></i> <?= $linkedin ?></a></p>
        <?php endif; ?>
        <?php if ($twitter): ?>
        <p><a class="btn btn-primary" href="http://twitter.com/<?= $twitter ?>/"><i class="icon-twitter"></i> @<?= $twitter ?></a></p>
        <?php endif; ?>
        <?php if ($facebook): ?>
        <p><a class="btn btn-primary" href="http://facebook.com/<?= $facebook ?>/"><i class="icon-facebook"></i> <?= $facebook ?></a></p>
        <?php endif; ?>
      </aside>
    <?php endif; ?>
  </div>
  <div class="span9">
    <article class="bio-full-blurb">
      <?php the_content(); ?>
    </article>
  </div>
</div>
<?php 
if ($blog_user) : 
  $author = get_userdatabylogin($blog_user);
  $author_posts = new WP_Query(array( 'post_type' => 'post', 
                                      'author' => $author->ID,
                                      'cat' => '-38,-88,-35,-34,-32' ));
  if (!empty($author_posts)): ?>
  <hr />
  <h2 class="bio-posts-header">Posts by <?=$post->post_title; ?></h2>
  
      <div class="row">
  <?php 
  $ind = 0;
  while ($author_posts->have_posts()) : $author_posts->the_post(); ?>
  
        <div class="span6">
          <article class="bio-post" id="post-<?php the_ID(); ?>">
          	<hgroup>
          		<time><?php the_date(); ?></time>
          		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          	</hgroup>
          	<?php the_excerpt('<p>Read the rest of this post &raquo;</p>'); ?>
          	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          </article>
        </div>
      <?php if (($ind+1) % 2 == 0): ?>
  		</div>
  		<div class="row">
  		<?php endif; 
    		$ind += 1; ?>
    <?php endwhile; ?>
      </div>
  <?php endif; ?>

<?php endif; ?>
<?php get_footer(); ?>