<?php

/**
 * Loads a component with the given props
 * 
 * @param string $component_name The component path
 * @param array<string,mixed> $props The component properties, none by default
 * @param string $root The root folder that holds the component to load, COMPONENTS_DIR by default
 * 
 * @return string
 */
function c(string $component_name, array $props = null, string $root = COMPONENTS_DIR): string
{
    // The file that call the component
    $parent_call = debug_backtrace()[0]['file'];
    $parent_call = basename($parent_call, '.php');

    // Add .php extension
    $component_name .= '.php';

    // Generate the component path
    $full_path = path_join($root, $component_name);

    // If the component doesn't exist, don't try to create it
    if (!file_exists($full_path)) return 'TODO: to implement: ' . $component_name;

    // Assign the props to values
    if (!is_null($props)) foreach ($props as $key => $value) $$key = $value;

    // Load and process the component content
    ob_start();
    require $full_path;
    $content = ob_get_clean();

    $content = trim($content);

    // Return it
    return $content;
}

/**
 * Gets the public url from a public resource for external access
 * 
 * @param string $path The asset path to process, the root by default
 * 
 * @return string
 */
function get_public_url(string $path = '', bool $add_domain = true): string
{
    $root = $add_domain ? APP_URL : '';

    // Replace path with the public domain
    if (str_starts_with($path, PUBLIC_DIR)) $path = str_replace(PUBLIC_DIR, $root, $path);
    else if (str_starts_with($path, BUILD_DIR)) $path = str_replace(BUILD_DIR, $root, $path);
    else if (str_starts_with($path, IMG_DIR)) $path = str_replace(IMG_DIR, $root, $path);
    else $path = path_join($root, $path);
    // Replace the path separator
    $path = str_replace(DIRECTORY_SEPARATOR, '/', $path);

    return $path;
}

/**
 * Get all the sidebar links from the content
 * 
 * @param string $content The content to parse
 * 
 * @return array<string,string[]>
 */
function get_sidebar_links(string $content): array
{
    $sidebar_links = [];

    return $sidebar_links;
}

/**
 * Gets the page title
 * 
 * @param string $title The given title, by default the app title
 * 
 * @return string
 */
function get_page_title(string $title = null): string
{
    // By default the app title
    if (is_null($title)) $title = APP_TITLE;

    return $title;
}