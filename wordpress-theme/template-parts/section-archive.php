<?php
/**
 * Archive Section Template Part
 */
$eras = new WP_Query(array('post_type' => 'era', 'posts_per_page' => 6, 'meta_key' => '_era_year', 'orderby' => 'meta_value', 'order' => 'DESC'));

$demo_eras = array(
    array('year' => '2024', 'title' => 'Unfiltered Era', 'description' => 'Netflix Special & National Tour', 'url' => '#'),
    array('year' => '2023', 'title' => 'Podcast Era', 'description' => 'The Laugh Track Launch', 'url' => '#'),
    array('year' => '2022', 'title' => 'Rising Star Era', 'description' => 'Comedy Central Debut', 'url' => '#'),
    array('year' => '2021', 'title' => 'Club Days Era', 'description' => 'Building the Foundation', 'url' => '#'),
    array('year' => '2020', 'title' => 'Virtual Era', 'description' => 'Live from the Living Room', 'url' => '#'),
    array('year' => '2019', 'title' => 'The Beginning', 'description' => 'First Open Mic', 'url' => '#'),
);
?>
<section id="archive" class="archive-section">
    <div class="container">
        <div class="section-header"><p class="section-label">Through The Years</p><h2 class="section-title">Archive</h2><p class="section-subtitle">Explore the different eras and milestones of Jane's comedy journey.</p></div>

        <div class="eras-grid">
            <?php if ($eras->have_posts()) : while ($eras->have_posts()) : $eras->the_post();
                $year = get_post_meta(get_the_ID(), '_era_year', true) ?: '';
                $desc = get_the_excerpt();
                $desc = $desc ? $desc : wp_trim_words(get_the_content(), 18);
            ?>
            <a href="<?php the_permalink(); ?>" class="era-card hover-lift">
                <div class="era-background">
                    <?php if (has_post_thumbnail()) : the_post_thumbnail('large', array('class' => 'era-image')); else : ?>
                        <div class="era-image-placeholder">Era Image</div>
                    <?php endif; ?>
                </div>
                <div class="era-overlay"></div>
                <div class="era-content">
                    <span class="era-year"><?php echo esc_html($year); ?></span>
                    <h3 class="era-title"><?php the_title(); ?></h3>
                    <p class="era-description"><?php echo esc_html($desc); ?></p>
                    <div class="era-explore"><span>Explore</span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); else : ?>

            <?php foreach ($demo_eras as $era) : ?>
            <a href="<?php echo esc_url($era['url']); ?>" class="era-card hover-lift">
                <div class="era-background">
                    <div class="era-image-placeholder">Era Image</div>
                </div>
                <div class="era-overlay"></div>
                <div class="era-content">
                    <span class="era-year"><?php echo esc_html($era['year']); ?></span>
                    <h3 class="era-title"><?php echo esc_html($era['title']); ?></h3>
                    <p class="era-description"><?php echo esc_html($era['description']); ?></p>
                    <div class="era-explore"><span>Explore</span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
                </div>
            </a>
            <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>
</section>

