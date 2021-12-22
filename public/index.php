<?php ob_start(); ?>

<!-- For testing purpose -->
<!-- (h2.title{Section Title}+p{lorem*5}+h3{Section Subtitle}*3+p{lorem*5}+h4{Subsection title}*4+p{lorem*5}+h5{Subsection subtitle}*3+p{lorem*5}+h6{Subsection Detail}*5+p{lorem*5})*3 -->

<h1 style="text-align-last: center;">Pepe Fabra Valverde</h1>
<h2 class="no-counter" style="text-align-last: center;">Machine Learning & Artificial Intelligence student</h2>

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
<h2>Contact</h2>

<?php

$content = ob_get_clean();

$styles = [

];

$scripts = [

];

$layout = c('main', [
    'content' => $content,
    'styles'  => $styles,
    'scripts' => $scripts,
], LAYOUTS_DIR);

echo $layout;