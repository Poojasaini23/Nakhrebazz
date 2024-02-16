<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css?v=1.4" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <?php do_action('storefront_before_site'); ?>

    <div id="page" class="hfeed site">
        <?php do_action('storefront_before_header'); ?>

        <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="header-top-section">
                            <div class="header-logo">
                                <?php do_action('storefront_header_logo'); ?>
                            </div>

                            <div class="header-icons">
                                <?php do_action('storefront_header_icons'); ?>
                            </div>
                        </div>

                        <div class="header-nav">
                            <?php

                            /**
                             * Functions hooked into storefront_header action
                             *
                             * @hooked storefront_header_container                 - 0
                             * @hooked storefront_skip_links                       - 5
                             * @hooked storefront_social_icons                     - 10
                             * @hooked storefront_site_branding                    - 20
                             * @hooked storefront_secondary_navigation             - 30
                             * @hooked storefront_product_search                   - 40
                             * @hooked storefront_header_container_close           - 41
                             * @hooked storefront_header_cart                      - 60
                             * @hooked storefront_primary_navigation_wrapper_close - 68
                             */
                            do_action('storefront_header');
                            ?>
                        </div>

                    </div>
                </div>
            </div>

        </header><!-- #masthead -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <header class="header-title entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>
                </div>
            </div>
        </div>

        <?php
        /**
         * Functions hooked in to storefront_before_content
         *
         * @hooked storefront_header_widget_region - 10
         * @hooked woocommerce_breadcrumb - 10
         */
        do_action('storefront_before_content');
        ?>

        <div id="content" class="site-content" tabindex="-1">
           <div class="container">
            <div class="row">
                <div class="col-md-12">

                <?php
                do_action('storefront_content_top');
