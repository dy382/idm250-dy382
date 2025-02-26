<?php
/**
 * Search Results Template
 *
 * This template is used for displaying search results in WordPress.
 *
 * 🔥 **When is this file used?**
 * - When a user performs a search via the WordPress search form.
 * - Shows search results or a message if no results are found.
 *
 * 🏗️ **Template Hierarchy for Search Results:**
 *   1. search.php             ✅ (this file)
 *   2. index.php              (fallback)
 *
 * 💡 **Key Features:**
 * - Displays search query results using `get_search_query()`.
 * - Includes pagination with `the_posts_pagination()`.
 *
 * 🌐 **Further Reading:**
 * https://developer.wordpress.org/themes/template-files-section/search-result-template/
 *
 * @package YourThemeName
 */
?>

<?php get_header(); ?>

<section class="search-results">
  <h1>Search Results for: "<?php echo get_search_query(); ?>"</h1>

  <?php if (have_posts()) : ?>
  <ul>
    <?php while (have_posts()) : the_post(); ?>
    <li>
      <a
        href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      <p><?php the_excerpt(); ?></p>
    </li>
    <?php endwhile; ?>
  </ul>
  <?php the_posts_pagination(); ?>
  <?php else : ?>
  <p>No results found. Please try a different search.</p>
  <?php endif; ?>
</section>

<?php get_footer(); ?>