<?php include(TEMPLATEPATH . '/blog-header.php'); ?>

<div class="row">
  <div class="span8">
      <article class="blog-post" id="post-<?=$post->ID;?>">
      	<hgroup>
      		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
      		<?php $guestAuthor = get_post_meta($post->ID, 'guest_author', true); ?>
      		<h2>by <?php if ($guestAuthor) { echo $guestAuthor; } else { the_author(); } ?></h2>
      		<date><?php the_date(); ?></date>
      	</hgroup>
      	<?php the_content('Read the rest of this post...'); ?>
      </article>
      
      <hr />
      
      <ul class="nav-post">
        <?php previous_post_link('<li><strong>Previous Post:</strong> %link</li>', '%title'); ?>
        <?php next_post_link('<li><strong>Next Post:</strong> %link</li>', '%title'); ?>
      </ul>
      
      <hr />
    
      <section class="blog-comments">
        <?php comments_template(); ?>
      </section>
    </div>
    <?php include(TEMPLATEPATH . '/blog-sidebar.php'); ?>
</div>
