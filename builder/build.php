<?php

/**
 * Get the real content of a file, already compiled
 * 
 * @param string $file The file path
 * 
 * @return string
 */
function get_content(string $file)
{
    // DEPRECATED
    // $content = file_get_contents($file);

    if (!file_exists($file) || !is_file($file)) {
        return 'Not found';
    }

    ob_start();
    require $file;
    $content = ob_get_clean();

    return $content;
}

// TODO: parse into actions.php inside "cli" folder
/**
 * Rebuilds a single file
 * 
 * @param string $file The file to rebuild. If it's not given, it will try to get it from the args
 * @param bool $absolute Will it be an absolute path? By default it will
 * 
 * @return bool
 */
function rebuild(string $file = null, bool $absolute = true)
{
    // If the file was not given, it get it from the args
    if (is_null($file)) $file = path_join(PUBLIC_DIR, pathinfo(get_arg(2))['filename'] . '.php');
    // If it's an empty name, returns false
    if (empty($file)) return false;

    // Paths starts at public/ 
    $new_file_path = str_replace(PUBLIC_DIR, BUILD_DIR, $file);
    $content = get_content($file);
    
    // If it's a php file, replace it to html
    $new_file_path = str_replace('.php', '.html', $new_file_path);
    // Input the hew content
    $success = write($new_file_path, $content) !== false;

    return $success;
}

/**
 * All the files to ignore
 * 
 * @var string[]
 */
define('IGNORE_FILES', [
    '.css',
    // 'styles/*',
    '.js',
    // path_join('public', 'index.html'),
]);

/**
 * Retruns all the files to compile
 * 
 * @param string $root The root from which to get all files
 * @param string $base_root The default root, PUBLIC_DIR by default
 * 
 * @return string[]
 */
function get_all_files(string $root = null, string $base_root = PUBLIC_DIR)
{
    // If no root is given, the $base_root will be used
    if (is_null($root)) $root = $base_root;

    $files = array_diff( scandir($root), [ '.', '..' ] );

    // Add absolute path
    $files = array_map(function (string $file) use ($root)
    {
        return path_join($root, $file);
    }, $files);

    // Implement recursiveness
    foreach ($files as $file_index => $file) {
        if (is_dir($file)) { // Recurse if necessary
            $subfiles = get_all_files($file);
            // Delete the folder
            unset($files[$file_index]);

            $files = array_merge($files, $subfiles);
        }
    }

    return $files;
}

/**
 * Removes all the content from a dir
 * 
 * @param string $dir The target dir
 * 
 * @return void
 */
function empty_dir(string $dir)
{
    foreach(glob($dir . '/*') as $file) {
        if (is_file($file)) unlink($file);
        else if (is_dir($file)) {
            empty_dir($file);
            rmdir($file);
        }
    }
}

/**
 * Returns all the files to compile
 * 
 * @return string[]
 */
function get_files()
{
    $files = get_all_files();

    // Remove files to ignore
    $files = array_filter($files, function(string $file)
    {
        if (is_dir($file)) return false;

        foreach (IGNORE_FILES as $ignore) {
            if (str_contains($file, '*')) return !str_ends_with($file, $ignore);

            $ignore = str_replace('*', '', $ignore);
            return !str_contains($file, $ignore);
        }

        return true;
    });

    // Replace .html with .php files if found
    foreach ($files as $file_index => $file) {
        // If it's an .html file, try to find a .php replacement
        if (!str_ends_with($file, '.html')) continue;
        $target_file = str_replace('.html', '.php', $file);

        // Attempt to find a .php replacement, if found, remove the current index
        foreach ($files as $possible_target) {
            if ($possible_target != $target_file) continue;

            unset($files[$file_index]);
            break;
        }
    }

    return $files;
}

/**
 * Builds all the files into minimized .html
 * 
 * @return bool
 */
function build()
{
    // TODO: implementar dd(); y logs ya de paso?
    $files = get_files();

    // Check if file exists, if it does, empty it, if it doesn't create it
    if (!file_exists(BUILD_DIR)) mkdir(BUILD_DIR);
    else empty_dir(BUILD_DIR);

    // TODO: implement threading here?

    $success = true;
    $total_files = count($files);
    $file_index = 0;
    foreach ($files as $file) {
        $success &= rebuild($file);
        // As soon as it fails, stop it
        if (!$success) return;

        $file_index++;

        // Calculate progress
        $human_file_index = $file_index;
        $progress = ($human_file_index / $total_files) * 100;
        $progress = round($progress);
        $filename = str_replace(PUBLIC_DIR, '', $file);
        $filename = str_replace('\\', '/', $filename);
        echo "\"$filename\" has been compiled, A total of $progress% has been compiled, ($human_file_index/$total_files).\n";
    }

    return $success;
}