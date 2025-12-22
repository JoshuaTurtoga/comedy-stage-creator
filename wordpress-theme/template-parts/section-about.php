<?php
/**
 * About Section Template
 * 
 * Dynamic content from Theme Customizer:
 * - comedian_name
 * - about_text
 * - about_image
 * - stat_shows, stat_followers, stat_views
 * 
 * @package MikeCollinsComedy
 */

$comedian_name = mikecollins_get_option('comedian_name', 'MIKE COLLINS');
$first_name = explode(' ', $comedian_name)[0];
$about_text = mikecollins_get_option('about_text', '<p>Mike Collins has been making audiences roar with laughter for over a decade. Known for his razor-sharp observations and relatable storytelling, Mike transforms everyday experiences into comedy gold.</p><p>From sold-out theaters to late-night TV appearances, Mike has performed alongside some of the biggest names in comedy. His debut special "Life\'s Too Short" broke streaming records and earned critical acclaim.</p><p>When he\'s not on stage, Mike hosts the popular podcast "Laughing Matters" and continues to tour nationwide, bringing his unique brand of humor to fans everywhere.</p>');
$about_image = mikecollins_get_option('about_image', '');
$stat_shows = mikecollins_get_option('stat_shows', '500+');
$stat_followers = mikecollins_get_option('stat_followers', '2M+');
$stat_views = mikecollins_get_option('stat_views', '50M+');
?>

<section id="about" class="about-section">
    <div class="container">
        <div class="about-grid">
            <div>
                <h2 class="about-title">
                    ABOUT <span><?php echo esc_html(strtoupper($first_name)); ?></span>
                </h2>
                <div class="about-text">
                    <?php echo wp_kses_post($about_text); ?>
                </div>
                <div class="about-stats">
                    <div class="stat-item">
                        <h3><?php echo esc_html($stat_shows); ?></h3>
                        <p>Live Shows</p>
                    </div>
                    <div class="stat-item">
                        <h3><?php echo esc_html($stat_followers); ?></h3>
                        <p>Followers</p>
                    </div>
                    <div class="stat-item">
                        <h3><?php echo esc_html($stat_views); ?></h3>
                        <p>Views</p>
                    </div>
                </div>
            </div>
            <div class="about-image">
                <div class="about-image-wrapper">
                    <?php if ($about_image) : ?>
                        <img src="<?php echo esc_url($about_image); ?>" alt="<?php echo esc_attr($comedian_name); ?>">
                    <?php else : ?>
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg, hsl(var(--muted)), hsl(var(--secondary)));">
                            <span style="font-family:var(--font-display);font-size:3rem;color:hsl(var(--muted-foreground)/0.3);">PHOTO</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="about-image-accent"></div>
            </div>
        </div>
    </div>
</section>
