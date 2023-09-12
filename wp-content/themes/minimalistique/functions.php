<?php
require_once __DIR__ . '/vendor/autoload.php';

use SuperbThemesCustomizer\CustomizerController;

/**
 * minimalistique functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package minimalistique
 */


if (!function_exists('minimalistique_theme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */

    function minimalistique_theme_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on minimalistique, use a find and replace
         * to change 'minimalistique' to the name of your theme in all the template files.
         */
        load_theme_textdomain('minimalistique', get_template_directory() . '/languages');

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
        set_post_thumbnail_size(300);

        add_image_size('minimalistique-grid', 350, 230, true);
        add_image_size('minimalistique-slider', 850);
        add_image_size('minimalistique-small', 300, 180, true);


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1'    => esc_html__('Primary', 'minimalistique'),
        ));

        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

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
        add_theme_support('custom-background', apply_filters('minimalistique_theme_custom_background_args', array(
            'default-color' => '#ffffff',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'flex-width'  => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'minimalistique_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function minimalistique_theme_content_width()
{
    $GLOBALS['content_width'] = apply_filters('minimalistique_theme_content_width', 640);
}
add_action('after_setup_theme', 'minimalistique_theme_content_width', 0);


function minimalistique_theme_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'minimalistique_theme_woocommerce_support');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function minimalistique_theme_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'minimalistique'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'minimalistique'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="sidebar-headline-wrapper"><div class="sidebarlines-wrapper"><div class="widget-title-lines"></div></div><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('WooCommerce Sidebar', 'minimalistique'),
        'id'            => 'sidebar-wc',
        'description'   => esc_html__('Add widgets here.', 'minimalistique'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="sidebar-headline-wrapper"><div class="sidebarlines-wrapper"><div class="widget-title-lines"></div></div><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget', 'minimalistique'),
        'id'            => 'footerwidget-1',
        'description'   => esc_html__('Add widgets here.', 'minimalistique'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ));


    register_sidebar(array(
        'name'          => esc_html__('Header Widget', 'minimalistique'),
        'id'            => 'headerwidget-1',
        'description'   => esc_html__('Add widgets here.', 'minimalistique'),
        'before_widget' => '<section id="%1$s" class="header-widget widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div><div class="sidebar-title-border"><h3 class="widget-title">',
        'after_title'   => '</h3></div></div>',
    ));
}




add_action('widgets_init', 'minimalistique_theme_widgets_init');


/**
 * Enqueue scripts and styles.
 */
function minimalistique_theme_scripts()
{
    wp_enqueue_style('minimalistique-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('minimalistique-style', get_stylesheet_uri());
    wp_enqueue_script('minimalistique-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20170823', true);
    wp_enqueue_script('minimalistique-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170823', true);
    wp_enqueue_script('minimalistique-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '20160720', true);
    if (!wp_is_mobile()) {
        wp_enqueue_script('minimalistique-accessibility', get_template_directory_uri() . '/js/accessibility.js', array('jquery'), '20160720', true);
    }
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'minimalistique_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
CustomizerController::GetInstance();


/**
 * Google fonts
 */

function minimalistique_theme_enqueue_assets()
{
    // Include the file.
    require_once get_theme_file_path('webfont-loader/wptt-webfont-loader.php');
    // Load the webfont.
    wp_enqueue_style(
        'minimalistique-fonts',
        wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,700;1,800&family=Playfair+Display:wght@600'),
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'minimalistique_theme_enqueue_assets');



/**
 * Dots after excerpt
 */

function minimalistique_theme_new_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'minimalistique_theme_new_excerpt_more');


/**
 * Filter the excerpt length to 50 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function minimalistique_theme_excerpt_length($length)
{
    if (is_admin()) {
        return $length;
    }
    return 50;
}
add_filter('excerpt_length', 'minimalistique_theme_excerpt_length', 999);

/**
 * Blog Pagination
 */
if (!function_exists('minimalistique_theme_numeric_posts_nav')) {
    function minimalistique_theme_numeric_posts_nav()
    {
        $next_str = __('Next', 'minimalistique');
        $prev_str = __('Previous', 'minimalistique');

        global $wp_query;
        $total = $wp_query->max_num_pages;
        $big = 999999999; // need an unlikely integer
        if ($total > 1) {
            if (get_option('permalink_structure')) {
                $format = 'page/%#%/';
            } else {
                $format = '&paged=%#%';
            }
            echo wp_kses_post(paginate_links(array(
                'base'            => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'        => $format,
                'current'        => max(1, get_query_var('paged')),
                'total'         => $total,
                'mid_size'        => 1,
                'end_size'      => 0,
                'type'             => 'list',
                'prev_text'        => $prev_str,
                'next_text'        => $next_str,
            )));
        }
    }
}


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function minimalistique_theme_skip_link_focus_fix()
{
    // The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
    ?>
    <script>
        "use strict";
        /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function() {
            var t, e = location.hash.substring(1);
            /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
        }, !1);
    </script>
    <?php
}
add_action('wp_print_footer_scripts', 'minimalistique_theme_skip_link_focus_fix');



require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Free Seo Optimized Responsive Theme for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'minimalistique_theme_register_required_plugins');

function minimalistique_theme_register_required_plugins()
{
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name'      => 'Elementor',
            'slug'      => 'elementor',
            'required'           => false,
        ),
        array(
            'name'      => 'Superb Addons - WordPress Editor And Elementor Blocks, Sections & Patterns',
            'slug'      => 'superb-blocks',
            'required'           => false,
        ),
        array(
            'name'      => 'NitroPack',
            'slug'      => 'nitropack',
            'required'           => false,
        ),
    );

    $config = array(
        'id'           => 'minimalistique',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );


    tgmpa($plugins, $config);
}

