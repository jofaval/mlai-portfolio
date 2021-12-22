<?php if (!isset($href)) $href = '' ?>
<?php if (!isset($label)) $label = '' ?>
<?php if (!isset($class)) $class = '' ?>

<a href="<?= $href ?>" aria-label="<?= strip_tags($label) ?>" class="link <?= $class ?>"><?= $label ?></a>