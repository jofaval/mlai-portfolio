<?php

/**
 * Writes the content in a file, and creates the directories and file if doesn't exist yet
 * 
 * @param string $file The file path
 * @param string $content The content
 * @param int $flags The flags to use
 * 
 * @return bool
 */
function write(string $file, string $content, int $flags = 0): bool
{
    create_dir($file);
    if (!file_exists($file)) touch($file);

    $success = file_put_contents($file, $content, $flags) !== false;

    return $success;
}

/**
 * Reads the content of a file, if it exists
 * 
 * @param string $file The file path
 * 
 * @return string
 */
function read(string $file): string
{
    $content = '';
    if (!file_exists($file)) return $content;

    $content = file_get_contents($file);

    return $content;
}

/**
 * Gets the extension from a file
 * 
 * @param string $file The file from which to get the extension
 * 
 * @return string
 */
function get_file_extension(string $file): string
{
    return pathinfo($file, PATHINFO_EXTENSION);
}

/**
 * Replaces the extension of a file
 * 
 * @param string $filename The filename with the old extension
 * @param string $new_extension The new extension to replace
 * 
 * @return string
 * 
 * @author Alex (https://stackoverflow.com/users/288568/alex)
 * @source https://stackoverflow.com/questions/193794/how-can-i-change-a-files-extension-using-php#answer-14726079
 */
function replace_extension($filename, $new_extension): string
{
    $info = pathinfo($filename);
    return ($info['dirname'] ? $info['dirname'] . DIRECTORY_SEPARATOR : '') 
        . $info['filename'] 
        . '.' 
        . $new_extension;
}

/**
 * Creates a dir if doesn't previously exist
 * 
 * @param string $dir The dir to attempt to create
 * 
 * @return bool
 */
function create_dir(string $dir): bool
{
    // If a dir is not given, it is forcefully retrieved
    if (pathinfo($dir, PATHINFO_EXTENSION)) $dir = dirname($dir);

    // If it does already exist, return true
    if (file_exists($dir)) return true;

    // Create a directory recursively
    return mkdir($dir, PERMISSIONS, true);
}