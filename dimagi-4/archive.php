<?php
/**
 * @package Dimagi
 * @subpackage Dimagi_4
 */

get_header(); ?>

	<div class="hero-unit">
		<div class="pull-right span6">
			<?php if(!is_category('46')) { ?>
				<h1>Staff Blog</h1>
				<p><?php echo category_description('39'); ?></p>
			<?php } else { ?>
				<h1>Dimagi News</h1>
				<p><?php echo category_description('46'); ?></p>
			<?php } ?>
		</div>
		<img src="http://www.dimagi.com/wp/wp-content/uploads/2010/01/post-it-arabic-300x168.jpg" alt="" title="" width="300" height="168" />
	</div>
	
	<?php $i = 1; /* show sidebar? */ ?>
	<div class="row">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
		<?php if($i==1) { get_sidebar(); $i=0; } ?>
		<article class="span8" id="post-<?php the_ID(); ?>">
			<hgroup>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<h3>by <?php the_author(); ?> on <?php the_date(); ?></h3>
			</hgroup>
			<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		</article>
	<?php endwhile; endif; ?>
		
	</div>
	
	<div class="pagination">
	  <ul>
	    <li><?php next_posts_link('Older Posts'); ?></li>
	    <li><?php previous_posts_link('Newer Posts'); ?></li>
	  </ul>
	</div>
	
<?php get_footer(); ?>