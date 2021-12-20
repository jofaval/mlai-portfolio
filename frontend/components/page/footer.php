<?php $footer_links = [
    [ 'label' => 'LinkedIn'                      , 'href' => 'https://linkedin.com/in/jofaval'        , ],
    [ 'label' => 'Github'                        , 'href' => 'https://github.com/jofaval'             , ],
    [ 'label' => 'Twitter'                       , 'href' => 'https://twitter.com/jofaval'            , ],
    [ 'label' => 'Reddit'                        , 'href' => 'https://reddit.com/user/jofaval'        , ],
    [ 'label' => 'Stack<strong>Overflow</strong>', 'href' => 'https://stackoverflow.com/story/jofaval', ],
] ?>

<footer id="footer">
    <?php foreach ($footer_links as $link): ?>
        <?= c('navigation/link', $link); ?>
    <?php endforeach; ?>

    <!-- TODO: create contact-link component -->
    <div class="contact-link-container" style="float: right;">
        <?= c('navigation/link', [ 'label' => 'Hire me!', 'href' => 'https://jofaval.com/mlai/contact', 'class' => 'contact-link' ]); ?>
    </div>
</footer>