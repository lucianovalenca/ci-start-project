<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	/*
	|--------------------------------------------------------------------------
	| Create new user 
	|--------------------------------------------------------------------------
	|
	*/
	public function add()
	{
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$redirectUrl = $this->input->post('redirectUrl');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[16]');

		if($this->form_validation->run() == false)
		{
			$this->output->set_output(json_encode(array('result' => 0, 'message' => $this->form_validation->error_output())));
			return false;
		}
		else
		{
			// Generate hash
			$hash = $this->generate_hash($password);

			// Save
			$user_id = $this->user_model->insert(
				array('email' => $email, 'password' => $hash)
			);

		}
		
	}

}
