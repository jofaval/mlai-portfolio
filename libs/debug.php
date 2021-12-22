<?php

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