<?php

/**
 * Gets the timestamp string formatted
 * 
 * @return string
 */
function get_time()
{
    return date('[d/m/Y H:i:s]');
}

/**
 * Logs a message into the log file
 * 
 * @param string|null $message The message to log
 * @param int $log_level The log_level from which to display this message
 * 
 * @return bool
 */
function logging(string $message = null, int $log_level = LOG_LEVEL_ALL)
{
    // If it's not on the same log_level, don't log it
    if (LOG_LEVEL !== $log_level) return;

    // TODO: implementar dirname en el otro mkdir, crearle una función para ello
    // Add a jumpline at the end
    $message = join('', [ $message, PHP_EOL ]);

    // Add the timestamp
    $message = get_time() . " " . $message;

    // Write the content
    $success = write(LOG_FILE, $message);

    return $success;
}