<?php

/**
 * Joins dirs by the DIRECTORY_SEPARATOR
 * 
 * @return string
 */
function path_join()
{
    $dirs = func_get_args();

    return join(DIRECTORY_SEPARATOR, $dirs);
}

/**
 * Implements the dd (dump and die) debugging option
 * 
 * @return void
 */
function dd()
{
    $args = func_get_args();

    echo "<pre style='font-size: 16px; color: hsl(0, 50, 20);'>";
    foreach ($args as $arg) var_dump($arg);
    echo "</pre>";

    die;    
}


/**
 * Determins if a $needle is at the start of the $haystack
 * 
 * @param string $haystack The string
 * @param string $needle The substring to find at the start
 * 
 * @return bool
 */
function str_starts_with(string $haystack, string $needle)
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
function str_ends_with(string $haystack, string $needle)
{
    return strpos($haystack, $needle) === (strlen($haystack) - strlen($needle)) - 1;
}

/**
 * Determins if a $needle is in the $haystack
 * 
 * @param string $haystack The string
 * @param string $needle The substring to find
 * 
 * @return bool
 */
function str_contains(string $haystack, string $needle)
{
    return strpos($haystack, $needle) !== -1;
}