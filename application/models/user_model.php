<?php

class User_model extends CI_Model
{

	/**
	* Get user data
	* If param not set, get from user session
	* @param array
	*/
	
	public function get($data = null)
	{
		if($data == null)
		{
			$logged = $this->session->userdata('logged');
			$data = array('userId' => $logged['userId']);
		}
		$this->db->select('user.*'); 
		$query = $this->db->get_where('user', $data);
		return $query->result_array();
	}

	/**
	* @param array
	*/

	public function insert($data)
	{
		$this->db->insert('user', $data); 
		return $this->db->insert_id();
	}

	/**
	* @param array
	*/

	public function update($data, $where = null)
	{
		if($where == null)
		{
			$logged = $this->session->userdata('logged');
			$where = array('userId' => $logged['userId']);
		}
		$this->db->update('user', $data, $where);
		return $this->db->affected_rows() > 0;
	}

	/**
	*
	* Check if the value is unique
	*
	* @param array
	*/

	public function check_exists($data)
	{
		$logged = $this->session->userdata('logged');

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($data);
		
		if(isset($logged['userId']) && !empty($logged['userId']))
		{
			$this->db->where('userId !=', $logged['userId']);
		}

		$query = $this->db->get();

		return $query->num_rows() > 0;
	}

}