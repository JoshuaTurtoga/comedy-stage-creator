<?php
/**
 * Hero Section Template
 * 
 * Dynamic content from Theme Customizer:
 * - comedian_name
 * - hero_subtitle
 * - hero_tagline
 * - hero_background
 * 
 * @package MikeCollinsComedy
 */

$comedian_name = mikecollins_get_option('comedian_name', 'MIKE COLLINS');
$hero_subtitle = mikecollins_get_option('hero_subtitle', 'Stand-Up Comedian');
$hero_tagline = mikecollins_get_option('hero_tagline', 'Making audiences laugh across the nation with sharp wit and unforgettable stories');
$hero_background = mikecollins_get_option('hero_background', get_template_directory_uri() . '/assets/images/hero-comedian.jpg');
?>

<section class="hero-section">
    <!-- Background Image -->
    <div class="hero-background">
        <?php if ($hero_background) : ?>
            <img src="<?php echo esc_url($hero_background); ?>" alt="<?php echo esc_attr($comedian_name); ?> performing on stage">
        <?php endif; ?>
        <div class="hero-overlay"></div>
    </div>

    <!-- Spotlight Effect -->
    <div class="hero-spotlight"></div>

    <!-- Content -->
    <div class="hero-content container">
        <p class="hero-subtitle">
            <?php echo esc_html($hero_subtitle); ?>
        </p>
        <h1 class="hero-title">
            <?php echo esc_html($comedian_name); ?>
        </h1>
        <p class="hero-description">
            <?php echo esc_html($hero_tagline); ?>
        </p>
        <div class="hero-buttons">
            <a href="#shows" class="btn btn-hero">Get Tickets</a>
            <a href="#videos" class="btn btn-hero-outline">Watch Clips</a>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <div class="scroll-indicator-inner">
            <div class="scroll-indicator-dot"></div>
        </div>
    </div>
</section>
