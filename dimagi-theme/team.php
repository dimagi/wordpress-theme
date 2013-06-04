<?php
/**
 * @package Dimagi
 * @subpackage Dimagi_4
 */
/*
Template Name: Team
*/

get_header(); 
the_post(); 

$page_id = $post->ID;

$header_subhead = get_post_meta($page_id, 'page_subhead_text', true);
$header_lead = get_post_meta($page_id, 'page_lead_text', true);

$header_title = (!$post->_subheading) ? $post->post_title : $post->_subheading;
?> 
<article>
  <div class="row">
    <div class="span12">
      <div class="hero-unit hero-page">
        <div class="inline-middle"><iframe style="border-style: none; width: 320px; height: 220px;" src="http://whereis.dimagi.com/mapwidget/" width="120" height="20"></iframe></div>
        <hgroup class="inline-middle" style="width:510px;">
          <h1><?= $header_title ?></h1>
          <?php if ($header_subhead): ?><h2><?= $header_subhead ?></h2><?php endif; ?>
          <?php if ($header_lead): ?><p><?= $header_lead ?></p><?php endif; ?>
        </hgroup>
      </div>
    </div>
  </div>
  <div id="post-<?= $page_id ?>" class="row">
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</div>
	
	<nav class="subnav">
		<ul class="nav nav-pills">
			<li class="nav-header">Go to:</li>
		<?php 
			$staffCategories = get_pages( array( 'child_of' => 604, 'sort_column' => 'menu_order', 'parent' => 604 ) );
			foreach ($staffCategories as $cat) { ?>
			<li><a href="#<?=$cat->post_name;?>"><?=$cat->post_title;?></a></li>
		<?php } ?>
		</ul>
	</nav>

<?php
	foreach ($staffCategories as $cat) { ?>
	<section class="bios" id="<?=$cat->post_name;?>">
		<hgroup class="page-header" style="margin-left: 10px; margin-right: 10px;">
			<h1><?=$cat->post_title;?></h1>
		</hgroup>
		<div class="row">
	<?php 	$staffList = get_pages( array( 'child_of' => $cat->ID, 'sort_column' => 'menu_order' ) ); 
			foreach( $staffList as $ind=>$staff ) { ?>
			<div class="span6">
				<div class="well">
				  <div class="team-blurb">
				    <hgroup>
				      <h2><?= $staff->post_title; ?></h2>
				      <h4><?= $staff->_subheading; ?></h4>
				    </hgroup>
				    <?php 
				    $staff_photo = get_post_meta($staff->ID, 'staff_photo', true);
				    if ($staff_photo) : ?>
				    <div class="staff-image pull-left"><img src="<?= $staff_photo; ?>" alt="<?= $staff->post_title; ?>" /></div>
				    <?php endif; ?>
				    <?=$staff->post_content; ?>
				  </div>
			    <a class="team-more" href="<?= get_permalink($staff->ID); ?>"> More about <?=$staff->post_title?>...</a>
        </div>
	    </div>
	    <?php if (($ind+1) % 2 == 0) { ?>
		</div>
		<div class="row">
		    <?php } ?>
	<?php } ?>	
		</div>
	</section>		
<?php } ?>

</article>
<script type="text/javascript">
	$(function () {
		// fix sub nav on scroll
	    var $win = $(window)
	      , $nav = $('.subnav')
	      , navTop = $('.subnav').length && $('.subnav').offset().top - 40
	      , isFixed = 0;
	
	    processScroll();
	
	    // hack sad times - holdover until rewrite for 2.1
	    $nav.on('click', function () {
	      if (!isFixed) setTimeout(function () {  $win.scrollTop($win.scrollTop() - 47) }, 10)
	    })
	
	    $win.on('scroll', processScroll)
	
	    function processScroll() {
	      var i, scrollTop = $win.scrollTop()
	      if (scrollTop >= navTop && !isFixed) {
	        isFixed = 1
	        $nav.addClass('subnav-fixed');
	      } else if (scrollTop <= navTop && isFixed) {
	        isFixed = 0
	        $nav.removeClass('subnav-fixed');
	      }
	    }
	    
	});
</script>

<?php get_footer(); ?>