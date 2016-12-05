<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
 
    <!--=== META TAGS ===-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="Keywords">
    <meta name="author" content="Name">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     
    <!--=== LINK TAGS ===-->
    <link rel="shortcut icon" href="<?php echo THEME_DIR; ?>/path/favicon.ico" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

 
    <!--=== WP_HEAD() ===-->
    <?php wp_head(); ?>
      
</head>
<body <?php body_class(); ?>>
 
<!-- HERE GOES YOUR HEADER MARKUP, LIKE LOGO, MENU, SOCIAL ICONS AND MORE -->
 
<!-- DON'T FORGET TO CLOSE THE BODY TAG ON footer.php FILE -->



<div class="container">

    <!-- site-header -->
    <header class="site-header">

        <div class="hd-search">
            <?php echo get_search_form(); ?>
        </div>
        
        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        <p><?php bloginfo( 'description' ); ?><?php if( is_page(26) ) { ?> - Thank you for viewing our work. <?php } ?></p>

        <nav class="site-nav">

            <?php 
                $args = array( 
                    'theme_location' => 'primary',
                    'depth' => 2,
                );
            ?>
            <?php wp_nav_menu($args); ?>

        </nav>

    </header><!-- site-header -->
