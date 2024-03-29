<?php

/**
 * Ponto de Referencia functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ponto_de_Referencia
 */
if (!function_exists('ponto_de_referencia_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function ponto_de_referencia_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Ponto de Referencia, use a find and replace
         * to change 'ponto-de-referencia' to the name of your theme in all the template files.
         */
        load_theme_textdomain('ponto-de-referencia', get_template_directory() . '/languages');

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

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'ponto-de-referencia'),
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

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('ponto_de_referencia_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }

endif;
add_action('after_setup_theme', 'ponto_de_referencia_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ponto_de_referencia_content_width() {
    $GLOBALS['content_width'] = apply_filters('ponto_de_referencia_content_width', 640);
}

add_action('after_setup_theme', 'ponto_de_referencia_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ponto_de_referencia_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'ponto-de-referencia'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'ponto-de-referencia'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'ponto_de_referencia_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ponto_de_referencia_scripts() {

    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');

    wp_enqueue_style('motiva-sans-style', get_template_directory_uri() . '/font/motiva-sans/font.css');
    wp_enqueue_style('ponto-de-referencia-style', get_stylesheet_uri());

    wp_enqueue_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array(), '', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '', true);

    wp_enqueue_script('pdr-btn-home', get_template_directory_uri() . '/js/btn-home.js', array('jquery'), '20160802', true);
    wp_enqueue_script('campo-buscar', get_template_directory_uri() . '/js/campo-buscar.js', array('jquery'), '20160802', true);
    wp_enqueue_script('pdr-scroll-home', get_template_directory_uri() . '/js/scroll.js', array('jquery'), '20160802', true);
    wp_enqueue_script('add-class-iframe', get_template_directory_uri() . '/js/add-class-iframe.js', array('jquery'), '20160802', true);

    wp_enqueue_script('ponto-de-referencia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('ponto-de-referencia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    if (is_single()) {
        wp_enqueue_script('ponto-de-referencia-remove-img-paretn', get_template_directory_uri() . '/js/remove-img-parent.js', array(), '2016028', true);
    }

    //
}

add_action('wp_enqueue_scripts', 'ponto_de_referencia_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Functions layout.
 */
require get_template_directory() . '/funcoes/functions-layout.php';

/**
 * Functions MMGV.
 */
require get_template_directory() . '/funcoes/functions-mmgv.php';

/**
 * Functions Custom Post Type.
 */
require get_template_directory() . '/funcoes/cpt_botoes.php';
require get_template_directory() . '/funcoes/cpt_faixas.php';
/**
 * Functions Shortcodes.
 */
require get_template_directory() . '/funcoes/functions-shortcodes.php';
/**
 * 
 * Functions Admin Area.
 */
require get_template_directory() . '/funcoes/functions-admin.php';

