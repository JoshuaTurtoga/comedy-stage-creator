<?php
/**
 * Projects Section Template Part
 */
$projects = new WP_Query(array('post_type' => 'project', 'posts_per_page' => 6, 'orderby' => 'menu_order', 'order' => 'ASC'));

$demo_projects = array(
    array(
        'title' => 'Netflix Special: Unfiltered',
        'year' => '2024',
        'description' => "Jane's debut Netflix special where she tackles everything from dating apps to family dynamics with her signature style.",
        'type' => 'Special',
        'url' => '#',
    ),
    array(
        'title' => 'The Laugh Track Podcast',
        'year' => '2023 - Present',
        'description' => 'Weekly conversations with fellow comedians, celebrities, and interesting people from all walks of life.',
        'type' => 'Podcast',
        'url' => '#',
    ),
    array(
        'title' => 'Comedy Central Presents',
        'year' => '2022',
        'description' => "A half-hour special that put Jane on the map as one of comedy's rising stars.",
        'type' => 'Special',
        'url' => '#',
    ),
);
?>
<section id="projects" class="projects-section">
    <div class="container">
        <div class="section-header">
            <p class="section-label">Featured Work</p>
            <h2 class="section-title">Projects</h2>
        </div>

        <div class="projects-list">
            <?php if ($projects->have_posts()) : while ($projects->have_posts()) : $projects->the_post();
                $type = get_post_meta(get_the_ID(), '_project_type', true) ?: 'Project';
                $year = get_post_meta(get_the_ID(), '_project_year', true) ?: '';
                $url = get_post_meta(get_the_ID(), '_project_url', true);
                $url = $url ?: get_permalink();
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
                            <span class="project-type"><?php echo esc_html($type); ?></span>
                            <?php if ($year) : ?><span class="project-year"><?php echo esc_html($year); ?></span><?php endif; ?>
                        </div>
                        <h3 class="project-title"><?php the_title(); ?></h3>
                        <p class="project-description"><?php echo wp_trim_words(get_the_content(), 25); ?></p>
                        <a href="<?php echo esc_url($url); ?>" class="btn btn-outline">Learn More</a>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); else : ?>

            <?php foreach ($demo_projects as $project) : ?>
            <div class="project-card">
                <div class="project-card-inner">
                    <div class="project-image-container">
                        <div class="project-image-placeholder">Project Image</div>
                        <div class="project-image-overlay"><svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg></div>
                    </div>
                    <div class="project-content">
                        <div class="project-meta">
                            <span class="project-type"><?php echo esc_html($project['type']); ?></span>
                            <span class="project-year"><?php echo esc_html($project['year']); ?></span>
                        </div>
                        <h3 class="project-title"><?php echo esc_html($project['title']); ?></h3>
                        <p class="project-description"><?php echo esc_html($project['description']); ?></p>
                        <a href="<?php echo esc_url($project['url']); ?>" class="btn btn-outline">Learn More</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>
</section>

