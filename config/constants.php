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