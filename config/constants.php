<?php

/**
 * The default chmod permissions
 * 
 * @var int
 */
define('PERMISSIONS', 0755);

// TODO: dominio
/**
 * The app domain
 * 
 * @var string
 */
define('DOMAIN', 'mlai.jofaval.com');

/**
 * The full App URL
 * 
 * @var string
 */
define('APP_URL', 'https://' . DOMAIN);

/**
 * The log level for debugging logs
 * 
 * @var int
 */
define('LOG_LEVEL_DEBUGGING', -2);

/**
 * The log level for no logs
 * 
 * @var int
 */
define('LOG_LEVEL_NONE', -1);

/**
 * The log level for all logs
 * 
 * @var int
 */
define('LOG_LEVEL_ALL', 0);

/**
 * The log level for critical errors logs
 * 
 * @var int
 */
define('LOG_LEVEL_CRITICAL', 1);

/**
 * The log level for error logs
 * 
 * @var int
 */
define('LOG_LEVEL_ERROR', 2);

/**
 * The log level for warning logs
 * 
 * @var int
 */
define('LOG_LEVEL_WARNING', 3);

/**
 * The log level for info logs
 * 
 * @var int
 */
define('LOG_LEVEL_INFO', 4);

/**
 * The current log level
 * 
 * @var int
 */
define('LOG_LEVEL', LOG_LEVEL_ALL);

/**
 * The default locale
 * 
 * @var string
 */
define('LOCALE', 'es_ES');

/**
 * The app title
 * 
 * @var string
 */
define('APP_TITLE', 'Pepe Fabra Valverde - M.L. & A.I. Portfolio');

/**
 * The app description
 * 
 * @var string
 */
define('APP_DESC', 'My portfolio about Machine Learning and Artificial Intelligence');

/**
 * The author (myself)
 * 
 * @var string
 */
define('AUTHOR', 'jofaval');

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
 * The app name
 * 
 * @var string
 */
define('APP_NAME', 'M.L. & A.I. Portfolio');

/**
 * The app shortname
 * 
 * @var string
 */
define('APP_SHORTNAME', 'MLAI Portfolio');

/**
 * The PWA theme color
 * 
 * @var string
 */
define('PWA_THEME_COLOR', '#C6FFDD');

/**
 * The PWA background color
 * 
 * @var string
 */
define('PWA_BACKGROUND_COLOR', '#C6FFDD');

/**
 * The app lang
 * 
 * @var string
 */
define('APP_LANG', 'en');

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