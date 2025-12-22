<?php
/**
 * Contact Section Template
 * 
 * Dynamic content from Theme Customizer:
 * - booking_email
 * - social_instagram
 * - social_twitter
 * - social_youtube
 * 
 * @package MikeCollinsComedy
 */

$booking_email = mikecollins_get_option('booking_email', 'booking@mikecollins.com');
$social_instagram = mikecollins_get_option('social_instagram', '#');
$social_twitter = mikecollins_get_option('social_twitter', '#');
$social_youtube = mikecollins_get_option('social_youtube', '#');
?>

<section id="contact" class="contact-section">
    <div class="container">
        <div class="contact-content">
            <h2 class="section-title">
                GET IN <span>TOUCH</span>
            </h2>
            <p class="section-subtitle" style="margin-bottom: 2rem;">
                For booking inquiries, press, or just to say hello
            </p>

            <div class="contact-box">
                <h3>Booking & Press</h3>
                <a href="mailto:<?php echo esc_attr($booking_email); ?>" class="contact-email">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    <?php echo esc_html($booking_email); ?>
                </a>
            </div>

            <div class="social-links">
                <h3>Follow Mike</h3>
                <div class="social-icons">
                    <?php if ($social_instagram) : ?>
                        <a href="<?php echo esc_url($social_instagram); ?>" class="social-icon" aria-label="Instagram" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    
                    <?php if ($social_twitter) : ?>
                        <a href="<?php echo esc_url($social_twitter); ?>" class="social-icon" aria-label="Twitter" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    
                    <?php if ($social_youtube) : ?>
                        <a href="<?php echo esc_url($social_youtube); ?>" class="social-icon" aria-label="YouTube" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/>
                                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
