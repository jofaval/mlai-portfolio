<?php ob_start(); ?>

<!-- For testing purpose -->
<!-- (h2.title{Section Title}+p{lorem*5}+h3{Section Subtitle}*3+p{lorem*5}+h4{Subsection title}*4+p{lorem*5}+h5{Subsection subtitle}*3+p{lorem*5}+h6{Subsection Detail}*5+p{lorem*5})*3 -->

<?= c('img', [
    'class'  => 'original',
    'alt'    => 'jofaval',
    'src'    => get_public_url( minify_img(path_join(IMG_DIR, 'jofaval.jpg')) ),
    'lazy'   => false,
]) ?>
<h1>Pepe Fabra Valverde: Machine Learning & Artificial Intelligence Portfolio</h1>
<h2 class="no-counter">Machine Learning & Artificial Intelligence student</h2>

<!-- PORTFOLIO INTRODUCTION -->
<h2>Portfolio</h2>

<h3>Background</h3>

<h3>Experience</h3>

<h3>Motivation</h3>

<h3>Why you should hire me?</h3>
<p>Idk :P</p>


<!-- PROJECTS -->
<h2>Projects</h2>

<h3>Project title 1</h3>

<h3>Project title 2</h3>

<h3>Project title 3</h3>

<h3>Project title 4</h3>

<h3>Project title 5</h3>

<!-- CONTACT -->
<!-- TODO: create contact section component? -->
<h2>Contact</h2>
<?= c('img', [
    'class'  => 'original',
    'alt'    => 'jofaval',
    'src'    => get_public_url( minify_img(path_join(IMG_DIR, 'jofaval.jpg')) ),
    'figure' => true,
]) ?>

<?php Assets::add_script('contact'); ?>

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

$styles = [];

$scripts = [

];

$layout = c('main', [
    'content' => $content,
    'styles'  => $styles,
    'scripts' => $scripts,
], LAYOUTS_DIR);

echo $layout;