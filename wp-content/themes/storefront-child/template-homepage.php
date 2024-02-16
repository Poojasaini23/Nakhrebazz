<?php

/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */

get_header(); ?>

<div class="container-fluid">
    <div class="row header-slider">
        <?php if (have_rows('section_1_slider')) : ?>
            <?php while (have_rows('section_1_slider')) : the_row(); ?>
                <div class="col-md-4 header-slider-section">
                    <div class="header-slider-left-image">
                        <img src="<?php the_sub_field("section_1_slider_image"); ?>" alt="">
                        <div class="header-slider-content">
                            <?php the_sub_field("section_1_slider_title"); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<div class="container">
    <div class="row home-section-2 home-section-1">
        <div class="col-md-8 home-section-2-left">
            <div class="home-section-2-left-description">
                <a href="<?php the_field("section_2_image_url"); ?>">
                    <img src="<?php the_field("section_2_left_image"); ?>" alt="">
                </a>
            </div>
        </div>
        <div class="col-md-4 home-section-2-right">
            <div class="home-section-2-right-description">
                <div class="signup-app-section">
                    <div class="signup-app-image">
                        <img src="<?php the_field("section_2_right_image"); ?>" alt="">
                    </div>
                    <div class="signup-app-content">
                        <h2><?php the_field("section_2_right_title"); ?></h2>
                        <?php the_field("section_2_right_content"); ?>
                        <?php
                        $link = get_field('section_2_right_button');
                        if ($link) :
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            <div class="header-button-section signapp-button buttons">
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                    <?php echo esc_html($link_title); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row home-section-3 home-section-1">

    </div> -->


    <?php $cn = 0;
    if (have_rows('section_4_repeater')) : ?>
        <?php while (have_rows('section_4_repeater')) : the_row(); ?>
            <div class="<?php echo $cn % 2 == 0 ? 'cn-left' : 'cn-right ' ?>">

                <?php if ($cn % 2 === 0) { ?>
                    <div class="row home-section-4 home-section-1">
                        <div class="col-md-6 home-section-4-left">
                            <a href="<?php the_sub_field("section_4_left_image_url"); ?>">
                                <img src="<?php the_sub_field("section_4_left_image"); ?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-6 home-section-4-right">
                            <div class="home-section-4-right-top">
                                <a href="<?php the_sub_field("section_4_right_image_url"); ?>">
                                    <img src="<?php the_sub_field("section_4_right_image"); ?>" alt="">
                                </a>
                            </div>
                            <div class="home-section-4-right-bottom">
                                <a href="<?php the_sub_field("section_4_right_image1_url"); ?>">
                                    <img class="home-section-4-right-image1" src="<?php the_sub_field("section_4_right_image1"); ?>" alt="">
                                </a>
                                <a href="<?php the_sub_field("section_4_right_image2_url"); ?>">
                                    <img class="home-section-4-right-image2" src="<?php the_sub_field("section_4_right_image2"); ?>" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($cn % 2 !== 0) { ?>
                    <div class="row home-section-4 home-section-1">
                        <div class="col-md-6 home-section-4-right">
                            <div class="home-section-4-right-top">
                                <a href="<?php the_sub_field("section_4_right_image_url"); ?>">
                                    <img src="<?php the_sub_field("section_4_right_image"); ?>" alt="">
                                </a>
                            </div>
                            <div class="home-section-4-right-bottom">
                                <a href="<?php the_sub_field("section_4_right_image1_url"); ?>">
                                    <img class="home-section-4-right-image1" src="<?php the_sub_field("section_4_right_image1"); ?>" alt="">
                                </a>
                                <a href="<?php the_sub_field("section_4_right_image2_url"); ?>">
                                    <img class="home-section-4-right-image2" src="<?php the_sub_field("section_4_right_image2"); ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 home-section-4-left">
                            <a href="<?php the_sub_field("section_4_left_image_url"); ?>">
                                <img src="<?php the_sub_field("section_4_left_image"); ?>" alt="">
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php $cn++ ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<div class="home-section-4-background-image home-section-1">
    <a href="<?php the_field("section_4_background_image_url"); ?>">
        <img src="<?php the_field("section_4_background_image"); ?>" alt="">
    </a>
</div>

<div class="container">
    <div class="row home-section-5 home-section-1">
        <div class="col-md-6 home-section-5-left">
            <a href="<?php the_field("section_5_left_image_url"); ?>">
                <img src="<?php the_field("section_5_left_image"); ?>" alt="">
            </a>
        </div>
        <div class="col-md-6 home-section-5-right">
            <a href="<?php the_field("section_5_right_url"); ?>">
                <img src="<?php the_field("section_5_right_image"); ?>" alt="">
            </a>
        </div>
    </div>

    <div class="row home-section-6 home-section-1">
        <?php if (have_rows('section_6_repeater')) : ?>
            <?php while (have_rows('section_6_repeater')) : the_row(); ?>
                <div class="col-xl-3 col-md-6 home-section-6-description">
                    <div class="home-section-6-image">
                        <?php the_sub_field("section_6_repeater_icon"); ?>
                    </div>
                    <div class="home-section-6-content">
                        <h2><?php the_sub_field("section_6_repeater_title"); ?></h2>
                        <?php the_sub_field("section_6_repeater_content"); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="row home-section-7 home-section-1 testimonial-section">
        <?php $fea = get_field("section_7_option");
        if ($fea == "Show") { ?>

            <div class="col-md-12 testimonial-section-title">
                <h2><?php the_field("section_7_title"); ?></h2>
            </div>

            <?php if (have_rows('section_7_repeater')) : ?>
                <?php while (have_rows('section_7_repeater')) : the_row(); ?>
                    <div class="col-lg-4 col-md-6 testimonial-section-repeater">
                        <div class="testimonial-section-repeater-description">
                            <div class="testimonial-star-image">
                                <img src="<?php the_sub_field("section_7_repeater_icon"); ?>" alt="">
                            </div>
                            <?php the_sub_field("section_7_repeater_content"); ?>

                            <div class="testimonial-section-content">
                                <div class="testimonial-image">
                                    <img src="<?php the_sub_field("section_7_repeater_image"); ?>" alt="">
                                </div>
                                <div class="testimonial-section-detail">
                                    <h3><?php the_sub_field("section_7_repeater_name"); ?></h3>
                                    <?php the_sub_field("section_7_repeater_position"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        <?php }
        if ($fea == "Hide") { ?>
        <?php } ?>
    </div>
</div>

<div class="col-full">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php

            /**
             * Functions hooked in to homepage action
             *
             * @hooked storefront_homepage_content      - 10
             * @hooked storefront_product_categories    - 20
             * @hooked storefront_recent_products       - 30
             * @hooked storefront_popular_products      - 50
             * @hooked storefront_featured_products     - 40
             * @hooked storefront_on_sale_products      - 60
             * @hooked storefront_best_selling_products - 70
             */
            // do_action( 'homepage' );
            ?>

            <div class="home-section-4">
                <h2><?php the_field("section_2_title"); ?></h2>
                <?php the_field("section_2_content"); ?>
                <div class="home-section-4-description">
                    <?php if (have_rows('section_2_repeater')) : ?>
                        <?php while (have_rows('section_2_repeater')) : the_row(); ?>
                            <div class="home-section-4-image">
                                <a href="<?php the_sub_field("section_2_repeater_url"); ?>">
                                    <img src="<?php the_sub_field("section_2_repeater_image"); ?>" alt="">
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>


            <div class="container home-section-5">
                <h2><?php the_field("section_3_heading"); ?></h2>

                <?php $cn = 0;
                if (have_rows('section_3_repeater')) : ?>
                    <?php while (have_rows('section_3_repeater')) : the_row(); ?>
                        <div class="row <?php echo $cn % 2 == 0 ? 'cn-left' : 'cn-right ' ?>">

                            <?php if ($cn % 2 === 0) { ?>
                                <div class="home-section-5-left">
                                    <div class="home-section-5-description home-section-5-text-section">
                                        <h3><?php the_sub_field("section_3_repeater_title"); ?></h3>
                                        <?php the_sub_field("section_3_repeater_content"); ?>
                                        <div class="home-section-5-button">
                                            <a href="<?php the_sub_field("section_3_repeater_url"); ?>">
                                                <?php the_sub_field("section_3_repeater_text"); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="home-section-5-image-1 home-section-5-description">
                                        <img src="<?php the_sub_field("section_3_repeater_image"); ?>" alt="">
                                    </div>
                                    <div class="home-section-5-image-2 home-section-5-description">
                                        <img src="<?php the_sub_field("section_3_repeater_image_2"); ?>" alt="">
                                    </div>
                                </div>

                            <?php } ?>

                            <?php if ($cn % 2 !== 0) { ?>
                                <div class="home-section-5-left">
                                    <div class="home-section-5-image-1 home-section-5-description">
                                        <img src="<?php the_sub_field("section_3_repeater_image"); ?>" alt="">
                                    </div>
                                    <div class="home-section-5-image-2 home-section-5-description">
                                        <img src="<?php the_sub_field("section_3_repeater_image_2"); ?>" alt="">
                                    </div>
                                    <div class="home-section-5-description home-section-5-text-section">
                                        <h3><?php the_sub_field("section_3_repeater_title"); ?></h3>
                                        <?php the_sub_field("section_3_repeater_content"); ?>
                                        <div class="home-section-5-button">
                                            <a href="<?php the_sub_field("section_3_repeater_url"); ?>">
                                                <?php the_sub_field("section_3_repeater_text"); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?php $cn++ ?>
                    <?php endwhile;  ?>
                <?php endif; ?>
            </div>


            <div class="home-section-3-repeater">
                <h2><?php the_field("section_4_title"); ?></h2>
                <?php the_field("section_4_content"); ?>
            </div>
            <div class="row home-section-3">

                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'product',
                    'order' => 'DESC',
                    'orderby' => 'ID',
                );

                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post(); ?>

                        <div class="home-section-3-slider">
                            <article>
                                <div class="home-section-3-slider-image" itemprop="BlogPosting">
                                    <a href="<?php the_permalink() ?>">
                                        <div itemprop="thumbnailUrl" class="card-image">
                                            <?php the_post_thumbnail() ?>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        </div>
                <?php
                    }
                } else {
                    // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata(); ?>
            </div>


            <div class="home-section-2">
                <div class="home-section-2-left">
                    <?php if (have_rows('section_5_repeater')) : ?>
                        <?php while (have_rows('section_5_repeater')) : the_row(); ?>
                            <?php the_sub_field("video"); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="home-section-2-right">
                    <?php if (have_rows('section_5_repeater')) : ?>
                        <?php while (have_rows('section_5_repeater')) : the_row(); ?>
                            <div>
                                <div class="home-section-2-right-description">
                                    <div class="home-section-2-right-heading">
                                        <h2><?php the_sub_field("heading"); ?></h2>
                                        <span><?php the_sub_field("title"); ?></span>
                                    </div>
                                    <img src="<?php the_sub_field("icon"); ?>" alt="">
                                </div>
                                <div class="home-section-2-right-description-bottom">
                                    <img src="<?php the_sub_field("image"); ?>" alt="">
                                    <div class="home-section-2-right-bottom">
                                        <?php the_sub_field("content"); ?>
                                        <div class="home-section-2-name">
                                            <div class="home-section-2-line"></div>
                                            <span><?php the_sub_field("name"); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- #primary -->
<?php
get_footer();
