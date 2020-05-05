<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['dataSupp'] = $this->dashboard_model->getJumlahSupp();
			$data['dataObat'] = $this->dashboard_model->getJumlahObat();
			$data['dataTrans'] = $this->dashboard_model->getJumlahTrans();
			$data['main_view']='dashboard_view';
			$this->load->view('template_view', $data);
		} else {
			redirect('admin');
		}
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */