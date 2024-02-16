<?php
/**
 * The template for displaying contact pages.
 *
 * Template Name: about
 *
 * @package storefront
 */

get_header(); ?>


<div id="primary" class="content-area about-section">
    <main id="main" class="site-main" role="main">


        <?php
			while ( have_posts() ) :
				the_post();?>



        <div class="about-section-1" style="background-image: url('<?php the_field("section_1_header_image");?>');">
            <img src="<?php the_field("section_1_header_image");?>" alt="">
			<div class="about-gradient"></div>
            <div class="about-section-1-description">
                <h1><?php the_field("section_1_header_title");?></h1>
                <?php the_field("section_1_header_content");?>
            </div>
        </div>

        <div class="row about-section-2">
            <div class="col-md-6 about-section-2-left">
                <img src="<?php the_field("section_2_image");?>" alt="">
            </div>
            <div class="col-md-6 about-section-2-right">
                <h2><?php the_field("section_2_title");?></h2>
                <?php the_field("section_2_content");?>
                <div class="about-section-2-"></div>
            </div>
        </div>
        <div class="about-section-2 about-section-3">
            <div class="col-md-6 about-section-2-right about-section-3-left">
                <h2><?php the_field("section_3_title");?></h2>
                <?php the_field("section_3_content");?>
                <div class="about-section-2-"></div>
            </div>
            <div class="col-md-6 about-section-2-left about-section-3-right">
                <img src="<?php the_field("section_3_image");?>" alt="">
            </div>
        </div>


        <div class="about-section-4">
            <div class="about-section-4-left">
                <img src="<?php the_field("section_4_image");?>" alt="">
            </div>
            <div class="about-section-4-right about-section-2-right">
                <h2><?php the_field("section_4_title");?></h2>
                <?php the_field("section_4_content");?>
                <div class="about-section-2-"></div>
            </div>
        </div>

        <div class="about-section-5">
            <div class="about-section-5-left">
                <img src="<?php the_field("section_5_image");?>" alt="">
            </div>
            <div class="about-section-5-right about-section-2-right">
                <h2><?php the_field("section_5_title");?></h2>
                <?php the_field("section_5_content");?>
                <div class="about-section-2-"></div>
            </div>

        </div>




        <?php
			endwhile; // End of the loop.
			?>


    </main><!-- #main -->
</div><!-- #primary -->


<?php
get_footer();