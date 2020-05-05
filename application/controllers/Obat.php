<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('obat_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view']='obat_view';
			$data['obat'] = $this->obat_model->getDataObat();
			$data['supplier'] = $this->obat_model->getDataSupp();
			$this->load->view('template_view', $data);
		} else {
			redirect('admin');
		}	
	}

	public function add()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view']='add_obat_view';
			$data['supplier'] = $this->obat_model->getDataSupp();
			$this->load->view('template_view', $data);
		} else {
			redirect('admin');
		}
	}

	public function insert()
	{
		$this->form_validation->set_rules('kode_sp', 'Kode Supplier', 'trim|required');
		$this->form_validation->set_rules('kode', 'Kode Obat', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Obat', 'trim|required');
		$this->form_validation->set_rules('produsen', 'Produsen', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('stok', 'Stok', 'trim|required');

		if ($this->form_validation->run() == TRUE ) {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_sizes'] = '2000';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				if($this->obat_model->tambah($this->upload->data()) == TRUE) {
					$data['main_view'] = 'obat_view';
					$this->session->set_flashdata('notif', 'Berhasil menambahkan obat');
					redirect('obat');
				} else {
					$data['main_view'] = 'obat_view';
					$this->session->set_flashdata('notif', 'Gagal menambahkan obat');
					redirect('obat');
				}
			} else {
				$data['main_view'] = 'obat_view';
				$this->session->set_flashdata('notif', $this->upload->display_errors());
				redirect('obat');
			}
		} else {
			$data['main_view'] = 'obat_view';
			$this->session->set_flashdata('notif', validation_errors());
			redirect('obat');
		}
	}

	public function edit()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'edit_obat_view';
			//ambil data pendaftar
			$kd_ob = $this->uri->segment(3);
			$data['detil'] = $this->obat_model->get_obat_by_kd($kd_ob);

			$this->load->view('template_view', $data);
		}
		else{
			redirect('admin');
		}
	}

	public function update($kd_ob)
	{
		$this->form_validation->set_rules('kode_sp', 'Kode Supplier', 'trim|required');
		$this->form_validation->set_rules('kode', 'Kode Obat', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Obat', 'trim|required');
		$this->form_validation->set_rules('produsen', 'Produsen', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('stok', 'Stok', 'trim|required');

		if ($this->form_validation->run() == TRUE ) {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_sizes'] = '2000';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				if($this->obat_model->edit($kd_ob, $this->upload->data()) == TRUE) {
					$data['main_view'] = 'obat_view';
					$this->session->set_flashdata('notif', 'Berhasil mengubah obat');
					$kd_ob = $this->uri->segment(3);
					redirect('obat');
				} else {
					$data['main_view'] = 'obat_view';
					$this->session->set_flashdata('notif', 'Gagal menambahkan obat');
					$kd_ob = $this->uri->segment(3);
					redirect('obat');
				}
			} else {
				$data['main_view'] = 'obat_view';
				$this->session->set_flashdata('notif', $this->upload->display_errors());
				$kd_ob = $this->uri->segment(3);
				redirect('obat');
			}
		} else {
			$data['main_view'] = 'obat_view';
			$this->session->set_flashdata('notif', validation_errors());
			$kd_ob = $this->uri->segment(3);
			redirect('obat');
		}
	}

	public function delete()
	{
		$kd_sp = $this->uri->segment(3);
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->obat_model->hapus($kd_sp) == TRUE) {
				$this->session->set_flashdata('notif', 'Berhasil menghapus obat');
				redirect('obat');
			} else {
				$this->session->set_flashdata('notif', 'Gagal menghapus obat');
				redirect('obat');
			}
		} else {
			redirect('admin');
		}
	}

}

/* End of file Obat.php */
/* Location: ./application/controllers/Obat.php */