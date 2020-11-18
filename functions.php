<?php
/**
 * watt functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package watt
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('watt_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function watt_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on watt, use a find and replace
         * to change 'watt' to the name of your theme in all the template files.
         */
        load_theme_textdomain('watt', get_template_directory() . '/languages');

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
            'header_menu' => 'Header Menu',
            'footer_menu' => 'Footer Menu',
            'footer_bottom_menu' => 'Footer Bottom Menu'
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
            'style',
            'script'
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters('watt_custom_background_args', array(
                'default-color' => 'ffffff',
                'default-image' => ''
            ))
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true
        ));
    }
endif;
add_action('after_setup_theme', 'watt_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function watt_content_width()
{
    $GLOBALS['content_width'] = apply_filters('watt_content_width', 640);
}
add_action('after_setup_theme', 'watt_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function watt_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'watt'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'watt'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}
add_action('widgets_init', 'watt_widgets_init');

/**
 * Enqueue scripts and styles.
 */

function watt_scripts()
{
    wp_enqueue_style('watt-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('watt-style', 'rtl', 'replace');
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap',
        array(),
        _S_VERSION,
        false
    );

    wp_enqueue_style(
        'revealator_css',
        get_template_directory_uri() .
            '/libs/revealator/fm.revealator.jquery.min.css',
        array(),
        '2.0',
        false
    );
    wp_enqueue_style(
        'main_css',
        get_template_directory_uri() . '/assets/styles/main.css',
        array(),
        '2.0',
        false
    );
	
      wp_enqueue_script(
        'zipFile',
        get_template_directory_uri() . '/js/ZipFile.complete.js',
        '1.0',
        true
      );

      wp_enqueue_script(
        'geoxml3',
        get_template_directory_uri() . '/js/geoxml3.js',
        '1.0',
        true
      );
//      wp_enqueue_script(
//        'ProjectedOverlay',
//        get_template_directory_uri() . '/js/ProjectedOverlay.js',
//        '1.0',
//        true
//      );

    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.4.1.min.js');
    wp_enqueue_script('jquery');
    
    wp_enqueue_script(
        'jquery-migrate',
        'https://code.jquery.com/jquery-migrate-1.4.1.min.js',
        array('jquery'),
        _S_VERSION,
        true
    );

    wp_enqueue_script(
        'watt-navigation',
        get_template_directory_uri() . '/js/navigation.js',
        array(),
        _S_VERSION,
        true
    );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    

    wp_enqueue_script(
        'isotope_js',
        'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js',
        array('jquery'),
        '1.0',
        true
    );
    wp_enqueue_script(
        'revealator_js',
        get_template_directory_uri() .
            '/libs/revealator/fm.revealator.jquery.min.js',
        array('jquery'),
        '1.0',
        true
    );
    wp_enqueue_script(
        'main_js',
        get_template_directory_uri() . '/assets/scripts/main.js',
        array(),
        '1.0',
        true
    );
//    wp_enqueue_script(
//        'product',
//        get_template_directory_uri() . '/js/product.js',
//        '1.0',
//        true
//    );
}

add_action('wp_enqueue_scripts', 'watt_scripts');

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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

function short_title($limit)
{
    $title = apply_filters('the_title', get_the_title());
    $filtered =
        mb_strlen($title) > $limit
            ? mb_substr($title, 0, $limit - 2) . '...'
            : $title;
    return $filtered;
}

function short_content($limit)
{
    $filtered = strip_tags(
        preg_replace(
            '@<style[^>]*?>.?</style>@si',
            '',
            preg_replace(
                '@<script[^>]?>.*?</script>@si',
                '',
                apply_filters('the_content', get_the_content())
            )
        )
    );
    echo substr($filtered, 0, strrpos(substr($filtered, 0, $limit), ' ')) .
        '...';
}

function short_something($something, $limit)
{
    $filtered =
        mb_strlen($something) > $limit
            ? mb_substr($something, 0, $limit - 2) . '...'
            : $something;
    return $filtered;
}

function opg_html($output)
{
    return $output . ' prefix="og: http://ogp.me/ns#"';
}
add_filter('language_attributes', 'opg_html');

function facebook_open_graph()
{
    global $post;
    global $wp;
    //ДЛЯ ССЫЛОК
    $current_url = home_url($wp->request);

    //ДЛЯ DESCRIPTION
    if ($excerpt = $post->post_excerpt) {
        $trim_words = strip_tags($post->post_excerpt);
    } elseif ($wptw = wp_trim_words(get_the_content(), 25)) {
        $trim_words = preg_replace('/[""]/', '', $wptw);
    } else {
        $trim_words = get_bloginfo('description');
    }
    //ДЛЯ ИЗОБРАЖЕНИЙ
    $first_img = '';
    $otimg = preg_match_all(
        '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',
        $post->post_content,
        $matches
    );
    $first_img = $matches[1][0];
    if (empty($first_img)) {
        $first_img = get_bloginfo('template_directory') . '/assets/i/icon.png';
    }
    //ОБЩИЕ META-ТЕГИ
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:site_name" content="';
    echo bloginfo('name');
    echo '"/>';
    if (has_post_thumbnail($post->ID)) {
        $thumbnail_src = wp_get_attachment_image_src(
            get_post_thumbnail_id($post->ID),
            'medium'
        );
        echo '<meta property="og:image" content="' .
            esc_attr($thumbnail_src[0]) .
            '"/>';
    } else {
        echo '<meta property="og:image" content="' . $first_img . '"/>';
    }
    echo '<meta property="og:description" content="' . $trim_words . '"/>';
    //META-ТЕГИ ДЛЯ СТАТЕЙ, СТРАНИЦ
    if (is_singular()) {
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
    } else {
        //META-ТЕГИ ДЛЯ ГЛАВНОЙ, РУБРИКИ И ОСТАЛЬНЫХ
        echo '<meta property="og:title" content="';
        echo bloginfo('name');
        echo '"/>';
        echo '<meta property="og:url" content="' . $current_url . '"/>';
    }
}
add_action('wp_head', 'facebook_open_graph');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Options',
        'menu_title' => 'Options'
    ));
}

