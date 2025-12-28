<?php
/**
 * Homepage Template
 *
 * @package Catherine_Geller
 */

get_header();
?>

<?php if (get_theme_mod('show_hero_section', true)) : ?>
    <?php get_template_part('template-parts/section', 'hero'); ?>
<?php endif; ?>

<?php if (get_theme_mod('show_about_section', true)) : ?>
    <?php get_template_part('template-parts/section', 'about'); ?>
<?php endif; ?>

<?php if (get_theme_mod('show_projects_section', true)) : ?>
    <?php get_template_part('template-parts/section', 'projects'); ?>
<?php endif; ?>

<?php if (get_theme_mod('show_watch_section', true)) : ?>
    <?php get_template_part('template-parts/section', 'watch'); ?>
<?php endif; ?>

<?php if (get_theme_mod('show_tour_section', true)) : ?>
    <?php get_template_part('template-parts/section', 'tour'); ?>
<?php endif; ?>

<?php if (get_theme_mod('show_archive_section', true)) : ?>
    <?php get_template_part('template-parts/section', 'archive'); ?>
<?php endif; ?>

<?php if (get_theme_mod('show_contact_section', true)) : ?>
    <?php get_template_part('template-parts/section', 'contact'); ?>
<?php endif; ?>

<?php
get_footer();
