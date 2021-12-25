<?php

/**
 * Creates the service worker, private function for now
 * 
 * @return bool
 */
function create_service_worker(): bool
{
    // Get the content
    $content = get_content(SERVICE_WORKER_FILE);
    return ($content);
    // Write the content
    $success = write(get_build_path(SERVICE_WORKER_FILE), $content);

    return $success;
}