<?php

/**
 * Gets all the information from an icon in web manifest format
 * 
 * @param string $icon_path The path to the icon
 * 
 * @return array<string,string>
 */
function get_icon(string $icon_path): array
{
    // If the file doesn't exist, return an empty array
    if (!file_exists($icon_path)) return [
        "src"     => '',
        "sizes"   => '',
        "type"    => '',
        "purpose" => 'any maskable',
    ];

    // Get all the image info
    [ $width, $height ] = getimagesize($icon_path);
    $icon = [
        "src"     => get_public_url($icon_path),
        "sizes"   => "{$width}x{$height}",
        "type"    => mime_content_type($icon_path),
        "purpose" => 'maskable',
    ];

    return $icon;
}

/**
 * Returns the app icons
 * 
 * @return array<string,array<string,string>>
 */
function get_icons(): array
{
    // https://developer.mozilla.org/es/docs/Web/Manifest

    // Get all images from the PWA_ICONS_DIR and PWA_SPLASHSCREEN_DIR
    $icons = array_merge(
        get_all_files(get_build_path(PWA_ICONS_DIR)),
        get_all_files(get_build_path(PWA_SPLASHSCREEN_DIR)),
    );
    // And map them to get the content
    $icons = array_map('get_icon', $icons);

    return $icons;
}

/**
 * Get all the information of a screenshot
 * 
 * @param string $file The absolute path to the file
 * 
 * @return array<string,string>
 */
function get_screenshot(string $file): array
{
    // Get the label of the screenshot
    $label = ucfirst(pathinfo($file, PATHINFO_FILENAME));
    $label = "Screenshot of $label";

    // Get all the information as if it was an icon
    $screenshot = get_icon($file);
    // Remove previous details
    unset($screenshot['purpose']);

    // Add new details
    $screenshot['label'] = $label;
    $screenshot['platform'] = 'wide';

    return $screenshot;
}

/**
 * Get all the screenshots
 * 
 * @return array<string,array<string,string>>
 */
function get_screenshots(): array
{
    // Get all screenshots from the PWA_SCREENSHOTS_DIR
    $screenshots = array_merge(
        get_all_files(get_build_path(PWA_SCREENSHOTS_DIR)),
    );
    // And map them to get the content
    $screenshots = array_map('get_screenshot', $screenshots);

    return $screenshots;
}

/**
 * Create the PWA manifest
 * 
 * @return bool
 */
function create_manifest(): bool
{
    $success = true;

    // Generate the manifest JSON
    $manifest = [
        "name"                 => APP_NAME,
        "short_name"           => APP_SHORTNAME,
        "description"          => APP_DESC,
        "lang"                 => APP_LANG,
        "theme_color"          => PWA_THEME_COLOR,
        "background_color"     => PWA_BACKGROUND_COLOR,
        "start_url"            => get_public_url(),
        "scope"                => get_public_url(),
        "display"              => "standalone",
        "orientation"          => "portrait-primary",
        "categories"           => [
            "education",
            "business",
        ],
        // Requested at: https://www.globalratings.com/contact-us.aspx
        // Using the sample one from: https://developer.mozilla.org/en-US/docs/Web/Manifest/iarc_rating_id
        "iarc_rating_id"       => "e84b072d-71b3-4d3e-86ae-31a8ce4e53b7",
        "shortcuts" => [
            [
                "name"        => "Home",
                "url"         => get_public_url('', false),
                "description" => "Main home of the portfolio"
            ],
            [
                "name"        => "Contact",
                "url"         => get_public_url('contact.html', false),
                "description" => "The way to reach me about any inquire",
            ],
            [
                "name"        => "Projects",
                "url"         => get_public_url('projects.html', false),
                "description" => "All my projects",
            ],
        ],
        "screenshots"          => array_values( get_screenshots() ),
        "icons"                => array_values( get_icons() ),
        "related_applications" => [
            [
                "platform" => "webapp",
                "url"      => get_public_url(),
            ],
        ],
    ];

    // Save the content
    write(get_build_path(MANIFEST_FILE), json_encode($manifest));

    return $success;
}

/**
 * Create all the icons the PWA needs
 * 
 * @return bool
 */
function create_icons(): bool
{
    $success = true;

    $target_dir = get_build_path(PWA_ICONS_DIR);

    // Create the icon path if doesn't already exist
    create_dir($target_dir);

    // The base image from which to create the icons
    $main_icon = PWA_ICON;

    // All the different sizes of the icon
    $sizes = [ 48, 72, 96, 144, 152, 192, 384, 512 ];

    // Resize the images
    foreach ($sizes as $size) {
        // Generate the target path for the icon
        $target = path_join($target_dir, "icon-{$size}x{$size}.png");

        // Resize the image
        img_resize($main_icon, $size, $size, $target);
    }

    return $success;
}

/**
 * Create the splash screens for the app
 * 
 * @param bool $stop_at_fail Will it stop if an img can't be generated? It won't by default
 * 
 * @return bool
 */
function create_splash_screens(bool $stop_at_fail = false): bool
{
    $success = true;

    // All the dimensions to be used
    $dimensions = [
        [ 640 , 1136 ],
        [ 750 , 1334 ],
        [ 1242, 2208 ],
        [ 1125, 2436 ],
        [ 1536, 2048 ],
        [ 1668, 2224 ],
        [ 2048, 2732 ],
    ];

    // The real splash path
    $target_dir = get_build_path(PWA_SPLASHSCREEN_DIR);

    // Create the splash path if doesn't already exist
    create_dir($target_dir);

    // The details general to all the splash screens
    $details = [];

    // Create all the splashes for each dimension given
    foreach ($dimensions as $dimen) {
        // Extract the width and height
        [ $width, $height ] = $dimen;
        $filename = "splash-{$width}x{$height}.jpg";
        // Generate the splash path
        $target_path = path_join($target_dir, $filename);

        // Actually creates the splash
        $success &= create_splash_screen($target_path, $width, $height, $details);

        // If at any given moment, a splash fails generating, stop the process
        if ($stop_at_fail && !$success) return false;

        echo "\"$filename\" was generated successfully.\n";
    }

    // TODO: should I add the logo/favicon image in the center? icons already do that

    return $success;
}

/**
 * Creates screenshots of the PWA
 * 
 * @return bool
 */
function create_screenshots(): bool
{
    $success = true;

    // The target dir of the screenshots
    $target_dir = get_build_path(PWA_SCREENSHOTS_DIR);

    // Create the dir if doesn't already exist
    create_dir($target_dir);

    // All the pages from which to take a screenshot
    $pages = [
        'index.html',
        'projects.html',
        'contact.html',
    ];

    // Take screenshots of all the pages
    foreach ($pages as $page) {
        // Convert to public url
        $url = get_public_url($page);

        // Take a screenshot
        $success &= screenshot($url, $page);
    }

    $success = true;

    return $success;
}

/**
 * Make the app a Progressive Web-App
 * 
 * @return bool
 */
function make_pwa(): bool
{
    $success = true;

    // All the steps for making the app a Progressive Web-App
    $steps = [
        'create_icons',
        'create_splash_screens',
        'create_screenshots',
        'create_manifest',
    ];

    // Execute all the steps
    foreach ($steps as $step) {
        if (!function_exists($step)) continue;

        // Execute step
        $success &= $step();

        // If any step fails, stop the steps and return false
        if (!$success) return false;
    }

    // If all the steps were successful return true
    return true;
}