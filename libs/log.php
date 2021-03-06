<?php

/**
 * Gets the timestamp string formatted
 * 
 * @return string
 */
function get_time(): string
{
    return date('[d/m/Y H:i:s]', time());
}

/**
 * Logs a message into the log file
 * 
 * @param string|null $message The message to log
 * @param int $log_level The log_level from which to display this message
 * @param string $log_file The logging file to use, by default, LOG_FILE
 * 
 * @return bool
 */
function logging(string $message = null, int $log_level = LOG_LEVEL_ALL, string $log_file = LOG_FILE): bool
{
    // If it's not on the same log_level, don't log it
    if (LOG_LEVEL !== $log_level) return false;

    // TODO: implementar dirname en el otro mkdir, crearle una función para ello
    // Add a jumpline at the end
    $message = join('', [ $message, PHP_EOL ]);

    // Add the timestamp
    $message = get_time() . " " . $message;

    // Write the content
    $success = write($log_file, $message, FILE_APPEND);

    return $success;
}