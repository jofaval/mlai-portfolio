<?php $cover_img = 'https://jofaval.com/wp-content/uploads/2021/06/jofaval.jpg' ?>
<?php $dimensions = getimagesize($cover_img) ?>

<!-- TODO: implement constants file -->
<?php define('LOCALE', 'es_ES'); ?>
<?php define('APP_TITLE', 'Pepe Fabra Valverde - M.L. & A.I. Portfolio'); ?>
<?php define('APP_DESC', 'My portfolio about Machine Learning and Artificial Intelligence'); ?>
<?php define('APP_URL', 'https://mlai.jofaval.com'); ?>
<?php define('AUTHOR', 'jofaval'); ?>

<!-- OpenGraph/Facebook -->
<meta property="og:image"        content="<?= $cover_img ?>">
<meta property="og:image:type"   content="image/jpg">
<meta property="og:image:width"  content="<?= $dimensions[0] ?>">
<meta property="og:image:height" content="<?= $dimensions[1] ?>">
<meta property="og:locale"       content="<?= LOCALE ?>">
<meta property="og:type"         content="website">
<meta property="og:site_name"    content="<?= APP_TITLE ?>">
<meta property="og:title"        content="<?= APP_TITLE ?>">
<meta property="og:description"  content="<?= APP_DESC ?>">
<meta property="og:type"         content="<?= APP_TITLE ?>">
<meta property="og:url"          content="<?= APP_URL ?>">

<meta name="og:image"            content="<?= $cover_img ?>">
<meta name="og:image:type"       content="image/jpg">
<meta name="og:image:width"      content="<?= $dimensions[0] ?>">
<meta name="og:image:height"     content="<?= $dimensions[1] ?>">
<meta name="og:locale"           content="<?= LOCALE ?>">
<meta name="og:type"             content="website">
<meta name="og:site_name"        content="<?= APP_TITLE ?>">
<meta name="og:title"            content="<?= APP_TITLE ?>">
<meta name="og:description"      content="<?= APP_DESC ?>">
<meta name="og:type"             content="<?= APP_TITLE ?>">
<meta name="og:url"              content="<?= APP_URL ?>">

<!-- Twitter -->
<meta name="twitter:card"        content="summary_large_image">
<meta name="twitter:url"         content="<?= APP_URL ?>">
<meta name="twitter:site"        content="<?= APP_URL ?>">
<meta name="twitter:title"       content="<?= APP_TITLE ?>">
<meta name="twitter:description" content="<?= APP_DESC ?>">
<meta name="twitter:image"       content="<?= $cover_img ?>">
<meta name="twitter:creator"     content="<?= AUTHOR ?>">

<title><?= $title ?></title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?= $cover_img ?>" type="image/x-icon">