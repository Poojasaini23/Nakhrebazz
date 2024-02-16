<?php /* Template Name: About Us */
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="container">
        <div class="col-12 main-content">
            <p><?php the_content(); ?></p>
        </div>
    </div>


<?php endwhile;
endif; ?>
<?php get_footer() ?>