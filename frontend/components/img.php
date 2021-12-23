<?php

if (!isset($src)) $src = '';
if (!isset($alt)) $alt = $src;
if (!isset($id)) $id = $alt;
if (!isset($title)) $title = $alt;
if (!isset($class)) $class = '';
if (!isset($label)) $label = "An image of $title";
if (!isset($figure)) $figure = false;
if (!isset($lazy)) $lazy = true;

?>

<?php ob_start(); ?>
    <img
        src="<?= $src ?>"
        alt="<?= $alt ?>"
        class="img <?= $class ?>"
        aria-label="<?= $label ?>"
        title="<?= $title ?>"
        id="<?= $id ?>"
        <?php if ($lazy): ?> loading="lazy" <?php endif; ?>
    >
<?php $img = ob_get_clean(); ?>

<?php if ($figure): ?>
    <figure>
        <?= $img ?>
        <figcaption><?= $label ?></figcaption>
    </figure>
<?php else: ?>
    <?= $img ?>
<?php endif; ?>