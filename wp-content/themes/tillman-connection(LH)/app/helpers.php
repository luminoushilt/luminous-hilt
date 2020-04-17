<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

/**
 * Custom Post Type Builder
 */
 function add_custom_post_type($singular_name, $plural_name, $lower_case, $admin_icon, $archive, $slug_name)
 {
    // Register Custom Post Type
    $args = array(
        'labels' => array(
            'name' => __($singular_name),
            'singular_name' => __($singular_name),
            'menu_name' => __($singular_name),
            'name_admin_bar' => $plural_name,
            'add_new' => 'Add New ' . $singular_name ,
            'add_new_item' => 'Add New ' .$singular_name,
            'new_item' => 'New ' . $singular_name,
            'edit_item' => 'Edit ' . $singular_name,
            'view_item' => 'View ' . $singular_name,
            'all_items' => 'All ' . $plural_name,
            'search_items' => 'Search ' . $plural_name,
            'parent_item_colon' => 'Parent ' . $plural_name . ':',
            'not_found' => 'No ' . $lower_case . ' found.',
            'not_found_in_trash' => 'No ' . $lower_case . ' found in Trash.'
        ),
        'public' => true,
        'menu_icon' => $admin_icon,
        'rewrite' => array('slug' => $slug_name),
        'capability_type' => 'post',
        'has_archive' => $archive,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions'
        )
    );
    return register_post_type($slug_name, $args);
}

// List of Instances of registering custom post types

add_custom_post_type('Committee Members', 'Committee Members', 'committee members', 'dashicons-groups', false, 'committee-members');
add_custom_post_type('Project', 'Projects', 'projects', 'dashicons-portfolio', false, 'projects');
add_custom_post_type('Fundraiser', 'Fundraisers', 'fundraisers', 'dashicons-chart-line', true, 'fund');
add_custom_post_type('Newsletter', 'Newsletters', 'newsletters', 'dashicons-id', true, 'newsletter');
