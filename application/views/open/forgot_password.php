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

        <div class="container page-content">

             <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Password recovery</h3>
                </div>
                <div class="panel-body">
                    
                    <!-- login form -->
                    <form action="<?php echo site_url('login'); ?>" method="POST" role="form">
                        <div class="form-group">
                            <label for="inputEmail">Your email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                        <button type="submit" class="btn btn-sm btn-default">Reset password</button>
                    </form>
                    <!-- /login form -->

                </div>
            </div>

        </div><!-- /.container -->

        <?php $this->load->view('open/inc/footer_scripts'); ?>

    </body>
</html>