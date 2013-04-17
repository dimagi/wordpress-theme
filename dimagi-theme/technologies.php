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
  <section class="row">
    <div class="span12">
      <?php the_content(); ?>
    </div>
  </section>
	<?php endwhile; endif; ?>

	<section class="row">
	  <div class="span12">
	     <h2><?php echo get_cat_name('102'); ?></h2>
	  </div>
		<div class="span6">
			<div class="well" style="height:100px;">
	            <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/misc/technologies_commcare_thumb.png" alt="CommCare icon" /></a>
	            <div class="pull-right span4 desaturate-links" style="width: 296px;">
		            <h2><a href="http://www.commcarehq.org/">CommCare</a></h2>
		            <p><a href="http://www.commcarehq.org/">CommCare is an easily customizable mobile platform for frontline workers to track and support their interactions with clients.</a></p>
	            </div>
	        </div>
	    </div>
	  <?php query_posts('cat=102&showposts=-1&meta_key=menu-order&orderby=meta_value&order=ASC'); while ( have_posts() ) { the_post(); ?>
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
		<div class="span12">
		  <h2><?php echo get_cat_name('112'); ?></h2>
		</div>
		<?php query_posts('cat=112&showposts=-1&meta_key=menu-order&orderby=meta_value&order=ASC'); while ( have_posts() ) { the_post(); ?>
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