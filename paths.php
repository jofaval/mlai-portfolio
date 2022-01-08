<?php


/**
 * The root directory
 * 
 * @var string
 */
define('BASE_DIR', __DIR__);

/**
 * The build directory
 * 
 * @var string
 */
define('BUILD_DIR', path_join(BASE_DIR, 'build'));

/**
 * The builder directory
 * 
 * @var string
 */
define('BUILDER_DIR', path_join(BASE_DIR, 'builder'));

/**
 * The public directory
 * 
 * @var string
 */
define('PUBLIC_DIR', path_join(BASE_DIR, 'public'));

/**
 * The img directory
 * 
 * @var string
 */
define('IMG_DIR', path_join(PUBLIC_DIR, 'img'));

/**
 * The frontend directory
 * 
 * @var string
 */
define('FRONTEND_DIR', path_join(BASE_DIR, 'frontend'));

/**
 * The components directory
 * 
 * @var string
 */
define('COMPONENTS_DIR', path_join(FRONTEND_DIR, 'components'));

/**
 * The layouts directory
 * 
 * @var string
 */
define('LAYOUTS_DIR', path_join(FRONTEND_DIR, 'layouts'));

/**
 * The config directory
 * 
 * @var string
 */
define('CONFIG_DIR', path_join(BASE_DIR, 'config'));

/**
 * The libs directory
 * 
 * @var string
 */
define('LIBS_DIR', path_join(BASE_DIR, 'libs'));

/**
 * The log file
 * 
 * @var string
 */
define('LOG_FILE', path_join(BASE_DIR, 'logs', 'log.txt'));

/**
 * The log file
 * 
 * @var string
 */
define('ERROR_LOG_FILE', path_join(BASE_DIR, 'logs', 'error.log.txt'));

/**
 * The sitemap file path
 * 
 * @var string
 */
define('SITEMAP_FILE', path_join(BUILD_DIR, 'sitemap.xml'));

/**
 * The robots file path
 * 
 * @var string
 */
define('ROBOTS_FILE', path_join(BUILD_DIR, 'robots.txt'));

/**
 * The projects dir
 * 
 * @var string
 */
define('PROJECTS_DIR', path_join(PUBLIC_DIR, 'projects'));

/**
 * The service worker file path
 * 
 * @var string
 */
define('SERVICE_WORKER_FILE', path_join(PUBLIC_DIR, 'sw.js'));

/**
 * The manifest file path
 * 
 * @var string
 */
define('MANIFEST_FILE', path_join(PUBLIC_DIR, 'manifest.json'));

/**
 * The styles dir
 * 
 * @var string
 */
define('STYLES_DIR', path_join(PUBLIC_DIR, 'styles'));

/**
 * The scripts dir
 * 
 * @var string
 */
define('SCRIPTS_DIR', path_join(PUBLIC_DIR, 'scripts'));

/**
 * The PWA dir
 * 
 * @var string
 */
define('PWA_DIR', path_join(IMG_DIR, 'pwa'));

/**
 * The PWA icons dir
 * 
 * @var string
 */
define('PWA_ICONS_DIR', path_join(PWA_DIR, 'icons'));

/**
 * The PWA icon
 * 
 * @var string
 */
define('PWA_ICON', path_join(IMG_DIR, 'jofaval.png'));

/**
 * The PWA splashscreen dir
 * 
 * @var string
 */
define('PWA_SPLASHSCREEN_DIR', path_join(PWA_DIR, 'splash'));

/**
 * The PWA screenshots dir
 * 
 * @var string
 */
define('PWA_SCREENSHOTS_DIR', path_join(PWA_DIR, 'screenshots'));