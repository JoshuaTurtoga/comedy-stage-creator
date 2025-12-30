<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicon.png">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content">
    <?php _e('Skip to content', 'catherine-geller'); ?>
</a>

<header id="site-header" class="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                <?php echo esc_html(get_theme_mod('hero_title', 'CATHERINE GELLER')); ?>
            </a>

            <!-- Desktop Navigation -->
            <nav class="main-nav" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'catherine-geller'); ?>">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'walker'         => new Catherine_Geller_Link_Walker('nav-link nav-link-underline'),
                    ));
                } else {
                    // Default navigation for smooth scrolling
                    ?>
                    <a href="#about" class="nav-link nav-link-underline"><?php _e('About', 'catherine-geller'); ?></a>
                    <a href="#projects" class="nav-link nav-link-underline"><?php _e('Projects', 'catherine-geller'); ?></a>
                    <a href="#watch" class="nav-link nav-link-underline"><?php _e('Watch', 'catherine-geller'); ?></a>
                    <a href="#tour" class="nav-link nav-link-underline"><?php _e('Tour', 'catherine-geller'); ?></a>
                    <a href="#archive" class="nav-link nav-link-underline"><?php _e('Archive', 'catherine-geller'); ?></a>
                    <a href="#contact" class="nav-link nav-link-underline"><?php _e('Contact', 'catherine-geller'); ?></a>
                    <?php
                }
                ?>
            </nav>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="<?php esc_attr_e('Toggle Menu', 'catherine-geller'); ?>" aria-expanded="false">
                <svg class="menu-icon-open" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
                <svg class="menu-icon-close" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobile-menu">
        <nav class="mobile-nav" role="navigation" aria-label="<?php esc_attr_e('Mobile Navigation', 'catherine-geller'); ?>">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'walker'         => new Catherine_Geller_Link_Walker('mobile-nav-link'),
                ));
            } else {
                ?>
                <a href="#about" class="mobile-nav-link"><?php _e('About', 'catherine-geller'); ?></a>
                <a href="#projects" class="mobile-nav-link"><?php _e('Projects', 'catherine-geller'); ?></a>
                <a href="#watch" class="mobile-nav-link"><?php _e('Watch', 'catherine-geller'); ?></a>
                <a href="#tour" class="mobile-nav-link"><?php _e('Tour', 'catherine-geller'); ?></a>
                <a href="#archive" class="mobile-nav-link"><?php _e('Archive', 'catherine-geller'); ?></a>
                <a href="#contact" class="mobile-nav-link"><?php _e('Contact', 'catherine-geller'); ?></a>
                <?php
            }
            ?>
        </nav>
    </div>
</header>

<main id="main-content">
