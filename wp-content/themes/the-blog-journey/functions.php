<?php
require_once get_template_directory() . '/vendor/autoload.php';
// Get customizer options
use SuperbThemesCustomizer\CustomizerControls;

// New color variables
if (method_exists(CustomizerControls::class, "OverwriteDefault")) {
    CustomizerControls::OverwriteDefault(CustomizerControls::NAVIGATION_LAYOUT_STYLE, "navigation_layout_style_choice_large");
    CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_SHOW_READMORE_BUTTON, "1");
    CustomizerControls::OverwriteDefault(CustomizerControls::SITE_IDENTITY_HIDE_TAGLINE, "0");
    CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_COLUMNS_STYLE, "blogfeed_onecolumn");
    CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_HIDE_CATEGORY_FEATURED_IMAGE, "1");
    CustomizerControls::OverwriteDefault(CustomizerControls::UPPERWIDGETS_FRONTPAGE_ONLY, "0");
    CustomizerControls::OverwriteDefault(CustomizerControls::SINGLE_HIDE_RELATED_POSTS, "1");
    CustomizerControls::OverwriteDefault('--minimalistique-secondary', "#6626ea");
    CustomizerControls::OverwriteDefault('--minimalistique-secondary-dark', "#5d22d7");
    CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_HIDE_SIDEBAR, "blogfeed_show_sidebar");

}


// Get stylesheet
add_action('wp_enqueue_scripts', 'the_blog_journey_enqueue_styles');
function the_blog_journey_enqueue_styles()
{
    wp_enqueue_style('the-blog-journey-parent-style', get_template_directory_uri() . '/style.css');
}



// New fonts
function the_blog_journey_enqueue_assets()
{
    // Include the file.
    require_once get_theme_file_path('webfont-loader/wptt-webfont-loader.php');
    // Load the webfont.
    wp_enqueue_style(
        'the-blog-journey-fonts',
        wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,700&display=swap'),
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'the_blog_journey_enqueue_assets');
