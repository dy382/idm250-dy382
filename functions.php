<?php
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
        'footer-menu' => 'Footer Menu',
    ]);
}

add_action('after_setup_theme', 'theme_setup');

/**
 * Registers Theme Customizer settings.
 *
 * - Adds color options for primary and secondary theme colors.
 * - Enables custom logo support.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @link https://developer.wordpress.org/reference/hooks/customize_register/
 */

function mytheme_customize_register($wp_customize)
{
    // Add a section for theme colors
    $wp_customize->add_section('theme_colors', [
        'title' => __('Theme Colors', 'mytheme'),
        'priority' => 30,
    ]);

    // Define color settings
    $colors = [
        'primary_color' => [
            'label' => __('Primary Color', 'mytheme'),
            'default' => '#ff6600',
        ],
        'secondary_color' => [
            'label' => __('Secondary Color', 'mytheme'),
            'default' => '#0066ff',
        ],
    ];

    // Loop through colors to add settings and controls
    foreach ($colors as $color_id => $color) {
        $wp_customize->add_setting($color_id, [
            'default' => $color['default'],
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            $color_id,
            [
                'label' => $color['label'],
                'section' => 'theme_colors',
                'settings' => $color_id,
            ]
        ));
    }
}
add_action('customize_register', 'mytheme_customize_register');
require get_template_directory() . '/includes/taxonomies.php';

function mytheme_customizer_css()
{
    ?>
<style>
:root {
  --primary-color:
    <?php echo esc_attr(get_theme_mod('primary_color', '#ff6600'));
  ?>;
  --secondary-color:
    <?php echo esc_attr(get_theme_mod('secondary_color', '#0066ff'));
  ?>;
}
</style>
<?php
}



?>

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
add_action('widgets_init', 'add_widgets');

// Register additional sidebars
function register_custom_sidebar()
{
    register_sidebar([
        'name' => 'Main Sidebar',
        'id' => 'main-sidebar',
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

add_action('widgets_init', 'register_custom_sidebar');


/**
 * Register custom post types for the theme.
 *
 * This function registers a custom post type "Projects" for managing project-based content.
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @return void
 */
function register_custom_post_types()
{
    $post_type_name = 'projects';

    $args = [
        'labels' => [
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new' => 'Add New Project',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'new_item' => 'New Project',
            'view_item' => 'View Project',
            'search_items' => 'Search Projects',
            'not_found' => 'No Projects found',
            'not_found_in_trash' => 'No Projects found in Trash',
        ],
        'public' => true,             // Makes it accessible on the front and back end
        'has_archive' => true,             // Enables an archive page
        'rewrite' => ['slug' => 'projects'], // URL slug
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'], // Enabled post features
        'menu_position' => 5,                // Position in WP admin menu
        'menu_icon' => 'dashicons-portfolio', // Optional: Custom icon for the post type
        'show_in_rest' => true,             // Enables Gutenberg support
        'taxonomies'  => ['project-categories'], // Uncomment if you have a custom taxonomy
    ];

    register_post_type($post_type_name, $args);
}

add_action('init', 'register_custom_post_types');