/**
 * Deactivate Elementor Wizard
 */
function minimalistique_theme_remove_elementor_onboarding()
{
    update_option('elementor_onboarded', true);
}
add_action('after_switch_theme', 'minimalistique_theme_remove_elementor_onboarding');



/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function minimalistique_theme_sanitize_checkbox($checked)
{
    // Boolean check.
    return ((isset($checked) && true == $checked) ? true : false);
}






add_action('admin_init', 'minimalistique_spbThemesNotification', 8);

function minimalistique_spbThemesNotification()
{
    $notifications = include('inc/admin_notification/Autoload.php');
    $notifications->Add("minimalistique_notification", "Unlock All Features with Minimalistique Premium - Limited Time Offer", "

      Take advantage of the up to <span style='font-weight:bold;'>40% discount</span> and unlock all features with Minimalistique Premium. 
      The discount is only available for a limited time.

      <div>
      <a style='margin-bottom:15px;' class='button button-large button-secondary' target='_blank' href='https://superbthemes.com/minimalistique/'>Read More</a> <a style='margin-bottom:15px;' class='button button-large button-primary' target='_blank' href='https://superbthemes.com/minimalistique/'>Upgrade Now</a>
      </div>

      ", "info");


    $options_notification_start = array("delay"=> "-1 seconds", "wpautop" => false);
    $notifications->Add("minimalistique_notification_start", "Let's get you started with Minimalistique!", '
        <span class="st-notification-wrapper">
        <span class="st-notification-column-wrapper">
        <span class="st-notification-column">
        <img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/preview.png' ).'" width="150" height="177" />
        </span>

        <span class="st-notification-column">
        <h2>Why Minimalistique</h2>
        <ul class="st-notification-column-list">
        <li>Easy to Use & Customize</li>
        <li>Search Engine Optimized</li>
        <li>Lightweight and Fast</li>
        <li>Top-notch Customer Support</li>
        </ul>
        <a href="https://superbthemes.com/demo/minimalistique/" target="_blank" class="button">View Minimalistique Demo <span aria-hidden="true" class="dashicons dashicons-external"></span></a> 

        </span>
        <span class="st-notification-column">
        <h2>Customize Minimalistique</h2>
        <ul>
        <li><a href="'. esc_url( admin_url( 'customize.php' ) ) .'" class="button button-primary">Customize The Design</a></li>
        <li><a href="'. esc_url( admin_url( 'widgets.php' ) ) .'" class="button button-primary">Add/Edit Widgets</a></li>
        <li><a href="https://superbthemes.com/customer-support/" target="_blank" class="button">Contact Support <span aria-hidden="true" class="dashicons dashicons-external"></span></a> </li>
        </ul>
        </span>
        </span>
        <span class="st-notification-footer">
        Minimalistique is created by SuperbThemes. We have 100.000+ users and are rated <strong>Excellent</strong> on Trustpilot <img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/stars.svg' ).'" width="87" height="16" />
        </span>
        </span>

        <style>.st-notification-column-wrapper{width:100%;display:-webkit-box;display:-ms-flexbox;display:flex;border-top:1px solid #eee;padding-top:20px;margin-top:3px}.st-notification-column-wrapper h2{margin:0}.st-notification-footer img{margin-bottom:-3px;margin-left:10px}.st-notification-column-wrapper .button{min-width:180px;text-align:center;margin-top:10px}.st-notification-column{margin-right:10px;padding:0 10px;max-width:250px;width:100%}.st-notification-column img{border:1px solid #eee}.st-notification-footer{display:inline-block;width:100%;padding:15px 0;border-top:1px solid #eee;margin-top:10px}.st-notification-column:first-of-type{padding-left:0;max-width:160px}.st-notification-column-list li{list-style-type:circle;margin-left:15px;font-size:14px}@media only screen and (max-width:1000px){.st-notification-column{max-width:33%}}@media only screen and (max-width:800px){.st-notification-column{max-width:50%}.st-notification-column:first-of-type{display:none}}@media only screen and (max-width:600px){.st-notification-column-wrapper{display:block}.st-notification-column{width:100%;max-width:100%;display:inline-block;padding:0;margin:0}span.st-notification-column:last-of-type{margin-top:30px}}</style>

        ', "info", $options_notification_start);
    $notifications->Boot();
}





// Theme page start

add_action('admin_menu', 'minimalistique_themepage');
function minimalistique_themepage()
{
    $option = get_option('minimalistique_themepage_seen');
    $awaiting = !$option ? ' <span class="awaiting-mod">1</span>' : '';
    $theme_info = add_theme_page(__('Theme Settings', 'minimalistique'), __('Theme Settings', 'minimalistique').$awaiting, 'manage_options', 'minimalistique-info.php', 'minimalistique_info_page', 1);
}
function minimalistique_info_page()
{
    $user = wp_get_current_user();
    $theme = wp_get_theme();
    $parent_name = is_child_theme() ? wp_get_theme($theme->Template) : '';
    $theme_name = is_child_theme() ? $theme." ".__("and", "minimalistique")." ".$parent_name : $theme;
    $demo_text = is_child_theme() ? sprintf(__("Need inspiration? Take a moment to view our theme demo for the %s parent theme %s!", "minimalistique"), $theme, $parent_name) : __("Need inspiration? Take a moment to view our theme demo!", "minimalistique");
    $premium_text = is_child_theme() ? sprintf(__("Unlock all features by upgrading to the premium edition of %s and its parent theme %s.", "minimalistique"), $theme, $parent_name) : sprintf(__("Unlock all features by upgrading to the premium edition of %s.", "minimalistique"),$theme);
    $option_name = 'minimalistique_themepage_seen';
    $option = get_option($option_name, null);
    if (is_null($option)) {
        add_option($option_name, true);
    } elseif (!$option) {
        update_option($option_name, true);
    } ?>
    <div class="wrap">

        <div class="spt-theme-settings-wrapper">
            <div class="spt-theme-settings-wrapper-main-content">
              <div class="spt-theme-settings-tabs">

                 <div class="spt-theme-settings-tab">
                     <input type="radio" id="tab-1" name="tab-group-1">



                     <label class="spt-theme-settings-label" for="tab-1"><?php esc_html_e("Get started with", "minimalistique"); ?> <?php echo esc_html($theme_name); ?></label>

                     <div class="spt-theme-settings-content">

                        <div class="spt-theme-settings-content-getting-started-wrapper">
                            <div class="spt-theme-settings-content-item">
                                <div class="spt-theme-settings-content-item-header">
                                    <?php esc_html_e("Add Menus", "minimalistique"); ?>
                                </div>
                                <div class="spt-theme-settings-content-item-content">
                                   <a href="<?php echo esc_url(admin_url('nav-menus.php'))  ?>"><?php esc_html_e("Go to Menus", "minimalistique"); ?></a>
                               </div>
                           </div>

                           <div class="spt-theme-settings-content-item">
                            <div class="spt-theme-settings-content-item-header">
                               <?php esc_html_e("Add Widgets", "minimalistique"); ?>
                           </div>
                           <div class="spt-theme-settings-content-item-content">
                            <a href="<?php echo esc_url(admin_url('widgets.php'))  ?>"><?php esc_html_e("Go to Widgets", "minimalistique"); ?></a>
                        </div>
                    </div>

                    <div class="spt-theme-settings-content-item">
                        <div class="spt-theme-settings-content-item-header">
                            <?php esc_html_e("Change Header Image", "minimalistique"); ?>
                        </div>
                        <div class="spt-theme-settings-content-item-content">
                            <a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "minimalistique"); ?></a>
                        </div>
                    </div>

                    <div class="spt-theme-settings-content-item">
                        <div class="spt-theme-settings-content-item-header">
                           <?php esc_html_e("Change Site Title", "minimalistique"); ?>
                       </div>
                       <div class="spt-theme-settings-content-item-content">
                        <a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "minimalistique"); ?></a>
                    </div>
                </div>

                <div class="spt-theme-settings-content-item">
                    <div class="spt-theme-settings-content-item-header">
                       <?php esc_html_e("Upload Logo", "minimalistique"); ?>
                   </div>
                   <div class="spt-theme-settings-content-item-content">
                    <a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "minimalistique"); ?></a>
                </div>
            </div>

            <div class="spt-theme-settings-content-item">
                <div class="spt-theme-settings-content-item-header">
                   <?php esc_html_e("Change Background Color", "minimalistique"); ?>
               </div>
               <div class="spt-theme-settings-content-item-content">
                <a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "minimalistique"); ?></a>
            </div>
        </div>


        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Customize All Fonts", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>

        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Customize All Colors", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>

        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Import Demo Content", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Demo Import", "minimalistique"); ?></span>
            </div>
        </a>


        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Unlock Full SEO Optimization", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Multiple layouts & design styles", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Custom Copyright Text", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Custom Header With Buttons, Background Image, Text and More", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Show Full Posts on Blog", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("6 Different Blog Layouts", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Custom Border Radius on Elements", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Custom Border Radius on Buttons", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>


        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Show 'Continue reading' Button on Blog", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>


        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Only Display Header Widgets on Front Page", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>


        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Hide Author Name from Byline", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>


        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Hide Category", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Display Placeholder Featured Image", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Display About The Author Section on Posts", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Hide Related Posts", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Hide Next/Previous Post Buttons", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Hide Categories and Tags", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>
        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Show 'Go To Top' Button", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>

        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Show Recent Posts on 404 Page", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>

        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Unlock Feature Requests", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Feature Requests", "minimalistique"); ?></span>
            </div>
        </a>


        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Add Full Width Page Template", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>

        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Unlock Elementor Compatibility", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Install Elementor", "minimalistique"); ?></span>
            </div>
        </a>

        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Access All Child Themes", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("View Child Themes", "minimalistique"); ?></span>
            </div>
        </a>


        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Show Post Category on Post Feed", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>


        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Show Post Category on Posts & Pages", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>


        <a target="_blank" href="https://superbthemes.com/minimalistique/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
            <div class="spt-theme-settings-content-item-header">
                <span><?php esc_html_e("Remove 'Category' from author page title", "minimalistique"); ?></span> <span><?php esc_html_e("Premium", "minimalistique"); ?></span>
            </div>
            <div class="spt-theme-settings-content-item-content">
                <span><?php esc_html_e("Go to Customizer", "minimalistique"); ?></span>
            </div>
        </a>




    </div>
