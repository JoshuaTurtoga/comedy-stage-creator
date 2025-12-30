<?php
/**
 * About Section Template Part
 */
$heading = get_theme_mod('about_heading', 'The Woman Behind the Mic');
$bio = get_theme_mod(
    'about_bio',
    '<p>Catherine Geller has been making audiences roar with laughter for over a decade. Known for her sharp wit, relatable storytelling, and fearless approach to comedy, she\'s become one of the most sought-after performers in the industry.</p>' .
    '<p>From sold-out theater tours to Netflix specials, Catherine brings her unique perspective on life, relationships, and the absurdity of everyday existence to stages around the world.</p>' .
    '<p>When she\'s not on stage, you can find her writing new material, hosting her hit podcast, or spending time with her rescue dogs.</p>'
);
$image = get_theme_mod('about_image', '');
$stat1_val = get_theme_mod('about_stat_1_value', '10+');
$stat1_label = get_theme_mod('about_stat_1_label', 'Years');
$stat2_val = get_theme_mod('about_stat_2_value', '500+');
$stat2_label = get_theme_mod('about_stat_2_label', 'Shows');
$stat3_val = get_theme_mod('about_stat_3_value', '1M+');
$stat3_label = get_theme_mod('about_stat_3_label', 'Fans');
?>
<section id="about" class="about-section">
    <div class="container">
        <div class="about-grid">
            <div class="about-image-wrapper">
                <div class="about-image-container">
                    <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($heading); ?>" class="about-image">
                    <?php else : ?>
                        <div class="about-image-placeholder">Portrait Image</div>
                    <?php endif; ?>
                </div>
                <div class="about-image-frame"></div>
            </div>
            <div class="about-content">
                <p class="section-label">About</p>
                <h2 class="about-heading"><?php echo esc_html($heading); ?></h2>
                <div class="about-bio"><?php echo wp_kses_post($bio); ?></div>
                <div class="about-stats">
                    <div><p class="stat-value"><?php echo esc_html($stat1_val); ?></p><p class="stat-label"><?php echo esc_html($stat1_label); ?></p></div>
                    <div><p class="stat-value"><?php echo esc_html($stat2_val); ?></p><p class="stat-label"><?php echo esc_html($stat2_label); ?></p></div>
                    <div><p class="stat-value"><?php echo esc_html($stat3_val); ?></p><p class="stat-label"><?php echo esc_html($stat3_label); ?></p></div>
                </div>
            </div>
        </div>
    </div>
</section>
