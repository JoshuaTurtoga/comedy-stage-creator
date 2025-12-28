<?php
/**
 * Watch Section Template Part
 */
$featured = new WP_Query(array('post_type' => 'video', 'posts_per_page' => 1, 'meta_key' => '_video_featured', 'meta_value' => '1'));
$videos = new WP_Query(array('post_type' => 'video', 'posts_per_page' => 4, 'meta_query' => array(array('key' => '_video_featured', 'value' => '1', 'compare' => '!='))));
?>
<section id="watch" class="watch-section">
    <div class="container">
        <div class="section-header"><p class="section-label">Clips & Highlights</p><h2 class="section-title">Watch</h2></div>
        <div class="featured-video">
            <?php if ($featured->have_posts()) : $featured->the_post(); $url = get_post_meta(get_the_ID(), '_video_url', true); ?>
                <?php if (has_post_thumbnail()) : the_post_thumbnail('full', array('style' => 'width:100%;height:100%;object-fit:cover;')); else : ?>
                <div class="featured-video-placeholder">Featured Video</div>
                <?php endif; ?>
            <?php else : ?><div class="featured-video-placeholder">Featured Video</div><?php endif; wp_reset_postdata(); ?>
            <div class="featured-video-play"><svg viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg></div>
        </div>
        <div class="videos-grid">
            <?php if ($videos->have_posts()) : while ($videos->have_posts()) : $videos->the_post();
                $duration = get_post_meta(get_the_ID(), '_video_duration', true);
                $views = get_post_meta(get_the_ID(), '_video_views', true);
            ?>
            <div class="video-card">
                <div class="video-thumbnail">
                    <?php if (has_post_thumbnail()) : the_post_thumbnail('medium', array('style' => 'width:100%;height:100%;object-fit:cover;')); else : ?>
                    <div class="video-thumbnail-placeholder">Thumbnail</div>
                    <?php endif; ?>
                    <div class="video-thumbnail-overlay"><div class="video-play-button"><svg viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg></div></div>
                    <?php if ($duration) : ?><span class="video-duration"><?php echo esc_html($duration); ?></span><?php endif; ?>
                </div>
                <h3 class="video-title"><?php the_title(); ?></h3>
                <?php if ($views) : ?><p class="video-views"><?php echo cg_format_views($views); ?></p><?php endif; ?>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>
