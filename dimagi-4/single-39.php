<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="row">
			<div class="span12">
			  <div class="hero-unit">
			      <hgroup class="pull-right span6">
			        <?php if(!is_category('46')) { ?>
						<h1>Staff Blog</h1>
						<p><?php echo category_description('39'); ?></p>
					<?php } else { ?>
						<h1>Dimagi News</h1>
						<p><?php echo category_description('46'); ?></p>
					<?php } ?>
			      </hgroup>
			      <img src="http://www.dimagi.com/wp/wp-content/uploads/2010/01/post-it-arabic-300x168.jpg" alt="" title="" width="300" height="168" />
			  </div>
			</div>
		</div>
		<div class="row">
			<div class="span8">
				<article class="blog-post">
					<hgroup>
						<h1><?php the_title(); ?></h1>
						<h2><small>by <?php the_author(); ?> on <?php the_date(); ?></small></h2>
					</hgroup>
					
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</article>
		
				<?php comments_template(); ?>
			</div>
			<?php get_sidebar(); ?>
		
		</div> <!-- main -->

		<?php endwhile; endif; ?>

<?php get_footer(); ?>