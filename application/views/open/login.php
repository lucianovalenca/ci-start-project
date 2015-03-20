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
                    <h3 class="panel-title">
                        <span>Sign In</span>
                        <?php if($this->config->item('enable_self_signup', 'general_settings')): ?>
                            <span class="pull-right"><a href="<?php echo site_url('signup'); ?>">Not registered yet?</a></span>
                        <?php endif; ?>
                    </h3>
                </div>
                <div class="panel-body">

                    <!-- login form -->
                    <form action="<?php echo site_url('login'); ?>" method="POST" role="form">

                        <div class="alert-container">
                            <?php echo (isset($result)) ? alert_box($result) : ''; ?>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">Username or Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password <a href="<?php echo site_url('login/forgot_password'); ?>">(forgot password)</a></label>
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                        <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                        <button type="submit" class="btn btn-sm btn-default">Sign in</button>
                    </form>
                    <!-- /login form -->

                </div>
            </div>

        </div><!-- /.container -->

        <?php $this->load->view('open/inc/footer_scripts'); ?>

    </body>
</html>