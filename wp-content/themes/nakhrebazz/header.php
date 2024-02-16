<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if (wp_title('', false)) {
            echo ' :';
        } ?> <?php bloginfo('name'); ?></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link rel="shortcut icon" href="<?php echo $logo_image = get_field('favicon_ico', 'option'); ?>">
    <link rel="shortcut icon" href="<?php echo $logo_image = get_field('favicon_png', 'option'); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="theme-color" content="#db6237">
    <meta name="format-detection" content="telephone=no">

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/wow.min.js"></script>
    <script>
        new WOW().init({
            mobile:       false
        });
    </script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/animate.css"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css?v=1"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i&display=swap"
        rel="stylesheet">

    <?php wp_head(); ?>

    <style>
        <?php echo  get_field('css_text_area', 'option'); ?>
    </style>
</head>

<body <?php body_class(); ?>>
<a id="back-to-top" class="" href="#"><i class="fa fa-angle-up"></i></a>
<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top  bg-faded">
        <a class="navbar-brand mr-auto rotate " href="<?php echo get_home_url(); ?>">
            <img src="<?php the_field("header_image_logo", "options"); ?>" alt=""/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
                aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
            <span id="mybutton" class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse " id="navbarMobile">
            <div class="navbar_content">
                <?php
                $defaults = array(
                    'menu' => 'header menu',
                    'menu_class' => 'nav navbar-nav'
                );
                wp_nav_menu($defaults);
                ?>
            </div>
        </div>
    </nav>
</header>

<?php if (is_home() || is_front_page()) {

} else {

    $header_banner = get_field('header_banner');
    if ($header_banner == "" || $header_banner == null || $header_banner == false) {
        $header_banner = get_field('sub_header_image', "option");
    }
    ?>
    <div class="header-banner"
         style="background-image: url(<?php echo $header_banner; ?>)">
        <div class="banner-heading"><h1><?php the_field('header_title'); ?></h1></div>
    </div>
<?php } ?>

