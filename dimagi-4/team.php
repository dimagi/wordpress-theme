<?php
/**
 * @package Dimagi
 * @subpackage Dimagi_4
 */
/*
Template Name: Team
*/

get_header(); ?>
<article>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row" id="post-<?php the_ID(); ?>">
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</div>
	<?php endwhile; endif; ?>
	
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
			    	<?=$staff->post_content; ?>
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