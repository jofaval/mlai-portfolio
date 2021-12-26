<link rel="manifest" href="<?= get_public_url(MANIFEST_FILE) ?>">

<meta name="theme-color" media="(prefers-color-scheme: light)" content="white">
<meta name="theme-color" media="(prefers-color-scheme: dark)"  content="black">

<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="apple-touch-icon" href="<?= path_join(get_public_url(PWA_ICONS_DIR), 'icon-192x192.png') ?>">

<!-- TODO: splash screens y background color, lo de PWA -->
<!-- SPLASH SCREENS -->
<link rel="apple-touch-startup-image" href="<?= get_public_url(path_join(PWA_SPLASHSCREEN_DIR, 'splash-640x1136.jpg')) ?>" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="<?= get_public_url(path_join(PWA_SPLASHSCREEN_DIR, 'splash-750x1334.jpg')) ?>" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="<?= get_public_url(path_join(PWA_SPLASHSCREEN_DIR, 'splash-1242x2208.jpg')) ?>" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="<?= get_public_url(path_join(PWA_SPLASHSCREEN_DIR, 'splash-1125x2436.jpg')) ?>" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="<?= get_public_url(path_join(PWA_SPLASHSCREEN_DIR, 'splash-1536x2048.jpg')) ?>" media="(min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="<?= get_public_url(path_join(PWA_SPLASHSCREEN_DIR, 'splash-1668x2224.jpg')) ?>" media="(min-device-width: 834px) and (max-device-width: 834px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="<?= get_public_url(path_join(PWA_SPLASHSCREEN_DIR, 'splash-2048x2732.jpg')) ?>" media="(min-device-width: 1024px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">