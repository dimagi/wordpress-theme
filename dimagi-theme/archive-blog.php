<?php include(TEMPLATEPATH . '/blog-header.php'); 
  $currentPage = get_query_var('paged');
?>
	
<div class="row blog-posts">
  <div class="span8">
   
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
      <article class="blog-post" id="post-<?=$post->ID;?>">
      	<hgroup>
      		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
      		<?php $guestAuthor = get_post_meta($post->ID, 'guest_author', true); ?>
      		<?php if(!($parentCat->slug == 'news' || $parentCat->slug == 'tech-updates')) : ?><h2>by <?php if ($guestAuthor) { echo $guestAuthor; } else { the_author(); } ?></h2><?php endif; ?>
      		<date><?php the_date(); ?></date>
      	</hgroup>
      	<?php the_content('Read the rest of this post...'); ?>
      </article>

      <hr />
    <?php endwhile; endif; ?>
    <ul class="pager">
      <li class="previous">
        <?php next_posts_link('<i class="icon-arrow-left"></i> Older'); ?>
      </li>
      <?php if ($currentPage): ?><li class="page-number">Page <?= $currentPage; ?></li><?php endif; ?>
      <li class="next">
        <?php previous_posts_link('Newer <i class="icon-arrow-right"></i>'); ?>
      </li>
    </ul>
  </div>
  
  <?php include(TEMPLATEPATH . '/blog-sidebar.php'); ?>

</div>