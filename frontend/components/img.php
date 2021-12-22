<?php

if (!isset($src)) $src = '';
if (!isset($alt)) $alt = $src;
if (!isset($title)) $title = $alt;
if (!isset($class)) $class = $alt;

?>

<img src="<?= $src ?>" alt="<?= $alt ?>" class="img <?= $class ?>" title="<?= $title ?>">