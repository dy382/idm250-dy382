<?php get_header(); ?>

<div class="wrapper">
  <h1 class="page-title">
    <?php echo get_the_title(); ?>
  </h1>

  <?php if (has_post_thumbnail()) : ?>
  <div class="featured-image">
    <?php the_post_thumbnail(); ?>
  </div>
  <?php endif; ?>

  <div class="page-content">
    <?php echo get_the_content(); ?>
  </div>


</div>

<?php get_footer(); ?>
