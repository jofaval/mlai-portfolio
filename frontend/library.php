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
function c(string $component_name, array $props = null, string $root = COMPONENTS_DIR)
{
    // The file that call the component
    $parent_call = debug_backtrace()[0]['file'];
    $parent_call = basename($parent_call, '.php');

    // Add .php extension
    $component_name .= '.php';

    // Generate the component path
    $full_path = path_join($root, $component_name);

    // If the component doesn't exist, don't try to create it
    if (!file_exists($full_path)) return 'TODO: to implement';

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