<?php

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
    $changefreq = 'weekly';
    $priority = '0.8';

    $details = [ 'loc' => $loc, 'lastmod' => $lastmod, 'changefreq' => $changefreq, 'priority' => $priority, ];

    return $details;
}

/**
 * Let Google know the sitemap has been updated
 * 
 * @return bool
 */
function ping_google_sitemap(): bool
{
    $sitemap_url = get_public_url(SITEMAP_FILE);
    $google_sitemap_url = "http://www.google.com/ping?sitemap=$sitemap_url";

    $success = ping($google_sitemap_url);

    return $success;
}

/**
 * Generates a sitemap <url> node
 * 
 * @param \SimpleXMLElement &$parent The parent node to which data will be appended
 * @param string $file The file name to add, also the url resource 
 * 
 * @return void
 */
function generate_sitemap_url_node(\SimpleXMLElement &$parent, string $file): void
{
    // Generate the <url> data
    $file = generate_url_sitemap($file);

    // Create the <url> node with the data
    $url_node = $parent->addChild('url');
    foreach ($file as $name => $value) {
        $node = $url_node->addChild($name);

        $node[0] = $value;
    }
}

/**
 * Generates the website sitemap
 * 
 * @param bool $ping_site Should notify google of the change? It will by defauñt
 * 
 * @return bool
 */
function generate_sitemap(bool $ping_site = true): bool
{
    $success = true;

    $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?> <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"/>');
    
    $files = get_all_files(null, BUILD_DIR);

    // root page
    generate_sitemap_url_node($sitemap, '/');

    foreach ($files as $file_index => &$file) {
        // Only process files that are either html or php
        if (
            is_dir($file)
            || !in_array(get_file_extension($file), [ 'html', 'php' ])
        ) {
            unset($files[$file_index]);

            continue;
        }

        generate_sitemap_url_node($sitemap, $file);
    }

    // Write the XML content
    $content = $sitemap->asXML();
    $success = write(SITEMAP_FILE, $content);

    ping_google_sitemap();

    return $success;
}