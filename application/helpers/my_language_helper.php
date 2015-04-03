<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function get_language()
{
	$CI =& get_instance();
	$language = $CI->session->userdata('language');
	if(isset($language) && !empty($language))
	{
		return $CI->session->userdata('language');
	}
	else
	{
		return false;
	}
}