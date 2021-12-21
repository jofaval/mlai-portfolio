<?php

/**
 * Writes the content in a file, and creates the directories and file if doesn't exist yet
 * 
 * @param string $file
 * @param string $content
 * 
 * @return bool
 */
function write(string $file, string $content)
{
    if (!file_exists(dirname($file))) mkdir($file, PERMISSIONS, true);
    if (!file_exists($file)) touch($file);

    $success = file_put_contents($file, $content) !== false;

    return $success;
}

/**
 * Reads the content of a file, if it exists
 * 
 * @param string $file The file to read
 * 
 * @return string
 */
function read(string $file)
{
    $content = '';
    if (!file_exists($file)) return $content;

    $content = file_get_contents($file);

    return $content;
}