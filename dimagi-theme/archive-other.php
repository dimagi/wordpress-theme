
<div class="row">
  <div class="span12">
    <div class="hero-unit">
      <h1><?=$cat->cat_name;?></h1>
  	</div>
  </div>
</div>
	
<div class="row">
  <div class="span8">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
    <article id="post-<?php the_ID(); ?>">
    	<hgroup>
    		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    		<h3>by <?php the_author(); ?> on <?php the_date(); ?></h3>
    	</hgroup>
    	<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
    	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </article>
    <hr />
    <?php endwhile; endif; ?>
    <ul class="pager">
      <li class="previous">
        <?php next_posts_link('<i class="icon-arrow-left"></i> Older'); ?>
      </li>
      <li class="next">
        <?php previous_posts_link('Newer <i class="icon-arrow-right"></i>'); ?>
      </li>
    </ul>
  </div>
  <?php get_sidebar(); ?>
</div>