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
    if ($success) logging('sitemap generated');
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
    if ($success) logging('robots.txt generated');
}

/**
 * Creates a resource file
 * 
 * @param string $dir The base directory from which to create the file
 * @param bool $override Will it override the component if it previously exists? It won't by default
 * @param string $filename The filename, it will be null by default
 * 
 * @return bool
 */
function create(string $dir, bool $override = false, string $filename = null)
{
    // If it doesn't exist, get it from the args
    if (is_null($filename)) $filename = get_arg(2);
    // If no filename was given, return null
    if (!$filename) return null;

    // Create the dir
    $full_filename_path = path_join($dir, "$filename.php");

    // Don't override it if that's what was asked for
    if (!$override && file_exists($full_filename_path)) {
        echo "[ERROR]: $filename already exists.\n";
        return false;
    }

    // If the directory doesn't exist, create it
    create_dir($full_filename_path);

    // Create the empty file
    $success = touch($full_filename_path);

    return $success;
}

// TODO: Create a CLI logging method for message displaying

/**
 * Creates a component
 * 
 * @return void
 */
function component(): void
{
    // Create the empty file
    $success = create(COMPONENTS_DIR);

    if (is_null($success)) {
        echo "No component name was given.\n";
        return;
    }

    // Generate the message
    $message = $success
        ? 'Created succesfully'
        : 'Couldn\'t be created';

    // Output the message
    echo $message . ".\n";
}

/**
 * Creates an action
 * 
 * @return void
 */
function action(): void
{
    // Create the empty file
    $success = create(BUILDER_DIR);

    if (is_null($success)) {
        echo "No action name was given.\n";
        return;
    }

    // Generate the message
    $message = $success
        ? 'Created succesfully'
        : 'Couldn\'t be created';

    // Output the message
    echo $message . ".\n";
}

/**
 * Creates the service worker
 * 
 * @return void
 */
function sw(): void
{
    $success = create_service_worker();

    // Log the message
    echo $success
        ? "sw.js succesfully imported\n"
        : "Couldn\'t import the sw.js\n";

    // Log the robots.txt generation
    if ($success) logging('sw.js imported');
}

/**
 * Makes the Web-App a PWA 
 * 
 * @return void
 */
function pwa(): void
{
    $success = make_pwa();

    // Log the message
    echo $success
        ? "Succesfully converted to PWA\n"
        : "Couldn\'t import conver to PWA\n";

    // Log the PWA conversion
    if ($success) logging('made pwa');
}

