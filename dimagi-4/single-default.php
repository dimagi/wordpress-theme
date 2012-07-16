<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>





	<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<?php if (get_post_meta($post->ID,'source-code-url',true)) { ?>
<style type="text/css">
<!--
#banner:after { content: 'test'; display: block; background-color: #0f0; }
-->
</style>
<?php } ?>


		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<?php edit_post_link('Edit this page/post'); ?>

			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
	</div>

<?php get_sidebar(); ?>

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