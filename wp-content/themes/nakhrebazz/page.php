<?php
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 main-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>


<?php endwhile;
endif; ?>
<?php get_footer() ?>