<?php
/* 
Template Name: About
*/


?>

<?php get_header(); ?>
<div class="wrapper">
<h1>
    <?php 
        echo get_the_title();
    ?>
</h1>

<?php if (has_post_thumbnail()) : ?>
    <div class="featured-image">
        <?php the_post_thumbnail(); ?>
    </div>
<?php endif; ?>

<div class="main-content">
    <?php 
        echo get_the_content();
    ?>
</div>

</div>
<?php get_footer(); ?>

<style>
.wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}


</style>