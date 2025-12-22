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
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="site-navigation">
    <div class="container nav-container">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            <?php echo esc_html(mikecollins_get_option('comedian_name', 'MIKE COLLINS')); ?>
        </a>

        <!-- Desktop Navigation -->
        <?php if (has_nav_menu('primary')) : ?>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => false,
            ));
            ?>
        <?php else : ?>
            <ul class="nav-menu">
                <li><a href="#about">About</a></li>
                <li><a href="#shows">Shows</a></li>
                <li><a href="#videos">Videos</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#" class="nav-cta">Book Now</a></li>
            </ul>
        <?php endif; ?>

        <!-- Mobile Menu Toggle -->
        <button class="menu-toggle" aria-label="Toggle Menu" aria-expanded="false">
            <svg class="menu-icon-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg class="menu-icon-close" style="display:none;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu container">
        <?php if (has_nav_menu('mobile')) : ?>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'mobile',
                'container'      => false,
                'fallback_cb'    => false,
            ));
            ?>
        <?php else : ?>
            <a href="#about">About</a>
            <a href="#shows">Shows</a>
            <a href="#videos">Videos</a>
            <a href="#contact">Contact</a>
            <a href="#" class="btn btn-outline btn-sm" style="margin-top:1rem;display:inline-block;">Book Now</a>
        <?php endif; ?>
    </div>
</nav>
