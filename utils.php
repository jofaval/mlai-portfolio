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