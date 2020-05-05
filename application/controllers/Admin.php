<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE) {
			redirect(base_url('index.php/dashboard'));
		} else {
			$this->load->view('login_view');
		}
	}

	public function login()
	{
		if ($this->input->post('in')) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == TRUE ) {
				if ($this->admin_model->cek() == TRUE) {
					redirect('dashboard');
				} else {
					$data = $this->session->set_flashdata('notif', 'Login gagal');
					redirect('admin');
				}
			} else {
				$data = $this->session->set_flashdata('notif', validation_errors());
					redirect('admin');
			}
		}
	}

	public function logout()
	{
		$array = array(
			'username' => '',
			'logged_in'=> FALSE
		);
		
		$this->session->set_userdata( $array );
		redirect('admin');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */