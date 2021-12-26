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
        "purpose" => 'maskable',
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

    // Get all images from the PWA_ICONS_PATH
    $icons = get_all_files(get_build_path(PWA_ICONS_DIR));
    // And map them to get the content
    $icons = array_map('get_icon', $icons);

    return $icons;
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
        "icons"                => array_values( get_icons() ),
        /* "related_applications" => [
            [ "platform" => "web" ],
        ], */
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
    if (!file_exists($target_dir)) mkdir($target_dir, PERMISSIONS, true);

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