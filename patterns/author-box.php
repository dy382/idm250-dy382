<!-- author-box -->
<div class="author-box">
  <div class="author-box__image">
    <?php echo get_avatar(get_the_author_meta('ID'), 150); ?>
  </div>
  <div class="author-box__content">
    <h3 class="author-box__title">Meet <?php the_author(); ?></h3>
    <p class="author-box__bio"><?php echo nl2br(get_the_author_meta('description')); ?></p>
  </div>
</div>