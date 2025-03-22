<?php



/**
 * Archive Template
 *
 * This file is used by WordPress to display archive pages.
 * Archive pages show a list of posts grouped by specific criteria, such as:
 *
 * - Categories (e.g., all posts in "News" category)
 * - Tags (e.g., all posts tagged "Travel")
 * - Author archives (all posts by a specific author)
 * - Date archives (e.g., all posts from January 2024)
 * - Custom post type archives (if no specific archive-{post_type}.php exists)
 *
 * 🔥 **Template Hierarchy**:
 * WordPress looks for templates in this order for archive pages:
 *
 *   1. category-{slug}.php     (e.g., category-news.php)
 *   2. category-{id}.php       (e.g., category-4.php)
 *   3. category.php            (if it's a category archive)
 *   4. tag.php                 (if it's a tag archive)
 *   5. taxonomy-{taxonomy}.php (for custom taxonomies)
 *   6. archive-{post_type}.php (for custom post types)
 *   7. archive.php             ✅ (this file)
 *   8. index.php               (fallback)
 *
 * 💡 **Key Points for Students:**
 * - This file provides a fallback for all archives unless more specific templates exist.
 * - Use this file to control how archive listings appear (e.g., category or date listings).
 * - You can customize it further or create more specific archive templates if needed.
 *
 * 📚 **Functions used in this file:**
 * - `get_header()`: Includes the header.php file.
 * - `have_posts()`: Checks if there are posts to display.
 * - `the_post()`: Iterates the post loop.
 * - `the_permalink()`: Retrieves the post URL.
 * - `the_title()`: Displays the post title.
 * - `the_posts_pagination()`: Adds pagination links for multiple pages of posts.
 * - `get_footer()`: Includes the footer.php file.
 *
 * 🌐 For more information: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package YourThemeName
 */
?>

<?php get_header(); ?>
<div class="wrapper">
  <div class="archive-header">
    <h1><?php the_archive_title(); ?></h1>
    <?php the_archive_description(); ?>
  </div>

  <?php if (have_posts()) : ?>

  <ul class="grid grid-3">
    <?php
  while (have_posts()) : the_post(); ?>
    <div class="grid-item">
      <?php get_template_part('components/project-card'); ?>
    </div>

    <?php endwhile; ?>
  </ul>

  <?php the_posts_pagination(); ?>

  <?php else : ?>
  <p>No posts found.</p>
  <?php endif; ?>
</div>
<?php get_footer(); ?>

<style>

.grid {
    display: grid;
    gap: 20px;
}

.grid-3 {
    grid-template-columns: 1fr;
}

@media (min-width: 768px) {
    .grid-3 {
        grid-template-columns: repeat(3, 1fr);
    }
}

.project-group {
    display: flex;
    flex-direction: row;
    padding: 10px;
 }

</style>
