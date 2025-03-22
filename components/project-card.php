<?php
/**
 * 🧩 Project Card Component
 * -------------------------------------------------
 * ✅ **Purpose:**
 * - Reusable card to display project details with image, date, tags, and title.
 *
 * 🎯 **Displays:**
 * - Featured image with overlay effect
 * - Project date
 * - Project tags (custom taxonomy: 'project-tags')
 * - Project title linked to the project page
 */
?>

<article class="project-card">
  <a href="<?php the_permalink(); ?>" class="project-card__link">
    <?php if (has_post_thumbnail()) : ?>
    <div class="project-card__image-wrapper">
    <h3 class="project-card__title"><?php the_title(); ?></h3>
      <?php the_post_thumbnail('large', ['class' => 'project-card__image']); ?>
      <div class="project-card__overlay"></div>
      <div class="project-card__meta">
        <time datetime="<?php echo get_the_date('c'); ?>" class="project-card__date">
          <?php echo get_the_date(); ?>
        </time>
        <?php
                    $tags = get_the_terms(get_the_ID(), 'project-categories');
        if (!empty($tags) && !is_wp_error($tags)) :
            $tag_names = wp_list_pluck($tags, 'name');
            echo '<span class="project-card__tags">' . implode(', ', $tag_names) . '</span>';
        endif;
        ?>
      </div>

    </div>
    <?php endif; ?>
  </a>
</article>

<style>

  .project-card__image-wrapper img {
    max-width: 15rem;
    height: auto;
    display: block;
  }

  .project-card {
    margin: 0.5rem;
  }
</style>
