<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


        <div class="roadmap-section-1-bg">
            <div class="roadmap-section-fade"></div>
            <div class="container roadmap-detail-section-1">
                <div class="row careers-row2 home-section-1">
                    <div class="col-md-12 careers-section2 ul-list-img">
                        <a id="career-left-btn" href="<?php echo get_home_url(); ?>/roadmap">
                            back to RoadMap
                        </a>
                        <div class="right-button">

                            <div class="roadmap-single-category-date-section">
                                <div class="roadmap-single-category">
                                    <?php
                                    $terms = get_the_terms($post->ID, 'roadmap-category');
                                    if (is_array($terms) || is_object($terms)) {
                                        foreach ($terms as $term) { ?>
                                            <div class="roadmap-section-2-repeater-category">
                                                <span><?php echo $term->name; ?></span>
                                            </div>
                                    <?php }
                                    }
                                    ?>
                                </div>
                                <div class="roadmap-single-date">
                                    <div class="roadmap-section-2-repeater-detail">
                                        <span class="roadmap-section-2-repeater-date"><?php echo get_the_date(); ?></span>|
                                        <span class="roadmap-section-2-repeater-time"><?php echo get_the_time(); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h2 itemprop="title"> <?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            </div>

                            <div class="roadmap-single-button">
                                <div class="roadmap-single-vote-btn">
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
                                <div class="roadmap-single-share-btn">
                                    <button id="copyPermalinkButton">Copy Permalink</button>
                                    <div id="copyMessage"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var copyButton = document.getElementById('copyPermalinkButton');
                var copyMessageElement = document.getElementById('copyMessage');

                copyButton.addEventListener('click', function() {
                    var permalinkElement = document.createElement('textarea');
                    permalinkElement.value = window.location.href;

                    document.body.appendChild(permalinkElement);
                    permalinkElement.select();
                    document.execCommand('copy');
                    document.body.removeChild(permalinkElement);

                    copyMessageElement.innerHTML = 'copied to clipboard!';

                    setTimeout(function() {
                        copyMessageElement.innerHTML = '';
                    }, 3000);
                });
            });
        </script>


<?php endwhile;
endif; ?>
<?php get_footer() ?>