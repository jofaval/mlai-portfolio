<?php

Assets::add_style('main');

// Implement default content
if (!isset($content)) $content = 'TODO: implement';
if (!isset($props['styles'])) $props['styles'] = [];
$props['styles'][] = $parent_call;
$props['styles'][] = 'counters';

ob_start(); ?>

<!-- TODO: Generate ID for all the headers?!, use js for that? -->

<?= c('page/header'); ?>
<main id="main">
    <?= $content; ?>
</main>
<aside id="sidebar">
    <?php $sidebar_links = get_sidebar_links($content) ?>
    <?php foreach ($sidebar_links as $sidebar_link): ?>
        <?= c('navigation/link', $sidebar_link) ?>
    <?php endforeach; ?>
</aside>
<?= c('page/footer'); ?>

<?php $content = ob_get_clean(); ?>

<?= c('base', array_merge($props, [ 'content' => $content, 'target' => $parent_call ]), LAYOUTS_DIR); ?>