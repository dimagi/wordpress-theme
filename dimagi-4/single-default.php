<?php
/**
 * @package Dimagi
 * @subpackage Dimagi_4
 */

get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article class="row" id="post-<?php the_ID(); ?>">
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		<?php get_sidebar(); ?>
	</article>
	<?php endwhile; endif; ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<?php $post_slug = $post->post_name; ?>
	
			<?php endwhile; endif; /* End main single post */ ?>
	
	<?php /* Get related staff blog posts */ ?>
	<?php query_posts('tag='.$post_slug.'&cat=39'); if (have_posts()) : ?>
	
	<div id="staff-blog">
	
	<hr />
	
	<h3><?php the_title(); ?> Updates from the Blog</h3>
	
	<ul>
	<?php while (have_posts()) : the_post(); ?>
	
	<li>
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
	<?php the_excerpt(); ?>
	</li>
	
	<?php endwhile; ?>
	</ul>
	
	</div>
	
	<?php endif; ?>



<?php get_footer(); ?>