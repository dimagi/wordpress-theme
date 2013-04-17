<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
	
	
<article id="post-<?php the_ID(); ?>">
	<div class="row">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	<?php endwhile; endif; ?>
	
	<?php get_sidebar(); ?>
	</div>
</article>



<?php get_footer(); ?>