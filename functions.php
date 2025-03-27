<?php
/**
 * Theme functions and definitions
 *
 * @package HiTecTheme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Define theme constants
 */
define('HITEC_THEME_VERSION', '1.0.0');
define('HITEC_THEME_DIR', get_template_directory());
define('HITEC_THEME_URI', get_template_directory_uri());

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function hitec_theme_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain('hitec', HITEC_THEME_DIR . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in multiple locations.
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'hitec'),
        'footer'  => esc_html__('Footer Menu', 'hitec'),
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for Block Styles.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for responsive embeds.
    add_theme_support('responsive-embeds');

    // Add support for custom logo.
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Add support for custom background.
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));

    // Add support for editor styles.
    add_theme_support('editor-styles');

    // Enqueue editor styles.
    add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'hitec_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hitec_content_width() {
    $GLOBALS['content_width'] = apply_filters('hitec_content_width', 1200);
}
add_action('after_setup_theme', 'hitec_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hitec_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'hitec'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'hitec'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area', 'hitec'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add footer widgets here.', 'hitec'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'hitec_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function hitec_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('hitec-style', get_stylesheet_uri(), array(), HITEC_THEME_VERSION);
    
    // Enqueue Google Fonts
    wp_enqueue_style('hitec-fonts', 'https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700&display=swap', array(), null);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');
    
    // Enqueue main JavaScript file
    wp_enqueue_script('hitec-navigation', HITEC_THEME_URI . '/assets/js/navigation.js', array('jquery'), HITEC_THEME_VERSION, true);
    
    // Enqueue responsive menu script
    wp_enqueue_script('hitec-responsive', HITEC_THEME_URI . '/assets/js/responsive.js', array('jquery'), HITEC_THEME_VERSION, true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'hitec_scripts');

/**
 * Custom template tags for this theme.
 */
require HITEC_THEME_DIR . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require HITEC_THEME_DIR . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require HITEC_THEME_DIR . '/inc/customizer.php';

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require HITEC_THEME_DIR . '/inc/woocommerce.php';
}

/**
 * Enqueue Hi-Tec Landing Page styles and scripts
 */
function hitec_landing_scripts() {
    // Only load on the Hi-Tec landing page template
    if (is_page_template('page-hitec-landing.php')) {
        wp_enqueue_style('hitec-landing-style', HITEC_THEME_URI . '/assets/css/hitec-landing.css', array(), HITEC_THEME_VERSION);
        
        // Font Awesome for social icons
        wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/a076d05399.js', array(), null, true);
        
        // Optional: Add custom JavaScript if needed
        wp_enqueue_script('hitec-landing-script', HITEC_THEME_URI . '/assets/js/hitec-landing.js', array('jquery'), HITEC_THEME_VERSION, true);
    }
}
add_action('wp_enqueue_scripts', 'hitec_landing_scripts');

/**
 * Add custom image sizes
 */
function hitec_add_image_sizes() {
    add_image_size('hitec-featured', 800, 600, true);
    add_image_size('hitec-product-thumb', 300, 300, true);
}
add_action('after_setup_theme', 'hitec_add_image_sizes');

/**
 * Create required files and directories if they don't exist
 */
function hitec_create_required_files() {
    $directories = array(
        'inc',
        'assets/css',
        'assets/js',
        'assets/images',
        'languages',
        'template-parts',
    );
    
    foreach ($directories as $dir) {
        $directory_path = HITEC_THEME_DIR . '/' . $dir;
        if (!file_exists($directory_path)) {
            wp_mkdir_p($directory_path);
        }
    }
}
add_action('after_switch_theme', 'hitec_create_required_files');

/**
 * Enqueue landing page styles
 */
function hitec_landing_styles() {
    if (is_page_template('page-hitec-landing.php')) {
        wp_enqueue_style('hitec-landing', get_template_directory_uri() . '/assets/css/hitec-landing.css', array(), '1.0.0');
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');
    }
}
add_action('wp_enqueue_scripts', 'hitec_landing_styles');

