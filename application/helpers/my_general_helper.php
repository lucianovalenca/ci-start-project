<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

	/*
	|--------------------------------------------------------------------------
	| Generate hash 
	|--------------------------------------------------------------------------
	|
	| - Use a cryptographically strong hashing function
	| - Use a random salt for each password
	| - Use a slow hashing algorithm to make brute force attacks practically impossible
	|
	| @link https://alias.io/2010/01/store-passwords-safely-with-php-and-mysql/
	|
	*/

	function generate_hash($password)
	{
		// A higher "cost" is more secure but consumes more processing power
		$cost = 10;

		// Create a random salt
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

		// Prefix information about the hash so PHP knows how to verify it later.
		// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
		$salt = sprintf("$2a$%02d$", $cost) . $salt;

		// Value:
		// $2a$10$eImiTXuWVxfM37uY4JANjQ==

		// Hash the password with the salt
		$hash = crypt($password, $salt);

		return $hash;
	}
	
	/*
	|--------------------------------------------------------------------------
	| Return menu style based on current url segment
	|--------------------------------------------------------------------------
	|
	*/

	function menu_segment_style($segment)
	{
		//  Get url without querystrings (before first occurence of ?)
		$url = strtok($_SERVER["REQUEST_URI"],'?');
		// last segment
		$url_segments = explode('/', $url);
		return ($segment == end($url_segments)) ? 'active' : '';
	}

	/*
	|--------------------------------------------------------------------------
	| Return menu style based on current language
	|--------------------------------------------------------------------------
	|
	*/

	function menu_language_style($language)
	{
		return '';
	}

	/*
	|--------------------------------------------------------------------------
	| Bootstrap alerts
	|--------------------------------------------------------------------------
	|
	| @param array('code' => 0, 'status' => 'error', 'message' => 'Invalid email or password')
	|
	| success
	| info
	| warning
	| danger
	|
	*/

	function alert_box($arr)
	{
		switch ($arr['status'])
		{
			case 'error':
				$arr['status'] = 'danger';
				break;
			default:
				$arr['status'] = 'info';
				break;
		}
		return '<div class="alert alert-'.$arr['status'].'" role="alert">'.$arr['message'].'</div>';
	}

	/*
	|--------------------------------------------------------------------------
	| Debug helpers
	|--------------------------------------------------------------------------
	|
	*/

	if(!function_exists('print_r2'))
	{
		function print_r2($arr)
		{
			echo '<pre>';
			print_r($arr);
			echo '</pre>';
		}
	}