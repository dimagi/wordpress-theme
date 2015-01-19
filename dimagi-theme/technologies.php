<?php
/* 
Template Name: Technologies 
*/

get_header();
the_post(); 

$page_id = $post->ID;
$header_image = get_post_meta($page_id, 'page_image_url', true);

$header_subhead = get_post_meta($page_id, 'page_subhead_text', true);
$header_lead = get_post_meta($page_id, 'page_lead_text', true);

$commcare_text = get_post_meta($page_id, 'technologies_commcare_text', true);
$commtrack_text = get_post_meta($page_id, 'technologies_commtrack_text', true);

$header_title = (!$post->_subheading) ? $post->post_title : $post->_subheading;

?> 
<article>
  <div class="row">
    <div class="span12">
      <div class="hero-unit hero-page">
        <?php if ($header_image): ?><img src="<?= $header_image ?>" alt="<?= $header_title ?>" class="inline-middle hero-image" /><?php endif; ?>
        <hgroup class="inline-middle">
          <h1><?= $header_title ?></h1>
          <?php if ($header_subhead): ?><h2><?= $header_subhead ?></h2><?php endif; ?>
          <?php if ($header_lead): ?><p><?= $header_lead ?></p><?php endif; ?>
        </hgroup>
      </div>
    </div>
  </div>
  
  <?php if($post->content): ?>
  <section class="row">
    <div class="span12">
      <?php the_content(); ?>
    </div>
  </section>
  <?php endif ?>
  
	<section class="row">
	  <div class="span12">
	     <h2><?php echo get_cat_name('102'); ?></h2>
	  </div>
          <div class="span6">
            <div class="well" style="height:132px;">
              <a href="<?php the_permalink(); ?>" class="inline-middle"><img src="<?php bloginfo('template_directory'); ?>/img/misc/technologies_commcare_thumb.png" alt="CommCare icon" /></a>
                <div class="inline-middle span4 desaturate-links" style="width: 296px;">
                  <h2><a href="http://www.commcarehq.org/">CommCare</a></h2>
                  <p><a href="http://www.commcarehq.org/"><?= $commcare_text ?></a></p>
                </div>
            </div>
          </div>
          <div class="span6">
            <div class="well" style="height:132px;">
              <a href="<?php the_permalink(); ?>" class="inline-middle"><img src="<?php bloginfo('template_directory'); ?>/img/misc/technologies_commtrack_thumb.jpg" alt="CommTrack icon" /></a>
                <div class="inline-middle span4 desaturate-links" style="width: 296px;">
                  <h2><a href="http://www.commtrack.org/home/">CommTrack</a></h2>
                  <p><a href="http://www.commtrack.org/home/"><?= $commtrack_text ?></a></p>
                </div>
            </div>
          </div>
<?php 
// todo cleanup
query_posts('cat=102&showposts=-1&meta_key=menu-order&orderby=meta_value&order=ASC'); while ( have_posts() ) { the_post(); ?>
			<div class="span6">
				<div class="well" style="height:132px;">
            <?php if (get_post_meta($post->ID, 'thumb', true)) { ?>
            <a href="<?php the_permalink(); ?>" class="inline-middle"><img src="<?php echo get_post_meta($post->ID,'thumb',true); ?>" /></a>
            <?php } ?>
            <div class="desaturate-links span4 inline-middle" style="width: 296px;">
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
				<div class="well" style="height:132px;">
            <?php if (get_post_meta($post->ID,'thumb',true)) { ?>
            <a href="<?php the_permalink(); ?>" class="inline-middle"><img src="<?php echo get_post_meta($post->ID,'thumb',true); ?>" /></a>
            <?php } ?>
            <div class="desaturate-links span4 inline-middle" style="width: 296px;">
	            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	            <p><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></p>
            </div>
	        </div>
	    </div>
		<?php } ?>
	</section>
</article>

<?php get_footer(); ?>
