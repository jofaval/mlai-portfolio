<?php

$links = [
    [ 'label' => 'Home', 'href' => '' ],
    [ 'label' => 'Projects', 'href' => 'projects' ],
];

?>

<nav>
    <header id="header">
        <!-- TITLE -->
        <div id="header-title-container">
            <a href="<?= get_public_url() ?>">
                <p id="page-title">Pepe Fabra Valverde</p>
                <span id="page-description">Machine Learning & A.I.</span>
            </a>
        </div>

        <div id="header-links">
            <?php if (!empty($links)): ?>
                <!-- LINKS -->
                <?php foreach ($links as $link): ?>
                    <?php
                        $href = get_public_url($link['href']);
                        $link['href'] = $href;
                        $link['class'] .= ' header-link';
                    ?>

                    <?= c('navigation/link', $link) ?>
                <?php endforeach; ?>

            <!-- CONTACT ME -->
            <div class="contact-link-container" style="margin-left: auto;">
                <?= c('navigation/hire-me'); ?>
            </div>
            <?php endif; ?>
        </div>

    </header>
</nav>