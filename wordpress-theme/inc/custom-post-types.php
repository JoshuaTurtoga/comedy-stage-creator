<?php
/**
 * Custom Post Types
 *
 * @package Catherine_Geller
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Types
 */
function catherine_geller_register_post_types() {
    
    // ============================================
    // PROJECT (Specials, Podcasts, etc.)
    // ============================================
    register_post_type('project', array(
        'labels' => array(
            'name'               => __('Projects', 'catherine-geller'),
            'singular_name'      => __('Project', 'catherine-geller'),
            'add_new'            => __('Add New', 'catherine-geller'),
            'add_new_item'       => __('Add New Project', 'catherine-geller'),
            'edit_item'          => __('Edit Project', 'catherine-geller'),
            'new_item'           => __('New Project', 'catherine-geller'),
            'view_item'          => __('View Project', 'catherine-geller'),
            'search_items'       => __('Search Projects', 'catherine-geller'),
            'not_found'          => __('No projects found', 'catherine-geller'),
            'not_found_in_trash' => __('No projects found in trash', 'catherine-geller'),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-portfolio',
        'supports'      => array('title', 'editor', 'thumbnail'),
        'rewrite'       => array('slug' => 'projects'),
        'show_in_rest'  => true,
    ));

    // ============================================
    // VIDEO
    // ============================================
    register_post_type('video', array(
        'labels' => array(
            'name'               => __('Videos', 'catherine-geller'),
            'singular_name'      => __('Video', 'catherine-geller'),
            'add_new'            => __('Add New', 'catherine-geller'),
            'add_new_item'       => __('Add New Video', 'catherine-geller'),
            'edit_item'          => __('Edit Video', 'catherine-geller'),
            'new_item'           => __('New Video', 'catherine-geller'),
            'view_item'          => __('View Video', 'catherine-geller'),
            'search_items'       => __('Search Videos', 'catherine-geller'),
            'not_found'          => __('No videos found', 'catherine-geller'),
            'not_found_in_trash' => __('No videos found in trash', 'catherine-geller'),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-video-alt3',
        'supports'      => array('title', 'thumbnail'),
        'rewrite'       => array('slug' => 'videos'),
        'show_in_rest'  => true,
    ));

    // ============================================
    // SHOW (Tour Dates)
    // ============================================
    register_post_type('show', array(
        'labels' => array(
            'name'               => __('Tour Dates', 'catherine-geller'),
            'singular_name'      => __('Tour Date', 'catherine-geller'),
            'add_new'            => __('Add New', 'catherine-geller'),
            'add_new_item'       => __('Add New Tour Date', 'catherine-geller'),
            'edit_item'          => __('Edit Tour Date', 'catherine-geller'),
            'new_item'           => __('New Tour Date', 'catherine-geller'),
            'view_item'          => __('View Tour Date', 'catherine-geller'),
            'search_items'       => __('Search Tour Dates', 'catherine-geller'),
            'not_found'          => __('No tour dates found', 'catherine-geller'),
            'not_found_in_trash' => __('No tour dates found in trash', 'catherine-geller'),
        ),
        'public'        => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-calendar-alt',
        'supports'      => array('title'),
        'rewrite'       => array('slug' => 'shows'),
        'show_in_rest'  => true,
    ));

    // ============================================
    // ERA (Archive Timeline)
    // ============================================
    register_post_type('era', array(
        'labels' => array(
            'name'               => __('Eras', 'catherine-geller'),
            'singular_name'      => __('Era', 'catherine-geller'),
            'add_new'            => __('Add New', 'catherine-geller'),
            'add_new_item'       => __('Add New Era', 'catherine-geller'),
            'edit_item'          => __('Edit Era', 'catherine-geller'),
            'new_item'           => __('New Era', 'catherine-geller'),
            'view_item'          => __('View Era', 'catherine-geller'),
            'search_items'       => __('Search Eras', 'catherine-geller'),
            'not_found'          => __('No eras found', 'catherine-geller'),
            'not_found_in_trash' => __('No eras found in trash', 'catherine-geller'),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-backup',
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'       => array('slug' => 'archive'),
        'show_in_rest'  => true,
    ));
}
add_action('init', 'catherine_geller_register_post_types');

/**
 * Register Meta Boxes
 */
function catherine_geller_add_meta_boxes() {
    // Project meta box
    add_meta_box(
        'project_details',
        __('Project Details', 'catherine-geller'),
        'catherine_geller_project_meta_box',
        'project',
        'normal',
        'high'
    );

    // Video meta box
    add_meta_box(
        'video_details',
        __('Video Details', 'catherine-geller'),
        'catherine_geller_video_meta_box',
        'video',
        'normal',
        'high'
    );

    // Show meta box
    add_meta_box(
        'show_details',
        __('Show Details', 'catherine-geller'),
        'catherine_geller_show_meta_box',
        'show',
        'normal',
        'high'
    );

    // Era meta box
    add_meta_box(
        'era_details',
        __('Era Details', 'catherine-geller'),
        'catherine_geller_era_meta_box',
        'era',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'catherine_geller_add_meta_boxes');

/**
 * Project Meta Box Callback
 */
function catherine_geller_project_meta_box($post) {
    wp_nonce_field('catherine_geller_project_nonce', 'project_nonce');
    
    $type = get_post_meta($post->ID, '_project_type', true);
    $year = get_post_meta($post->ID, '_project_year', true);
    $url = get_post_meta($post->ID, '_project_url', true);
    ?>
    <p>
        <label for="project_type"><strong><?php _e('Type', 'catherine-geller'); ?></strong></label><br>
        <select name="project_type" id="project_type" style="width: 100%;">
            <option value="Special" <?php selected($type, 'Special'); ?>>Special</option>
            <option value="Podcast" <?php selected($type, 'Podcast'); ?>>Podcast</option>
            <option value="TV" <?php selected($type, 'TV'); ?>>TV</option>
            <option value="Film" <?php selected($type, 'Film'); ?>>Film</option>
        </select>
    </p>
    <p>
        <label for="project_year"><strong><?php _e('Year', 'catherine-geller'); ?></strong></label><br>
        <input type="text" name="project_year" id="project_year" value="<?php echo esc_attr($year); ?>" style="width: 100%;" placeholder="e.g., 2024 or 2023 - Present">
    </p>
    <p>
        <label for="project_url"><strong><?php _e('Link URL', 'catherine-geller'); ?></strong></label><br>
        <input type="url" name="project_url" id="project_url" value="<?php echo esc_url($url); ?>" style="width: 100%;" placeholder="https://">
    </p>
    <?php
}

/**
 * Video Meta Box Callback
 */
function catherine_geller_video_meta_box($post) {
    wp_nonce_field('catherine_geller_video_nonce', 'video_nonce');
    
    $url = get_post_meta($post->ID, '_video_url', true);
    $duration = get_post_meta($post->ID, '_video_duration', true);
    $views = get_post_meta($post->ID, '_video_views', true);
    $featured = get_post_meta($post->ID, '_video_featured', true);
    ?>
    <p>
        <label for="video_url"><strong><?php _e('Video URL', 'catherine-geller'); ?></strong></label><br>
        <input type="url" name="video_url" id="video_url" value="<?php echo esc_url($url); ?>" style="width: 100%;" placeholder="YouTube or Vimeo URL">
    </p>
    <p>
        <label for="video_duration"><strong><?php _e('Duration', 'catherine-geller'); ?></strong></label><br>
        <input type="text" name="video_duration" id="video_duration" value="<?php echo esc_attr($duration); ?>" style="width: 100%;" placeholder="e.g., 5:32">
    </p>
    <p>
        <label for="video_views"><strong><?php _e('View Count', 'catherine-geller'); ?></strong></label><br>
        <input type="number" name="video_views" id="video_views" value="<?php echo esc_attr($views); ?>" style="width: 100%;" placeholder="e.g., 2100000">
    </p>
    <p>
        <label>
            <input type="checkbox" name="video_featured" value="1" <?php checked($featured, '1'); ?>>
            <strong><?php _e('Featured Video', 'catherine-geller'); ?></strong>
        </label>
    </p>
    <?php
}

/**
 * Show Meta Box Callback
 */
function catherine_geller_show_meta_box($post) {
    wp_nonce_field('catherine_geller_show_nonce', 'show_nonce');
    
    $city = get_post_meta($post->ID, '_show_city', true);
    $venue = get_post_meta($post->ID, '_show_venue', true);
    $date = get_post_meta($post->ID, '_show_date', true);
    $status = get_post_meta($post->ID, '_show_status', true);
    $ticket_url = get_post_meta($post->ID, '_show_ticket_url', true);
    ?>
    <p>
        <label for="show_date"><strong><?php _e('Date', 'catherine-geller'); ?></strong></label><br>
        <input type="date" name="show_date" id="show_date" value="<?php echo esc_attr($date); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="show_city"><strong><?php _e('City', 'catherine-geller'); ?></strong></label><br>
        <input type="text" name="show_city" id="show_city" value="<?php echo esc_attr($city); ?>" style="width: 100%;" placeholder="e.g., New York, NY">
    </p>
    <p>
        <label for="show_venue"><strong><?php _e('Venue', 'catherine-geller'); ?></strong></label><br>
        <input type="text" name="show_venue" id="show_venue" value="<?php echo esc_attr($venue); ?>" style="width: 100%;" placeholder="e.g., Madison Square Garden">
    </p>
    <p>
        <label for="show_status"><strong><?php _e('Status', 'catherine-geller'); ?></strong></label><br>
        <select name="show_status" id="show_status" style="width: 100%;">
            <option value="On Sale" <?php selected($status, 'On Sale'); ?>>On Sale</option>
            <option value="Few Left" <?php selected($status, 'Few Left'); ?>>Few Left</option>
            <option value="Sold Out" <?php selected($status, 'Sold Out'); ?>>Sold Out</option>
        </select>
    </p>
    <p>
        <label for="show_ticket_url"><strong><?php _e('Ticket URL', 'catherine-geller'); ?></strong></label><br>
        <input type="url" name="show_ticket_url" id="show_ticket_url" value="<?php echo esc_url($ticket_url); ?>" style="width: 100%;" placeholder="https://">
    </p>
    <?php
}

/**
 * Era Meta Box Callback
 */
function catherine_geller_era_meta_box($post) {
    wp_nonce_field('catherine_geller_era_nonce', 'era_nonce');
    
    $year = get_post_meta($post->ID, '_era_year', true);
    ?>
    <p>
        <label for="era_year"><strong><?php _e('Year', 'catherine-geller'); ?></strong></label><br>
        <input type="text" name="era_year" id="era_year" value="<?php echo esc_attr($year); ?>" style="width: 100%;" placeholder="e.g., 2024">
    </p>
    <?php
}

/**
 * Save Meta Box Data
 */
function catherine_geller_save_meta_boxes($post_id) {
    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Project meta
    if (isset($_POST['project_nonce']) && wp_verify_nonce($_POST['project_nonce'], 'catherine_geller_project_nonce')) {
        if (isset($_POST['project_type'])) {
            update_post_meta($post_id, '_project_type', sanitize_text_field($_POST['project_type']));
        }
        if (isset($_POST['project_year'])) {
            update_post_meta($post_id, '_project_year', sanitize_text_field($_POST['project_year']));
        }
        if (isset($_POST['project_url'])) {
            update_post_meta($post_id, '_project_url', esc_url_raw($_POST['project_url']));
        }
    }

    // Video meta
    if (isset($_POST['video_nonce']) && wp_verify_nonce($_POST['video_nonce'], 'catherine_geller_video_nonce')) {
        if (isset($_POST['video_url'])) {
            update_post_meta($post_id, '_video_url', esc_url_raw($_POST['video_url']));
        }
        if (isset($_POST['video_duration'])) {
            update_post_meta($post_id, '_video_duration', sanitize_text_field($_POST['video_duration']));
        }
        if (isset($_POST['video_views'])) {
            update_post_meta($post_id, '_video_views', absint($_POST['video_views']));
        }
        update_post_meta($post_id, '_video_featured', isset($_POST['video_featured']) ? '1' : '0');
    }

    // Show meta
    if (isset($_POST['show_nonce']) && wp_verify_nonce($_POST['show_nonce'], 'catherine_geller_show_nonce')) {
        if (isset($_POST['show_city'])) {
            update_post_meta($post_id, '_show_city', sanitize_text_field($_POST['show_city']));
        }
        if (isset($_POST['show_venue'])) {
            update_post_meta($post_id, '_show_venue', sanitize_text_field($_POST['show_venue']));
        }
        if (isset($_POST['show_date'])) {
            update_post_meta($post_id, '_show_date', sanitize_text_field($_POST['show_date']));
        }
        if (isset($_POST['show_status'])) {
            update_post_meta($post_id, '_show_status', sanitize_text_field($_POST['show_status']));
        }
        if (isset($_POST['show_ticket_url'])) {
            update_post_meta($post_id, '_show_ticket_url', esc_url_raw($_POST['show_ticket_url']));
        }
    }

    // Era meta
    if (isset($_POST['era_nonce']) && wp_verify_nonce($_POST['era_nonce'], 'catherine_geller_era_nonce')) {
        if (isset($_POST['era_year'])) {
            update_post_meta($post_id, '_era_year', sanitize_text_field($_POST['era_year']));
        }
    }
}
add_action('save_post', 'catherine_geller_save_meta_boxes');
