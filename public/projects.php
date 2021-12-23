<?php ob_start(); ?>

<h1>All my projects/portfolio page</h1>
<h2 class="no-counter">All the projects I have participated in or researched on my own.</h2>

<h2>Projects</h2>
<!-- TODO: refactor into a separte file -->
<?php $files = get_all_files(PROJECTS_DIR); ?>
<ol class="projects-list">
    <?php foreach ($files as $file): ?>
        <?php $filename = ucfirst(pathinfo($file, PATHINFO_FILENAME)); ?>
        <?php $file = get_public_url($file); ?>

        <li class="project-element">
            <?= c('navigation/link', [ 'label' => $filename, 'href' => $file, 'class' => 'project-link' ]) ?>
        </li>
    <?php endforeach; ?>
</ol>

<p>&nbsp;</p>

<?php

$content = ob_get_clean();

$styles = [
    'projects'
];

$layout = c('main', [
    'content' => $content,
    'styles'  => $styles,
], LAYOUTS_DIR);

echo $layout;