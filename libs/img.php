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
    switch ($type) {
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
    if (in_array($type, ["gif", "png"])) {
        imagecolortransparent($destination, imagecolorallocatealpha($destination, 0, 0, 0, 127));
        imagealphablending($destination, false);
        imagesavealpha($destination, true);
    }

    // Actually resizes the image
    $success = imagecopyresampled($destination, $origin, 0, 0, 0, 0, $width, $height, $og_width, $og_height);

    // Save the image in the correct MIME type
    switch ($type) {
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

/**
 * Creates a splash screen
 * 
 * @param string $target The target image path
 * @param int $width The width of the final image
 * @param int $height The height of the final image
 * @param array<string,mixed> $details The details of the img generation
 * 
 * @return bool
 */
function create_splash_screen(string $target, int $width, int $height, array $details = []): bool
{
    $success = true;

    // Set the default values
    $details = array_merge(
        [
            'type' => 'jpg',
            'primary-color' => PWA_BACKGROUND_COLOR,
            'secondary-color' => '#e1ff4a',
        ],
        $details
    );

    // The gradient colors
    $gradient = [
        $details['primary-color'], // top-left
        $details['primary-color'], // top-right
        $details['secondary-color'], // bottom-left
        $details['secondary-color'], // bottom-right
    ];

    // Generate the gradient
    $image = gradient($width, $height, $gradient, true);

    // Save the image in the correct MIME type
    switch ($details['type']) {
        case 'bmp':
            $success = imagewbmp($image, $target);
            break;
        case 'gif':
            $success = imagegif($image, $target);
            break;
        case 'jpg':
            $success = imagejpeg($image, $target);
            break;
        case 'png':
            $success = imagepng($image, $target);
            break;
    }

    return $success;
}

/**
 * Generates a gradient image
 * 
 * @source https://www.php.net/manual/es/function.imagefill.php
 * @author Christopher Kramer
 * 
 * @param int $w: width in px
 * @param int $h: height in px
 * @param string[] $c: color-array with 4 elements:
 *     $c[0]:   top left color
 *     $c[1]:   top right color
 *     $c[2]:   bottom left color
 *     $c[3]:   bottom right color
 * @param bool $hex if is true (default), colors are hex-strings like '#FFFFFF' (NOT '#FFF')
 * 
 * if is false, a color is an array of 3 elements which are the rgb-values, e.g.: $c[0]=array(0,255,255);
 * 
 * @return resource|GdImage|false
 */
function gradient($w = 100, $h = 100, $c = [ '#FFFFFF', '#FF0000', '#00FF00', '#0000FF' ], $hex = true)
{
    $im = imagecreatetruecolor($w, $h);

    if ($hex) {  // convert hex-values to rgb
        for ($i = 0; $i <= 3; $i++) {
            $c[$i] = hex2rgb($c[$i]);
        }
    }

    $rgb = $c[0]; // start with top left color
    for ($x = 0; $x <= $w; $x++) { // loop columns
        for ($y = 0; $y <= $h; $y++) { // loop rows
            // set pixel color
            $col = imagecolorallocate($im, $rgb[0], $rgb[1], $rgb[2]);
            imagesetpixel($im, $x - 1, $y - 1, $col);
            // calculate new color 
            for ($i = 0; $i <= 2; $i++) {
                $rgb[$i] =
                    $c[0][$i] * (($w - $x) * ($h - $y) / ($w * $h)) +
                    $c[1][$i] * ($x     * ($h - $y) / ($w * $h)) +
                    $c[2][$i] * (($w - $x) * $y     / ($w * $h)) +
                    $c[3][$i] * ($x     * $y     / ($w * $h));
            }
        }
    }

    return $im;
}

/**
 * Converts hexadecimal to RGB
 * 
 * @param string $hex The hexadecimal string
 * 
 * @return int[]
 */
function hex2rgb($hex): array
{
    $rgb[0] = hexdec(substr($hex, 1, 2));
    $rgb[1] = hexdec(substr($hex, 3, 2));
    $rgb[2] = hexdec(substr($hex, 5, 2));

    return ($rgb);
}

/**
 * Creates a screenshot of a given resource
 * 
 * @param string $url The resource from which to take a screenshot
 * @param string $target The target screenshot path
 * @param string $device The strategy device, MOBILE by default
 * 
 * @return bool
 */
function screenshot(string $url, string $target, string $device = 'mobile'): bool
{
    $success = true;

    // All the HTTP params
    $params = http_build_query([
        "url"      => $url,
        "category" => 'CATEGORY_UNSPECIFIED',
        "strategy" => $device,
        // "api" => 'YOUR_API',
    ]);

    // The final url
    $url = "https://pagespeedonline.googleapis.com/pagespeedonline/v5/runPagespeed?$params";
    // TODO: implement

    // Prepare the request
    $curl_init = curl_init($url);
    curl_setopt($curl_init,CURLOPT_RETURNTRANSFER,true);

    // Get the response
    $response = curl_exec($curl_init);
    curl_close($curl_init);

    // dd('response', $response);
    // The request failed, don't continue
    if ($response === false) return false;

    // Get the data
    $googledata = json_decode($response,true);

    // Parse it
    $snapdata = $googledata["lighthouseResult"]["audits"]["full-page-screenshot"]["details"];
    $snap = $snapdata["screenshot"];

    // dd('test', $googledata);
    $final_target_path = replace_extension($target, '');
    // imagepng($img, $final_target_path . "png");

    // dd('finished');

    return $success;
}