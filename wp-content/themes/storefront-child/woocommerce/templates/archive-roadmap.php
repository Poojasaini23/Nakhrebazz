<?php get_header(); ?>

<main role="main">
    <!-- section -->
    <section>

        <div class="roadmap-section-1-bg">
            <div class="roadmap-section-fade"></div>
            <div class="roadmap-section-1">
                <div class="container">
                    <div class="row howitwork-section-1 home-section-1">
                        <div class="col-xl-8 col-lg-10 mx-auto home-section-1-description">
                            <h1><?php the_field("header_title", "option"); ?></h1>
                            <?php the_field("header_content", "option"); ?>
                            <div class="home-section-1-button">
                                <?php
                                $link = get_field('header_button1', "option");
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                    <span class="home-section-1-button1">
                                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                    </span>
                                <?php endif; ?>


                                <?php
                                $link = get_field('header_button2', "option");
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                    <span class="roadmap-header-btn2">
                                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                    </span>
                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="home-pd-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 search-form-section">

                            <div class="search-container">
                                <form role="search" method="post" class="search-form" action="<?php echo home_url(); ?>/roadmap">
                                    <input type="text" name="s" id="search-terms" placeholder="Search terms..." />
                                    <button type="submit" name="submit" value="Go" class="search-icon"><i class="fa fa-fw fa-search"></i></button>
                                </form>
                            </div>


                            <div class="filters filter-button-group">
                                <div id="filters">
                                    <select id="filter-select2">
                                        <option class="active" value="*" data-filter="*">All Categories</option>
                                        <?php
                                        $terms = get_terms('roadmap-category');
                                        foreach ($terms as $term) { ?>

                                            <option value=".<?php echo $term->slug; ?>">
                                                <?php echo $term->name; ?>
                                            </option>

                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="home-pd-section">
                <div class="roadmap-section-2">
                    <div class="container grid">
                        <div class="row roadmap-section-2-repeater" id="isocontent">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => 'roadmap',
                                'order' => 'asc',
                                'paged' => $paged,
                            );

                            $query = new WP_Query($args);
                            while ($query->have_posts()) {
                                $query->the_post();
                                $termsArray = get_the_terms($post->ID, 'roadmap-category');
                                $termsSLug = "";
                                if (is_array($termsArray) || is_object($termsArray)) {
                                    foreach ($termsArray  as $term) {
                                        $termsSLug .= $term->slug . ' ';
                                    }
                                };
                            ?>
                                <div class="col-md-12 roadmap-section-2-repeater-description <?php echo $termsSLug; ?>grid-item">
                                    <div class="row roadmap-section-2-repeater-content">
                                        <div class="col-md-9 roadmap-section-2-repeater-left">
                                            <article>
                                                <div class="roadmap-section-2-repeater-left-content">
                                                    <div class="roadmap-section-2-repeater-category">
                                                        <span><?php echo $term->name; ?></span>
                                                    </div>
                                                    <div class="roadmap-section-2-repeater-title">
                                                        <a href="<?php the_permalink() ?>">
                                                            <h2><?php the_title() ?></h2>
                                                            <p> <?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
                                                        </a>
                                                        <div class="roadmap-section-2-repeater-detail">
                                                            <span class="roadmap-section-2-repeater-date"><?php echo get_the_date(); ?></span>|
                                                            <span class="roadmap-section-2-repeater-time"><?php echo get_the_time(); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-md-3 affilate-section-3-button roadmap-section-2-repeater-right">

                                            <button class="votebtn" id="voteButton">Vote</button>
                                            <div id="contactFormPopup2 voteForm" class="affiliate-pop-description">
                                                <div class="affiliate-section-3-bg">
                                                    <div class="affiliate-pop-bg"></div>
                                                    <div class="affiliate-pop-content">
                                                        <span class="closebtn" id="closeFormBtn2">&times;</span>
                                                        <div id="contactForm72" class="roadmap-contactfrom">
                                                            <div class="affiliate-contact-form"><?php the_field("section_2_content", "option"); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php  }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /section -->
</main>






<?php get_footer(); ?>