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

            <?php if($this->config->item('enable_self_signup', 'general_settings')): ?>
             <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign up</h3>
                </div>
                <div class="panel-body">

                    <!-- login form -->
                    <form action="<?php echo site_url('signup'); ?>" method="POST" role="form">

                        <div class="alert-container">
                            <?php echo (isset($result)) ? alert_box($result) : ''; ?>
                        </div>

                        <div class="form-group">
                            <label for="inputFirstName">First name</label>
                            <input type="text" name="firstName" class="form-control" id="inputFirstName" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword1">Password</label>
                            <input type="password" name="password1" class="form-control" id="inputPassword1" placeholder="Your password">
                        </div>
                        <?php if($this->config->item('confirm_password', 'general_settings')): ?>
                            <div class="form-group">
                                <label for="inputPassword2">Repeat your password</label>
                                <input type="password" name="password2" class="form-control" id="inputPassword2" placeholder="Repeat your password">
                            </div>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-sm btn-default">Sign up</button>
                    </form>
                    <!-- /login form -->

                </div>
            </div>
            <?php else: ?>
                <div class="alert alert-danger" role="alert">Signup is disabled</div>
            <?php endif; ?>

        </div><!-- /.container -->

        <?php $this->load->view('open/inc/footer_scripts'); ?>

    </body>
</html>