add_filter('wpcf7_autop_or_not', '__return_false');

function my_acf_save_post($post_id)
{
    if (get_post_type($post_id) !== 'deal') {
        return;
    }
    $deal = get_post($post_id);
    $address = urlencode($deal->post_content);
    $googleMapUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyDWm4rZnPQVCDMwke8-mv1AtzQFUAnHMtY";
    $geocodeResponseData = file_get_contents($googleMapUrl);
    $responseData = json_decode($geocodeResponseData, true);
    if ($responseData['status'] == 'OK') {
        $latitude = isset(
            $responseData['results'][0]['geometry']['location']['lat']
        )
            ? $responseData['results'][0]['geometry']['location']['lat']
            : "";
        $longitude = isset(
            $responseData['results'][0]['geometry']['location']['lng']
        )
            ? $responseData['results'][0]['geometry']['location']['lng']
            : "";
        update_field('field_5f9058a7d5048', $latitude, $post_id);
        update_field('field_5f905858d5047', $longitude, $post_id);
    }
}

add_action('acf/save_post', 'my_acf_save_post', 20);

function on_publish_deal($post_id)
{
    do_action('acf/save_post', $post_id);
}

add_action('publish_deal', 'on_publish_deal', 20);

add_action('wp_ajax_custom_action', 'custom_action');
add_action('wp_ajax_nopriv_custom_action', 'custom_action');
function custom_action()
{
    $response = array(
        'error' => $_POST['email']
    );
    //print_r($_POST);
    if (trim($_POST['email']) == '') {
        $response['error'] = true;
        $response['error_message'] = 'Email is required';
        exit(json_encode($response));
    }
    global $wpdb;
    $wpdb->insert(
        'wp_calculator_email',
        array(
            'email' => $_POST['email']
        ),
        array('%s')
    );
    $subject = "Bereken Jouw Energiebesparing";
    $message =
        '


<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:v="urn:schemas-microsoft-com:vml">
<head>
    <title>[SUBJECT]</title>
    <!--[if !mso]> -->
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <!--<![endif]-->
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <style type="text/css">
        #outlook a {
            padding: 0;
        }
        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table, td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        p {
            display: block;
            margin: 13px 0;
        }
    </style>
    <!--[if mso]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <!--[if lte mso 11]>
    <style type="text/css">
        .mj-outlook-group-fix {
            width: 100% !important;
        }
    </style>
    <![endif]-->
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);
    </style>
    <!--<![endif]-->
    <style type="text/css">
        @media only screen and (min-width: 480px) {
            .mj-column-per-100 {
                width: 100% !important;
                max-width: 100%;
            }

            .mj-column-per-8 {
                width: 8% !important;
                max-width: 8%;
            }

            .mj-column-per-52 {
                width: 52% !important;
                max-width: 52%;
            }

            .mj-column-per-40 {
                width: 40% !important;
                max-width: 40%;
            }

            .mj-column-per-92 {
                width: 92% !important;
                max-width: 92%;
            }
        }
    </style>
    <style type="text/css">
        @media only screen and (max-width: 480px) {
            table.mj-full-width-mobile {
                width: 100% !important;
            }

            td.mj-full-width-mobile {
                width: auto !important;
            }
        }

    </style>
    <style type="text/css">
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */

        /* Document
           ========================================================================== */

        /**
         * 1. Correct the line height in all browsers.
         * 2. Prevent adjustments of font size after orientation changes in iOS.
         */

        html {
            line-height: 1.15; /* 1 */
            -webkit-text-size-adjust: 100%; /* 2 */
        }

        /* Sections
           ========================================================================== */

        /**
         * Remove the margin in all browsers.
         */

        body {
            margin: 0;
        }

        /**
         * Render the `main` element consistently in IE.
         */

        main {
            display: block;
        }

        /**
         * Correct the font size and margin on `h1` elements within `section` and
         * `article` contexts in Chrome, Firefox, and Safari.
         */

        h1 {
            font-size: 2em;
            margin: 0.67em 0;
        }

        /* Grouping content
           ========================================================================== */

        /**
         * 1. Add the correct box sizing in Firefox.
         * 2. Show the overflow in Edge and IE.
         */

        hr {
            box-sizing: content-box; /* 1 */
            height: 0; /* 1 */
            overflow: visible; /* 2 */
        }

        /**
         * 1. Correct the inheritance and scaling of font size in all browsers.
         * 2. Correct the odd `em` font sizing in all browsers.
         */

        pre {
            font-family: monospace, monospace; /* 1 */
            font-size: 1em; /* 2 */
        }

        /* Text-level semantics
           ========================================================================== */

        /**
         * Remove the gray background on active links in IE 10.
         */

        a {
            background-color: transparent;
        }

        /**
         * 1. Remove the bottom border in Chrome 57-
         * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
         */

        abbr[title] {
            border-bottom: none; /* 1 */
            text-decoration: underline; /* 2 */
            text-decoration: underline dotted; /* 2 */
        }

        /**
         * Add the correct font weight in Chrome, Edge, and Safari.
         */

        b,
        strong {
            font-weight: bolder;
        }

        /**
         * 1. Correct the inheritance and scaling of font size in all browsers.
         * 2. Correct the odd `em` font sizing in all browsers.
         */

        code,
        kbd,
        samp {
            font-family: monospace, monospace; /* 1 */
            font-size: 1em; /* 2 */
        }

        /**
         * Add the correct font size in all browsers.
         */

        small {
            font-size: 80%;
        }

        /**
         * Prevent `sub` and `sup` elements from affecting the line height in
         * all browsers.
         */

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        sub {
            bottom: -0.25em;
        }

        sup {
            top: -0.5em;
        }

        /* Embedded content
           ========================================================================== */

        /**
         * Remove the border on images inside links in IE 10.
         */

        img {
            border-style: none;
        }

        /* Forms
           ========================================================================== */

        /**
         * 1. Change the font styles in all browsers.
         * 2. Remove the margin in Firefox and Safari.
         */

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit; /* 1 */
            font-size: 100%; /* 1 */
            line-height: 1.15; /* 1 */
            margin: 0; /* 2 */
        }

        /**
         * Show the overflow in IE.
         * 1. Show the overflow in Edge.
         */

        button,
        input { /* 1 */
            overflow: visible;
        }

        /**
         * Remove the inheritance of text transform in Edge, Firefox, and IE.
         * 1. Remove the inheritance of text transform in Firefox.
         */

        button,
        select { /* 1 */
            text-transform: none;
        }

        /**
         * Correct the inability to style clickable types in iOS and Safari.
         */

        button,
        [type="button"],
        [type="reset"],
        [type="submit"] {
            -webkit-appearance: button;
        }

        /**
         * Remove the inner border and padding in Firefox.
         */

        button::-moz-focus-inner,
        [type="button"]::-moz-focus-inner,
        [type="reset"]::-moz-focus-inner,
        [type="submit"]::-moz-focus-inner {
            border-style: none;
            padding: 0;
        }

        /**
         * Restore the focus styles unset by the previous rule.
         */

        button:-moz-focusring,
        [type="button"]:-moz-focusring,
        [type="reset"]:-moz-focusring,
        [type="submit"]:-moz-focusring {
            outline: 1px dotted ButtonText;
        }

        /**
         * Correct the padding in Firefox.
         */

        fieldset {
            padding: 0.35em 0.75em 0.625em;
        }

        /**
         * 1. Correct the text wrapping in Edge and IE.
         * 2. Correct the color inheritance from `fieldset` elements in IE.
         * 3. Remove the padding so developers are not caught out when they zero out
         *    `fieldset` elements in all browsers.
         */

        legend {
            box-sizing: border-box; /* 1 */
            color: inherit; /* 2 */
            display: table; /* 1 */
            max-width: 100%; /* 1 */
            padding: 0; /* 3 */
            white-space: normal; /* 1 */
        }

        /**
         * Add the correct vertical alignment in Chrome, Firefox, and Opera.
         */

        progress {
            vertical-align: baseline;
        }

        /**
         * Remove the default vertical scrollbar in IE 10+.
         */

        textarea {
            overflow: auto;
        }

        /**
         * 1. Add the correct box sizing in IE 10.
         * 2. Remove the padding in IE 10.
         */

        [type="checkbox"],
        [type="radio"] {
            box-sizing: border-box; /* 1 */
            padding: 0; /* 2 */
        }

        /**
         * Correct the cursor style of increment and decrement buttons in Chrome.
         */

        [type="number"]::-webkit-inner-spin-button,
        [type="number"]::-webkit-outer-spin-button {
            height: auto;
        }

        /**
         * 1. Correct the odd appearance in Chrome and Safari.
         * 2. Correct the outline style in Safari.
         */

        [type="search"] {
            -webkit-appearance: textfield; /* 1 */
            outline-offset: -2px; /* 2 */
        }

        /**
         * Remove the inner padding in Chrome and Safari on macOS.
         */

        [type="search"]::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        /**
         * 1. Correct the inability to style clickable types in iOS and Safari.
         * 2. Change font properties to `inherit` in Safari.
         */

        ::-webkit-file-upload-button {
            -webkit-appearance: button; /* 1 */
            font: inherit; /* 2 */
        }

        /* Interactive
           ========================================================================== */

        /*
         * Add the correct display in Edge, IE 10+, and Firefox.
         */

        details {
            display: block;
        }

        /*
         * Add the correct display in all browsers.
         */

        summary {
            display: list-item;
        }

        /* Misc
           ========================================================================== */

        /**
         * Add the correct display in IE 10+.
         */

        template {
            display: none;
        }

        /**
         * Add the correct display in IE 10.
         */

        [hidden] {
            display: none;
        }

    </style>
    <!--[if mso]>
    <style>
        td, th {
            line-height: 0px !important;
        }
    </style>

    <![endif]-->
</head>
<body style="background-color:#eeeeee;">
<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">

</div>
<div style="background-color:#eeeeee;">
    <!--[if mso | IE]>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="background:#ffffff;background-color:#ffffff;width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:0px 0px 0px 0px;text-align:center;background-color:#ffffff;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="" style="vertical-align:top;width:600px;">
                    <![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix"
                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;background-color:#ffffff;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="vertical-align:top;background-color:#ffffff;" width="100%">
                            <tr>
                                <td align="center" style="font-size:0px;padding:0;word-break:break-word;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                           style="border-collapse:collapse;border-spacing:0px;">
                                        <tbody>
                                        <tr>
                                            <td style="width:600px;">
                                                <img height="auto"
                                                     src="http://watt-lamp.nl/wp-content/uploads/2020/03/Header.png"
                                                     style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;"
                                                     width="600"
                                                />
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--[if mso | IE]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--[if mso | IE]>
    </td>
    </tr>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="background:#ffffff;background-color:#ffffff;width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:10px 0px;text-align:center;background-color:#ffffff;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="" style="width:600px;">
                    <![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix"
                         style="font-size:0;line-height:0;text-align:left;display:inline-block;width:100%;direction:ltr;background-color:#ffffff;">
                        <!--[if mso | IE]>
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td style="vertical-align:top;width:48px;">
                        <![endif]-->
                        <div class="mj-column-per-8 mj-outlook-group-fix"
                             style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:8%;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                   style="vertical-align:top;" width="100%">
                                <tr>
                                    <td align="center" style="font-size:0px;padding:10px;word-break:break-word;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="border-collapse:collapse;border-spacing:0px;">
                                            <tbody>
                                            <tr>
                                                <td style="width:12px;">
                                                    <img height="120"
                                                         src="http://watt-lamp.nl/wp-content/uploads/2020/03/Left-1.png"
                                                         style="border:0;display:block;outline:none;text-decoration:none;height:120px;width:100%;font-size:13px;"
                                                         width="12"
                                                    />
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--[if mso | IE]>
                        </td>
                        <td style="vertical-align:top;width:312px;">
                        <![endif]-->
                        <div class="mj-column-per-52 mj-outlook-group-fix"
                             style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:52%;background-color:#ffffff;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                   style="vertical-align:top;background-color:#ffffff;" width="100%">
                                <tr>
                                    <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;background-color:#ffffff;">
                                        <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:18px;text-align:left;color:#555555;">
										Hierbij ontvangt u uw geschatte besparingsberekening. Hierin vindt u ook informatie over de besparing op onderhoud.
                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--[if mso | IE]>
                        </td>
                        <td style="vertical-align:top;width:240px;">
                        <![endif]-->
                        <div class="mj-column-per-40 mj-outlook-group-fix"
                             style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:40%;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                   style="vertical-align:top;background-color:#ffffff;" width="100%">
                                <tr>
                                    <td align="right" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--[if mso | IE]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                    </div>
                    <!--[if mso | IE]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--[if mso | IE]>
    </td>
    </tr>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="background:#ffffff;background-color:#ffffff;width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:0;text-align:center;background-color:#ffffff;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="" style="vertical-align:top;width:600px;">
                    <![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix"
                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;background-color:#ffffff;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="vertical-align:top;" width="100%">
                            <tr>
                                <td align="left" style="font-size:0px;padding:0 0 0 40px;word-break:break-word;background-color:#ffffff;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                           style="border-collapse:collapse;border-spacing:0px;background-color:#ffffff;">
                                        <tbody>
                                        <tr>
                                            <td style="width:128px;">
                                                <img height="10"
                                                     src="http://watt-lamp.nl/wp-content/uploads/2020/03/Small-horizontal-divider.png"
                                                     style="border:0;display:block;outline:none;text-decoration:none;height:10px;width:100%;font-size:13px;"
                                                     width="128"
                                                />
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--[if mso | IE]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--[if mso | IE]>
    </td>
    </tr>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="background:#ffffff;background-color:#ffffff;width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="" style="width:600px;">
                    <![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix"
                         style="font-size:0;line-height:0;text-align:left;display:inline-block;width:100%;direction:ltr;">
                        <!--[if mso | IE]>
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td style="vertical-align:top;width:48px;">
                        <![endif]-->
                        <div class="mj-column-per-8 mj-outlook-group-fix"
                             style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:8%;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                   style="vertical-align:top;" width="100%">
                                <tr>
                                    <td align="center" style="font-size:0px;padding:10px;word-break:break-word;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="border-collapse:collapse;border-spacing:0px;">
                                            <tbody>
                                            <tr>
                                                <td style="width:12px;">
                                                    <img height="750"
                                                         src="http://watt-lamp.nl/wp-content/uploads/2020/03/Left-2-besparing.png"
                                                         style="border:0;display:block;outline:none;text-decoration:none;height:750px;width:100%;font-size:13px;"
                                                         width="12"
                                                    />
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--[if mso | IE]>
                        </td>
                        <td style="vertical-align:top;width:552px;">
                        <![endif]-->
                        <div class="mj-column-per-92 mj-outlook-group-fix"
                             style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:92%;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                <tbody>
                                <tr>
                                    <td style="vertical-align:top;padding:0 15px 0px 0px;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style=""
                                               width="100%">
                                            
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           style="color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;table-layout:auto;width:350px;border:none;"
                                                           width="350">
                                                        <tr>
                                                            <td align="center" style="padding:10px;">
                                                                <img src="http://watt-lamp.nl/wp-content/uploads/2020/03/Branduren-icoon.png"
                                                                     width="40px"/><br/>
                                                                ' .
        $_POST['F'] .
        ' branduren
                                                            </td>
                                                            <td align="center" style="padding:10px;">
                                                                <img src="http://watt-lamp.nl/wp-content/uploads/2020/03/Branddagen-icoon.png"
                                                                     width="40px"/><br/>
                                                                ' .
        $_POST['G'] .
        ' dagen
                                                            </td>
                                                            <td align="center" style="padding:10px;">
                                                                <img src="http://watt-lamp.nl/wp-content/uploads/2020/03/kwh-icoon.png"
                                                                     width="40px"/><br/>
                                                                ' .
        $_POST['H'] .
        ' cent per kWh
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td align="left" style="font-size:0px;padding:0;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           style="color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;table-layout:auto;width:100%;border:none;"
                                                           width="100%">
                                                        <tr>
                                                            <td width="49%" valign="top">
                                                                <p style="font-size: 14px">Verbruik huidige verlichting
                                                                    per jaar</mj-text>
                                                                <table bgcolor="#4ec1cd"
                                                                       style="color: #FFF; font-size: 18px; padding: 15px; margin-bottom: 8px;"
                                                                       width="100%">
                                                                    <tr>
                                                                        <td style="padding: 8px 0 8px 8px">Energie in
                                                                            kWh:
                                                                        </td>
                                                                        <td align="right"
                                                                            style="padding: 8px 8px 8px 0">
                                                                            ' .
        $_POST['CURRENT_USAGE_KWH'] .
        '
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <mj-spacer height="10px"/>
                                                                <table bgcolor="#4ec1cd"
                                                                       style="color: #FFF; font-size: 18px; padding: 10px; margin-bottom: 8px;"
                                                                       width="100%">
                                                                    <tr>
                                                                        <td style="padding: 8px 0 8px 8px">Energie:
                                                                        </td>
                                                                        <td align="right"
                                                                            style="padding: 8px 8px 8px 0">
                                                                            € ' .
        $_POST['CURRENT_USAGE_EURO'] .
        '
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                               <!-- <mj-spacer height="10px"/>
                                                                <table bgcolor="#4ec1cd"
                                                                       style="color: #FFF; font-size: 18px; padding: 10px; margin-bottom: 8px;"
                                                                       width="100%">
                                                                    <tr>
                                                                        <td style="padding: 8px 0 8px 8px">Onderhoud:
                                                                        </td>
                                                                        <td align="right"
                                                                            style="padding: 8px 8px 8px 0">
                                                                            € ' .
        $_POST['CURRENT_USAGE_MAINTENANCE_EURO'] .
        '
                                                                        </td>
                                                                    </tr>
                                                                </table>-->
                                                            </td>
                                                            <td width="2%"></td>
                                                            <td width="49%" valign="top">
                                                                <p style="font-size: 14px">Verbruik met LED
                                                                    verlichting per jaar</mj-text>
                                                                <table bgcolor="#60c87f"
                                                                       style="color: #FFF; font-size: 18px; padding: 15px; margin-bottom: 8px;"
                                                                       width="100%">
                                                                    <tr>
                                                                        <td style="padding: 8px 0 8px 8px">Energie in
                                                                            kWh:
                                                                        </td>
                                                                        <td align="right"
                                                                            style="padding: 8px 8px 8px 0">
                                                                              ' .
        $_POST['NEW_USAGE_KWH'] .
        '
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <mj-spacer height="10px"/>
                                                                <table bgcolor="#60c87f"
                                                                       style="color: #FFF; font-size: 18px; padding: 10px; margin-bottom: 8px;"
                                                                       width="100%">
                                                                    <tr>
                                                                        <td style="padding: 8px 0 8px 8px">Energie:
                                                                        </td>
                                                                        <td align="right"
                                                                            style="padding: 8px 8px 8px 0">
                                                                            € ' .
        $_POST['NEW_USAGE_EURO'] .
        '
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                               <!-- <mj-spacer height="10px"/>
                                                                <table bgcolor="#60c87f"
                                                                       style="color: #FFF; font-size: 18px; padding: 10px; margin-bottom: 8px;"
                                                                       width="100%">
                                                                    <tr>
                                                                        <td style="padding: 8px 0 8px 8px">Onderhoud:
                                                                        </td>
                                                                        <td align="right"
                                                                            style="padding: 8px 8px 8px 0">
                                                                            € ' .
        $_POST['NEW_USAGE_MAINTENANCE_EURO'] .
        '
                                                                        </td>
                                                                    </tr>
                                                                </table>-->
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:18px;text-align:center;color:#555555;">
                                                        Besparing met ledverlichting <b>per jaar</b>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:0px;word-break:break-word;">
                                                    <!--[if mso | IE]>
                                                    <table role="presentation" border="0" cellpadding="0"
                                                           cellspacing="0">
                                                        <tr>
                                                            <td height="10" style="vertical-align:top;height:10px;">
                                                    <![endif]-->
                                                    <div style="height:10px;">
                                                        &nbsp;
                                                    </div>
                                                    <!--[if mso | IE]>
                                                    </td></tr></table>
                                                    <![endif]-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="background:#60c87f;font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           style="color:#FFFFFF;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:18px;line-height:22px;table-layout:auto;width:100%;border:none;"
                                                           width="100%">
                                                        <tr>
                                                            <td>Besparing op energie in kWh:</td>
                                                            <td align="right">' .
        $_POST['DIFF_USAGE_KWH'] .
        '</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:0px;word-break:break-word;">
                                                    <!--[if mso | IE]>
                                                    <table role="presentation" border="0" cellpadding="0"
                                                           cellspacing="0">
                                                        <tr>
                                                            <td height="10" style="vertical-align:top;height:10px;">
                                                    <![endif]-->
                                                    <div style="height:10px;">
                                                        &nbsp;
                                                    </div>
                                                    <!--[if mso | IE]>
                                                    </td></tr></table>
                                                    <![endif]-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="background:#60c87f;font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           style="color:#FFFFFF;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:18px;line-height:22px;table-layout:auto;width:100%;border:none;"
                                                           width="100%">
                                                        <tr>
                                                            <td>Besparing op energie:</td>
                                                            <td align="right">€ ' .
        $_POST['DIFF_USAGE_EURO'] .
        '</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:0px;word-break:break-word;">
                                                    <!--[if mso | IE]>
                                                    <table role="presentation" border="0" cellpadding="0"
                                                           cellspacing="0">
                                                        <tr>
                                                            <td height="10" style="vertical-align:top;height:10px;">
                                                    <![endif]-->
                                                    <div style="height:10px;">
                                                        &nbsp;
                                                    </div>
                                                    <!--[if mso | IE]>
                                                    </td></tr></table>
                                                    <![endif]-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="background:#60c87f;font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           style="color:#FFFFFF;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:18px;line-height:22px;table-layout:auto;width:100%;border:none;"
                                                           width="100%">
                                                        <tr>
                                                            <td>Besparing op onderhoud:</td>
                                                            <td align="right">€ ' .
        $_POST['DIFF_USAGE_MAINTENANCE_EURO'] .
        '</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:0px;word-break:break-word;">
                                                    <!--[if mso | IE]>
                                                    <table role="presentation" border="0" cellpadding="0"
                                                           cellspacing="0">
                                                        <tr>
                                                            <td height="10" style="vertical-align:top;height:10px;">
                                                    <![endif]-->
                                                    <div style="height:10px;">
                                                        &nbsp;
                                                    </div>
                                                    <!--[if mso | IE]>
                                                    </td></tr></table>
                                                    <![endif]-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="background:#39af45;font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           style="color:#FFFFFF;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:18px;line-height:22px;table-layout:auto;width:100%;border:none;"
                                                           width="100%">
                                                        <tr>
                                                            <td>Jaarlijkse besparing:</td>
                                                            <td align="right">€ ' .
        $_POST['TOTAL_MONETARY_SAVINGS_PER_YEAR'] .
        '</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:0px;word-break:break-word;">
                                                    <!--[if mso | IE]>
                                                    <table role="presentation" border="0" cellpadding="0"
                                                           cellspacing="0">
                                                        <tr>
                                                            <td height="30" style="vertical-align:top;height:30px;">
                                                    <![endif]-->
                                                    <div style="height:30px;">
                                                        &nbsp;
                                                    </div>
                                                    <!--[if mso | IE]>
                                                    </td></tr></table>
                                                    <![endif]-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:28px;line-height:30px;text-align:center;color:#555555;">
                                                        Gemiddelde terugverdientijd: 2,5 jaar
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--[if mso | IE]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                    </div>
                    <!--[if mso | IE]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--[if mso | IE]>
    </td>
    </tr>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="background:#ffffff;background-color:#ffffff;width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:0;text-align:center;background-color:#ffffff;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="" style="vertical-align:top;width:600px;">
                    <![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix"
                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;background-color:#ffffff;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="vertical-align:top;background-color:#ffffff;" width="100%">
                            <tr>
                                <td align="left" style="font-size:0px;padding:0 0 0 40px;word-break:break-word;background-color:#ffffff;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                           style="border-collapse:collapse;border-spacing:0px;background-color:#ffffff;">
                                        <tbody>
                                        <tr>
                                            <td style="width:128px;background-color:#ffffff;">
                                                <img height="10"
                                                     src="http://watt-lamp.nl/wp-content/uploads/2020/03/Small-horizontal-divider.png"
                                                     style="border:0;display:block;outline:none;text-decoration:none;height:10px;width:100%;font-size:13px;"
                                                     width="128"
                                                />
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--[if mso | IE]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--[if mso | IE]>
    </td>
    </tr>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    
    <!--[if mso | IE]>
    </td>
    </tr>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    
    <!--[if mso | IE]>
    </td>
    </tr>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    
    <!--[if mso | IE]>
    </td>
    </tr>
    </table>

    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    
    <!--[if mso | IE]>
            </td>
        </tr>
    </table>

    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
                <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="background:#ffffff;background-color:#ffffff;width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="" style="width:600px;">
                    <![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix"
                         style="font-size:0;line-height:0;text-align:left;display:inline-block;width:100%;direction:ltr;">
                        <!--[if mso | IE]>
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td style="vertical-align:top;width:48px;">
                        <![endif]-->
                        <div class="mj-column-per-8 mj-outlook-group-fix"
                             style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:8%;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                   style="vertical-align:top;" width="100%">
                                <tr>
                                    <td align="center" style="font-size:0px;padding:10px;word-break:break-word;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="border-collapse:collapse;border-spacing:0px;">
                                            <tbody>
                                            <tr>
                                                <td style="width:12px;">
                                                    <img height="600"
                                                         src="http://watt-lamp.nl/wp-content/uploads/2020/03/Left-2-besparing.png"
                                                         style="border:0;display:block;outline:none;text-decoration:none;height:600px;width:100%;font-size:13px;"
                                                         width="12"
                                                    />
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--[if mso | IE]>
                        </td>
                        <td style="vertical-align:top;width:552px;">
                        <![endif]-->
                        <div class="mj-column-per-92 mj-outlook-group-fix"
                             style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:92%;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                <tbody>
                                <tr>
                                    <td style="vertical-align:top;padding:0 15px 0px 0px;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style=""
                                               width="100%">
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation"
                                                           style="border-collapse:collapse;border-spacing:0px;">
                                                        <tbody>
                                                        <tr>
                                                            <td style="width:100px;">
                                                                <img height="auto"
                                                                     src="http://watt-lamp.nl/wp-content/uploads/2020/03/watt-lamp-icoon.png"
                                                                     style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;"
                                                                     width="100"
                                                                />
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:18px;text-align:center;color:#555555;">
                                                        <h1>Wij zijn Watt-Lamp</h1></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           style="color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;table-layout:auto;width:100%;border:none;"
                                                           width="100%">
                                                        <tr>
                                                            <td style="text-align: center; padding: 5px;"> Watt-Lamp is gespecialiseerd in de ontwikkeling,
                                                              productie en installatie van ledverlichting. Doordat wij als enige de productie in eigen hand hebben en gebruik maken van eigen installatieteams,
                                                              kunnen wij altijd de beste verlichting voor de laagste prijs bieden.<br/> <br><b>Uniek concept</b><br>U kunt
                                                                overstappen zonder investering met ons unieke concept,
                                                                hiermee betaalt u de verlichting m.b.v uw maandelijkse
                                                                energiebesparing.<br/><br/> <b>Referenties</b><br>Vele bedrijven zijn u al voor
                                                                gegaan! Neem eens een kijkje op <a href="https://watt-lamp.nl/projecten/">onze website</a> om deze refernties te bekijken.
                                                            </td>
                                                            <td>
                                                                <img src="http://watt-lamp.nl/wp-content/uploads/2020/03/Wij-zijn-foto.png"
                                                                     width="200"/>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--[if mso | IE]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                    </div>
                    <!--[if mso | IE]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--[if mso | IE]>
            </td>
        </tr>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
     <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="background:#ffffff;background-color:#ffffff;width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:0;text-align:center;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="" style="vertical-align:top;width:600px;">
                    <![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix"
                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="vertical-align:top;" width="100%">
                            <tr>
                                <td align="left" style="font-size:0px;padding:0 0 0 40px;word-break:break-word;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                           style="border-collapse:collapse;border-spacing:0px;">
                                        <tbody>
                                        <tr>
                                            <td style="width:128px;">
                                                <img height="10"
                                                     src="http://watt-lamp.nl/wp-content/uploads/2020/03/Small-horizontal-divider.png"
                                                     style="border:0;display:block;outline:none;text-decoration:none;height:10px;width:100%;font-size:13px;"
                                                     width="128"
                                                />
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--[if mso | IE]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--[if mso | IE]>
            </td>
        </tr>
    </table>

    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
                <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="background:#ffffff;background-color:#ffffff;width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="" style="width:600px;">
                    <![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix"
                         style="font-size:0;line-height:0;text-align:left;display:inline-block;width:100%;direction:ltr;">
                        <!--[if mso | IE]>
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td style="vertical-align:top;width:48px;">
                        <![endif]-->
                        <div class="mj-column-per-8 mj-outlook-group-fix"
                             style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:8%;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                   style="vertical-align:top;" width="100%">
                                <tr>
                                    <td align="center" style="font-size:0px;padding:10px;word-break:break-word;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="border-collapse:collapse;border-spacing:0px;">
                                            <tbody>
                                            <tr>
                                                <td style="width:12px;">
                                                    <img height="auto"
                                                         src="http://watt-lamp.nl/wp-content/uploads/2020/03/Left-EIA.png"
                                                         style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;"
                                                         width="12"
                                                    />
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--[if mso | IE]>
                        </td>
                        <td style="vertical-align:top;width:552px;">
                        <![endif]-->
                        <div class="mj-column-per-92 mj-outlook-group-fix"
                             style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:92%;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                <tbody>
                                <tr>
                                    <td style="vertical-align:top;padding:0 15px 0px 0px;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style=""
                                               width="100%">
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation"
                                                           style="border-collapse:collapse;border-spacing:0px;">
                                                        <tbody>
                                                        <tr>
                                                            <td style="width:100px;">
                                                                <img height="auto"
                                                                     src="http://watt-lamp.nl/wp-content/uploads/2020/03/werkman-icoon.png"
                                                                     style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;"
                                                                     width="100"
                                                                />
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:18px;text-align:center;color:#555555;">
                                                        <h1>Montage door Watt-Lamp</h1></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           style="color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;table-layout:auto;width:100%;border:none;"
                                                           width="100%">
                                                        <tr>
                                                            <td style="text-align: center; padding: 5px;"> Watt-Lamp
                                                                beschikt over een eigen gespecialiseerd montageteam,
                                                              	daarnaast hebben wij ook hoogwerkers in eigen beheer.
                                                                Hierdoor kunnen wij uw verlichting voor de scherpste prijs
                                                                monteren en bent u verzekerd van een veilige en
                                                                goedwerkende installatie.<br/><br/> Maakt u nog geen
                                                                gebruik van deze service maar wilt u dat wel? Neem dan
                                                                contact met ons op.
                                                            </td>
                                                            <td>
                                                                <img src="http://watt-lamp.nl/wp-content/uploads/2020/03/Montage-foto.png"
                                                                     width="200"/>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--[if mso | IE]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                    </div>
                    <!--[if mso | IE]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--[if mso | IE]>
            </td>
        </tr>
    </table>

    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="background:#ffffff;background-color:#ffffff;width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:0;text-align:center;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="" style="vertical-align:top;width:600px;">
                    <![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix"
                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="vertical-align:top;" width="100%">
                            <tr>
                                <td align="left" style="font-size:0px;padding:0 0 0 40px;word-break:break-word;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                           style="border-collapse:collapse;border-spacing:0px;">
                                        <tbody>
                                        <tr>
                                            <td style="width:128px;">
                                                <img height="10"
                                                     src="http://watt-lamp.nl/wp-content/uploads/2020/03/Small-horizontal-divider.png"
                                                     style="border:0;display:block;outline:none;text-decoration:none;height:10px;width:100%;font-size:13px;"
                                                     width="128"
                                                />
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--[if mso | IE]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--[if mso | IE]>
            </td>
        </tr>
    </table>

    <table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
                <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="background:#ffffff;background-color:#ffffff;width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="" style="width:600px;">
                    <![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix"
                         style="font-size:0;line-height:0;text-align:left;display:inline-block;width:100%;direction:ltr;">
                        <!--[if mso | IE]>
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td style="vertical-align:top;width:48px;">
                        <![endif]-->
                         <div class="mj-column-per-8 mj-outlook-group-fix"
                             style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:8%;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                   style="vertical-align:top;" width="100%">
                                <tr>
                                    <td align="center" style="font-size:0px;padding:10px;word-break:break-word;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="border-collapse:collapse;border-spacing:0px;">
                                            <tbody>
                                            <tr>
                                                <td style="width:12px;">
                                                    <img height="600px"
                                                         src="http://watt-lamp.nl/wp-content/uploads/2020/03/Left-EIA.png"
                                                         style="border:0;display:block;outline:none;text-decoration:none;height:600px;width:100%;font-size:13px;"
                                                         width="12"
                                                    />
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--[if mso | IE]>
                                </td>
                                <td style="vertical-align:top;width:552px;">
                        <![endif]-->
                                <div class="mj-column-per-92 mj-outlook-group-fix"
                             style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:92%;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                <tbody>
                                <tr>
                                    <td style="vertical-align:top;padding:0 15px 0px 0px;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style=""
                                               width="100%">
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation"
                                                           style="border-collapse:collapse;border-spacing:0px;">
                                                        <tbody>
                                                        <tr>
                                                            <td style="width:100px;">
                                                                <img height="auto"
                                                                     src="http://watt-lamp.nl/wp-content/uploads/2020/03/Garantie-icoon.png"
                                                                     style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;"
                                                                     width="100"
                                                                />
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:18px;text-align:center;color:#555555;">
                                                        <h1>5 jaar servicegarantie</h1></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           style="color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;table-layout:auto;width:100%;border:none;"
                                                           width="100%">
                                                        <tr>
                                                            <td style="text-align: center; padding: 5px;"> Standaard
                                                                ontvangt u 3-5 jaar omruilgarantie op onze producten. Om
                                                                u nog meer te ontzorgen bieden wij ook de mogelijkheid
                                                                om de standaard garantie uit te breiden naar een all-in
                                                                servicegarantie van 5 jaar. Met deze service bent u
                                                                volledig ontzorgt, als er namelijk een lamp defect is
                                                                dan komen wij deze kosteloos vervangen. Hierbij brengen
                                                                wij geen hoogwerker-, voorrij- en arbeidkosten in
                                                                rekening. Deze servicegarantie is alleen mogelijk als u
                                                                de lampen door ons laat monteren.<br/><br/> Tijdens het
                                                                invullen van de Wattsimpel app niet gekozen voor deze
                                                                service? Geen probleem, neem contact met ons op voor een
                                                                aangepaste offerte.
                                                            </td>
                                                            <td>
                                                                <img src="http://watt-lamp.nl/wp-content/uploads/2020/03/Service-foto.png"
                                                                     width="200"/>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--[if mso | IE]>
                                </td>
                            </tr>
                        </table>
                        <![endif]-->
                    </div>
                    <!--[if mso | IE]>
                            </td>
                        </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>
</body>
</html>

<!--[if mso | IE]>
</td>
</tr>
</table>
<![endif]-->
';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: Watt Lamp<info@watt-lamp.nl>' . "\r\n";

    mail($_POST['email'], $subject, $message, $headers);

    exit(json_encode($response));
}

add_action('admin_menu', 'my_admin_menus');

function my_admin_menus()
{
    add_menu_page(
        'Emails',
        'Emails',
        'manage_options',
        'emails.php',
        'product_link_page',
        'dashicons-email-alt',
        7
    );
}

if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Custom_Table_Example_List_Table_Category extends WP_List_Table
{
    function __construct()
    {
        global $status, $page;

        parent::__construct(array(
            'singular' => 'Emails',
            'plural' => 'Emails'
        ));
    }

    function column_default($item, $column_message)
    {
        return $item[$column_message];
    }

    function column_id($item)
    {
        $actions = array(
            'delete' => sprintf(
                '<a href="?page=%s&action=delete&fid=%s");>%s</a>',
                $_REQUEST['page'],
                $item['id'],
                __('Delete', 'wpbc')
            )
        );
        return sprintf('%s %s', $item['id'], $this->row_actions($actions));
    }

    function get_columns()
    {
        $columns = array(
            'id' => __('ID', 'wpbc'),
            'email' => __('Email', 'wpbc'),
            'date' => __('Date', 'wpbc')
        );
        return $columns;
    }

    function get_sortable_columns()
    {
        $sortable_columns = array(
            'id' => array('id', true),
            'email' => array('email', true),
            'date' => array('date', true)
        );
        return $sortable_columns;
    }

    function get_bulk_actions()
    {
        $actions = array(
            'delete' => 'Delete'
        );
        return $actions;
    }

    function process_bulk_action()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'calculator_email';

        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['fid']) ? $_REQUEST['fid'] : array();
            if (is_array($ids)) {
                $ids = implode(',', $ids);
            }

            if (!empty($ids)) {
                $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
                echo '<script>  location.replace("' .
                    site_url() .
                    '/wp-admin/admin.php?page=product-link.php")  </script>';
            }
        }
    }

    function prepare_items()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'calculator_email';

        $per_page = 10;

        $search = '';
        //Retrieve $customvar for use in query to get items.
        $customvar = isset($_REQUEST['customvar'])
            ? $_REQUEST['customvar']
            : '';
        $paged = isset($_REQUEST['paged'])
            ? max(0, intval($_REQUEST['paged']) - 1)
            : 0;

        $orderby =
            isset($_REQUEST['orderby']) &&
            in_array(
                $_REQUEST['orderby'],
                array_keys($this->get_sortable_columns())
            )
                ? $_REQUEST['orderby']
                : 'id';
        $order =
            isset($_REQUEST['order']) &&
            in_array($_REQUEST['order'], array('asc', 'desc'))
                ? $_REQUEST['order']
                : 'desc';

        if ($customvar != '') {
            $search_custom_vars =
                "AND email LIKE '%" .
                esc_sql($wpdb->esc_like($customvar)) .
                "%'";
        } else {
            $search_custom_vars = '';
        }
        if (!empty($_REQUEST['s'])) {
            $search =
                "AND email LIKE '%" .
                esc_sql($wpdb->esc_like($_REQUEST['s'])) .
                "%'";
        }
        $items = $wpdb->get_results(
            "SELECT id,email,date FROM " .
                $table_name .
                " WHERE 1=1 {$search} {$search_custom_vars}" .
                $wpdb->prepare(
                    "ORDER BY $orderby $order LIMIT %d OFFSET %d;",
                    $per_page,
                    $paged
                ),
            ARRAY_A
        );

        $columns = $this->get_columns();

        $hidden = array();
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = array($columns, $hidden, $sortable);

        $this->process_bulk_action();

        $total_items = $wpdb->get_var(
            "SELECT COUNT(id) FROM " . $table_name . " WHERE 1 = 1 {$search};"
        );

        $this->items = $items;
        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page' => $per_page,
            'total_pages' => ceil($total_items / $per_page)
        ));
    }
}
function product_link_page()
{
    ?>
		<div class="wrap">
			<h2>Emails</h2>
			<br>
			
			<?php global $wpdb; ?>
			<div class="wrap">
				
				<div class="fileSection">
					
					<div class="wpb_row">
						
						<div class="half-col">
							<?php
       $tablename = $wpdb->prefix . 'calculator_email';
       $result = $wpdb->get_results("SELECT * FROM $tablename");
       ?>
							
							<style>
								.fixed .column-date{
									width: 26% !important;
								}
								.half-col {
									float: left;
									padding: 10px;
									margin-right: 15px;
									border: 1px solid #e0e0e0;
								}
								
								.wpb_row {
									width: 100%;
									clear: both;
									overflow: hidden;
								}
								
								.half-col-1 {
									
									float: left;
									padding: 10px;
									border: 1px solid #e0e0e0;
									
								}
								
								.form-control {
									width: 100%;
									
								}
								
								.form-field {
									padding: 5px 0;
								}
								
								
								table {
									width: 100%;
								}
								
								table,
								th,
								td {
									border: 1px solid #d2cece !important;
									border-collapse: collapse;
								}
								
								th,
								td {
									padding: 5px;
									text-align: left;
								}
								.alignleft.actions.bulkactions {
									display: none;
								}
							</style>
							<?php
       global $wpdb;

       $table = new Custom_Table_Example_List_Table_Category();
       $table->prepare_items();

       $message = '';
       if ('delete' === $table->current_action()) {
           $message =
               '<div class="updated below-h2" id="message"><p>' .
               sprintf(
                   __('lINK deleted: %d', 'wpbc'),
                   count($_REQUEST['fid'])
               ) .
               '</p></div>';
       }
       ?>
							<div class="wrap">
								<?php
        echo $message;
        echo '<form method="post">';
        echo ' <input type="hidden" name="page" value="pmc_fs_search">';
        $table->search_box('search', 'search_id');
        $table->display();
        echo '</form>';?>
							</div>
						</div>
					
					</div>
				</div>
			</div>
		</div>
		<?php
}
?>
