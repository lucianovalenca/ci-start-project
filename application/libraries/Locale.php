<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
Should be in : /application/librairies
Must be declare in /application/config/autoload.php in the 
$autoload['libraries'] = array('your_other libraires','locale');
*/

class Locale
{

	function __construct() {

		$CI =& get_instance();
		$CI->load->library('session');
		$language = $CI->session->userdata('language');

		if(array_key_exists($language, $CI->config->item('languages')))
		{
		
			putenv("LANG=$language"); 
			setlocale(LC_ALL, $language);

			// Set the text domain as 'messages'
			$domain = 'messages';
			$path = APPPATH . "/language/locale/";

			bindtextdomain($domain, $path); 
			textdomain($domain);

		}

	}

}