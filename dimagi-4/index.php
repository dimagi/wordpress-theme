<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>


<?php query_posts(0); ?>

				<div id="dimagiBanner" class="carousel slide dimagi-carousel">
		    		<div class="carousel-inner">
			    		<div id="banner-commcare" class="active item">
				    		<article class="async-image" data-imgsrc="<?php bloginfo('template_directory'); ?>/img/banners/commcare.jpg">
				    			<hgroup>
				    				<h1 class="orange tall pull-right quarter">Sign Up Today for CommCare</h1>
				    				<h2 class="quarter pull-right" style="top: 130px;"><a class="blue" href="http://www.commcarehq.org/">The leading case management solution for global health.</a></h2>
				    			</hgroup>
				    			<h2 class="pull-right" style="text-align: right; right:30px;  top:260px;">
				    				<a class="orange" href="http://www.commcarehq.org"><img src="<?php bloginfo('template_directory'); ?>/img/banners/commcare-star.png" alt="CommCare" /> Learn More</a>
				    			</h2>
				    		</article>
			    		</div>
			    		<div id="banner-hire" class="item">
				    		<article class="async-image" data-imgsrc="<?php bloginfo('template_directory'); ?>/img/banners/brazil.jpg">
				    			<hgroup>
				    				<h1 class="big pull-right" style="text-align: right;">We're Hiring</h1>
				    				<h2 class="pull-right" style="width: 300px; top: 90px;"><a class="orange" href="http://www.dimagi.com/about/careers/">Currently looking for software engineers to join our team.</a></h2>
				    			</hgroup>
				    			<h2 class="pull-left" style="top:28px; width:234px;">
				    				<a href="http://www.dimagi.com/the-away-month/" class="blue">Learn about our recent Away Month in Brazil.</a>
				    			</h2>
				    		</article>
			    		</div>
			    		<div id="banner-bw" class="item">
			    			<article class="async-image" data-imgsrc="<?php bloginfo('template_directory'); ?>/img/banners/faces.jpg">
			    				<hgroup>
			    					<h1 class="orange pull-left third" style="height:153px;">Business Week's Top 25 Social Enterprises</h1>
			    					<h2 class="pull-left" style="left: 30px; top: 125px; width:364px;"><a class="blue" href="http://www.businessweek.com/smallbiz/content/jun2011/sb20110621_158462.htm">A certified BCorp, we take pride in the recognition of making social change.</a></h2>
			    				</hgroup>
			    			</article>
			    		</div>
			    		<div id="banner-sa" class="item">
				    		<article class="async-image" data-imgsrc="<?php bloginfo('template_directory'); ?>/img/banners/cape_town.jpg" data-link="#">
				    			<hgroup>
				    				<h1 class="big pull-left">Dimagi in South Africa</h1>
				    				<h2 class="pull-left" style="top:90px; left:43px; width:280px;"><a class="orange" href="http://www.dimagi.com/about/careers/">We've opened a new project office in Cape Town.</a></h2>
				    			</hgroup>
				    		</article>
			    		</div>
			    		<div id="banner-india" class="item">
				    		<article class="async-image" data-imgsrc="<?php bloginfo('template_directory'); ?>/img/banners/asha.jpg" data-link="#">
				    			<hgroup>
				    				<h1 class="big pull-right">Dimagi in India</h1>
				    				<h2 class="pull-right quarter" style="top:90px; width: 275px;">
				    					<a class="orange" href="http://www.dimagi.com/an-asha-calls-me-and-tells-me-stories-of-change/">Read about an ASHA's experience with CommCare.</a>
				    				</h2>
				    			</hgroup>
				    		</article>
			    		</div>
		    		</div>
		    	</div>
		    	<div class="dimagi-carousel-controls">
			    	<a class="carousel-control on" href="#dimagiBanner" data-slidenum="0"></a><a class="carousel-control" href="#dimagiBanner" data-slidenum="1"></a><a class="carousel-control" href="#dimagiBanner" data-slidenum="2"></a><a class="carousel-control" href="#dimagiBanner" data-slidenum="3"></a><a class="carousel-control" href="#dimagiBanner" data-slidenum="4"></a>
		    	</div>
				
				
			    <article class="row blurbs">
			    	<section class="span3">
				    	<h1><a href="http://www.commcarehq.org/">CommCare</a></h1>
				    	<div class="async-image" data-imgsrc="<?php bloginfo('template_directory'); ?>/img/blurbs/commcare.jpg" data-imglink="http://www.commcarehq.org/"></div>
				    	<p>CommCare is a turnkey solution for community health and extension workers that provides case management, data collection, and data management. <a href="http://www.commcarehq.org/register/">Sign up</a> for an account today!</p>
			    	</section>
			    	<section class="span3">
				    	<h1><a href="http://www.dimagi.com/technologies/">Open Source Platforms</a></h1>
				    	<div class="async-image" data-imgsrc="<?php bloginfo('template_directory'); ?>/img/blurbs/open_source.jpg" data-imglink="http://www.dimagi.com/technologies/"></div>
				    	<p>Dimagi is a leader in building and supporting open source software for low resource settings.</p>
			    	</section>
			    	<section class="span3">
				    	<h1><a href="http://www.dimagi.com/services/">Technology Consulting</a></h1>		
				    	<div class="async-image" data-imgsrc="<?php bloginfo('template_directory'); ?>/img/blurbs/consulting.jpg" data-imglink="http://www.dimagi.com/services/"></div>		    	
				    	<p>Dimagi will collaborate with your organization to build innovative technology solutions.</p>
			    	</section>
			    	<section class="span3">
				    	<h1>Research</h1>
				    	<div class="async-image" data-imgsrc="<?php bloginfo('template_directory'); ?>/img/blurbs/research.jpg"></div>
				    	<p>Dimagi works domestically and across the world researching how technology can improve outcomes.</p>
			    	</section>
			    </article>
			    
			    <img src="<?php bloginfo('template_directory'); ?>/img/divider.png" width="960" height="33" alt="divider" />
				<article class="row news">
			    	<section class="span6">
			    		<h1><a href="/category/blog/">TEST Staff Blog</a></h1>
			    		<?php query_posts('cat=39,-46&showposts=3'); if (have_posts()) : ?>
			    		<!--<a href="/category/blog/feed/"><img src="<?php bloginfo('template_url'); ?>/images/feed-icon.png"></a>-->
			    		<?php while (have_posts()) : the_post(); ?>
			    		<hgroup>
			    			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			    			<h3><?=get_the_date();?></h3>
			    		</hgroup>
			    		<?php the_excerpt(); ?>
			    		<?php endwhile; ?>
			    		<?php endif; ?>
			    	</section>
			    	<section class="span6">
			    		<h1><a href="/category/blog/news/">Recent News</a></h1>
			    		<?php query_posts('cat=46&showposts=3'); if (have_posts()) : ?>
			    		<!--<a href="/category/blog/news/feed/"><img src="<?php bloginfo('template_url'); ?>/images/feed-icon.png"></a>-->
			    		<?php while (have_posts()) : the_post(); ?>
			    		<hgroup>
			    			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			    			<h3><?=get_the_date();?></h3>
			    		</hgroup>
			    		<?php the_excerpt(); ?>
			    		<?php endwhile; ?>
			    		<?php endif; ?>
			    	</section>
			    </article>


<?php get_footer(); ?>