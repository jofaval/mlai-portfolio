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
function get_arg(int $index, $default = null)
{
    return isset(ARGS[$index]) ? ARGS[$index] : $default;
}

/**
 * Gets the user requested action
 * 
 * @return string
 */
function get_action()
{
    // Take into account the CLI call in the args
    return get_arg(1);
}

/**
 * Deploys to the production server the build
 * 
 * @return void
 */
function deploy()
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
function create_project(string $name)
{
    # code...
}