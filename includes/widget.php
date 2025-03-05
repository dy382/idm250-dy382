<?php
/**
 * Widget Areas & Sidebars
 *
 * This file registers the widget areas (sidebars, footer widgets, etc.) for the theme.
 * Widgets allow users to add small content blocks in specific sections of the theme.
 */

// Register the main sidebar
function add_widgets()
{
    register_sidebar([
        'name' => 'Main Sidebar',
        'id' => 'main_sidebar',
        'description' => 'Widgets in this area will be shown in the main sidebar.',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
}
add_action('widgets_init', 'add_widgets');

// Register additional sidebars
function register_custom_sidebar()
{
    register_sidebar([
        'name' => 'Primary Sidebar',
        'id' => 'primary-sidebar',
        'description' => 'Widgets in this area will be shown in the Primary Sidebar.',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);

    register_sidebar([
        'name' => 'Footer Widget',
        'id' => 'footer-widget',
        'description' => 'Widgets in this area will be shown in the Footer.',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>',
    ]);
}
// add_action('widgets_init', 'register_custom_sidebar');