<?php if (!isset($href)) $href = '' ?>
<?php if (!isset($label)) $label = '' ?>
<?php if (!isset($class)) $class = '' ?>
<?php if (!isset($id)) $id = '' ?>

<a
    href="<?= $href ?>"
    aria-label="Link to <?= strip_tags($label) ?>"
    class="link <?= $class ?>"
    <?php if ($id): ?> id="<?= $id ?>" <?php endif; ?>
><?= $label ?></a>