<?php

/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme('storefront');
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
    $content_width = 980; /* pixels */
}

$storefront = (object) array(
    'version'    => $storefront_version,

    /**
     * Initialize all the things.
     */
    'main'       => require 'inc/class-storefront.php',
    'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';
require 'inc/wordpress-shims.php';

if (class_exists('Jetpack')) {
    $storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if (storefront_is_woocommerce_activated()) {
    $storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
    $storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

    require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

    require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
    require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
    require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if (is_admin()) {
    $storefront->admin = require 'inc/admin/class-storefront-admin.php';

    require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if (version_compare(get_bloginfo('version'), '4.7.3', '>=') && (is_admin() || is_customize_preview())) {
    require 'inc/nux/class-storefront-nux-admin.php';
    require 'inc/nux/class-storefront-nux-guided-tour.php';
    require 'inc/nux/class-storefront-nux-starter-content.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}



add_action('init', 'register_roadmap_post_type');
function register_roadmap_post_type()
{
    register_post_type(
        'roadmap',
        array(
            'labels' => array(
                'name' => 'RoadMap',
                'menu_name' => 'RoadMap',
                'singular_name' => 'RoadMap',
                'all_items' => 'All RoadMap'
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'author',),
            'hierarchical' => false,
            'has_archive' => 'roadmap',
            'taxonomies' => array('roadmap-category'),
            'rewrite' => array('slug' => 'roadmap/%roadmap-category%', 'hierarchical' => true, 'with_front' => false)
        )
    );
    register_taxonomy(
        'roadmap-category',
        array('roadmap'),
        array(
            'labels' => array(
                'name' => 'RoadMap Category',
                'menu_name' => 'RoadMap Category',
                'singular_name' => 'RoadMap Category',
                'all_items' => 'All RoadMap Category'
            ),
            'public' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'rewrite' => array('slug' => 'roadmap', 'hierarchical' => true, 'with_front' => false),
        )
    );
}

function wpa_roadmap_permalinks($post_link, $post)
{
    if (is_object($post) && $post->post_type == 'roadmap') {
        $terms = wp_get_object_terms($post->ID, 'roadmap-category');
        if ($terms) {
            return str_replace('%roadmap-category%', $terms[0]->slug, $post_link);
        }
    }
    return $post_link;
}
add_filter('post_type_link', 'wpa_roadmap_permalinks', 1, 2);




function mindbase_create_acf_pages()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_sub_page(array(
            'page_title'      => 'Roadmap Template',

            'parent_slug'     => 'edit.php?post_type=roadmap',
            'capability' => 'manage_options'
        ));
    }
}
add_action('init', 'mindbase_create_acf_pages');





function storefront_credit()
{
?>
    <div class="site-info">
        <div class="footer-bottom-left">
            <?php the_field("footer_left_title", "option"); ?>
        </div>
        <div class="footer-bottom-center">
            <?php the_field("footer_center_title", "option"); ?>
        </div>
        <div class="footer-bottom-right socia-site-icons row">
            <?php $Case = get_field('footer_right_icon', "option");
            if (is_array($Case)) {
                foreach ($Case as $Case_list) {
            ?>
                    <div class="social-icon-app">
                        <a target="_blank" href="<?php echo $Case_list['footer_icon_url']; ?>">
                            <img src="<?php echo $Case_list['footer_icon_text']; ?>" alt="">
                        </a>
                    </div>
            <?php
                }
            }
            ?>
        </div>

    </div><!-- .site-info -->
<?php
}
?>



<?php


add_action('wpcf7_mail_sent', 'update_vote_value');

function update_vote_value($contact_form)
{
    // Check if this is the form you want to target
    if ($contact_form->id() == "e719042") {
        // Update the vote value (replace this with your logic)
        $current_vote_value = get_option('vote_value', 0);
        update_option('vote_value', $current_vote_value + 1);
    }
}
