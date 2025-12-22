<?php
/**
 * Mike Collins Comedy Theme Functions
 *
 * @package MikeCollinsComedy
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function mikecollins_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('customize-selective-refresh-widgets');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mikecollins'),
        'mobile'  => __('Mobile Menu', 'mikecollins'),
        'footer'  => __('Footer Menu', 'mikecollins'),
    ));

    // Set content width
    if (!isset($content_width)) {
        $content_width = 1280;
    }
}
add_action('after_setup_theme', 'mikecollins_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function mikecollins_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'mikecollins-google-fonts',
        'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'mikecollins-style',
        get_stylesheet_uri(),
        array('mikecollins-google-fonts'),
        wp_get_theme()->get('Version')
    );

    // Main JavaScript
    wp_enqueue_script(
        'mikecollins-scripts',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );

    // Localize script for AJAX
    wp_localize_script('mikecollins-scripts', 'mikeCollinsData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('mikecollins_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'mikecollins_enqueue_assets');

/**
 * Register Custom Post Types
 */
function mikecollins_register_post_types() {
    // Shows Custom Post Type
    register_post_type('show', array(
        'labels' => array(
            'name'               => __('Shows', 'mikecollins'),
            'singular_name'      => __('Show', 'mikecollins'),
            'add_new'            => __('Add New Show', 'mikecollins'),
            'add_new_item'       => __('Add New Show', 'mikecollins'),
            'edit_item'          => __('Edit Show', 'mikecollins'),
            'new_item'           => __('New Show', 'mikecollins'),
            'view_item'          => __('View Show', 'mikecollins'),
            'search_items'       => __('Search Shows', 'mikecollins'),
            'not_found'          => __('No shows found', 'mikecollins'),
            'not_found_in_trash' => __('No shows found in trash', 'mikecollins'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-calendar-alt',
        'supports'     => array('title', 'editor', 'thumbnail'),
        'rewrite'      => array('slug' => 'shows'),
        'show_in_rest' => true,
    ));

    // Videos Custom Post Type
    register_post_type('video', array(
        'labels' => array(
            'name'               => __('Videos', 'mikecollins'),
            'singular_name'      => __('Video', 'mikecollins'),
            'add_new'            => __('Add New Video', 'mikecollins'),
            'add_new_item'       => __('Add New Video', 'mikecollins'),
            'edit_item'          => __('Edit Video', 'mikecollins'),
            'new_item'           => __('New Video', 'mikecollins'),
            'view_item'          => __('View Video', 'mikecollins'),
            'search_items'       => __('Search Videos', 'mikecollins'),
            'not_found'          => __('No videos found', 'mikecollins'),
            'not_found_in_trash' => __('No videos found in trash', 'mikecollins'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-video-alt3',
        'supports'     => array('title', 'editor', 'thumbnail'),
        'rewrite'      => array('slug' => 'videos'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'mikecollins_register_post_types');

/**
 * Register Custom Meta Boxes for Shows
 */
function mikecollins_show_meta_boxes() {
    add_meta_box(
        'show_details',
        __('Show Details', 'mikecollins'),
        'mikecollins_show_details_callback',
        'show',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'mikecollins_show_meta_boxes');

function mikecollins_show_details_callback($post) {
    wp_nonce_field('mikecollins_show_details', 'mikecollins_show_nonce');
    
    $venue = get_post_meta($post->ID, '_show_venue', true);
    $city = get_post_meta($post->ID, '_show_city', true);
    $date = get_post_meta($post->ID, '_show_date', true);
    $status = get_post_meta($post->ID, '_show_status', true);
    $ticket_url = get_post_meta($post->ID, '_show_ticket_url', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="show_venue"><?php _e('Venue', 'mikecollins'); ?></label></th>
            <td><input type="text" id="show_venue" name="show_venue" value="<?php echo esc_attr($venue); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="show_city"><?php _e('City', 'mikecollins'); ?></label></th>
            <td><input type="text" id="show_city" name="show_city" value="<?php echo esc_attr($city); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="show_date"><?php _e('Date', 'mikecollins'); ?></label></th>
            <td><input type="date" id="show_date" name="show_date" value="<?php echo esc_attr($date); ?>"></td>
        </tr>
        <tr>
            <th><label for="show_status"><?php _e('Status', 'mikecollins'); ?></label></th>
            <td>
                <select id="show_status" name="show_status">
                    <option value="on-sale" <?php selected($status, 'on-sale'); ?>><?php _e('On Sale', 'mikecollins'); ?></option>
                    <option value="few-left" <?php selected($status, 'few-left'); ?>><?php _e('Few Left', 'mikecollins'); ?></option>
                    <option value="sold-out" <?php selected($status, 'sold-out'); ?>><?php _e('Sold Out', 'mikecollins'); ?></option>
                    <option value="coming-soon" <?php selected($status, 'coming-soon'); ?>><?php _e('Coming Soon', 'mikecollins'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="show_ticket_url"><?php _e('Ticket URL', 'mikecollins'); ?></label></th>
            <td><input type="url" id="show_ticket_url" name="show_ticket_url" value="<?php echo esc_url($ticket_url); ?>" class="regular-text"></td>
        </tr>
    </table>
    <?php
}

function mikecollins_save_show_meta($post_id) {
    if (!isset($_POST['mikecollins_show_nonce']) || !wp_verify_nonce($_POST['mikecollins_show_nonce'], 'mikecollins_show_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    $fields = array('show_venue', 'show_city', 'show_date', 'show_status', 'show_ticket_url');
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post_show', 'mikecollins_save_show_meta');

/**
 * Register Custom Meta Boxes for Videos
 */
function mikecollins_video_meta_boxes() {
    add_meta_box(
        'video_details',
        __('Video Details', 'mikecollins'),
        'mikecollins_video_details_callback',
        'video',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'mikecollins_video_meta_boxes');

function mikecollins_video_details_callback($post) {
    wp_nonce_field('mikecollins_video_details', 'mikecollins_video_nonce');
    
    $video_url = get_post_meta($post->ID, '_video_url', true);
    $views = get_post_meta($post->ID, '_video_views', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="video_url"><?php _e('Video URL (YouTube/Vimeo)', 'mikecollins'); ?></label></th>
            <td><input type="url" id="video_url" name="video_url" value="<?php echo esc_url($video_url); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="video_views"><?php _e('Views (e.g., "12M views")', 'mikecollins'); ?></label></th>
            <td><input type="text" id="video_views" name="video_views" value="<?php echo esc_attr($views); ?>" class="regular-text"></td>
        </tr>
    </table>
    <?php
}

function mikecollins_save_video_meta($post_id) {
    if (!isset($_POST['mikecollins_video_nonce']) || !wp_verify_nonce($_POST['mikecollins_video_nonce'], 'mikecollins_video_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['video_url'])) {
        update_post_meta($post_id, '_video_url', esc_url_raw($_POST['video_url']));
    }
    
    if (isset($_POST['video_views'])) {
        update_post_meta($post_id, '_video_views', sanitize_text_field($_POST['video_views']));
    }
}
add_action('save_post_video', 'mikecollins_save_video_meta');

/**
 * Theme Customizer Settings
 */
function mikecollins_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Hero Section', 'mikecollins'),
        'priority' => 30,
    ));

    // Comedian Name
    $wp_customize->add_setting('comedian_name', array(
        'default'           => 'MIKE COLLINS',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('comedian_name', array(
        'label'   => __('Comedian Name', 'mikecollins'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Stand-Up Comedian',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Subtitle', 'mikecollins'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    // Hero Tagline
    $wp_customize->add_setting('hero_tagline', array(
        'default'           => 'Making audiences laugh across the nation with sharp wit and unforgettable stories',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_tagline', array(
        'label'   => __('Tagline', 'mikecollins'),
        'section' => 'hero_section',
        'type'    => 'textarea',
    ));

    // Hero Background Image
    $wp_customize->add_setting('hero_background', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
        'label'   => __('Background Image', 'mikecollins'),
        'section' => 'hero_section',
    )));

    // About Section
    $wp_customize->add_section('about_section', array(
        'title'    => __('About Section', 'mikecollins'),
        'priority' => 35,
    ));

    // About Text
    $wp_customize->add_setting('about_text', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('about_text', array(
        'label'   => __('About Text', 'mikecollins'),
        'section' => 'about_section',
        'type'    => 'textarea',
    ));

    // About Image
    $wp_customize->add_setting('about_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label'   => __('About Photo', 'mikecollins'),
        'section' => 'about_section',
    )));

    // Stats
    $wp_customize->add_setting('stat_shows', array('default' => '500+', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_shows', array('label' => __('Live Shows Count', 'mikecollins'), 'section' => 'about_section', 'type' => 'text'));

    $wp_customize->add_setting('stat_followers', array('default' => '2M+', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_followers', array('label' => __('Followers Count', 'mikecollins'), 'section' => 'about_section', 'type' => 'text'));

    $wp_customize->add_setting('stat_views', array('default' => '50M+', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_views', array('label' => __('Views Count', 'mikecollins'), 'section' => 'about_section', 'type' => 'text'));

    // Contact Section
    $wp_customize->add_section('contact_section', array(
        'title'    => __('Contact Section', 'mikecollins'),
        'priority' => 40,
    ));

    // Booking Email
    $wp_customize->add_setting('booking_email', array(
        'default'           => 'booking@mikecollins.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('booking_email', array(
        'label'   => __('Booking Email', 'mikecollins'),
        'section' => 'contact_section',
        'type'    => 'email',
    ));

    // Social Links
    $wp_customize->add_setting('social_instagram', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('social_instagram', array('label' => __('Instagram URL', 'mikecollins'), 'section' => 'contact_section', 'type' => 'url'));

    $wp_customize->add_setting('social_twitter', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('social_twitter', array('label' => __('Twitter URL', 'mikecollins'), 'section' => 'contact_section', 'type' => 'url'));

    $wp_customize->add_setting('social_youtube', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('social_youtube', array('label' => __('YouTube URL', 'mikecollins'), 'section' => 'contact_section', 'type' => 'url'));
}
add_action('customize_register', 'mikecollins_customize_register');

/**
 * Helper function to get theme mod with default
 */
function mikecollins_get_option($key, $default = '') {
    return get_theme_mod($key, $default);
}

/**
 * Register Widget Areas
 */
function mikecollins_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'mikecollins'),
        'id'            => 'footer-widget',
        'description'   => __('Add widgets here for footer section.', 'mikecollins'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'mikecollins_widgets_init');

/**
 * Custom Excerpt Length
 */
function mikecollins_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'mikecollins_excerpt_length');

/**
 * SVG Support
 */
function mikecollins_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'mikecollins_mime_types');
