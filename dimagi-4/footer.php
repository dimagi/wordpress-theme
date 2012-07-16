<?php
/**
 * @package Dimagi
 * @subpackage Dimagi_4
 */
?>

			</div><!-- content --> 
    	</div><!-- wrapper -->
        <footer>
        	<div class="content">
        		<section class="row">
	        		<nav class="span2">
	        			<?php query_posts('cat=32,-38&showposts=-1&meta_key=menu-order&orderby=meta_value&order=ASC'); ?>
	        			<h1><a href="<?php echo get_permalink('70'); ?>"><?php echo get_cat_name('32'); ?></a></h1>
	        			<ul>
	        				<li><a href="http://www.commcarehq.org/">CommCare</a></li>
							<?php while(have_posts()) { the_post(); ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php } ?>
	        			</ul>
	        		</nav>
	        		<nav class="span2">
	        			<?php query_posts('cat=34,-38&showposts=-1&meta_key=menu-order&orderby=meta_value&order=ASC'); ?>
	        			<h1><a href="<?php echo get_permalink('72'); ?>"><?php echo get_cat_name('34'); ?></a></h1>
	        			<ul>
	        				<?php while(have_posts()) { the_post(); ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php } ?>
	        			</ul>
	        		</nav>
	        		<nav class="span2">
	        			<?php query_posts('cat=35,-38&showposts=-1&meta_key=menu-order&orderby=meta_value&order=ASC'); ?>
	        			<h1><a href="<?php echo get_permalink('527'); ?>"><?php echo get_cat_name('35'); ?></a></h1>
	        			<ul>
	        				<?php while(have_posts()) { the_post(); ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php } ?>
	        			</ul>
	        		</nav>
	        		<nav class="span4">
	        			<?php query_posts('cat=28,-38&showposts=-1'); ?>
	        			<h1><a href="<?php echo get_permalink('10'); ?>"><?php echo get_cat_name('28'); ?></a></h1>
	        			<ul>
	        				<?php while(have_posts()) { the_post(); ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php } ?>
	        			</ul>
	        		</nav>
	        		<div class="span2">
	        			<section class="social">
	        				<a href="http://twitter.com/dimagi" rel="tooltip" title="Follow @dimagi on Twitter"><img src="img/social/twitter.png" alt="@dimagi" /></a><a href="http://github.com/dimagi" rel="tooltip" title="Fork dimagi on github"><img src="img/social/github.png" alt="dimagi on github" /></a><a href="http://facebook.com/dimagi.inc" rel="tooltip" title="Like dimagi on Facebook"><img src="img/social/facebook.png" alt="like dimagi on facebook" /></a>
	        			</section>
		        		<address>
		        			<section>
			        			Dimagi, Inc.<br />
								585 Massachusetts Ave<br />
								Suite 3<br />
								Cambridge, MA 02139<br />
								t +1 617.649.2214<br />
								f +1 617.274.8393<br />
		        			</section>
							
							<section>
								Dimagi India<br />
								D - 1/28 Vasant Vihar<br />
								New Delhi 110057<br />
								+91 1146704670<br />
							</section>
							
							<section>
							&copy; <?php echo date('Y'); ?>, Dimagi, Inc.
							</section>
		        		</address>
        		</div>
        	</div>
        </footer>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/dimagi.landing.js" type="text/javascript"></script>
        <script type="text/javascript">
        	var bannerImages = new DimagiAsyncImages({
	        	container: '#dimagiBanner'
        	});
        	bannerImages.init();
        	
        	var banner = new DimagiBannerControl({});
        	banner.init();
        	
        	var blurbs = new DimagiAsyncImages({});
        	blurbs.init();
        </script>
        <?php wp_footer(); ?>
    </body>
</html>
