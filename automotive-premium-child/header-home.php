<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/selectBox/jquery.selectBox.css"/>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script>document.documentElement.className += ' wf-loading';</script>
<style>.wf-loading .nav a{font-family:Arial;visibility: hidden;}.wf-loading .side-widget h3 {font-family:cursive;visibility: hidden;}.wf-active .nav a {visibility: visible;}.wf-active .side-widget h3 {visibility: visible;}
</style>
<script type="text/javascript">
  WebFontConfig = {
    google: { families: [ 'Roboto:400,300,500','Roboto+Condensed:400,700:latin'] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); </script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class = "home-carousel" id="home_slider">
        <?php echo do_shortcode('[rev_slider alias="slider_home"]'); ?>
    </div>

    <div id="header_home_sticky">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 center-block">
                    <?php if (get_header_image() == '') { ?><div class="col-sm-6 hidden-xs" id="logo">
                    <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
                    <?php $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h1 class="site-description"><?php echo $description; ?></h1>
                    <?php endif; ?>
                    </div>
                    <div class="col-sm-6 hidden-xs" id="phone">
                        <?php if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('phone') ) :  endif; ?>
                    </div>
                    <?php } else { ?><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>" /><?php
                    } ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row pad">
                    <div class="col-sm-12 head">
                        <nav id="menu"  class="navbar navbar-default"  role="navigation">
                        <div class="container">
                            <div class="navbar-header navbar-default">
                                <button class="navbar-toggle menu" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <button class="navbar-toggle search" type="button" data-toggle="collapse" data-target=".search-button">
                                    <span class="sr-only"><?php _e('Toggle Search','language');?></span>
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                                <a class="logo visible-xs" href="<?php bloginfo('url'); ?>"><?php if ( has_custom_logo() ) : ?>
                                <?php the_custom_logo(); ?></a>
                                <?php else : ?>
                            <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
                                    <?php endif; ?>







                            </div>
                        <div class="collapse navbar-collapse bs-navbar-collapse">
                            <?php wp_nav_menu( array(
                                'menu' 				=> 'Menu',
                                'theme_location' 	=> 'header-menu',
                                'container' 		=> false,
                                'menu_class'		=>'nav navbar-nav',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new wp_bootstrap_navwalker(),
                                )
                            );?>
                        </div>
                            <div class="collapse navbar-collapse search-button" id="searchbar">
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

	<div class="container-fluid">
    <div class="loading-msg">
        <div class="loader-hold">
            <div class="loader" data-loader="circle-side">
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="text"><?php _e('Searching Inventory...','language');?>
        </div>
    </div>