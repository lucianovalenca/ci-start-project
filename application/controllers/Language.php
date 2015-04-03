<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function set($language)
	{

			// Save to session. Autoloaded library Language.php will get the session value and change locale.
			$this->session->set_userdata('language', $language);

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