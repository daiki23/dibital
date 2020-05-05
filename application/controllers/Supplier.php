<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('supplier_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view']='supplier_view';
			$data['supplier'] = $this->supplier_model->getDataSupp();
			$this->load->view('template_view', $data);
		} else {
			redirect('admin');
		}
	}

	public function add()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view']='add_supplier_view';
			$this->load->view('template_view', $data);
		} else {
			redirect('admin');
		}
	}

	public function insert()
	{
		if ($this->input->post('insert')) {
			$this->form_validation->set_rules('kode_sp', 'Kode Supplier', 'trim|required');
			$this->form_validation->set_rules('nama_sp', 'Nama Supplier', 'trim|required');
			$this->form_validation->set_rules('alamat_sp', 'Alamat Supplier', 'trim|required');
			$this->form_validation->set_rules('kota_sp', 'Kota Supplier', 'trim|required');
			$this->form_validation->set_rules('telp_sp', 'Telp. Supplier', 'trim|required');

			if ($this->form_validation->run() == TRUE ) {
				if ($this->supplier_model->tambah() == TRUE) {
					$this->session->set_flashdata('notif', 'Berhasil menambah supplier');
					redirect('supplier');
				} else {
					$this->session->set_flashdata('notif', 'Gagal menambah supplier');
					redirect('supplier');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('supplier/add');
			}
		}
	}

	public function delete()
	{
		$kd_sp = $this->uri->segment(3);
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->supplier_model->hapus($kd_sp) == TRUE) {
				$this->session->set_flashdata('notif', 'Berhasil menghapus supplier');
				redirect('supplier');
			} else {
				$this->session->set_flashdata('notif', 'Gagal menghapus supplier');
				redirect('supplier');
			}
		} else {
			redirect('admin');
		}
	}

	public function update($kd_sp)
	{
		$this->form_validation->set_rules('nama_sp', 'Nama Supplier', 'trim|required');
		$this->form_validation->set_rules('alamat_sp', 'Alamat Supplier', 'trim|required');
		$this->form_validation->set_rules('kota_sp', 'Kota Supplier', 'trim|required');
		$this->form_validation->set_rules('telp_sp', 'Telp. Supplier', 'trim|required');
		if ($this->form_validation->run() == TRUE ) {
			if ($this->supplier_model->edit($kd_sp) == TRUE) {
				$this->session->set_flashdata('notif', 'Berhasil memperbarui data supplier');
				$kd_sp = $this->uri->segment(3);
				redirect('supplier');
			} else {
				$kd_sp = $this->uri->segment(3);
				redirect('supplier');
			}
		} else {
			$kd_sp = $this->uri->segment(3);
			redirect('supplier');
		}
	}

	public function edit()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'edit_supplier_view';
			//ambil data pendaftar
			$kd_sp = $this->uri->segment(3);
			$data['detil'] = $this->supplier_model->get_supp_by_kd($kd_sp);

			$this->load->view('template_view', $data);
		}
		else{
			redirect('admin');
		}
	}

}

/* End of file Supplier.php */
/* Location: ./application/controllers/Supplier.php */