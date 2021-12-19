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