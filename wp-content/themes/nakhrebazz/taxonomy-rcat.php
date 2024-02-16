<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1 class="text-center">Resource List </h1>
<?php
echo  get_query_var( 'taxonomy' );
echo get_query_var( 'term' );

?>
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <li class="col-md-6 mx-auto">
                    <div class="blurb card-body">
                        <div class="b-img">
                            <?php
                            the_post_thumbnail("thumbnail");
                            ?>
                        </div>
                        <div class="b-text">
                            <h2><a href="<?php the_permalink($id); ?>"><?php the_title(); ?></a></h2>

                            <p> <?php
                                echo wp_trim_words(get_the_content(), 20, '...');
                                ?></p>
                            <a class="read_more_button" href="<?php the_permalink($id); ?>">read more</a>
                        </div>
                    </div>
                </li>

            <?php endwhile; ?>

            <?php else: ?>

                <!-- article -->
                <article>
                    <h2><?php _e('Sorry, nothing to display.', 'html5blank'); ?></h2>
                </article>
                <!-- /article -->

            <?php endif; ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
