<?php

require_once 'utils.php';
require_once 'paths.php';
require_once 'app.php';
require_once path_join(LIBS_DIR, 'debug.php');
require_once path_join(CONFIG_DIR, 'constants.php');
require_once path_join(FRONTEND_DIR, 'library.php');
require_once path_join(LIBS_DIR, 'file.php');
require_once path_join(LIBS_DIR, 'log.php');
require_once path_join(LIBS_DIR, 'img.php');
require_once path_join(BUILDER_DIR, 'actions.php');
require_once path_join(BUILDER_DIR, 'minimize.php');
require_once path_join(BUILDER_DIR, 'asset.php');
require_once path_join(BUILDER_DIR, 'build.php');
require_once path_join(BUILDER_DIR, 'sitemap.php');
require_once path_join(BUILDER_DIR, 'robot.php');
require_once path_join(BUILDER_DIR, 'service-worker.php');
require_once path_join(BUILDER_DIR, 'pwa.php');

// Set global locale
setlocale(LC_ALL, LOCALE);
date_default_timezone_set('Europe/Madrid');