<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}

	public function tambah($data)
	{
		$this->db->insert('transaksi', array(
			
			'KD_TRANSAKSI'	=> $this->input->post('kd_transaksi'),
			'NAMA_PEMBELI'	=> $this->input->post('nama'),
			'TOTAL'	=> $data['hasil'],
			'TGL_BELI'	=> $this->input->post('tanggal')
			));
		$this->db->insert('detil_transaksi', array(
			'KD_TRANSAKSI'	=> $this->input->post('kd_transaksi'),
			'KD_OBAT'	=> $this->input->post('kode'),
			'NAMA_OBAT'	=> $this->input->post('nama_obat'),
			'JUMLAH'	=> $this->input->post('jumlah'),
			'SUB_TOTAL'	=> $data['subtotal']
			));
		$jumlah = $this->input->post('jumlah');
		$kode = $this->input->post('kode');
		$this->db->query("UPDATE obat SET JUMLAH_STOK = JUMLAH_STOK - '$jumlah' WHERE KD_OBAT = '$kode'");
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus($kd_tr)
	{
		$this->db->where('KD_TRANSAKSI', $kd_tr)->delete('detil_transaksi');
		$this->db->where('KD_TRANSAKSI', $kd_tr)->delete('transaksi');
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_obat_by_kd($kd_ob){
		return $this->db->where('KD_OBAT', $kd_ob)
						->get('obat')
						->row();
	}

	public function getDataObat()
	{
		return $this->db->order_by('NAMA_OBAT', 'ASC')->get('obat')->result();
	}

	public function getDataTrans()
	{
		return $this->db->order_by('KD_TRANSAKSI', 'DESC')->get('transaksi')->result();
	}

	public function get_dettrans_by_kd($kd_tr){
		return $this->db->where('KD_TRANSAKSI', $kd_tr)
						->get('detil_transaksi')
						->row();
	}

	public function get_trans_by_kd($kd_tr){
		return $this->db->where('KD_TRANSAKSI', $kd_tr)
						->get('transaksi')
						->row();
	}
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */