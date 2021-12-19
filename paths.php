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
 * The public directory
 * 
 * @var string
 */
define('PUBLIC_DIR', path_join(BASE_DIR, 'public'));

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