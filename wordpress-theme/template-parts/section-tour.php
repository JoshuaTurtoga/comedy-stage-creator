<?php
/**
 * Tour Section Template Part
 */
$shows = new WP_Query(array('post_type' => 'show', 'posts_per_page' => 10, 'meta_key' => '_show_date', 'orderby' => 'meta_value', 'order' => 'ASC'));

$demo_shows = array(
    array('date' => 'Jan 15, 2025', 'city' => 'New York, NY', 'venue' => 'Madison Square Garden', 'status' => 'On Sale'),
    array('date' => 'Jan 22, 2025', 'city' => 'Los Angeles, CA', 'venue' => 'The Forum', 'status' => 'On Sale'),
    array('date' => 'Feb 5, 2025', 'city' => 'Chicago, IL', 'venue' => 'Chicago Theatre', 'status' => 'Few Left'),
    array('date' => 'Feb 12, 2025', 'city' => 'Austin, TX', 'venue' => 'Moody Theater', 'status' => 'On Sale'),
    array('date' => 'Feb 28, 2025', 'city' => 'Miami, FL', 'venue' => 'Fillmore Miami Beach', 'status' => 'Sold Out'),
);
?>
<section id="tour" class="tour-section">
    <div class="container">
        <div class="section-header"><p class="section-label">Live Shows</p><h2 class="section-title">Tour Dates</h2><p class="section-subtitle">Catch Catherine live on her upcoming tour. New dates being added regularly!</p></div>

        <div class="tour-list">
            <?php if ($shows->have_posts()) : while ($shows->have_posts()) : $shows->the_post();
                $city = get_post_meta(get_the_ID(), '_show_city', true) ?: get_the_title();
                $venue = get_post_meta(get_the_ID(), '_show_venue', true) ?: '';
                $date = get_post_meta(get_the_ID(), '_show_date', true);
                $status = get_post_meta(get_the_ID(), '_show_status', true) ?: 'On Sale';
                $ticket_url = get_post_meta(get_the_ID(), '_show_ticket_url', true);
                $ticket_url = $ticket_url ?: '#';
            ?>
            <div class="tour-card">
                <div class="tour-card-inner">
                    <div class="tour-date"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><span class="tour-date-text"><?php echo $date ? date('M j, Y', strtotime($date)) : 'TBA'; ?></span></div>
                    <div class="tour-location"><div class="tour-city-wrapper"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg><span class="tour-city"><?php echo esc_html($city); ?></span></div><span class="tour-venue"><?php echo esc_html($venue); ?></span></div>
                    <div class="tour-actions"><span class="tour-status <?php echo cg_get_status_class($status); ?>"><?php echo esc_html($status); ?></span>
                    <?php if ($status === 'Sold Out') : ?>
                        <button class="btn btn-ghost" disabled>Notify Me</button>
                    <?php else : ?>
                        <a href="<?php echo esc_url($ticket_url); ?>" class="btn btn-primary">Get Tickets</a>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); else : ?>

            <?php foreach ($demo_shows as $show) : ?>
            <div class="tour-card">
                <div class="tour-card-inner">
                    <div class="tour-date"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><span class="tour-date-text"><?php echo esc_html($show['date']); ?></span></div>
                    <div class="tour-location"><div class="tour-city-wrapper"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg><span class="tour-city"><?php echo esc_html($show['city']); ?></span></div><span class="tour-venue"><?php echo esc_html($show['venue']); ?></span></div>
                    <div class="tour-actions"><span class="tour-status <?php echo cg_get_status_class($show['status']); ?>"><?php echo esc_html($show['status']); ?></span>
                    <?php if ($show['status'] === 'Sold Out') : ?>
                        <button class="btn btn-ghost" disabled>Notify Me</button>
                    <?php else : ?>
                        <a href="#" class="btn btn-primary">Get Tickets</a>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php endif; ?>
        </div>

        <div class="tour-newsletter"><p>Don't see your city? Sign up to be notified when new dates are announced.</p><a href="#contact" class="btn btn-outline">Join the Mailing List</a></div>
    </div>
</section>