function hitec_theme_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('hitec-style', get_stylesheet_uri(), array(), HITEC_THEME_VERSION);
    
    // Enqueue header styles
    wp_enqueue_style('hitec-header', get_template_directory_uri() . '/assets/css/header.css', array(), '1.0.0');
    
    // Enqueue Google Fonts
    wp_enqueue_style('hitec-fonts', 'https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700&display=swap', array(), null);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');
    
    // Product Specifications Page Styles
    if (is_page_template('page-product-specs.php') || get_query_var('product_id')) {
        wp_enqueue_style('hitec-product-specs', get_template_directory_uri() . '/assets/css/product-specs.css', array(), '1.0.0');
    }
    
    // Enqueue carousel script
    wp_enqueue_script('hitec-carousel', get_template_directory_uri() . '/assets/js/carousel.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'hitec_theme_scripts');

// Product Data
function hitec_get_product_data($product_id) {
    // This would typically come from a database or CMS
    // For now, we'll return static data
    $products = array(
        'nomad-1' => array(
            'name' => 'NOMAD',
            'price' => '$129.990',
            'description' => 'El NOMAD representa una nueva era en calzado deportivo, combinando innovación tecnológica con diseño moderno para ofrecer una experiencia única de confort y rendimiento.',
            'features' => array(
                'Tecnología DRI-TEC para máxima transpirabilidad',
                'Amortiguación XLR8 de doble densidad',
                'Suela GEO FOAM para propulsión optimizada',
                'Materiales sostenibles y reciclables'
            ),
            'specs' => array(
                'materials' => array(
                    'Upper' => 'Malla transpirable con refuerzos sintéticos',
                    'Forro' => 'Tela DRI-TEC',
                    'Suela' => 'GEO FOAM con tecnología XLR8'
                ),
                'characteristics' => array(
                    'Impermeable',
                    'Transpirable',
                    'Amortiguación superior',
                    'Propulsión optimizada'
                ),
                'usage' => array(
                    'Running',
                    'Entrenamiento',
                    'Actividades al aire libre'
                )
            ),
            'images' => array(
                'main' => get_template_directory_uri() . '/assets/images/shoe1.png',
                'thumbnails' => array(
                    get_template_directory_uri() . '/assets/images/shoe1.png',
                    get_template_directory_uri() . '/assets/images/shoe2.png',
                    get_template_directory_uri() . '/assets/images/shoe3.png'
                )
            )
        ),
        // Add more products as needed
    );

    return isset($products[$product_id]) ? $products[$product_id] : null;
}

// Product Template Loader
function hitec_load_product_template($template) {
    global $wp_query;
    $product_id = get_query_var('product_id');
    
    if ($product_id) {
        $product_data = hitec_get_product_data($product_id);
        if ($product_data) {
            set_query_var('product_data', $product_data);
            return get_template_directory() . '/page-product-specs.php';
        }
    }
    
    return $template;
}
add_filter('template_include', 'hitec_load_product_template');

// Add rewrite rules for product URLs
function hitec_add_product_rewrite_rules() {
    add_rewrite_rule(
        'producto/([^/]+)/?$',
        'index.php?page_id=8&product_id=$matches[1]',
        'top'
    );
}
add_action('init', 'hitec_add_product_rewrite_rules');

// Add query vars
function hitec_add_product_query_vars($vars) {
    $vars[] = 'product_id';
    return $vars;
}
add_filter('query_vars', 'hitec_add_product_query_vars');

// Add rewrite rule for product pages
function hitec_add_rewrite_rules() {
    add_rewrite_rule(
        'producto/([^/]+)/?$',
        'index.php?pagename=product-specs&producto=$matches[1]',
        'top'
    );
}
add_action('init', 'hitec_add_rewrite_rules');

// Add query var for product
function hitec_add_query_vars($vars) {
    $vars[] = 'producto';
    return $vars;
}
add_filter('query_vars', 'hitec_add_query_vars');

