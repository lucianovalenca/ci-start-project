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

        <?php $this->load->view('restricted/inc/head'); ?>
    </head>

    <body>

        <?php $this->load->view('restricted/inc/navbar'); ?>

        <div class="container">

        <h1>Account</h1>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>
            <li role="presentation"><a href="#password" aria-controls="password" role="tab" data-toggle="tab">Password</a></li>
        </ul><!-- /Nav tabs -->

        <!-- Tab panes -->
        <div class="tab-content">
            
            <!-- details -->
            <div role="tabpanel" class="tab-pane fade in active" id="details">
                
                <form action="<?php echo site_url('account/change_details'); ?>" method="POST" class="form-account-details form-default-update">

                    <div class="form-group">
                        <label for="inputFirstName">First name</label>
                        <input type="text" name="firstName" class="form-control" id="inputFirstName" placeholder="First name" value="<?php echo $userData['firstName'];?>">
                    </div>
                    <div class="form-group">
                        <label for="inputLastName">Last name</label>
                        <input type="text" name="lastName" class="form-control" id="inputLastName" placeholder="Last name" value="<?php echo $userData['lastName'];?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email address" value="<?php echo $userData['email'];?>">
                    </div>
                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" value="<?php echo $userData['username'];?>">
                    </div>
                    <div class="form-group">
                        <label for="selectTimezone">Timezone</label>
                        <select name="timezone" id="selectTimezone" class="form-control">
                            <option></option>
                            <?php 
                                foreach($timezones as $key => $value)
                                {
                                    $selected = ($userData['timezonee'] == $value) ? 'selected="selected"' : '';
                                    echo '<option value="'.$value.'" '.$selected.' >'.$key.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>

                    <div class="alert-container">
                        <?php echo (isset($result)) ? alert_box($result) : ''; ?>
                    </div>

                </form>

            </div><!-- /details -->

            <!-- password -->
            <div role="tabpanel" class="tab-pane fade" id="password">
                
                <form action="<?php echo site_url('account/change_password'); ?>" method="POST" class="form-account-password form-default-update">

                    <div class="form-group">
                        <label for="inputCurrentPassword">Current password</label>
                        <input type="password" name="currentPassword" class="form-control" id="inputCurrentPassword" placeholder="Current password">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword1">New password</label>
                        <input type="password" name="password1" class="form-control" id="inputPassword1" placeholder="New password">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword2">Confirm new password</label>
                        <input type="password" name="password2" class="form-control" id="inputPassword2" placeholder="Confirm your password">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>

                    <div class="alert-container">
                        <?php echo (isset($result)) ? alert_box($result) : ''; ?>
                    </div>
                    
                </form>

            </div><!-- /password -->

        </div><!-- /Tab panes -->
        

        </div><!-- /.container -->

        <?php $this->load->view('restricted/inc/footer_scripts'); ?>

    </body>
</html>