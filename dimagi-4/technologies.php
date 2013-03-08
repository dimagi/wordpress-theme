<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Technologies
*/

get_header(); ?>
<article>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row" id="post-<?php the_ID(); ?>">
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</div>
	<?php endwhile; endif; ?>

	<section class="row">
		<div class="span6">
			<div class="well" style="height:100px;">
	            <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/misc/technologies_commcare_thumb.png" alt="CommCare icon" /></a>
	            <div class="pull-right span4 desaturate-links" style="width: 296px;">
		            <h2><a href="http://www.commcarehq.org/">CommCare</a></h2>
		            <p><a href="http://www.commcarehq.org/">CommCare is an easily customizable mobile platform for frontline workers to track and support their interactions with clients.</a></p>
	            </div>
	        </div>
	    </div>
		<?php query_posts('cat=32,-38&showposts=-1'); while ( have_posts() ) { the_post(); ?>
			<div class="span6">
				<div class="well" style="height:100px;">
		            <?php if (get_post_meta($post->ID,'thumb',true)) { ?>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo get_post_meta($post->ID,'thumb',true); ?>" /></a>
		            <?php } ?>
		            <div class="pull-right span4 desaturate-links" style="width: 296px;">
			            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			            <p><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></p>
		            </div>
		        </div>
		    </div>
		<?php } ?>
	</section>
</article>
<?php get_footer(); ?>