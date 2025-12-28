<?php
/**
 * 404 Page Template
 *
 * @package Catherine_Geller
 */

get_header();
?>

<section class="not-found-page">
    <div class="container" style="text-align: center;">
        <p class="not-found-code">404</p>
        <h1 class="not-found-title"><?php _e('Page Not Found', 'catherine-geller'); ?></h1>
        <p class="not-found-text"><?php _e('The page you\'re looking for doesn\'t exist or has been moved.', 'catherine-geller'); ?></p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
            <?php _e('Back to Home', 'catherine-geller'); ?>
        </a>
    </div>
</section>

<?php
get_footer();
