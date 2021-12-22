<?php

// Implement default content
if (!isset($content)) $content = 'TODO: implement';
if (!isset($props['styles'])) $props['styles'] = [];
$props['styles'][] = $parent_call;
$props['styles'][] = 'counters';

/**
 * Get all the sidebar links from the content
 * 
 * @param string $content The content to parse
 * 
 * @return array<string,string[]>
 */
function get_sidebar_links(string $content)
{
    $sidebar_links = [];

    return $sidebar_links;
}

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