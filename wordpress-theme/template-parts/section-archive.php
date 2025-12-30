<?php
/**
 * Archive Section Template Part
 */
$eras = new WP_Query(array('post_type' => 'era', 'posts_per_page' => 6, 'meta_key' => '_era_year', 'orderby' => 'meta_value', 'order' => 'DESC'));
?>
<section id="archive" class="archive-section">
    <div class="container">
        <div class="section-header"><p class="section-label">Through The Years</p><h2 class="section-title">Archive</h2><p class="section-subtitle">Explore the different eras and milestones of the comedy journey.</p></div>
        <div class="eras-grid">
            <?php if ($eras->have_posts()) : while ($eras->have_posts()) : $eras->the_post(); $year = get_post_meta(get_the_ID(), '_era_year', true); ?>
            <a href="<?php the_permalink(); ?>" class="era-card hover-lift">
                <div class="era-background"><?php if (has_post_thumbnail()) : the_post_thumbnail('large', array('class' => 'era-image')); else : ?><div class="era-image-placeholder">Era Image</div><?php endif; ?></div>
                <div class="era-overlay"></div>
                <div class="era-content"><span class="era-year"><?php echo esc_html($year); ?></span><h3 class="era-title"><?php the_title(); ?></h3><p class="era-description"><?php echo esc_html(get_the_excerpt()); ?></p><div class="era-explore"><span>Explore</span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div></div>
            </a>
            <?php endwhile; wp_reset_postdata(); else : ?><p style="text-align:center;color:var(--muted-foreground);grid-column:1/-1;">No eras added yet.</p><?php endif; ?>
        </div>
    </div>
</section>
