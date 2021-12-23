<?php

/**
 * Generate the robots.txt content
 * 
 * @return bool
 */
function generate_robots(): bool
{
    $success = true;

    // Populate the robots content
    $content = [];
    
    // Generate the configuration
    foreach (ROBOTS_CONFIGURATION as $agent => $orders) {
        // The User Agent
        $content[] = "User-agent: $agent";

        // The Allow order, it has access
        if (isset($orders['Allow'])) $content []= "Allow: {$orders['Allow']}";
        // The Disallow order, it won't have access
        if (isset($orders['Disallow'])) $content []= "Disallow: {$orders['Disallow']}";

        // Jumpline
        $content[] = "";
    }
    
    // Generate the sitemap_url
    $sitemap_url = get_public_url(SITEMAP_FILE);
    $content[] = "Sitemap: $sitemap_url";

    // Parse the content and write it
    $content = join(PHP_EOL, $content);
    $success = write(ROBOTS_FILE, $content);

    return $success;
}