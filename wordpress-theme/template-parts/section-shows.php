<?php
/**
 * Shows Section Template
 * 
 * Dynamic content from Custom Post Type: 'show'
 * Custom fields:
 * - _show_venue
 * - _show_city
 * - _show_date
 * - _show_status
 * - _show_ticket_url
 * 
 * @package MikeCollinsComedy
 */

$shows = new WP_Query(array(
    'post_type'      => 'show',
    'posts_per_page' => 5,
    'meta_key'       => '_show_date',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
    'meta_query'     => array(
        array(
            'key'     => '_show_date',
            'value'   => date('Y-m-d'),
            'compare' => '>=',
            'type'    => 'DATE',
        ),
    ),
));
?>

<section id="shows" class="shows-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                UPCOMING <span>SHOWS</span>
            </h2>
            <p class="section-subtitle">
                Catch Mike live on stage. New dates added regularly.
            </p>
        </div>

        <div class="shows-list">
            <?php if ($shows->have_posts()) : ?>
                <?php while ($shows->have_posts()) : $shows->the_post(); 
                    $venue = get_post_meta(get_the_ID(), '_show_venue', true);
                    $city = get_post_meta(get_the_ID(), '_show_city', true);
                    $date = get_post_meta(get_the_ID(), '_show_date', true);
                    $status = get_post_meta(get_the_ID(), '_show_status', true);
                    $ticket_url = get_post_meta(get_the_ID(), '_show_ticket_url', true);
                    
                    $formatted_date = $date ? date('M j, Y', strtotime($date)) : '';
                    
                    $status_class = 'status-on-sale';
                    $status_label = 'On Sale';
                    if ($status === 'few-left') {
                        $status_class = 'status-few-left';
                        $status_label = 'Few Left';
                    } elseif ($status === 'sold-out') {
                        $status_class = 'status-coming-soon';
                        $status_label = 'Sold Out';
                    } elseif ($status === 'coming-soon') {
                        $status_class = 'status-coming-soon';
                        $status_label = 'Coming Soon';
                    }
                ?>
                    <div class="show-card">
                        <div class="show-info">
                            <div class="show-date">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                                <span><?php echo esc_html($formatted_date); ?></span>
                            </div>
                            <div class="show-venue">
                                <h3><?php echo esc_html($venue ?: get_the_title()); ?></h3>
                                <div class="show-city">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    <?php echo esc_html($city); ?>
                                </div>
                            </div>
                        </div>
                        <div class="show-actions">
                            <span class="show-status <?php echo esc_attr($status_class); ?>">
                                <?php echo esc_html($status_label); ?>
                            </span>
                            <?php if ($status !== 'sold-out') : ?>
                                <a href="<?php echo esc_url($ticket_url ?: '#'); ?>" class="btn <?php echo $status === 'coming-soon' ? 'btn-secondary' : 'btn-primary'; ?> btn-sm">
                                    <?php echo $status === 'coming-soon' ? 'Notify Me' : 'Get Tickets'; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Fallback static content -->
                <div class="show-card">
                    <div class="show-info">
                        <div class="show-date">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            <span>Jan 15, 2025</span>
                        </div>
                        <div class="show-venue">
                            <h3>The Comedy Store</h3>
                            <div class="show-city">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                Los Angeles, CA
                            </div>
                        </div>
                    </div>
                    <div class="show-actions">
                        <span class="show-status status-on-sale">On Sale</span>
                        <a href="#" class="btn btn-primary btn-sm">Get Tickets</a>
                    </div>
                </div>
                <p style="text-align:center;color:hsl(var(--muted-foreground));margin-top:2rem;">
                    <?php _e('Add shows from the WordPress admin to display them here.', 'mikecollins'); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="shows-cta">
            <a href="<?php echo esc_url(get_post_type_archive_link('show')); ?>" class="btn btn-outline btn-lg">
                View All Shows
            </a>
        </div>
    </div>
</section>
