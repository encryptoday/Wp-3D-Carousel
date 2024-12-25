<?php
/*
Plugin Name: Wp 3D Carousel
Description: A simple 3D carousel plugin for WordPress.
Version: 1.0
Author: MMM
Author URI: https://mmm.sh
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Enqueue scripts and styles
function wp_3d_carousel_enqueue_scripts() {
    wp_enqueue_style('wp-3d-carousel-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('wp-3d-carousel-reflection', plugin_dir_url(__FILE__) . 'js/reflection.js', array('jquery'), null, true);
    wp_enqueue_script('wp-3d-carousel-cloud9', plugin_dir_url(__FILE__) . 'js/jquery.cloud9carousel.js', array('jquery'), null, true);
   // wp_enqueue_script('wp-3d-carousel-mobile', plugin_dir_url(__FILE__) . 'js/jquery.mobile-1.5.0-alpha.1.min.js', array('jquery'), null, true);
    wp_enqueue_script('wp-3d-carousel-main', plugin_dir_url(__FILE__) . 'js/main.js', array('jquery', 'wp-3d-carousel-reflection', 'wp-3d-carousel-cloud9'), null, true);
}
add_action('wp_enqueue_scripts', 'wp_3d_carousel_enqueue_scripts');

// Shortcode to display the carousel
function wp_3d_carousel_shortcode() {
    ob_start();
    ?>
    <div class="car">
        <div id="carousel">
            <a href="https://wikiseo.com/wiki/"><img class="cloud9-item" src="<?php echo WP_PLUGIN_URL . '/wp-3d-carousel/images/image1.webp'; ?>" alt="Item #1" title="Wiki Article"></a>
            <a href="https://wikiseo.com/web/"><img class="cloud9-item" src="<?php echo WP_PLUGIN_URL . '/wp-3d-carousel/images/image2.webp'; ?>" alt="Item #2" title="Wordpress Website"></a>
            <a href="https://wikiseo.com/wiki/"><img class="cloud9-item" src="<?php echo WP_PLUGIN_URL . '/wp-3d-carousel/images/image3.webp'; ?>" alt="Item #3" title="Backlink Creation"></a>
            <a href="https://wikiseo.com/seo/"><img class="cloud9-item" src="<?php echo WP_PLUGIN_URL . '/wp-3d-carousel/images/image4.webp'; ?>" alt="Item #4" title="Performance Optimisation"></a>
            <a href="https://wikiseo.com/seo/"><img class="cloud9-item" src="<?php echo WP_PLUGIN_URL . '/wp-3d-carousel/images/image5.webp'; ?>" alt="Item #5" title="SEO Service"></a>
            <a href="https://wikiseo.com/web/"><img class="cloud9-item" src="<?php echo WP_PLUGIN_URL . '/wp-3d-carousel/images/image6.webp'; ?>" alt="Item #6" title="Web Development"></a>
        </div>
        <div class="titles">
                <h2 class="title"></h2>
        </div>
<!--    <div class="flex-center">
            <div id="buttons">
                <p class="left">
                    <svg fill="#777" height="37px" width="37px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>chevron-left-circle-outline</title><path d="M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M15.4,16.6L10.8,12L15.4,7.4L14,6L8,12L14,18L15.4,16.6Z" /></svg>
                </p>
                <p class="right">
                    <svg fill="#777" height="37px" width="37px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>chevron-right-circle-outline</title><path d="M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M8.6,16.6L13.2,12L8.6,7.4L10,6L16,12L10,18L8.6,16.6Z" /></svg>
                </p>
            </div>
        </div> -->
    </div>
<?php
    return ob_get_clean();
}

	function blog_posts(){
	ob_start();
	global $wpdb;
	$result = $wpdb->get_results();
    return ob_get_clean();
}
add_shortcode('wp_3d_carousel', 'wp_3d_carousel_shortcode');
add_shortcode('mmm_blog_posts', 'blog_posts');
?>
