<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="og:image" content="<?php echo get_template_directory_uri(); ?>/dist/images/og-image.jpg">


    <title>
    <?php
    wp_title('|', true, 'right'); // About
    bloginfo('name'); // IDM250
    ?>
  </title>
  <?php wp_head(); ?>
  
</head>

<body>

<nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Doyeon Yoo</label>
        <ul>
            <li><a class="active" href="#">Portfolio</a></li>
            <li><a href="#">Travel</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
</nav>