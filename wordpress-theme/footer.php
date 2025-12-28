</main><!-- #main-content -->

<footer class="site-footer">
    <div class="container">
        <div class="footer-inner">
            <p class="footer-logo">
                <?php echo esc_html(get_theme_mod('hero_title', 'CATHERINE GELLER')); ?>
            </p>
            
            <p class="footer-copyright">
                &copy; <?php echo date('Y'); ?> <?php echo esc_html(get_theme_mod('hero_title', 'Catherine Geller')); ?>. <?php _e('All rights reserved.', 'catherine-geller'); ?>
            </p>
            
            <nav class="footer-links">
                <?php
                if (has_nav_menu('footer')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'link_before'    => '',
                        'link_after'     => '',
                    ));
                } else {
                    ?>
                    <a href="<?php echo esc_url(get_privacy_policy_url()); ?>" class="footer-link"><?php _e('Privacy', 'catherine-geller'); ?></a>
                    <a href="#" class="footer-link"><?php _e('Terms', 'catherine-geller'); ?></a>
                    <?php
                }
                ?>
            </nav>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
