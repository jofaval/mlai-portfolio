<?php ob_start(); ?>

<h1>Contact page</h1>
<h2 class="no-counter">Any inquire can be solved through <?= c('navigation/hire-me', [ 'label' => 'this contact form' ]) ?>.</h2>

<?= c('img', [
    'class'  => 'original',
    'alt'    => 'jofaval',
    'src'    => get_public_url( minify_img(path_join(IMG_DIR, 'jofaval.jpg')) ),
    'figure' => true,
    'lazy'   => false,
]) ?>

<table class="contact-table">
    <tr>
        <td><strong>Full Name:&nbsp;</strong></td>
        <td>Pepe Fabra Valverde</td>
    </tr>
    <tr>
        <td><strong>Contact Form:&nbsp;</strong></td>
        <td><?= c('navigation/hire-me'); ?></td>
    </tr>
    <tr>
        <td><strong>LinkedIn:&nbsp;</strong></td>
        <td><?= c('navigation/link', [ 'label' => 'My LinkedIn', 'href' => 'https://linkedin.com/in/jofaval' ]) ?></td>
    </tr>
    <tr>
        <td><strong>Github:&nbsp;</strong></td>
        <td><?= c('navigation/link', [ 'label' => 'My Github', 'href' => 'https://github.com/jofaval' ]) ?></td>
    </tr>
    <tr>
        <td><strong>StackOverflow:&nbsp;</strong></td>
        <td><?= c('navigation/link', [ 'label' => 'My StackOverflow', 'href' => 'https://stackoverflow.com/story/jofaval' ]) ?></td>
    </tr>
</table>

<p>&nbsp;</p>

<?php

$content = ob_get_clean();

$layout = c('main', [
    'content' => $content,
], LAYOUTS_DIR);

echo $layout;