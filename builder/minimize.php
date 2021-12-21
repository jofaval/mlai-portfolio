<?php

/**
 * Minifies a CSS file
 * 
 * @param string $file The file to minify
 * 
 * @return string
 */
function minify_css(string $file)
{
    $minified = $file;

    // Retrieve the content of the file
    $minified = read($file);

    return $minified;
}

/**
 * Minifies a JS file
 * 
 * @param string $file The file to minify
 * 
 * @return string
 */
function minify_js(string $file)
{
    $minified = $file;

    // Retrieve the content of the file
    $minified = read($file);

    return $minified;
}

/**
 * Minifies a file
 * 
 * @param string $file The file to minify
 * 
 * @return string
 */
function minify(string $file)
{
    // By default it will be the path
    $minified = $file;

    if (str_ends_with($file, '.css')) $minified = minify_css($file);
    else if (str_ends_with($file, '.js')) $minified = minify_js($file);
    // Using the path, it gets the content, and just that
    else $minified = read($file);

    return $minified;
}