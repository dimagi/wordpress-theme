<?php
/**
 * @package Dimagi
 * @subpackage Dimagi_4
 */

get_header(); ?>

<article>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row" id="post-<?php the_ID(); ?>">
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		<?php get_sidebar(); ?>
	</div>
	<?php endwhile; endif; ?>
</article>

<?php get_footer(); ?>