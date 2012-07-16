<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn">
	
	<div class="post"><div class="entry">
	
	<div id="banner"><h2>Search Results for "<?php echo $s; ?>"</h2></div>
	
	<div class="main">
	
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>

			<div class="search-result">
				<h5 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
				<p><?php the_excerpt(); ?></p>
			</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center">Nothing found.</h2>

	<?php endif; ?>
	
	</div> <!-- main -->
	
	</div> <!-- entry -->
	</div> <!-- post -->
	

	</div> <!-- content -->


<?php get_footer(); ?>