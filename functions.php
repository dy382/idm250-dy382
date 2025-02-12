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
        get_template_directory_uri() . '/dist/styles/main.css', // Path to the stylesheet
        [], // No dependencies
        filemtime(get_template_directory() . '/dist/styles/main.css') // Cache-busting by file modification time
    );

    wp_enqueue_script(
        'idm-main-script', // Handle for the script
        get_template_directory_uri() . '/dist/scripts/main.js', // Path to the script
        [], // No dependencies
        filemtime(get_template_directory() . '/dist/scripts/main.js'), // Cache-busting by file modification time
        true // Load in the footer
    );
}

add_action('wp_enqueue_scripts', 'theme_styles_and_scripts');

function login_page_custom_logo()
{
    echo '<style>
        body.login { background-color: #f3f3f3; }
        .login h1 a { background-image: url(' . get_stylesheet_directory_uri() . '/dist/images/logo.webp) !important; }
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

/**
 * Registers Theme Customizer settings
 *
 * - Adds color options for primary and secondary theme colors
 * - Enables custom logo support
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
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
            'default' => '#ff6600'
        ],
        'secondary_color' => [
            'label' => __('Secondary Color', 'mytheme'),
            'default' => '#0066ff'
        ]
    ];

    // Loop through colors to add settings and controls
    foreach ($colors as $color_id => $color) {
        $wp_customize->add_setting($color_id, [
            'default' => $color['default'],
            'sanitize_callback' => 'sanitize_hex_color'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            $color_id,
            [
                'label' => $color['label'],
                'section' => 'theme_colors',
                'settings' => $color_id
            ]
        ));
    }

    // Add support for custom logo upload
    add_theme_support('custom-logo', [
        'height' => 100,
        'width' => 300,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => ['site-title', 'site-description']
    ]);
}
add_action('customize_register', 'mytheme_customize_register');

/**
 * Outputs dynamic theme colors to the site's CSS
 *
 * Injects `--primary-color` and `--secondary-color` into the CSS variables.
 */
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
add_action('wp_head', 'mytheme_customizer_css');

function get_custom_wp_menu($theme_location)
{
    if (!has_nav_menu($theme_location)) {
        return []; // Return empty array if no menu is assigned
    }

    $menu_items = wp_get_nav_menu_items(get_nav_menu_locations()[$theme_location]);

    return $menu_items ?: []; // Return menu items or empty array
}

function register_custom_sidebar()
{
    register_sidebar([
        'name' => 'Primary Sidebar',
        'id' => 'primary-sidebar',
        'description' => 'Widgets in this area will be shown in the Primary.',
    ]);

    register_sidebar([
        'name' => 'Footer Widget',
        'id' => 'footer-widget',
        'description' => 'Widgets in this area will be shown in the Primary.',
    ]);
}

add_action('widgets_init', 'register_custom_sidebar');
/**
 * Function to register custom post types
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * @return void
 */
function register_custom_post_types()
{
    $arg = [
        'labels' => [
            'name' => 'Projects',
            'singular_name' => 'Project',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'projects'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-images-alt2',
        // 'taxonomies' => ['project-categories'], // Name of custom taxonomy. Only need if you have a custom taxonomy
        'show_in_rest' => true,
    ];
    $post_type_name = 'projects';

    // Register Albums post type
    register_post_type($post_type_name, $arg);
}

add_action('init', 'register_custom_post_types');