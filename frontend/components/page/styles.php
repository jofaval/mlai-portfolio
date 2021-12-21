<?php $default_styles = [ 'main', 'header', 'footer' ] ?>

<?php if (!isset($styles)) $styles = []; ?>
<?php $styles = array_unique( array_merge($styles, $default_styles) ) ?>

<!-- TODO: fix styles not working nor rendering properly with this method -->
<!-- TODO: Implement minify and array -->
<style type="text/css">
    <?php foreach ($styles as $style): ?>
        <?php
            // TODO: implement function
            $full_path = path_join(PUBLIC_DIR, 'styles', "$style.css");

            // TODO: detect if it has an http for a request

            $content = '';
            if (file_exists($full_path)) $content = file_get_contents($full_path);
        ?>
        <?= $content ?>
    <?php endforeach; ?>

    /* TODO: implement save it in a separate file, and probably later minify it */
</style>