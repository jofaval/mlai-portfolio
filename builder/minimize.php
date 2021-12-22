<?php

/**
 * Preprocesses the text before actually minifying it
 * 
 * @param string $content The content to preprocess
 * 
 * @return string
 */
function minify_pre(string $content)
{
    $content = preg_replace('/\/\*.+\*\//', ' ', $content);
    $content = preg_replace('/\s+/', ' ', $content);

    return $content;
}

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
    $minified = minify_pre( read($file) );

    return $minified;
}

/**
 * Minify HTML content
 * 
 * @param string $content The HTML content to minify
 * 
 * @return string
 */
function minify_html(string $content)
{
    $content = minify_pre($content);

    return $content;
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
    $minified = minify_pre( read($file) );

    return $minified;
}

/**
 * Minifies an image
 * 
 * @param string $file The file to minify
 * 
 * @return string
 */
function minify_img(string $file)
{
    // magick convert -strip -interlace Plane -gaussian-blur 0.05 -quality 60% "$file" "$file"
    $file = compress_to_webp($file);

    return $file;
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