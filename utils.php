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