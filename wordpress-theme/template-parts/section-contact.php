<?php
/**
 * Contact Section Template Part
 */
$email = get_theme_mod('contact_email', 'booking@catherinegeller.com');
$intro = get_theme_mod('contact_intro', 'For booking inquiries, press requests, or just to say hi — reach out through the form or connect on social media.');
$instagram = get_theme_mod('social_instagram', '#');
$twitter = get_theme_mod('social_twitter', '#');
$youtube = get_theme_mod('social_youtube', '#');
?>
<section id="contact" class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info"><p class="section-label">Get in Touch</p><h2 class="contact-info-heading">Contact</h2><p class="contact-intro"><?php echo esc_html($intro); ?></p>
                <div class="contact-details"><div class="contact-item"><div class="contact-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></div><div><p class="contact-item-label">Management</p><p class="contact-item-value"><?php echo esc_html($email); ?></p></div></div></div>
                <p class="social-links-label">Follow Along</p>
                <div class="social-links">
                    <a href="<?php echo esc_url($instagram); ?>" class="social-link" aria-label="Instagram"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></a>
                    <a href="<?php echo esc_url($twitter); ?>" class="social-link" aria-label="Twitter"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a>
                    <a href="<?php echo esc_url($youtube); ?>" class="social-link" aria-label="YouTube"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg></a>
                </div>
            </div>
            <div class="contact-form-wrapper">
                <form class="contact-form" action="#" method="POST">
                    <div class="form-row"><div class="form-group"><label class="form-label">Name</label><input type="text" name="name" class="form-input" placeholder="Your name" required></div><div class="form-group"><label class="form-label">Email</label><input type="email" name="email" class="form-input" placeholder="your@email.com" required></div></div>
                    <div class="form-group"><label class="form-label">Subject</label><input type="text" name="subject" class="form-input" placeholder="What's this about?"></div>
                    <div class="form-group"><label class="form-label">Message</label><textarea name="message" class="form-textarea" placeholder="Your message..." rows="5" required></textarea></div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
