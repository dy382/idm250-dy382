<?php
/**
 * Search Form Template
 *
 * This template creates the search form seen across the WordPress site.
 * WordPress will automatically use this file if it exists when calling `get_search_form()`.
 *
 * 💡 **Key Features:**
 * - Uses `get_search_query()` to retain the search keyword after submission.
 * - Sends search requests to the built-in WordPress search system.
 * - Includes accessibility attributes for screen readers.
 *
 * 🌐 **Further Reading:**
 * https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package YourThemeName
 */
?>

<form role="search" method="get" class="search-form"
  action="<?php echo esc_url(home_url('/')); ?>">
  <!-- 📝 Accessibility: Use a label for the search input for screen readers -->
  <label for="search-field" class="screen-reader-text">
    <?php echo _x('Search for:', 'label', 'yourthemename'); ?>
  </label>

  <!-- 🔎 Search Input Field:
         - `name="s"`: WordPress requires this name for search queries.
         - `value="<?php get_search_query(); ?>"`: Preserves the
  search term after submission.
  -->
  <input type="search" id="search-field" class="search-field"
    placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'yourthemename'); ?>"
    value="<?php echo get_search_query(); ?>" name="s" />

  <!-- 🔘 Submit Button:
         - `type="submit"`: Submits the form.
         - `value="Search"`: Text displayed on the button.
         - `esc_attr_x()`: For translation and escaping the attribute.
    -->
  <button type="submit" class="search-submit">
    <?php echo esc_html_x('Search', 'submit button', 'yourthemename'); ?>
  </button>
</form>