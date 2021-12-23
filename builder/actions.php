<?php

/**
 * The CLI given commands
 * 
 * @var string[]
 */
define('ARGS', $argv);

/**
 * Gets the argument required
 * 
 * @param int $index The index to get
 * @param mixed $default The value to return, just in case, null by default
 * 
 * @return mixed|null
 */
function get_arg(int $index, $default = null): ?string
{
    return isset(ARGS[$index]) ? ARGS[$index] : $default;
}

/**
 * Gets the user requested action
 * 
 * @return string
 */
function get_action(): ?string
{
    // Take into account the CLI call in the args
    return get_arg(1);
}

/**
 * Deploys to the production server the build
 * 
 * @return void
 */
function deploy(): void
{
    $python_lib = 'python';
    $deploy_py_path = 'production/upload.py';

    build();

    // Execute the command
    exec("$python_lib $deploy_py_path", $output);

    // Print response
    foreach ($output as $line) echo "$line\n";

    logging('deployed');
}

/**
 * Create a project
 * 
 * @param string $name
 * 
 * @return string
 */
function create_project(string $name): void
{
    # code...
}

/**
 * Generates the sitemap
 * 
 * @return void
 */
function sitemap(): void
{
    $success = generate_sitemap();

    // Log the message
    echo $success
        ? "Sitemap succesfully generated\n"
        : "Couldn\'t generate the sitemap\n";

    // Log the sitemap generation
    if ($success) log('sitemap generated');
}

/**
 * Generates the robot.txt
 * 
 * @return void
 */
function robots(): void
{
    $success = generate_robots();

    // Log the message
    echo $success
        ? "robots.txt succesfully generated\n"
        : "Couldn\'t generate the robots.txt\n";

    // Log the robots.txt generation
    if ($success) log('robots.txt generated');
}