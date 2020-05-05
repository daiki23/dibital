<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view']='transaksi_view';
			$data['transaksi'] = $this->transaksi_model->getDataTrans();
			$this->load->view('template_view', $data);
		} else {
			redirect('admin');
		}	
	}

	public function add()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view']='add_transaksi_view';
			$data['obat'] = $this->transaksi_model->getDataObat();
			$this->load->view('template_view', $data);
		} else {
			redirect('admin');
		}
	}

	public function insert()
	{
		$obat = $this->transaksi_model->get_obat_by_kd($this->input->post('kode'));
		$nama = $obat->NAMA_OBAT;
		$subtotal = $obat->HARGA;
		$jumlah = (int) $this->input->post('jumlah');
		$hasil = $subtotal * $jumlah;
		$data = array(
			'nama' => $nama,
			'jumlah' => $jumlah,
			'hasil' => $hasil,
			'subtotal' => $subtotal 
			);
		if ($this->transaksi_model->tambah($data) == TRUE) {
			$this->session->set_flashdata('notif', 'Berhasil menambahkan transaksi');
			redirect('transaksi');
		} else {
			$this->session->set_flashdata('notif', 'Gagal menambahkan transaksi');
			redirect('transaksi');
		}
	}

	public function detil()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'detil_transaksi_view';
			//ambil data pendaftar
			$kd_tr = $this->uri->segment(3);
			$data['detil'] = $this->transaksi_model->get_dettrans_by_kd($kd_tr);
			$data['detill'] = $this->transaksi_model->get_trans_by_kd($kd_tr);

			$this->load->view('template_view', $data);
		}
		else{
			redirect('admin');
		}
	}

	public function delete()
	{
		$kd_tr = $this->uri->segment(3);
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->transaksi_model->hapus($kd_tr) == TRUE) {
				$this->session->set_flashdata('notif', 'Berhasil menghapus transaksi');
				redirect('transaksi');
			} else {
				$this->session->set_flashdata('notif', 'Gagal menghapus transaksi');
				redirect('transaksi');
			}
		} else {
			redirect('admin');
		}
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */