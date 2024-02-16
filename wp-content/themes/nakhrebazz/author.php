<?php get_header(); ?>

<main role="main">
    <?php if (have_posts()):
    the_post(); ?>
    <!-- section -->
    <section>
        <?php rewind_posts();
        while (have_posts()) :
            the_post(); ?>

            <div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="row">
                        <!-- post thumbnail -->
                        <div class=" col-md-4 post_image">
                            <?php if (has_post_thumbnail()) : // Check if Thumbnail exists ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <!-- /post thumbnail -->

                        <!-- post title -->
                        <div class=" col-md-8 post_detail">
                            <h2>
                                <a href="<?php the_permalink(); ?>"
                                   title="<?php the_title(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <span
                                    class="comments"> </span>
                            <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php
                            ?>
                            <br class="clear">
                </article>
            </div>
        <?php endwhile; ?>
        <?php else: ?>
            <article>
                <h2><?php _e('Sorry, nothing to display.', 'html5blank'); ?></h2>
            </article>
        <?php
        endif;
        ?>
        <?php get_template_part('pagination'); ?>

    </section>
    <!-- /section -->
</main>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
