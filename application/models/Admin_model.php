<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

	public function cek()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->where('USERNAME', $username)->where('PASSWORD', $password)->get('admin');

		if ($query->num_rows() > 0) {
			$data = array('username' => $username, 'logged_in' => TRUE);
			$this->session->set_userdata( $data );
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */