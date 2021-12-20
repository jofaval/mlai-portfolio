<?php if (!isset($title)) $title = 'Pepe Fabra Valverde - M.L. & A.I. Portfolio' ?>
<?php $default_styles = [ 'main', 'header', 'footer' ] ?>

<?php $styles = array_unique( array_merge($styles, $default_styles) ) ?>

<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= c('page/seo', [ 'title' => $title ]) ?>
    <style>
        <?php foreach ($styles as $style): ?>
            <?php
                // TODO: implement function
                $full_path = path_join(PUBLIC_DIR, 'styles', "$style.css");

                $content = '';
                if (file_exists($full_path)) $content = file_get_contents($full_path);
            ?>
            <?= $content ?>
        <?php endforeach; ?>

        /* TODO: implement save it in a separate file, and probably later minify it */
    </style>
</head>