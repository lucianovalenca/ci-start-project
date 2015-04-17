<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	/*
	|--------------------------------------------------------------------------
	| Login 
	|--------------------------------------------------------------------------
	|
	*/

	public function index()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{

			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$redirectUrl = $this->input->post('redirectUrl');

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[16]');

			// Form validation
			if($this->form_validation->run() == false)
			{
				$data['result'] = array('code' => 0, 'status' => 'error', 'message' => 'error in your form');
				$this->load->view('open/login', $data);
			}
			else
			{

				$userData = $this->user_model->get(
					array('email' => $email)
				);
				$userData = array_shift($userData);

				// Hashing the password with its hash as the salt returns the same hash
				if(isset($userData['password']) && hash_equals($userData['password'], crypt($password, $userData['password'])))
				{
					// Login successfully, redirect
					$this->login_model->login(array('userId' => $userData['userId']));
					redirect($this->config->item('logged_home', 'general_settings'));
				}
				else
				{
					// Login error
					$data['result'] = array('code' => 0, 'status' => 'error', 'message' => 'Invalid email or password');
					$this->load->view('open/login', $data);
				}

				return false;
			}

		}
		else
		{
			$this->load->view('open/login');
		}
	}

	/*
	|--------------------------------------------------------------------------
	| Facebook login
	|--------------------------------------------------------------------------
	|
	*/

	public function facebook()
	{
		
	}

	/*
	|--------------------------------------------------------------------------
	| Password recovery 
	|--------------------------------------------------------------------------
	|
	*/

	public function forgot_password()
	{
		$this->load->view('open/forgot_password');
	}

	/*
	|--------------------------------------------------------------------------
	| Logout
	|--------------------------------------------------------------------------
	|
	*/

	public function logout()
	{
		$this->login_model->logout();
	}

}
