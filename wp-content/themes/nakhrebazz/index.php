<?php /* Template Name: Home page */
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="homepage">
        <div class="homepage-section-first" style="background-image: url(<?php the_field('section_first_image'); ?>)">
            <div class="homepage-section-first-text-content">
                <div class="homepage-section-first-heading"><?php the_field('section_first_heading'); ?></div>
                <div class="homepage-section-first-text"><?php the_content(); ?></div>
                <div class="homepage-section-first-btn">
                    <a href="<?php the_field('section_first_btn_link'); ?>">
                        <?php the_field('section_first_btn_text'); ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="homepage-section-second" style="background-image: url(<?php the_field('section_second_image'); ?>)">
            <div class="homepage-section-second-text"><?php the_field('section_second_textarea'); ?></div>
        </div>
        <div class="homepage-section-third">
            <div class="homepage-section-third-text row">

                <div class="col-md-5 homepage-section-third-left-img" style="background-image: url('<?php the_field('section_third_image'); ?>') ">
                    <img src="<?php the_field('section_third_image'); ?>" class="img-hidden" />
                </div>
                <div class="col-md-7 homepage-section-third-right-text">
                    <?php the_field('section_third_text_area'); ?>
                </div>

            </div>
        </div>
        <div class="homepage-section-four">
            <div class="container">
                <div class="homepage-section-four-heading"><?php the_field('section_fourth_heading'); ?></div>
                <div class="homepage-section-four-activities">
                    <?php $Case = get_field('section_repeater');
                    if (is_array($Case)) {
                        foreach ($Case as $Case_list) {
                            ?>
                            <div class="eventblog-box-content row">
                                <div class="activities-box-image">
                                    <img src="<?php echo $Case_list['image']; ?>" alt="">
                                </div>
                                <div class="activities-box-text">
                                    <div class="activities-box-text-heading">
                                        <?php echo $Case_list['title']; ?>
                                    </div>
                                    <div class="activities-box-text-content">
                                        <?php echo $Case_list['details']; ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
                <div class="more-btn">
                    <a class="more-btn-activities-box" href="<?php the_field("section_page_link"); ?>">More Activities</a>
                </div>
            </div>
        </div>
        <div class="homepage-section-fifth">
            <div class="homepage-section-fifth-heading"><?php the_field('section_fifth_heading'); ?></div>
            <div class="homepage-section-fifth-repeater">
                <div class="autoplay">
                    <?php $Case = get_field('section_fifth_repeater');
                    if (is_array($Case)) {
                        foreach ($Case as $Case_list) {
                            ?>
                            <div class="logo-img">
                                <a  target="_blank" class="logo-img-tag"
                                   href="<?php echo $Case_list['section_fifth_repeater_logo_link']; ?>">
                                    <img src="<?php echo $Case_list['section_fifth_repeater_logo_img']; ?>" alt="">
                                </a>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
<?php endwhile;
endif; ?>
<?php get_footer() ?>