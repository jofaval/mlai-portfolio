<?php

/**
 * Joins dirs by the DIRECTORY_SEPARATOR
 * 
 * @return string
 */
function path_join(): string
{
    $dirs = func_get_args();

    return join(DIRECTORY_SEPARATOR, $dirs);
}

/**
 * Determins if a $needle is at the start of the $haystack
 * 
 * @param string $haystack The string
 * @param string $needle The substring to find at the start
 * 
 * @return bool
 */
function str_starts_with(string $haystack, string $needle): bool
{
    return strpos($haystack, $needle) === 0;
}

/**
 * Determins if a $needle is at the end of the $haystack
 * 
 * @param string $haystack The string
 * @param string $needle The substring to find at the end
 * 
 * @return bool
 */
function str_ends_with(string $haystack, string $needle): bool
{
    $length = strlen($needle);
    if(!$length) return true;

    return substr($haystack, -$length) === $needle;
}

/**
 * Determins if a $needle is in the $haystack
 * 
 * @param string $haystack The string
 * @param string $needle The substring to find
 * 
 * @return bool
 */
function str_contains(string $haystack, string $needle): bool
{
    return strpos($haystack, $needle) !== false;
}

/**
 * Pings a given URL
 * 
 * @param string $url The URL to ping, by default, it will attempt to ping google.com
 * 
 * @return bool
 * 
 * @author Tyler Carter (https://stackoverflow.com/users/58088/tyler-carter)
 * @source https://stackoverflow.com/questions/1239068/ping-site-and-return-result-in-php#answer-1239090
 */
function ping(string $url = 'https://google.com'): bool
{
    $success = true;

    // Ping the given url
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // And detect if content was returned
    $success = $status_code >= 200 && $status_code < 300;

    return $success;
}