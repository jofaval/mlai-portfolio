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
        "src"   => '',
        "sizes" => '',
        "type"  => '',
    ];

    // Get all the image info
    [ $width, $height ] = getimagesize($icon_path);
    $icon = [
        "src"   => get_public_url($icon_path),
        "sizes" => "{$width}x{$height}",
        "type"  => mime_content_type($icon_path),
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

    $icons = [];
    
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
        "lang"                 => 'es',
        "scope"                => "/",
        "theme_color"          => "#3367D6",
        "background_color"     => "#3367D6",
        "start_url"            => get_public_url(),
        "display"              => "standalone",
        "icons"                => get_icons(),
        "related_applications" => [
            [ "platform" => "web" ],
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

    // TODO: implement favicon constant
    // TODO: implement icon generation

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