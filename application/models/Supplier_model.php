<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getDataSupp()
	{
		return $this->db->order_by('NAMA_SUPPLIER', 'ASC')->get('supplier')->result();
	}

	public function tambah()
	{
		$data = array(
					'KD_SUPPLIER' 	=> $this->input->post('kode_sp'),
					'NAMA_SUPPLIER' => $this->input->post('nama_sp'),
					'ALAMAT'		=> $this->input->post('alamat_sp'),
					'KOTA'			=> $this->input->post('kota_sp'),
					'TELP'			=> $this->input->post('telp_sp')
				);
		$this->db->insert('supplier', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit($kd_sp)
	{
		$data = array(
					'KD_SUPPLIER' 	=> $this->input->post('kode_sp'),
					'NAMA_SUPPLIER' => $this->input->post('nama_sp'),
					'ALAMAT'		=> $this->input->post('alamat_sp'),
					'KOTA'			=> $this->input->post('kota_sp'),
					'TELP'			=> $this->input->post('telp_sp')
				);
		$this->db->where('KD_SUPPLIER', $kd_sp)->update('supplier', $data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus($kd_sp)
	{
		$this->db->where('KD_SUPPLIER', $kd_sp)->delete('supplier');
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_supp_by_kd($kd_sp){
		return $this->db->where('KD_SUPPLIER', $kd_sp)
						->get('supplier')
						->row();
	}
}

/* End of file Supplier_model.php */
/* Location: ./application/models/Supplier_model.php */