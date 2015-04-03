<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	/*
	|--------------------------------------------------------------------------
	| User signup 
	|--------------------------------------------------------------------------
	|
	*/

	public function index()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$firstName = $this->input->post('firstName');
			$email = $this->input->post('email');
			$password = $this->input->post('password1');
			$redirectUrl = $this->input->post('redirectUrl');

			//$this->form_validation->set_rules('firstName', 'Name', 'trim|xss_clean');
			//$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			//$this->form_validation->set_rules('username', 'Username', 'trim|xss_clean');

			// Password confirm field
			if($this->config->item('confirm_password', 'general_settings'))
			{
				$this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');
				$this->form_validation->set_rules('password2', 'Password Confirmation', 'required');
			}
			else
			{
				$this->form_validation->set_rules('password1', 'Password', 'required');
			}


			// Validation
			if($this->form_validation->run() == false)
			{
				$this->output->set_output(json_encode(array('result' => 0, 'message' => $this->form_validation->error_output())));
				return false;
			}
			else
			{
				try
				{
					$userId = $this->signup(array(
						'firstName' => $firstName,
						'email' 	=> $email,
						'password' 	=> $password
					));
					
					if(!$userId)
					{
						throw new Exception('cannot add new user');
					}
					else
					{

						if($this->config->item('login_after_register', 'general_settings'))
						{
							// Login and redirect
							$this->load->model('login_model');
							$this->login_model->login(array('userId' => $userId));
							redirect($this->config->item('login_after_register_page', 'general_settings'));
						}
						else
						{
							// Success message
							$data['result'] = array('code' => 1, 'status' => 'success', 'message' => 'Successfully registered');
							$this->load->view('open/signup', $data);
						}

					}

				}
				catch (Exception $e)
				{
					// Error
					$data['result'] = array('code' => 0, 'status' => 'success', 'message' => 'Error, not registered');
					$this->load->view('open/signup', $data);
				}
			}

		}
		else
		{
			$this->load->view('open/signup');
		}
	}

	private function signup($data)
	{
		
		// Generate hash
		$hash = generate_hash($data['password']);

		$activated = ($this->config->item('auto_activate', 'general_settings')) ? '1' : '0';

		// Check if fields are unique then save
		if($this->user_model->check_exists(array('email' => $data['email'])))
		{
			$userId = false;
		}
		else
		{
			$userId = $this->user_model->insert(array(
				'firstName' => $data['firstName'],
				'email' 	=> $data['email'],
				'password' 	=> $hash,
				'activated' => $activated
			));

			// Auto-generate username
			if($this->config->item('generate_username', 'general_settings'))
			{
				$email_parts = explode('@', $data['email']);
				$username = $email_parts[0] . '-' . $userId;
				$this->user_model->update(array('username' => $username), array('userId' => $userId));
			}
		}
		return $userId;
	}

}