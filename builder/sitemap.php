<?php

/**
 * The sitemap file path
 * 
 * @var string
 */
define('SITEMAP_FILE', path_join(BUILD_DIR, 'sitemap.xml'));

/**
 * Generate a url sitemap associative array containg all the details
 * 
 * @param string $file The file to work with
 * 
 * @return array<string,string>
 */
function generate_url_sitemap(string $file): array
{
    $details = [];

    $temp_file = str_replace(BUILD_DIR, '', $file);
    $temp_file = ltrim($temp_file, $temp_file[0]);
    $loc = get_public_url($temp_file);
    $lastmod = date('Y-m-d', filemtime($file));
    $changefreq = 'monthly';
    $priority = '0.8';

    $details = [ 'loc' => $loc, 'lastmod' => $lastmod, 'changefreq' => $changefreq, 'priority' => $priority, ];

    return $details;
}

/**
 * Generates the website sitemap
 * 
 * @return bool
 */
function generate_sitemap(): bool
{
    $success = true;

    $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?> <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"/>');
    
    $files = get_all_files(null, BUILD_DIR);
    foreach ($files as $file_index => &$file) {
        // Only process files that are either html or php
        if (
            is_dir($file)
            || !in_array(get_file_extension($file), [ 'html', 'php' ])
        ) {
            unset($files[$file_index]);

            continue;
        }

        // Generate the <url> data
        $file = generate_url_sitemap($file);

        // Create the <url> node with the data
        $url_node = $sitemap->addChild('url');
        foreach ($file as $name => $value) {
            $node = $url_node->addChild($name);

            $node[0] = $value;
        }
    }

    // Write the XML content
    $content = $sitemap->asXML();
    $success = write(SITEMAP_FILE, $content);

    return $success;
}