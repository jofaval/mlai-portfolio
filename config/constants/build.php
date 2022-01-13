<?php

/**
 * The robots configuration array
 * 
 * @var array<string,array<string,string>>
 */
define('ROBOTS_CONFIGURATION', [
    'Googlebot' => [
        'Disallow' => '/nogooglebot/',
    ],
    '*' => [
        'Allow' => '/',
    ],
]);

/**
 * All the files to ignore
 * 
 * @var string[]
 */
define('IGNORE_FILES', [
    '.css',
    // 'styles/*',
    'sw.js',
    '.js',
    // path_join('public', 'index.html'),
]);

/**
 * Determines if the sitemap.xml will be generated
 * 
 * @var bool 
 */
define('GENERATE_SITEMAP', true);

/**
 * Determines if the robots.txt will be generated
 * 
 * @var bool 
 */
define('GENERATE_ROBOTS', true);

/**
 * Determines if the service-worker.js will be generated
 * 
 * @var bool 
 */
define('GENERATE_SERVICE_WORKER', true);

/**
 * Determines if it will convert the app to a PWA
 * 
 * @var bool 
 */
define('GENERATE_PWA', true);

/**
 * Determines wether it will generate the icons
 * 
 * @var bool
 */
define('GENERATE_ICONS', true);

/**
 * Determines wether it will generate, splashscreens
 * 
 * @var bool
 */
define('GENERATE_SPLASHSCREENS', true);

/**
 * Determines wether it will generate, screenshots of the app
 * 
 * @var bool
 */
define('GENERATE_SCREENSHOTS', true);