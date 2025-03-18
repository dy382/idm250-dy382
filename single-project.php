
<?php get_header(); ?>
<div class="singles-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<section class="single-row">
  <div class="wrapper">


    <?php get_template_part('components/hero'); ?>
    Client: <?php echo get_field('client_name') ?>
    <br>
    Industry: <?php echo get_field('industry') ?>
      <p><strong>Project Categories:</strong>
        <?php echo get_the_term_list(
            get_the_ID(), // 204
            'project-categories', // taxonomy name
            '', // before
            ', ', // separator
            '' // after
        ); ?>
      </p>

    <?php get_template_part('components/content'); ?>
    </div>
</section>
<section class="wrapper">
  <?php get_template_part('components/related-projects'); ?>
</section>

</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>