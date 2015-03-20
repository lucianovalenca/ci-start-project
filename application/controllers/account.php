<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->login_model->check_login();
		$this->load->model('user_model');
	}

	public function index()
	{

		$userData = $this->user_model->get();
		$data['userData'] = array_shift($userData);
		$data['timezones'] = $this->master_model->get_timezones();

		$this->load->view('restricted/account/account.php', $data);
	}

	public function change_details()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$firstName 	= $this->input->post('firstName');
			$lastName 	= $this->input->post('lastName');
			$email 		= $this->input->post('email');
			$username 	= $this->input->post('username');
			$timezone 	= $this->input->post('timezone');

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('firstName', 'First name', 'required');

			// Form validation
			if($this->form_validation->run() == false)
			{
				$data['result'] = array('code' => 0, 'status' => 'error', 'message' => 'error in your form');
				$this->output->set_output(json_encode($data['result']));
				return false;
			}
			else if($this->user_model->check_exists(array('email' => $email)))
			{
				$data['result'] = array('code' => 0, 'status' => 'error', 'message' => 'email already on use');
				$this->output->set_output(json_encode($data['result']));
				return false;
			}
			else if($this->user_model->check_exists(array('username' => $username)))
			{
				$data['result'] = array('code' => 0, 'status' => 'error', 'message' => 'username not available');
				$this->output->set_output(json_encode($data['result']));
				return false;
			}
			else
			{
				// Update
				$updated = $this->user_model->update(array(
					'firstName' => $firstName,
					'lastName' 	=> $lastName,
					'email' 	=> $email,
					'username' 	=> $username,
					'timezone' 	=> $timezone,
				));

				if($updated)
				{
					$data['result'] = array('code' => 1, 'status' => 'success', 'message' => 'updated successfully');
					$this->output->set_output(json_encode($data['result']));
					return false;
				}
				else
				{
					$data['result'] = array('code' => 0, 'status' => 'error', 'message' => 'update failed');
					$this->output->set_output(json_encode($data['result']));
					return false;
				}
				
			}

		}
	}

	public function change_password()
	{

		$currentPassword 	= $this->input->post('currentPassword');
		$new_password 		= $this->input->post('password1');

		$this->form_validation->set_rules('currentPassword', 'Current password', 'required');
		$this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'required');

		// Form validation
		if($this->form_validation->run() == false)
		{
			$data['result'] = array('code' => 0, 'status' => 'error', 'message' => 'error in your form');
			$this->output->set_output(json_encode($data['result']));
			return false;
		}
		else
		{

			$logged = $this->session->userdata('logged');
			$userData = $this->user_model->get(
				array('userId' => $logged['userId'])
			);
			$userData = array_shift($userData);

			// If password is blank or correct
			if(empty($userData['password']) || hash_equals($userData['password'], crypt($currentPassword, $userData['password'])))
			{
				// Ok, update new password

				// Generate hash
				$hash = generate_hash($new_password);
				$updated = $this->user_model->update(array('password' => $hash));
				
				if($updated)
				{
					$data['result'] = array('code' => 1, 'status' => 'success', 'message' => 'Password successfully updated');
					$this->output->set_output(json_encode($data['result']));
					return false;
				}
				else
				{
					// Error, current password is wrong
					$data['result'] = array('code' => 0, 'status' => 'error', 'message' => 'Sorry, your current password is not correct');
					$this->output->set_output(json_encode($data['result']));
					return false;
				}

			}

		}

	}

}