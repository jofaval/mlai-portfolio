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
    $success = $img->writeImage($target_file); 
    // If it couldn't save it, notify it
    if (!$success) return false;

    // TODO: implement on rebuild for images and to use everytime
    return $target_file;
}

/**
 * Resizes and image to a location
 * 
 * @param string $img The image to resize
 * @param int $width The target width
 * @param int $height The target height
 * @param string $target The target path
 * 
 * @return bool
 */
function img_resize(string $img, int $width, int $height, string $target): bool
{
    // If the image doesn't exist, don't process it
    if (!file_exists($img)) return false;

    // Get the current dimensions, if it fails, it's unsupported
    if (([ $og_width, $og_height ] = getimagesize($img)) === false) return false;
    
    $type = strtolower( substr(strrchr($img, "."), 1) );
    if ($type == 'jpeg') $type = 'jpg';
    
    // Get the image object in the correct MIME type
    switch($type) {
        case 'bmp':
            $origin = imagecreatefromwbmp($img);
            break;
        case 'gif':
            $origin = imagecreatefromgif($img);
            break;
        case 'jpg':
            $origin = imagecreatefromjpeg($img);
            break;
        case 'png':
            $origin = imagecreatefrompng($img);
            break;

        default:
            return false;
    }

    // TODO: implement percentual resizing? It'd have to be in a different file

    // Create the img objects
    $destination = imagecreatetruecolor($width, $height);

    // preserve transparency
    if (in_array($type, [ "gif", "png" ])) {
        imagecolortransparent($destination, imagecolorallocatealpha($destination, 0, 0, 0, 127));
        imagealphablending($destination, false);
        imagesavealpha($destination, true);
    }

    // Actually resizes the image
    $success = imagecopyresampled($destination, $origin, 0, 0, 0, 0, $width, $height, $og_width, $og_height);

    // Save the image in the correct MIME type
    switch($type) {
        case 'bmp':
            $success = imagewbmp($destination, $target);
            break;
        case 'gif':
            $success = imagegif($destination, $target);
            break;
        case 'jpg':
            $success = imagejpeg($destination, $target);
            break;
        case 'png':
            $success = imagepng($destination, $target);
            break;
    }

    return $success;
}