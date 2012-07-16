<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>


	<div id="content" class="narrowcolumn">

				<div id="banner">

<img src="http://www.dimagi.com/wp/wp-content/uploads/2010/01/post-it-arabic-300x168.jpg" alt="" title="" width="300" height="168" class="alignleft size-medium" />
				
				<?php if(!is_category('46')) { ?>
				  <h2>Staff Blog</h2>
				  <?php echo category_description('39');
				} else { ?>
				  <h2>Dimagi News</h2>
				  <?php echo category_description('46'); } ?>
				
				</div>
				
		<?php $i = 1; /* show sidebar? */ ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="post" id="post-<?php the_ID(); ?>">
				
		<div class="main">
		
			<div class="entry">

				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

				<p class="post-meta">by <?php the_author(); ?> on <?php the_date(); ?></p>

				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div> <!-- entry -->
		</div> <!-- main -->
		
		<?php if($i==1) { get_sidebar(); $i=0; } ?>
		
		</div> <!-- post -->
		
		<?php endwhile; endif; ?>
	
	<p class="nav-links"><span class="nav-next"><?php next_posts_link('&larr; Older Posts'); ?></span><span class="nav-previous"><?php previous_posts_link('Newer Posts &rarr;'); ?></span></p>
		
	</div> <!-- content -->
	
<?php get_footer(); ?>