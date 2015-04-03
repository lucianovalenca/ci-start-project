<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function set($language)
	{
		if(in_array($language, $this->config->item('languages')))
		{
			// Save to session
			$this->session->set_userdata('language', $language);

			//$language = $language;
			putenv("LANG=$language"); 
			setlocale(LC_ALL, $language);

			// Set the text domain as 'messages'
			$domain = 'messages';
			bindtextdomain($domain, $_SERVER['DOCUMENT_ROOT'] . "/ci-start-project/application/language/locale/"); 
			textdomain($domain);

			echo $language . '<br/>';
			echo _("A string to be translated would go here");
			exit;

			// Redirect back to referral page
			$this->load->library('user_agent');
		    if ($this->agent->is_referral())
		    {
				redirect($this->agent->referrer());
		    }
		    else
		    {
		    	redirect(site_url('home'));
		    }
		}
	}

}