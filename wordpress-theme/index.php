<?php
/**
 * Fallback Template
 *
 * @package Catherine_Geller
 */

get_header();
?>

<section class="page-content" style="padding: 8rem 0; min-height: 60vh;">
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header>
                        <h1 class="section-title"><?php the_title(); ?></h1>
                    </header>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
            
            <?php the_posts_navigation(); ?>
        <?php else : ?>
            <p><?php _e('No content found.', 'catherine-geller'); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
