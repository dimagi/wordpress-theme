<?php
/**
 * @package Dimagi
 * @subpackage Dimagi_4
 */

get_header();
the_post(); 

$page_id = $post->ID;
$header_image = get_post_meta($page_id, 'page_image_url', true);

$header_subhead = get_post_meta($page_id, 'page_subhead_text', true);
$header_lead = get_post_meta($page_id, 'page_lead_text', true);

$is_page_flush = get_post_meta($page_id, 'page_is_flush', true);

$header_title = (!$post->_subheading) ? $post->title : $post->_subheading;
?> 
<article>
  <div class="row">
    <div class="span12">
      <div class="hero-unit hero-page">
        <?php if ($header_image): ?><img src="<?= $header_image ?>" alt="<?= $header_title ?>" class="inline-middle hero-image" /><?php endif; ?>
        <hgroup class="inline-middle">
          <h1><?= $header_title ?></h1>
          <?php if ($header_subhead): ?><h2><?= $header_subhead ?></h2><?php endif; ?>
          <?php if ($header_lead): ?><p><?= $header_lead ?></p><?php endif; ?>
        </hgroup>
      </div>
    </div>
  </div>
  <div id="post-<?= $page_id ?>" class="row">
    <div class="<?php if ($is_page_flush): ?>span12 <?php else: ?>span8<?php endif; ?>">
  		<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
  		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </div>
  	<?php get_sidebar(); ?>
  </div>
</article>

<?php get_footer(); ?>