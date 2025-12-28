<?php
/**
 * Hero Section Template Part
 *
 * @package Catherine_Geller
 */

$hero_subtitle = get_theme_mod('hero_subtitle', 'Stand-Up Comedian');
$hero_title = get_theme_mod('hero_title', 'CATHERINE GELLER');
$hero_tagline = get_theme_mod('hero_tagline', 'Making audiences laugh one punchline at a time. Raw, honest, and unapologetically hilarious.');
$hero_image = get_theme_mod('hero_image', '');
$cta_primary = get_theme_mod('hero_cta_primary', 'See Tour Dates');
$cta_secondary = get_theme_mod('hero_cta_secondary', 'Watch Clips');
?>

<section id="hero" class="hero-section">
    <div class="hero-background">
        <?php if ($hero_image) : ?>
            <div class="hero-background-image" style="background-image: url('<?php echo esc_url($hero_image); ?>');"></div>
        <?php endif; ?>
        <div class="hero-decorative">
            <div class="hero-orb hero-orb-1 animate-float"></div>
            <div class="hero-orb hero-orb-2 animate-float"></div>
        </div>
        <?php if (!$hero_image) : ?>
            <div class="hero-placeholder">
                <div class="hero-placeholder-circle">
                    <span style="font-family: var(--font-body); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em;">Hero Image</span>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="hero-content">
        <p class="hero-subtitle animate-fade-up"><?php echo esc_html($hero_subtitle); ?></p>
        <h1 class="hero-title animate-fade-up" style="animation-delay: 0.2s;"><?php echo esc_html($hero_title); ?></h1>
        <p class="hero-tagline animate-fade-up" style="animation-delay: 0.4s;"><?php echo esc_html($hero_tagline); ?></p>
        <div class="hero-ctas animate-fade-up" style="animation-delay: 0.6s;">
            <a href="#tour" class="btn btn-secondary btn-lg"><?php echo esc_html($cta_primary); ?></a>
            <a href="#watch" class="btn btn-outline-light btn-lg"><?php echo esc_html($cta_secondary); ?></a>
        </div>
    </div>

    <button class="hero-scroll-indicator animate-bounce" onclick="document.getElementById('about').scrollIntoView({behavior: 'smooth'})">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
    </button>
</section>
