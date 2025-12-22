<?php
/**
 * Front Page Template
 * 
 * This is the main landing page that displays all sections
 * 
 * @package MikeCollinsComedy
 */

get_header();
?>

<main class="bg-background">
    <?php get_template_part('template-parts/section', 'hero'); ?>
    <?php get_template_part('template-parts/section', 'about'); ?>
    <?php get_template_part('template-parts/section', 'shows'); ?>
    <?php get_template_part('template-parts/section', 'videos'); ?>
    <?php get_template_part('template-parts/section', 'contact'); ?>
</main>

<?php
get_footer();
