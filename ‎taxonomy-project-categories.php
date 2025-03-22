<?php
 /**
  * Custom Taxonomy Archive Template
  *
  * This template is used to display archive pages for a specific custom taxonomy.
  * In this case, it handles the "Project Categories" taxonomy (`project-categories`).
  *
  * 🔥 **When is this file used?**
  * WordPress uses this template when visitors view a custom taxonomy archive, such as:
  *   - /project-categories/design/
  *   - /project-categories/development/
  *
  * 🏗️ **Template Hierarchy for Taxonomies:**
  * WordPress looks for templates in the following order:
  *
  *   1. taxonomy-{taxonomy}-{term}.php  (e.g., taxonomy-project-categories-design.php)
  *   2. taxonomy-{taxonomy}.php         ✅ (this file, e.g., taxonomy-project-categories.php)
  *   3. taxonomy.php                    (generic template for all taxonomies)
  *   4. archive.php                     (generic archive template)
  *   5. index.php                       (fallback if no archive or taxonomy template exists)
  *
  * 💡 **Key Features of this Template:**
  * - Displays all posts (or custom post types) associated with a given taxonomy term.
  * - Shows the taxonomy title and description using `single_term_title()` and `term_description()`.
  * - Loops through related posts and displays their titles with links.
  * - Supports pagination via `the_posts_pagination()`.
  *
  * ⚡ **Functions used in this file:**
  * - `single_term_title()`: Displays the name of the current taxonomy term.
  * - `term_description()`: Displays the description of the current taxonomy term.
  * - `have_posts()`, `the_post()`: Standard WordPress loop functions for displaying posts.
  * - `the_permalink()`, `the_title()`: Retrieves the URL and title of each post.
  * - `the_posts_pagination()`: Adds pagination controls if there are multiple pages of results.
  *
  * 🌐 **Further Reading:**
  * - Template Hierarchy: https://developer.wordpress.org/themes/basics/template-hierarchy/
  * - register_taxonomy(): https://developer.wordpress.org/reference/functions/register_taxonomy/
  *
  */ ?>
 <?php get_header(); ?>
 <div class="wrapper">
 
 <h1><?php single_term_title(); ?></h1>
 
 <?php if (have_posts()) : ?>
 <ul class="grid grid-3">
     <?php while (have_posts()) : the_post(); ?>
     <div class="grid-item">
         <?php get_template_part('components/blog-card'); ?>
     </div>
     <?php endwhile; ?>
 </ul>
 <?php the_posts_pagination(); ?>
 <?php else : ?>
 <p>No projects found in this category.</p>
 <?php endif; ?>
 
 </div>
 <?php get_footer(); ?>