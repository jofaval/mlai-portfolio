<?php $default_styles = [ 'main', 'header', 'footer' ] ?>

<?php if (!isset($styles)) $styles = []; ?>
<?php $styles = array_unique( array_merge($styles, $default_styles) ) ?>

<!-- TODO: fix styles not working nor rendering properly with this method -->
<!-- TODO: Implement minify and array -->
<style type="text/css">
    <?php build_styles($target, $styles) ?>
    /* TODO: implement save it in a separate file, and probably later minify it */
</style>

<link rel="stylesheet" href="<?= get_public_url("styles/$target.css") ?>">