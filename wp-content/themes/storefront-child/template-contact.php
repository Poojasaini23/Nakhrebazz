<?php

/**
 * The template for displaying contact pages.
 *
 * Template Name: contact
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
                <h2 class="contact-title"><?php the_field("section_1_heading"); ?></h2>
            </div>

            <div class="contact-left-section col12-set">
                <div class="contact-form">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row contact-section2">
                    <div class="contact-right-section col-6" id="order_review">
                        <h2 class="contact-title"><?php the_field("section_1_title"); ?></h2>
                        <?php the_field("section_1_content"); ?>

                        <div class="socia-site-icons row">
                            <?php $Case = get_field('social_media_repeater');
                            if (is_array($Case)) {
                                foreach ($Case as $Case_list) {
                            ?>
                                    <div class="social-icon-app">
                                        <a target="_blank" href="<?php echo $Case_list['social_media_repeater_url']; ?>">
                                            <img src="<?php echo $Case_list['social_media_repeater_icon']; ?>" alt="">
                                        </a>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="contact-section-2 col-md-6 ">
                        <div class="contact-section-2-image">
                            <?php the_field("section_1_map");?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
