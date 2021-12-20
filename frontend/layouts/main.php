<?php

// Implement default content
if (!isset($content)) $content = 'TODO: implement';
if (!isset($props['styles'])) $props['styles'] = [];
$props['styles'][] = $parent_call;

ob_start(); ?>

<?= c('page/header'); ?>
<main id="main">
    <?= $content; ?>
</main>
<?= c('page/footer'); ?>

<?php $content = ob_get_clean(); ?>

<?= c('base', array_merge($props, [ 'content' => $content ]), LAYOUTS_DIR); ?>