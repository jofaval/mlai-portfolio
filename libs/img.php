<?php

/**
 * Compress an image to webp (faster img format)
 * 
 * @param string $file The image to compress
 * 
 * @return string|false
 */
function compress_to_webp(string $file): string
{
    // Fallback for whenever Imagick may not be installed previously
    if (!extension_loaded('imagick')) return $file;

    // If it's already compressed, don't process it
    if (pathinfo($file)['extension'] == 'webp') return $file;

    // Generate the webp file path
    $target_file = replace_extension($file, 'webp');

    // Get the image
    $img = new \Imagick();
    $img->pingImage($file);
    $img->readImage($file);

    // Prepare the options
    $img->setImageFormat('webp');
    $img->setImageCompressionQuality(50);
    $img->setOption('webp:lossless', 'true');

    // Actually save the image
    $usccess = $img->writeImage($target_file); 
    // If it couldn't save it, notify it
    if (!$usccess) return false;

    // TODO: implement on rebuild for images and to use everytime
    return $target_file;
}