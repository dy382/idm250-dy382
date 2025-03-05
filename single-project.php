<?php
/**
 * Single Custom Post Type Template
 *
 * This template displays single posts for a **custom post type**.
 * Example: For a custom post type "projects," this file would be `single-projects.php`.
 *
 * 🔥 **When is this file used?**
 * - When a user views a single post belonging to a custom post type (`projects`).
 *
 * 🏗️ **Template Hierarchy for Custom Post Types:**
 *   1. single-{post_type}.php   ✅ (e.g., single-projects.php)
 *   2. single.php               (generic single post template)
 *   3. singular.php             (generic template for all single items)
 *   4. index.php                (fallback)
 *
 * 💡 **Key Features:**
 * - Custom layouts specific to your custom post type.
 * - Ideal for displaying detailed project information, portfolios, etc.
 *
 * 🌐 **Further Reading:**
 * https://developer.wordpress.org/themes/template-files-section/custom-post-type-template-files/
 *
 * @package YourThemeName
 */
?>
<?php get_header(); ?>
<div class="singles-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<section class="single-row">
  <div class="wrapper">

    <aside>
        <ul>
        <?php dynamic_sidebar('main-sidebar');?>
        </ul>
    </aside>

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