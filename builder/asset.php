<?php

/**
 * Returns the path of the build for the given path
 * 
 * @param string $path The path to evaluate
 * 
 * @return string
 */
function get_build_path(string $path): string
{
    $path = str_replace(PUBLIC_DIR, BUILD_DIR, $path);

    return $path;
}

/**
 * Gets all the content from a style file
 * 
 * @param string $style The name of the style
 * 
 * @return string
 */
function get_style_content(string $style): string
{
    $full_path = path_join(PUBLIC_DIR, 'styles', "$style.css");

    // TODO: detect if it has an http for a request

    $content = '';
    if (file_exists($full_path)) $content = file_get_contents($full_path);

    return $content;
}

/**
 * Builds all the styles into one file
 * 
 * @param array $styles All the styles to compile
 * @param string $target The target file to create
 * 
 * @return bool
 */
function build_styles(string $target, array $styles = []): bool
{
    $content = '';
    foreach ($styles as $style) $content .= get_style_content($style);

    // Get the real build path
    // $target = get_build_path($target);
    $target = path_join(BUILD_DIR, 'styles', "$target.css");

    // Add the content
    $success = write($target, $content);

    // Minify the content
    $minified = minify($target);
    $success &= write($target, $minified);

    return $success;
}