<?php ob_start(); ?>

<h1>Error 403</h1>
<h2>You don't have the privileged access required</h2>

<?php

$content = ob_get_clean();

$layout = c('error', [
    'title' => '403',
    'content' => $content,
], LAYOUTS_DIR);

echo $layout;