</div> 
</div>


</div>      
</div>

<div class="spt-theme-settings-wrapper-sidebar">

    <div class="spt-theme-settings-wrapper-sidebar-item">
        <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Additional Resources", "minimalistique"); ?></div>
        <div class="spt-theme-settings-wrapper-sidebar-item-content">
            <ul>
                <li>
                    <a target="_blank" href="https://wordpress.org/support/forums/"><span class="dashicons dashicons-wordpress"></span><?php esc_html_e("WordPress.org Support Forum", "minimalistique"); ?></a>
                </li>
                <li>
                    <a target="_blank" href="https://www.facebook.com/superbthemescom/"><span class="dashicons dashicons-facebook-alt"></span><?php esc_html_e("Find us on Facebook", "minimalistique"); ?></a>
                </li>
                <li>
                    <a target="_blank" href="https://twitter.com/superbthemescom"><span class="dashicons dashicons-twitter"></span><?php esc_html_e("Find us on Twitter", "minimalistique"); ?></a>
                </li>
                <li>
                    <a target="_blank" href="https://www.instagram.com/superbthemes/"><span class="dashicons dashicons-instagram"></span><?php esc_html_e("Find us on Instagram", "minimalistique"); ?></a>
                </li>

            </ul>
        </div>
    </div>


    <div class="spt-theme-settings-wrapper-sidebar-item">
        <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("View Demo", "minimalistique"); ?></div>
        <div class="spt-theme-settings-wrapper-sidebar-item-content">
            <p><?php echo esc_html($demo_text); ?></p>
            <a href="https://superbthemes.com/demo/minimalistique/" target="_blank" class="button button-primary"><?php esc_html_e("View Demo", "minimalistique"); ?></a>
        </div>
    </div>

    <div class="spt-theme-settings-wrapper-sidebar-item">
        <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Upgrade to Premium", "minimalistique"); ?></div>
        <div class="spt-theme-settings-wrapper-sidebar-item-content">
            <p><?php echo esc_html($premium_text); ?></p>
            <a href="https://superbthemes.com/minimalistique/" target="_blank" class="button button-primary"><?php esc_html_e("View Premium Version", "minimalistique"); ?></a>
        </div>
    </div>

    <div class="spt-theme-settings-wrapper-sidebar-item">
        <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Helpdesk", "minimalistique"); ?></div>
        <div class="spt-theme-settings-wrapper-sidebar-item-content">
            <p><?php esc_html_e("If you have issues with", "minimalistique"); ?> <?php echo esc_html($theme); ?> <?php esc_html_e("then send us an email through our website!", "minimalistique"); ?></p>
            <a href="https://superbthemes.com/customer-support/" target="_blank" class="button"><?php esc_html_e("Contact Support", "minimalistique"); ?></a>
        </div>
    </div>

    <div class="spt-theme-settings-wrapper-sidebar-item">
        <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Review the Theme", "minimalistique"); ?></div>
        <div class="spt-theme-settings-wrapper-sidebar-item-content">
            <p><?php esc_html_e("Do you enjoy using", "minimalistique"); ?> <?php echo esc_html($theme); ?><?php esc_html_e("? Support us by reviewing us on WordPress.org!", "minimalistique"); ?></p>
            <a href="https://wordpress.org/support/theme/<?php echo esc_attr(get_stylesheet()); ?>/reviews/#new-post" target="_blank" class="button"><?php esc_html_e("Leave a Review", "minimalistique"); ?></a>
        </div>
    </div>



</div>

</div>
</div>


<?php
}

function minimalistique_comparepage_css($hook) {
    if ('appearance_page_minimalistique-info' != $hook) {
        return;
    }
    wp_enqueue_style('minimalistique-custom-style', get_template_directory_uri() . '/css/compare.css');
}
add_action('admin_enqueue_scripts', 'minimalistique_comparepage_css');

// Theme page end




/**
 *  Copyright and License for Upsell button by Justin Tadlock - 2016-2018 © Justin Tadlock. customizer button https://github.com/justintadlock/trt-customizer-pro
 */
require_once(trailingslashit(get_template_directory()) . 'justinadlock-customizer-button/class-customize.php');


