<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| CI Start Project - General settings
| -------------------------------------------------------------------
| This file contains general settings.
|
|
*/

$config['general_settings']['enable_self_signup'] = true;
$config['general_settings']['confirm_password'] = true;
$config['general_settings']['auto_activate'] = true;
$config['general_settings']['generate_username'] = true;
$config['general_settings']['login_after_register'] = true;
$config['general_settings']['login_after_register_page'] = 'dashboard';
$config['general_settings']['logged_home'] = 'dashboard';