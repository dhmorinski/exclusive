<?php
/**
 * Custom template tags for this theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

/**
 * Logo & Description
 */
/**
 * Displays the site logo, either text or image.
 *
 * @param array $args Arguments for displaying the site logo either as an image or text.
 * @param boolean $echo Echo or return the HTML.
 *
 * @return string $html Compiled HTML based on our arguments.
 */
function exclusive_site_logo($args = array(), $echo = true)
{
    $logo = get_custom_logo();
    $site_title = get_bloginfo('name');
    $contents = '';
    $classname = '';

    $defaults = array(
        'logo' => '%1$s<span class="screen-reader-text">%2$s</span>',
        'logo_class' => 'site-logo',
        'title' => '<a href="%1$s">%2$s</a>',
        'title_class' => 'site-title',
        'home_wrap' => '<h1 class="%1$s">%2$s</h1>',
        'single_wrap' => '<div class="%1$s faux-heading">%2$s</div>',
        'condition' => (is_front_page() || is_home()) && !is_page(),
    );

    $args = wp_parse_args($args, $defaults);

    /**
     * Filters the arguments for `exclusive_site_logo()`.
     *
     * @param array $args Parsed arguments.
     * @param array $defaults Function's default arguments.
     */
    $args = apply_filters('exclusive_site_logo_args', $args, $defaults);

    if (has_custom_logo()) {
        $contents = sprintf($args['logo'], $logo, null);
        $classname = $args['logo_class'];
    } else {
        $contents = sprintf($args['title'], esc_url(get_home_url(null, '/')), null);
        $classname = $args['title_class'];
    }

    $wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';

    $html = sprintf($args[$wrap], $classname, $contents);

    /**
     * Filters the arguments for `exclusive_site_logo()`.
     *
     * @param string $html Compiled html based on our arguments.
     * @param array $args Parsed arguments.
     * @param string $classname Class name based on current view, home or single.
     * @param string $contents HTML for site title or logo.
     */
    $html = apply_filters('exclusive_site_logo', $html, $args, $classname, $contents);

    if (!$echo) {
        return $html;
    }

    echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Displays the site description.
 *
 * @param boolean $echo Echo or return the html.
 *
 * @return string $html The HTML to display.
 */
function exclusive_site_description($echo = true)
{
    $description = get_bloginfo('description');

    if (!$description) {
        return;
    }

    $wrapper = '<div class="site-description">%s</div><!-- .site-description -->';

    $html = sprintf($wrapper, esc_html($description));

    /**
     * Filters the html for the site description.
     *
     * @param string $html The HTML to display.
     * @param string $description Site description via `bloginfo()`.
     * @param string $wrapper The format used in case you want to reuse it in a `sprintf()`.
     * @since 1.0.0
     *
     */
    $html = apply_filters('exclusive_site_description', $html, $description, $wrapper);

    if (!$echo) {
        return $html;
    }

    echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Displays the navigation links.
 *
 * @param $navigation_name
 * @param null $classes - CSS classes for <a> tag
 * @param bool $show_labels
 * @param bool $show_icons
 * @param string $linkTarget
 */
function exclusive_the_nav_links($navigation_name, $classes = null, $show_labels = true, $show_icons = false, $linkTarget = '_blank')
{
// Check if menu exists
    if ($menu_items = wp_get_nav_menu_items($navigation_name)) {
        // Loop over menu items
        foreach ($menu_items as $menu_item) {
            // Print menu item
            $html = '<a href="' . $menu_item->url . '" 
                     target="' . $linkTarget . '"
                     title="' . get_bloginfo() . ' - ' . $menu_item->title . '" 
                     class="' . $classes . '">';

            if ($show_icons) {
                $html .= '<i class="' . implode(' ', $menu_item->classes) . '"></i> ';
            }

            if ($show_labels) {
                $html .= $menu_item->title;
            }

            $html .= '</a>';;

            echo $html;
        }
    }
}

/**
 * Displays main navigation links with active state.
 *
 * @param $classes - CSS classes for <a> tag
 */
function exclusive_the_main_nav_links($classes)
{
    // Check if menu exists
    if ($menu_items = wp_get_nav_menu_items('mainNavLocation')) {
        // Loop over menu items
        foreach ($menu_items as $menu_item) {

            // Compare menu item url with server request uri path
            $url = $_SERVER['REQUEST_URI'];
            $urlSegments = explode('/', $url);

            $menuItemUrl = parse_url($menu_item->url)['path'];
            $menuItemUrlSegments = explode('/', $menuItemUrl);

            $current = $urlSegments[1] === $menuItemUrlSegments[1] ? 'active' : '';

            // Print menu item
            echo '<a href="' . $menu_item->url . '" title="' . get_bloginfo() . ' - ' . $menu_item->title . '"
                   class="' . $classes . ' ' . $current . '">' . $menu_item->title . '</a>';
        }
    }
}

/**
 * @param String $page_title Current page title
 * @param array $breadcrumb_links Label - Link pairs. Set correct order without current page.
 */
function exclusive_the_page_header($page_title, array $breadcrumb_links)
{
    $html = '<section class="page-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <ul class="breadcrumb">';

    foreach ($breadcrumb_links as $label => $link) {
        $html .= '<li><a href="' . $link . '">' . $label . '</a> / </li>';
    }

    $html .= '              <li class="active">' . $page_title . '</li >            
                        </ul >
                        <h1 > ' . $page_title . '</h1 >
                    </div >
                </div >
            </div >
        </section >
        <img class="page-header-shadow" src = "' . get_theme_file_uri('/assets/images/shadow-bottom.png') . '"
             alt = "Shadow" > ';
    echo $html;
}