<?php
/**
 * Single Era Template
 *
 * @package Catherine_Geller
 */

get_header();

while (have_posts()) : the_post();
    $year = get_post_meta(get_the_ID(), '_era_year', true);
?>

<article class="era-page">
    <!-- Era Hero -->
    <header class="era-hero">
        <div class="era-hero-background"></div>
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full', array('class' => 'era-hero-image')); ?>
        <?php endif; ?>
        <div class="era-hero-overlay"></div>
        
        <div class="era-hero-content">
            <?php if ($year) : ?>
                <p class="era-hero-year"><?php echo esc_html($year); ?></p>
            <?php endif; ?>
            <h1 class="era-hero-title"><?php the_title(); ?></h1>
        </div>
    </header>

    <!-- Era Content -->
    <section class="era-content-section">
        <div class="container">
            <a href="<?php echo esc_url(home_url('/#archive')); ?>" class="back-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                <?php _e('Back to Archive', 'catherine-geller'); ?>
            </a>
            
            <div class="entry-content" style="max-width: 800px; margin: 0 auto;">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
</article>

<?php
endwhile;
get_footer();
