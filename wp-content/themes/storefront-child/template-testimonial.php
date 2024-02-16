<?php

/**
 * The template for displaying contact pages.
 *
 * Template Name: testimonial
 *
 * @package storefront
 */

get_header(); ?>

<div id="primary" class="content-area about-section">
    <main id="main" class="site-main" role="main">

        <?php
        while (have_posts()) :
            the_post(); ?>

            <div class="contact-section-1 col12-set">
                <h2 class="contact-title"><?php the_field("section_1_title"); ?></h2>
            </div>

            <div class="container">
                <div class="row testimonial-section-1">
                    <?php if (have_rows('section_1_repeater')) : ?>
                        <?php while (have_rows('section_1_repeater')) : the_row(); ?>
                            <div class="col-md-4 testimonial-section-1-repeater">
                                <?php $option = get_sub_field("section_1_option_button");
                                if ($option == "Image") { ?>
                                    <img class="header-section-img" src="<?php the_sub_field("section_1_repeater_image"); ?>" alt="">
                                <?php }
                                if ($option == "video") { ?>
                                    <video autoplay muted loop playsinline preload="auto" id="myVideo">
                                        <source src="<?php the_sub_field("section_1_repeater_video"); ?>" type="video/mp4">
                                    </video>
                                <?php }
                                if ($option == "Embed") { ?>
                                    <?php the_sub_field("section_1_repeater_embed"); ?>
                                <?php } ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>


        <?php
        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
