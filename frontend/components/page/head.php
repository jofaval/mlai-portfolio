<?php if (!isset($title)) $title = 'Pepe Fabra Valverde - M.L. & A.I. Portfolio' ?>

<head>
    <?= c('page/seo', [ 'title' => $title ]) ?>
    <style>
        *
        {
            box-sizing: border-box;
        }

        html,
        body
        {
            padding: 0;
            margin: 0;
            font-family: 'Courier New', Courier, monospace;
            text-rendering: optimizeLegibility;
        }

        #header
        {
            width: 100%;
            background: #000;

            color: white;
            overflow: hidden;
            padding: .5rem;
        }

        #header h1
        {
            margin-top: 0;
        }

        @media screen and (max-width: 800px) {
            #header h1
            {
                margin: 0;
                font-size: 1.75rem;
            }

            #footer
            {
                padding: .5rem !important;
            }
        }

        body
        {
            counter-reset: h1 h2;
        }

        h1
        {
            counter-reset: h2;
        }

        h1::before
        {
            counter-increment: h1;
            /* content: counter(h1) ". "; */
        }

        h2
        {
            counter-reset: h3;
        }

        h2::before
        {
            counter-increment: h2;
            content: counter(h2) ". ";
        }

        h3
        {
            counter-reset: h4;
        }

        h3::before
        {
            counter-increment: h3;
            content: counter(h2) "." counter(h3) ". ";
        }

        h4
        {
            counter-reset: h5;
        }

        h4::before
        {
            counter-increment: h4;
            content: counter(h2) "." counter(h3) "." counter(h4) ". ";
        }

        h5
        {
            counter-reset: h6;
        }

        h5::before
        {
            counter-increment: h5;
            content: counter(h2) "." counter(h3) "." counter(h4) "." counter(h5) ". ";
        }

        h6::before
        {
            counter-increment: h6;
            content: counter(h2) "." counter(h3) "." counter(h4) "." counter(h5) "." counter(h6) ". ";
        }

        #main
        {
            max-width: 1240px;
            margin: auto;
            text-align: justify;
            text-align-last: center;
        	word-wrap: break-word;
            padding: 0 1rem;
        }

        #main :is(h1, h2, h3, h4, h5, h6)
        {
            text-align: left;
            text-align-last: left;
        }

        #footer
        {
            background-color: black;
            width: 100%;
            padding: 2rem;
        }

        #footer a
        {
            color: white;
        }
    </style>
</head>