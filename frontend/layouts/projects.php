<?php

// Implement default content
if (!isset($content)) $content = 'TODO: implement';

ob_start(); ?>

<?= c('page/header'); ?>
<!-- TODO: implement a subheader, for the navigation, or a sidebar, i don't know -->
<main id="main">
    <?= $content; ?>
</main>
<?= c('page/footer'); ?>

<?php $content = ob_get_clean(); ?>

<?= c('base', [ 'content' => $content ], LAYOUTS_DIR); ?>