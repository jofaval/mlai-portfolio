<?php if (!isset($title)) $title = get_page_title($title) ?>

<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src https://*; child-src 'none';"> -->

    <?= c('page/pwa') ?>
    <?= c('page/seo', [ 'title' => $title ]) ?>
</head>