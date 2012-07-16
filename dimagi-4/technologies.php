<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Technologies
*/

get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article class="row" id="post-<?php the_ID(); ?>">
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</article>
	<?php endwhile; endif; ?>

<article class="row">
<?php query_posts('cat=32,-38&showposts=-1'); while ( have_posts() ) { the_post(); ?>
	<section class="span6">
		<div class="well">
            <?php if (get_post_meta($post->ID,'thumb',true)) { ?>
            <div class="pull-left"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_post_meta($post->ID,'thumb',true); ?>" /></a></div>
            <?php } ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
        </div>
    </section>
<?php } ?>
</article>
<?php get_footer(); ?>