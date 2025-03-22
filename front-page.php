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

  <?php
$query = new WP_Query([
    'post_type' => 'projects',
    'posts_per_page' => 3,
]);
?>
<?php if ($query->have_posts()) : ?>
<section class="">
    <h2>Most Recent Work</h2>
    <div class="grid grid-3">


    <?php
while ($query->have_posts()) : $query->the_post();
     // For each post, render this component
        get_template_part('components/project-card');
endwhile;
    ?>
    </div>
</section>

<?php else : ?>
<p>No projects found.</p>
<?php endif; ?>



</div>

<?php get_footer(); ?>

<style>
 .project-group {
    display: flex;
    flex-direction: row;
    padding: 10px;
 }

 .grid {
  display: flex;
 }

 .project-card__image-wrapper img {
    max-width: 15rem;
    height: auto;
    display: block;
  }

  .project-card {
    margin: 0.5rem;
  }
  </style>