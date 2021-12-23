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
 * The robots file path
 * 
 * @var string
 */
define('ROBOTS_FILE', path_join(BUILD_DIR, 'robots.txt'));