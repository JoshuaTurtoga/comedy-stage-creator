<?php
/**
 * Catherine Geller Theme Functions
 *
 * @package Catherine_Geller
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function catherine_geller_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');

    // Register navigation menus
    register_nav_menus(array(
        'primary'     => __('Primary Navigation', 'catherine-geller'),
        'footer'      => __('Footer Navigation', 'catherine-geller'),
    ));

    // Set content width
    if (!isset($content_width)) {
        $content_width = 1280;
    }
}
add_action('after_setup_theme', 'catherine_geller_setup');

/**
 * Enqueue Scripts and Styles
 */
function catherine_geller_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'catherine-geller-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Theme stylesheet
    wp_enqueue_style(
        'catherine-geller-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    // Theme JavaScript
    wp_enqueue_script(
        'catherine-geller-scripts',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'catherine_geller_scripts');

/**
 * Include additional files
 */
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/custom-post-types.php';

/**
 * Custom Nav Walker for smooth scrolling links
 */
class Catherine_Geller_Nav_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        
        $output .= '<li class="' . esc_attr($class_names) . '">';
        
        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        $atts['class']  = 'nav-link nav-link-underline';
        
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Get Theme Mod with Default
 */
function cg_get_theme_mod($key, $default = '') {
    return get_theme_mod($key, $default);
}

/**
 * Format view count
 */
function cg_format_views($views) {
    if ($views >= 1000000) {
        return round($views / 1000000, 1) . 'M views';
    } elseif ($views >= 1000) {
        return round($views / 1000, 1) . 'K views';
    }
    return $views . ' views';
}

/**
 * Get status class for tour dates
 */
function cg_get_status_class($status) {
    switch (strtolower($status)) {
        case 'sold out':
            return 'sold-out';
        case 'few left':
            return 'few-left';
        default:
            return 'on-sale';
    }
}

/**
 * Add body classes
 */
function catherine_geller_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    return $classes;
}
add_filter('body_class', 'catherine_geller_body_classes');

/**
 * Excerpt length
 */
function catherine_geller_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'catherine_geller_excerpt_length');

/**
 * Excerpt more
 */
function catherine_geller_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'catherine_geller_excerpt_more');
