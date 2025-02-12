<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>
    <?php
    wp_title('|', true, 'right'); // About
    bloginfo('name'); // IDM250
    ?>
  </title>
  <?php wp_head(); ?>
</head>

<body 

  <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part('components/main-header'); ?>
  <?php
    // wp_nav_menu([
    //     'theme_location' => 'primary-menu',
    // ]);
    ?>
<header>

<nav>
<img src="<?php echo get_stylesheet_directory_url(); ?>/assets/images/logo.png" alt="">

<ul>
  <li><a href="projects.html" >Projects</a></li>
  <li><a href="projects.html" >Projects</a></li>
  <li><a href="projects.html" >Projects</a></li>
</ul>
</nav>

</header>


    <nav class="navbar">
    <div class="logo">
      <a href="index.html"><h3>DY</h3></a>
    </div>

    <ul class="nav-bar">
    <input type="checkbox" id="check">
    <span class="menu">
      <li><a href="projects.html" class="underline">Projects</a></li>
      <li><a href="resume.html" class="underline">Resume</a></li>
      <li><a href="about.html" class="underline">About</a></li>
      <li><a href="design.html" class="underline">Design</a></li>
      <li><a href="photography.html" id="currentPage" class="underline">Photos</a></li>   
      <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
    </span>
    <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
  </ul>
</nav>
