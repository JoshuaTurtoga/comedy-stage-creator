<footer class="site-footer">
    <div class="container footer-content">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo">
            <?php echo esc_html(mikecollins_get_option('comedian_name', 'MIKE COLLINS')); ?>
        </a>
        <p class="footer-copyright">
            &copy; <?php echo date('Y'); ?> <?php echo esc_html(mikecollins_get_option('comedian_name', 'Mike Collins')); ?>. All rights reserved.
        </p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
