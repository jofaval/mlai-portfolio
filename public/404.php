<?php ob_start(); ?>

<h1>Error 404</h1>
<h2>Ooops! No page was found, maybe it was moved?</h2>

<?php

$content = ob_get_clean();

$layout = c('error', [
    'title' => '404',
    'content' => $content,
], LAYOUTS_DIR);

echo $layout;