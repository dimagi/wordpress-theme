<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Our Work
*/

get_header(); ?>

	<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php edit_post_link('Edit this page/post'); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	</div>

<div class="panel-container">

<?php query_posts('meta_key=carousel-order&orderby=meta_value&order=ASC&showposts=-1'); while ( have_posts() ) { the_post(); ?>
<div class="panel">

            <?php if (get_post_meta($post->ID,'thumb',true)) { ?>
              <a href="<?php the_permalink(); ?>"><img src="<?php echo get_post_meta($post->ID,'thumb',true); ?>" class="carousel-thumb" /></a>
            <?php } ?>
            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>

</div> <!-- panel -->
<?php } ?>

</div> <!-- panel-container -->

<?php get_footer(); ?>