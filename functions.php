<?php
/**
 * Enqueues all scripts and styles for the theme.
 * This function is called when WordPress loads the theme.
 *
 * @return void
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 */
function theme_styles_and_scripts()
{
    wp_enqueue_style(
        'idm-normalize', // Handle for the stylesheet. Has to be unique
        'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', // URL for the stylesheet
        [], // No dependencies
        '8.0.1' // Version of Normalize.css
    );

    wp_enqueue_style(
        'idm-main', // Handle for the stylesheet
        get_template_directory_uri() . '/assets/styles/main.css', // Path to the stylesheet
        [], // No dependencies
        filemtime(get_template_directory() . '/assets/styles/main.css') // Cache-busting by file modification time
    );

    wp_enqueue_script(
        'idm-main-script', // Handle for the script
        get_template_directory_uri() . '/assets/scripts/main.js', // Path to the script
        [], // No dependencies
        filemtime(get_template_directory() . '/assets/scripts/main.js'), // Cache-busting by file modification time
        true // Load in the footer
    );
}

add_action('wp_enqueue_scripts', 'theme_styles_and_scripts');

function login_page_custom_logo()
{
    echo '<style>
        body.login { background-color: #f3f3f3; }
        .login h1 a { background-image: url(' . get_stylesheet_directory_uri() . '/assets/images/logo.webp) !important; }
    </style>';
}
add_action('login_enqueue_scripts', 'login_page_custom_logo');

function theme_setup()
{
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus([
        'primary-menu' => 'Primary Menu',
    ]);
}

add_action('after_setup_theme', 'theme_setup');


?>