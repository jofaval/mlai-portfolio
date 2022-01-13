<?php

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