<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Starter Template for Bootstrap<?php echo MY_DEFAULT_TITLE; ?></title>

        <?php $this->load->view('open/inc/head'); ?>
    </head>

    <body>

        <?php $this->load->view('open/inc/navbar'); ?>

        <div class="container">

            <div class="starter-template">
                <h1>Bootstrap starter template</h1>
                <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
            </div>

        </div><!-- /.container -->

        <?php $this->load->view('open/inc/footer_scripts'); ?>

    </body>
</html>