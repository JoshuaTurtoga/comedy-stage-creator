<?php
/**
 * Main Index Template
 * 
 * This is the fallback template for all pages
 * 
 * @package MikeCollinsComedy
 */

get_header();
?>

<main class="bg-background" style="padding-top: 6rem;">
    <div class="container" style="padding: 4rem 1rem;">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header>
                        <h1 class="section-title"><?php the_title(); ?></h1>
                    </header>
                    <div class="entry-content" style="color: hsl(var(--muted-foreground)); line-height: 1.8;">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php _e('No content found.', 'mikecollins'); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
