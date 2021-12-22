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

// TOOD: create debug separete file?
/**
 * Catches and handles an exception/error throwed in the app
 * 
 * @param Throwable $throwed The exception/error throwed in the app
 * @param bool $display Determines wether it should display the details, it won't by default
 * 
 * @return void
 */
function general_exception_handler(Throwable $throwed, bool $display = false)
{
    // Log the error
    logging($throwed->__toString());

    if ($display) dd($throwed);
}

set_exception_handler('general_exception_handler');

/**
 * Catches and handlers an error throwed in the app
 * 
 * @param int $errno The error code
 * @param string $errstr The message it throwed
 * @param string $errfile The file where it happend
 * @param int $errline The line of the file where it happened
 * @param bool $display Determines wether it should display the details, it won't by default
 * 
 * @return void
 */
function general_error_handler(int $errno, string $errstr, string $errfile, int $errline, bool $display = false): void
{
    $message = "An error [code:$errno] with message \"$errstr\" at '$errfile:$errline'";
    logging($message);

    if ($display) dd($message);
}

set_error_handler('general_error_handler');

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
function str_contains(string $haystack, string $needle)
{
    return strpos($haystack, $needle) !== false;
}