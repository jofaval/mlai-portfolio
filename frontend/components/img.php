<?php

if (!isset($src)) $src = '';
if (!isset($alt)) $alt = $src;
if (!isset($id)) $id = $alt;
if (!isset($title)) $title = $alt;
if (!isset($class)) $class = '';
if (!isset($label)) $label = "An image of $title";
if (!isset($figure)) $figure = false;

?>

<?php if ($figure): ?>
    <figure>
        <img src="<?= $src ?>" alt="<?= $alt ?>" class="img <?= $class ?>" aria-label="<?= $label ?>" title="<?= $title ?>" id="<?= $id ?>">
        <figcaption><?= $label ?></figcaption>
    </figure>
<?php else: ?>
    <img src="<?= $src ?>" alt="<?= $alt ?>" class="img <?= $class ?>" aria-label="<?= $label ?>" title="<?= $title ?>" id="<?= $id ?>">
<?php endif; ?>