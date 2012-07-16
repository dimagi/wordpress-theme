<?php
/**
 * @package Dimagi
 * @subpackage Dimagi_4
 */
?>

<aside class="span4 pull-right">

	<?php $post_slug = $post->post_name; ?>
	
	<?php if (get_post_meta($post->ID,'source-code-url',true)) { ?>
	    <a class="btn btn-primary" href="<?php echo get_post_meta($post->ID,'source-code-url',true); ?>">Source Code</a>
	<?php } ?>
	
	<?php if (get_post_meta($post->ID,'demo-url',true)) { ?>
	    <a class="btn btn-primary" href="<?php echo get_post_meta($post->ID,'demo-url',true); ?>">Demo</a>
	<?php } ?>




	<?php if ($post->ID == 70 || $post->ID == 10 || $post->ID == 72 || $post->ID == 527) { // If this is a "page" ?>
	
		<?php if ($post->ID == 70) $query_cat = 32;
		elseif ($post->ID == 10) $query_cat = 28;
		elseif ($post->ID == 72) $query_cat = 34;
		elseif ($post->ID == 527) $query_cat = 35;
		?>
		<nav>
			<ul class="nav nav-list">
				<?php query_posts('cat='.$query_cat.'&showposts=-1'); if (have_posts()) : ?>
				<li class="nav-header">Our <?php the_title(); ?></li>
				<?php while (have_posts()) { the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php } endif; ?>
			</ul>
		</nav>
	<? } ?>
	<?php if (in_category('39') /* && is_single() */ && !is_page() ) { // If this is a staff blog post ?>
		<nav>
			<ul class="nav nav-list">
				<li class="nav-header">Feeds</li>
				<li><a href="/category/blog/news/feed">News Feed</a></li>
				<li><a href="/category/blog/feed">Full Blog Feed</a></li>
				<li class="nav-header">Categories</li>
				<?php wp_list_categories('child_of=39&hide_empty=0&title_li=&depth=1'); ?>
				<li class="nav-header">Archives</li>
				<?php wp_get_archives(); ?>
			</ul>
		</nav>
	<?php } ?>
		
	
	<?php if (is_single()) { // If this is a single post ?>
	
	<?php // If it's a technology, service, or sector, then list relevant case studies
	if (in_category(array(32,34,35))) {
	    $taxonomy_index = get_the_terms( get_the_ID(), 'projects' );
	          if ( $taxonomy_index ) {
	          $indices = array_keys($taxonomy_index);
	              echo '<div class="extra-content-block"><h3>Related Case Studies</h3><ul>';
	              foreach ($indices as $index) {
	                  echo '<li><a href="'.$taxonomy_index[$index]->description.'">'.$taxonomy_index[$index]->name.'</a></li>';
	              }
	              echo '</ul></div>';
	          }
	} ?>
	
	
	<?php // If it's a project, service, or sector, then list relevant technologies
	if (in_category(array(28,34,35))) {
	    $taxonomy_index = get_the_terms( get_the_ID(), 'technologies' );
	          if ( $taxonomy_index ) {
	          $indices = array_keys($taxonomy_index);
	              echo '<div class="extra-content-block"><h3>Technologies</h3><ul>';
	              foreach ($indices as $index) {
	                  echo '<li><a href="'.$taxonomy_index[$index]->description.'">'.$taxonomy_index[$index]->name.'</a></li>';
	              }
	              echo '</ul></div>';
	          }
	} ?>
	
	
	<?php // If it's a project, then list relevant sectors
	if (in_category(array(28))) {
	    $taxonomy_index = get_the_terms( get_the_ID(), 'areas' );
	          if ( $taxonomy_index ) {
	          $indices = array_keys($taxonomy_index);
	              echo '<div class="extra-content-block"><h3>Sectors</h3><ul>';
	              foreach ($indices as $index) {
	                  echo '<li><a href="'.$taxonomy_index[$index]->description.'">'.$taxonomy_index[$index]->name.'</a></li>';
	              }
	              echo '</ul></div>';
	          }
	} ?>
	
	
	<?php // If it's a sector, then list relevant services
	if (in_category(array(35))) {
	    $taxonomy_index = get_the_terms( get_the_ID(), 'services' );
	          if ( $taxonomy_index ) {
	          $indices = array_keys($taxonomy_index);
	              echo '<div class="extra-content-block"><h3>Related Services</h3><ul>';
	              foreach ($indices as $index) {
	                  echo '<li><a href="'.$taxonomy_index[$index]->description.'">'.$taxonomy_index[$index]->name.'</a></li>';
	              }
	              echo '</ul></div>';
	          }
	} ?>
	
	
	<?php if (!in_category('39')) :
	/* As long as it's not a blog post, get related staff blog posts */ ?>
	
	<?php $wp_query_technologies = new WP_Query('tag='.$post_slug.'&cat=39,46&showposts=5'); if ($wp_query_technologies->have_posts()) : ?>
	
	<div class="extra-content-block related-blog-posts">
	
	<h3>Updates from the Blog</h3>
	
	<ul>
	
	<?php while($wp_query_technologies->have_posts()) : $wp_query_technologies->the_post(); ?>
	
	<li>
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
	<span class="post-meta"><?php the_date(); ?></span>
	</li>
	
	<?php endwhile; ?>
	
	</ul>
	
	</div>
	
	<?php endif; ?>
	
	<?php endif; ?>
	
	
	<?php } // End is_single() condition ?>


</aside><!-- sidebar -->

