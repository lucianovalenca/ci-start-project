<?php

class Login_model extends CI_Model
{

	/*
	|--------------------------------------------------------------------------
	| Login
	|--------------------------------------------------------------------------
	|
	| @param userId
	|
	*/

	public function login($userData)
	{
		
		// Get user details by userId
		$query = $this->db->get_where('user', $userData);
		$row = $query->row();

		if($row->userId)
		{
			$sess_array = array(
				'userId' => $row->userId,
				'firstName' => $row->firstName,
				'username' => $row->username,
				'email' => $row->email
			);
			
			// Session
			$this->session->set_userdata('logged', $sess_array);
			return array('result' => 1);
		}
		else
		{
			return array('result' => 0, 'message' => 'userId not found');
		}
	}

	public function check_login($redirect = false)
	{
		$logged = $this->session->userdata('logged');
		if(isset($logged['userId']) == false)
		{
			if($redirect)
			{
				$this->logout('login?return_to=' . $_SERVER['REQUEST_URI']);
			}
			else
			{
				$this->logout('login');
			}
		}
	}

	public function logout($redirect = null)
	{
		$this->session->sess_destroy();

		if($redirect == null)
		{
			redirect('/');
		}
		else
		{
			redirect($redirect);
		}

	}

}