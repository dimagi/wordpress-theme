<?php
/**
 * @package Dimagi
 * @subpackage Dimagi_4
 */
 // todo make this page even less NASTY x_x
?>
<?php
$page_aside = get_post_meta($post->ID, 'page_aside', true);
$post_slug = $post->post_name;
$source_url = get_post_meta($post->ID,'source-code-url',true);
$demo_url = get_post_meta($post->ID,'demo-url',true);

$special_categories = array(
  70 => '32',  // post ID => category to show
  10 => '28',
  72 => '34',
  527 => '35'
);

$staff_post_cat = '39';

$blogRoll = array(
  'staff', 
  'news', 
  'press-releases',
  'conferences',
  'tech-updates', 
  'commcare-hq',
  'commcare-mobile',
  'commtrack',
  'commconnect',
  'dev'
);
?>

<aside class="span4">

  <?php if (is_archive() && !is_single()): ?>
  <ul class="pager">
    <li class="previous">
      <?php next_posts_link('<i class="icon-arrow-left"></i> Older'); ?>
    </li>
    <li class="next">
      <?php previous_posts_link('Newer <i class="icon-arrow-right"></i>'); ?>
    </li>
  </ul>
  <?php endif; ?>
  
  <?php if ($page_aside): ?>
  <?= $page_aside ?>
  <?php endif; ?>
  
  <?php if ($source_url || $demo_url): ?>
  <div class="well">
    <p>
      <?php if ($source_url) : ?>
      <a class="btn btn-primary btn-large" href="<?= $source_url ?>">Source Code</a>
      <?php endif; ?>
      <?php if ($demo_url) : ?>
      <a class="btn btn-primary btn-large" href="<?= $demo_url ?>">Demo</a>
      <?php endif; ?>
    </p>
  </div>
  <?php endif; ?>


	<?php if (array_key_exists($post->ID, $special_categories)) : ?>
		<nav class="well" style="padding: 8px 0px;">
			<ul class="nav nav-list">
				<?php query_posts('cat='.$special_categories[$post->ID].'&showposts=-1'); if (have_posts()) : ?>
				<li class="nav-header">Our <?php the_title(); ?></li>
				<?php while (have_posts()) { the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php } endif; ?>
			</ul>
		</nav>
	<? endif; ?>
	
	<?php if (is_single()) { // If this is a single post ?>
	
	<?php // If it's a technology, service, or sector, then list relevant case studies
	if (in_category(array(32,34,35))) {
	    $taxonomy_index = get_the_terms( get_the_ID(), 'projects' );
	          if ( $taxonomy_index ) {
	          $indices = array_keys($taxonomy_index); ?>
	          <nav class="well" style="padding: 8px 0px;">
	          	  <ul class="nav nav-list">
	          	  	  <li class="nav-header">Related Case Studies</li>
     <?php             foreach ($indices as $index) {
	                  echo '<li><a href="'.$taxonomy_index[$index]->description.'">'.$taxonomy_index[$index]->name.'</a></li>';
	              }
	              echo '</ul></nav>';
	          }
	} ?>
	
	
	<?php // If it's a project, service, or sector, then list relevant technologies
	if (in_category(array(28,34,35))) {
	    $taxonomy_index = get_the_terms( get_the_ID(), 'technologies' );
	          if ( $taxonomy_index ) {
	          $indices = array_keys($taxonomy_index); ?>
	          <nav class="well" style="padding: 8px 0px;">
	          	  <ul class="nav nav-list">
	          	  	  <li class="nav-header">Technologies</li>
	<?php         foreach ($indices as $index) {
	                  echo '<li><a href="'.$taxonomy_index[$index]->description.'">'.$taxonomy_index[$index]->name.'</a></li>';
	              }
	              echo '</ul></nav>';
	          }
	} ?>
	
	
	<?php // If it's a project, then list relevant sectors
	if (in_category(array(28))) {
	    $taxonomy_index = get_the_terms( get_the_ID(), 'areas' );
	          if ( $taxonomy_index ) {
	          $indices = array_keys($taxonomy_index); ?>
	          <nav class="well" style="padding: 8px 0px;">
	          	  <ul class="nav nav-list">
	          	  	 <li class="nav-header">Sectors</li>
	    <?php     foreach ($indices as $index) {
	                  echo '<li><a href="'.$taxonomy_index[$index]->description.'">'.$taxonomy_index[$index]->name.'</a></li>';
	              }
	              echo '</ul></nav>';
	          }
	} ?>
	
	
	<?php // If it's a sector, then list relevant services
	if (in_category(array(35))) {
	    $taxonomy_index = get_the_terms( get_the_ID(), 'services' );
	          if ( $taxonomy_index ) {
	          $indices = array_keys($taxonomy_index); ?>
	          <nav class="well" style="padding: 8px 0px;">
	          	  <ul class="nav nav-list">
	          	  	 <li class="nav-header">Related Services</li>
	    <?php     foreach ($indices as $index) {
	                  echo '<li><a href="'.$taxonomy_index[$index]->description.'">'.$taxonomy_index[$index]->name.'</a></li>';
	              }
	              echo '</ul></nav>';
	          }
	} ?>
	
	
	<?php if (!in_category($staff_post_cat)) :
	/* As long as it's not a blog post, get related staff blog posts */ ?>
  	<?php 
  	$wp_query_technologies = new WP_Query('tag='.$post_slug.'&cat='.$staff_post_cat.',46&showposts=5'); 
  	if ($wp_query_technologies->have_posts()) : ?>
    	<nav class="well" style="padding: 8px 0px;">
    		<ul class="nav nav-list">
    			<li class="nav-header">Updates from the Blog</li>
    			<?php while($wp_query_technologies->have_posts()) : $wp_query_technologies->the_post(); ?>
    			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?><small<?php the_date(); ?></small></a></li>
    			<?php endwhile; ?>
    		</ul>	
    	</nav>	
  	<?php endif; ?>	
	<?php endif; ?>
	
	
	<?php } // End is_single() condition ?>


</aside>

