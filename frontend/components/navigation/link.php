<?php if (!isset($href)) $href = '' ?>
<?php if (!isset($label)) $label = '' ?>
<?php if (!isset($class)) $class = '' ?>

<a href="<?= $href ?>" aria-label="<?= $label ?>" class="link <?= $class ?>"><?= $label ?></a>