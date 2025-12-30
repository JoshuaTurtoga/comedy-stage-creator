<?php
/**
 * Projects Section Template Part
 */
$projects = new WP_Query(array('post_type' => 'project', 'posts_per_page' => 6, 'orderby' => 'menu_order', 'order' => 'ASC'));
?>
<section id="projects" class="projects-section">
    <div class="container">
        <div class="section-header">
            <p class="section-label">Featured Work</p>
            <h2 class="section-title">Projects</h2>
        </div>
        <div class="projects-list">
            <?php if ($projects->have_posts()) : while ($projects->have_posts()) : $projects->the_post(); 
                $type = get_post_meta(get_the_ID(), '_project_type', true);
                $year = get_post_meta(get_the_ID(), '_project_year', true);
                $url = get_post_meta(get_the_ID(), '_project_url', true);
            ?>
            <div class="project-card">
                <div class="project-card-inner">
                    <div class="project-image-container">
                        <?php if (has_post_thumbnail()) : the_post_thumbnail('large', array('class' => 'project-image')); else : ?>
                        <div class="project-image-placeholder">Project Image</div>
                        <?php endif; ?>
                        <div class="project-image-overlay"><svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg></div>
                    </div>
                    <div class="project-content">
                        <div class="project-meta">
                            <?php if ($type) : ?><span class="project-type"><?php echo esc_html($type); ?></span><?php endif; ?>
                            <?php if ($year) : ?><span class="project-year"><?php echo esc_html($year); ?></span><?php endif; ?>
                        </div>
                        <h3 class="project-title"><?php the_title(); ?></h3>
                        <p class="project-description"><?php echo wp_trim_words(get_the_content(), 25); ?></p>
                        <?php if ($url) : ?><a href="<?php echo esc_url($url); ?>" class="btn btn-outline">Learn More</a><?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); else : ?>
            <p style="text-align:center;color:var(--muted-foreground);">No projects yet. Add them in WordPress admin.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
