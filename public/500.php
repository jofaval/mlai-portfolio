<?php ob_start(); ?>

<h1>Error 500</h1>
<h2>The server couldn't process the page</h2>

<?php

$content = ob_get_clean();

$layout = c('error', [
    'title' => '500',
    'content' => $content,
], LAYOUTS_DIR);

echo $layout;