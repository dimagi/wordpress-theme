<?php
/**
 * @package Dimagi
 * @subpackage Dimagi_4
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" charset="UTF-8" />
        <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        
        <meta name="description" content="Dimagi is a social enterprise that makes open source software to improve healthcare in developing countries and for the underserved." />
        <meta name="keywords" content="Dimagi, mhealth, mobile health, mobile, healthcare, international development, mobile healthcare, mobile, open source, commcare, commcarehq" />
        <meta name="author" content="Dimagi, Inc." />
        <meta charset="UTF-8" />
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <link rel="shortcut icon" href="http://www.dimagi.com/favicon.png" type="image/x-icon" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/stylesheets/css/main.css?v=2" media="screen" />
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php get_category_feed_link('46'); ?>" />
        
        <?php include_once("analytics.php") ?>
        
        <?php wp_deregister_script( 'jquery' );
	    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
	    wp_enqueue_script( 'jquery' ); ?>
        
        <!--[if lt IE 9]>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/stylesheets/css/ie_fixes.css" />
        <script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js" type="text/javascript"></script>
        <![endif]-->
        <!--[if lt IE 8]>
        <script type="text/javascript">  	
			$(function () {
				$('.content').first().append($('<div class="ie-clear-footer" />'));
			});
		</script>
        <![endif]-->
        
        <?php wp_head(); ?>
        <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
        
    </head>
    <body>
    	<div id="content-wrap">
        	<!--[if lt IE 7]>
    		<div class="alert alert-error">
    			<strong>Internet Explorer 6 is no longer supported.</strong><br />
    			<p>Please upgrade or use <a href="http://www.getfirefox.com/">Firefox</a> or <a href="http://google.com/chrome/">Chrome</a>.</p>
    		</div>
    		<![endif]-->
		    <header>
		    	<h1><a href="http://www.dimagi.com/"><img src="<?php bloginfo('template_directory'); ?>/img/dimagi-logo.png" width="150" height="69" alt="Dimagi" /></a></h1>
		        <nav>
			    	<ul>
			    		<li>
			    			<a href="<?php echo get_permalink('3015'); ?>"><?php $cat=get_category('32'); echo $cat->name; ?></a>
			    			<?php $wp_query_technologies = new WP_Query('cat=32,-38&showposts=-1&meta_key=menu-order&orderby=meta_value&order=ASC'); ?>
			    			<ul>
			    				<li><a href="http://www.commcarehq.org/">CommCare HQ</a></li>
			    				<?php while($wp_query_technologies->have_posts()) { $wp_query_technologies->the_post(); ?>
							        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						        <?php } ?>
			    			</ul>
			    		</li>
			    		<li>
			    			<a href="<?php echo get_permalink('72'); ?>"><?php $cat=get_category('34'); echo $cat->name; ?></a>
			    			<?php $wp_query_technologies = new WP_Query('cat=34,-38&showposts=-1&meta_key=menu-order&orderby=meta_value&order=ASC'); ?>
			    			<ul>
			    				<?php while($wp_query_technologies->have_posts()) { $wp_query_technologies->the_post(); ?>
						        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						        <?php } ?>
			    			</ul>
			    		</li>
			    		<li>
			    			<a href="<?php echo get_permalink('527'); ?>"><?php $cat=get_category('35'); echo $cat->name; ?></a>
			    			<?php $wp_query_technologies = new WP_Query('cat=35,-38&showposts=-1&meta_key=menu-order&orderby=meta_value&order=ASC'); ?>
			    			<ul>
			    				<?php while($wp_query_technologies->have_posts()) { $wp_query_technologies->the_post(); ?>
						        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						        <?php } ?>
			    			</ul>
			    		</li>
			    		<li>
			    			<a href="<?php echo get_permalink('1014'); ?>">Collaborate</a>
			    			<ul>
			    				<?php wp_list_pages('child_of=74&title_li='); ?>
			    			</ul>
			    		</li>
			    		<li>
			    			<a href="<?php echo get_permalink('2'); ?>">About Us</a>
			    			<ul>
			    				<?php wp_list_pages('child_of=2&meta_key=menu-order&orderby=meta_value&order=ASC&title_li='); ?>
			    			</ul>
			    		</li>
			    	</ul>
		        </nav>
		    </header>

		    <aside class="announcement">
		    	<div class="announcement-content">
		    		<a href="http://www.commcarehq.org/poc/wfa">Request for Applications</a><p>CommCare Proof of Concept in French West Africa and Gambia. <small>Free phones and support.</small></p><a class="learn-more" href="http://www.commcarehq.org/poc/wfa">Learn More</a>
		    	</div>
		    </aside>

		    
		    <div class="content">