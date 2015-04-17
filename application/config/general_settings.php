<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| CI Start Project - General settings
| -------------------------------------------------------------------
| This file contains custom settings. It MUST be autoloaded.
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
$config['general_settings']['facebook_login'] = true;

/*
|--------------------------------------------------------------------------
| Facebook SDK
|--------------------------------------------------------------------------
|
*/

/*
$config['facebook']['api_id'] = 'YOUR APP ID';
$config['facebook']['app_secret'] = 'YOUR APP SECRET';
$config['facebook']['redirect_url'] = 'http://www.yourwebsite.com/login';
$config['facebook']['permissions'] = array(
  'email',
  'user_location',
  'user_birthday'
);
*/

$config['facebook']['api_id'] = '1430917250555750';
$config['facebook']['app_secret'] = '960ddd805e3f0c1dea37d9929de92ffe';
$config['facebook']['redirect_url'] = 'http://www.portaldoidioma.com.br/login/facebook';
$config['facebook']['permissions'] = array(
  'email',
  'user_location',
  'user_birthday'
);