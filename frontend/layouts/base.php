<?php if (!isset($title)) $title = 'Pepe Fabra Valverde - M.L. & A.I. Portfolio' ?>
<?php if (!isset($content)) $content = 'TODO: implement'; ?>
<?php if (!isset($styles)) $styles = []; ?>
<?php if (!isset($scripts)) $scripts = []; ?>

<!DOCTYPE html>
<html lang="en">
<?= c('page/head', [ 'title' => $title, 'styles' => $styles, 'scripts' => $scripts ]) ?>
<body>
    <?= $content ?>
</body>
</html>