<div class="post-meta">
  <p><strong>Published on:</strong> <?php echo get_the_date(); ?></p>&nbsp;| &nbsp;
  <p><strong>Author:</strong> <?php the_author_posts_link(); ?></p>&nbsp;| &nbsp;
  <p><strong>Categories:</strong> <?php the_category(', '); ?></p>&nbsp;| &nbsp;
  <p><strong>Tags:</strong> <?php the_tags('', ', ', ''); ?></p>
</div>