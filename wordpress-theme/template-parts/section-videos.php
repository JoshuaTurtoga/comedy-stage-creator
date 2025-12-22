<?php
/**
 * Videos Section Template
 * 
 * Dynamic content from Custom Post Type: 'video'
 * Custom fields:
 * - _video_url
 * - _video_views
 * - Featured image for thumbnail
 * 
 * @package MikeCollinsComedy
 */

$videos = new WP_Query(array(
    'post_type'      => 'video',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
));
?>

<section id="videos" class="videos-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                WATCH <span>MIKE</span>
            </h2>
            <p class="section-subtitle">
                Catch up on the latest clips and full specials
            </p>
        </div>

        <div class="videos-grid">
            <?php if ($videos->have_posts()) : ?>
                <?php while ($videos->have_posts()) : $videos->the_post();
                    $video_url = get_post_meta(get_the_ID(), '_video_url', true);
                    $views = get_post_meta(get_the_ID(), '_video_views', true);
                ?>
                    <a href="<?php echo esc_url($video_url ?: '#'); ?>" class="video-card" target="_blank" rel="noopener">
                        <div class="video-thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                                <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg, hsl(var(--muted)), hsl(var(--secondary)));">
                                    <span style="font-family:var(--font-display);font-size:1.5rem;color:hsl(var(--muted-foreground)/0.3);">VIDEO</span>
                                </div>
                            <?php endif; ?>
                            <div class="video-play-overlay">
                                <div class="video-play-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <polygon points="5 3 19 12 5 21 5 3"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <h3 class="video-title"><?php the_title(); ?></h3>
                        <?php if ($views) : ?>
                            <p class="video-views"><?php echo esc_html($views); ?></p>
                        <?php endif; ?>
                    </a>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Fallback static content -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg, hsl(var(--muted)), hsl(var(--secondary)));">
                            <span style="font-family:var(--font-display);font-size:1.5rem;color:hsl(var(--muted-foreground)/0.3);">Special</span>
                        </div>
                        <div class="video-play-overlay">
                            <div class="video-play-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="5 3 19 12 5 21 5 3"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h3 class="video-title">Life's Too Short - Full Special</h3>
                    <p class="video-views">12M views</p>
                </div>
                <div class="video-card">
                    <div class="video-thumbnail">
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg, hsl(var(--muted)), hsl(var(--secondary)));">
                            <span style="font-family:var(--font-display);font-size:1.5rem;color:hsl(var(--muted-foreground)/0.3);">Late Night</span>
                        </div>
                        <div class="video-play-overlay">
                            <div class="video-play-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="5 3 19 12 5 21 5 3"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h3 class="video-title">Best of Late Night Appearances</h3>
                    <p class="video-views">5.2M views</p>
                </div>
                <div class="video-card">
                    <div class="video-thumbnail">
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg, hsl(var(--muted)), hsl(var(--secondary)));">
                            <span style="font-family:var(--font-display);font-size:1.5rem;color:hsl(var(--muted-foreground)/0.3);">Clips</span>
                        </div>
                        <div class="video-play-overlay">
                            <div class="video-play-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="5 3 19 12 5 21 5 3"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h3 class="video-title">Relationship Comedy Gold</h3>
                    <p class="video-views">8.7M views</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
