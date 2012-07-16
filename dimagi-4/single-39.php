<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>


	<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php edit_post_link('Edit this page/post'); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">

				<div id="banner">

<img src="http://www.dimagi.com/wp/wp-content/uploads/2010/01/post-it-arabic-300x168.jpg" alt="" title="" width="300" height="168" class="alignleft size-medium" />
				
				<?php if(!in_category('46')) { ?>
				  <h2>Staff Blog</h2>
				  <?php echo category_description('39');
				} else { ?>
				  <h2>Dimagi News</h2>
				  <?php echo category_description('46'); } ?>
				  
				
				</div>

<div class="main">

				<h2><?php the_title(); ?></h2>

				<p class="post-meta">by <?php the_author(); ?> on <?php the_date(); ?></p>

				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			<?php comments_template(); ?>

			</div>

		</div>

	</div>

</div> <!-- main -->

<?php get_sidebar(); ?>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>