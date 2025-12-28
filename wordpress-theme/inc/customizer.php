<?php
/**
 * Theme Customizer Settings
 *
 * @package Catherine_Geller
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Customizer Settings
 */
function catherine_geller_customize_register($wp_customize) {
    
    // ============================================
    // HERO SECTION
    // ============================================
    $wp_customize->add_section('cg_hero_section', array(
        'title'       => __('Hero Section', 'catherine-geller'),
        'description' => __('Customize the hero section on the homepage.', 'catherine-geller'),
        'priority'    => 30,
    ));

    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Stand-Up Comedian',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Subtitle', 'catherine-geller'),
        'section' => 'cg_hero_section',
        'type'    => 'text',
    ));

    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'CATHERINE GELLER',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Title', 'catherine-geller'),
        'section' => 'cg_hero_section',
        'type'    => 'text',
    ));

    // Hero Tagline
    $wp_customize->add_setting('hero_tagline', array(
        'default'           => 'Making audiences laugh one punchline at a time. Raw, honest, and unapologetically hilarious.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('hero_tagline', array(
        'label'   => __('Tagline', 'catherine-geller'),
        'section' => 'cg_hero_section',
        'type'    => 'textarea',
    ));

    // Hero Background Image
    $wp_customize->add_setting('hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label'   => __('Background Image', 'catherine-geller'),
        'section' => 'cg_hero_section',
    )));

    // Hero CTA Primary Text
    $wp_customize->add_setting('hero_cta_primary', array(
        'default'           => 'See Tour Dates',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('hero_cta_primary', array(
        'label'   => __('Primary Button Text', 'catherine-geller'),
        'section' => 'cg_hero_section',
        'type'    => 'text',
    ));

    // Hero CTA Secondary Text
    $wp_customize->add_setting('hero_cta_secondary', array(
        'default'           => 'Watch Clips',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('hero_cta_secondary', array(
        'label'   => __('Secondary Button Text', 'catherine-geller'),
        'section' => 'cg_hero_section',
        'type'    => 'text',
    ));

    // ============================================
    // ABOUT SECTION
    // ============================================
    $wp_customize->add_section('cg_about_section', array(
        'title'       => __('About Section', 'catherine-geller'),
        'description' => __('Customize the about section.', 'catherine-geller'),
        'priority'    => 31,
    ));

    // About Heading
    $wp_customize->add_setting('about_heading', array(
        'default'           => 'The Woman Behind the Mic',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('about_heading', array(
        'label'   => __('Heading', 'catherine-geller'),
        'section' => 'cg_about_section',
        'type'    => 'text',
    ));

    // About Bio
    $wp_customize->add_setting('about_bio', array(
        'default'           => '<p>Catherine Geller has been making audiences roar with laughter for over a decade. Known for her sharp wit, relatable storytelling, and fearless approach to comedy, she\'s become one of the most sought-after performers in the industry.</p><p>From sold-out theater tours to Netflix specials, Catherine brings her unique perspective on life, relationships, and the absurdity of everyday existence to stages around the world.</p><p>When she\'s not on stage, you can find her writing new material, hosting her hit podcast, or spending time with her rescue dogs.</p>',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('about_bio', array(
        'label'   => __('Biography', 'catherine-geller'),
        'section' => 'cg_about_section',
        'type'    => 'textarea',
    ));

    // About Image
    $wp_customize->add_setting('about_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label'   => __('Portrait Image', 'catherine-geller'),
        'section' => 'cg_about_section',
    )));

    // Stats
    $wp_customize->add_setting('about_stat_1_value', array(
        'default'           => '10+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_stat_1_value', array(
        'label'   => __('Stat 1 Value', 'catherine-geller'),
        'section' => 'cg_about_section',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('about_stat_1_label', array(
        'default'           => 'Years',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_stat_1_label', array(
        'label'   => __('Stat 1 Label', 'catherine-geller'),
        'section' => 'cg_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('about_stat_2_value', array(
        'default'           => '500+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_stat_2_value', array(
        'label'   => __('Stat 2 Value', 'catherine-geller'),
        'section' => 'cg_about_section',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('about_stat_2_label', array(
        'default'           => 'Shows',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_stat_2_label', array(
        'label'   => __('Stat 2 Label', 'catherine-geller'),
        'section' => 'cg_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('about_stat_3_value', array(
        'default'           => '1M+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_stat_3_value', array(
        'label'   => __('Stat 3 Value', 'catherine-geller'),
        'section' => 'cg_about_section',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('about_stat_3_label', array(
        'default'           => 'Fans',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_stat_3_label', array(
        'label'   => __('Stat 3 Label', 'catherine-geller'),
        'section' => 'cg_about_section',
        'type'    => 'text',
    ));

    // ============================================
    // CONTACT SECTION
    // ============================================
    $wp_customize->add_section('cg_contact_section', array(
        'title'       => __('Contact Section', 'catherine-geller'),
        'description' => __('Customize the contact section.', 'catherine-geller'),
        'priority'    => 32,
    ));

    // Contact Email
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'booking@catherinegeller.com',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('contact_email', array(
        'label'   => __('Booking Email', 'catherine-geller'),
        'section' => 'cg_contact_section',
        'type'    => 'email',
    ));

    // Contact Intro
    $wp_customize->add_setting('contact_intro', array(
        'default'           => 'For booking inquiries, press requests, or just to say hi — reach out through the form or connect on social media.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('contact_intro', array(
        'label'   => __('Introduction Text', 'catherine-geller'),
        'section' => 'cg_contact_section',
        'type'    => 'textarea',
    ));

    // Social Links
    $wp_customize->add_setting('social_instagram', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_instagram', array(
        'label'   => __('Instagram URL', 'catherine-geller'),
        'section' => 'cg_contact_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('social_twitter', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_twitter', array(
        'label'   => __('Twitter/X URL', 'catherine-geller'),
        'section' => 'cg_contact_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('social_youtube', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_youtube', array(
        'label'   => __('YouTube URL', 'catherine-geller'),
        'section' => 'cg_contact_section',
        'type'    => 'url',
    ));

    // ============================================
    // SECTIONS VISIBILITY
    // ============================================
    $wp_customize->add_section('cg_sections_visibility', array(
        'title'       => __('Sections Visibility', 'catherine-geller'),
        'description' => __('Show or hide homepage sections.', 'catherine-geller'),
        'priority'    => 35,
    ));

    $sections = array(
        'hero'     => 'Hero Section',
        'about'    => 'About Section',
        'projects' => 'Projects Section',
        'watch'    => 'Watch Section',
        'tour'     => 'Tour Section',
        'archive'  => 'Archive Section',
        'contact'  => 'Contact Section',
    );

    foreach ($sections as $key => $label) {
        $wp_customize->add_setting('show_' . $key . '_section', array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        ));
        $wp_customize->add_control('show_' . $key . '_section', array(
            'label'   => sprintf(__('Show %s', 'catherine-geller'), $label),
            'section' => 'cg_sections_visibility',
            'type'    => 'checkbox',
        ));
    }
}
add_action('customize_register', 'catherine_geller_customize_register');
