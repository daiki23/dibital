<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

	public function tambah($foto)
	{
		$data = array(
					  'KD_SUPPLIER' => $this->input->post('kode_sp'),
					  'KD_OBAT'		=> $this->input->post('kode'),
					  'NAMA_OBAT'	=> $this->input->post('nama'),
					  'PRODUSEN'	=> $this->input->post('produsen'),
					  'HARGA'		=> $this->input->post('harga'),
					  'JUMLAH_STOK'	=> $this->input->post('stok'),
					  'FOTO'		=> $foto['file_name'] 
					 );

		$this->db->insert('obat', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit($kd_ob, $foto)
	{
		$data = array(
					'KD_SUPPLIER' => $this->input->post('kode_sp'),
					  'KD_OBAT'		=> $this->input->post('kode'),
					  'NAMA_OBAT'	=> $this->input->post('nama'),
					  'PRODUSEN'	=> $this->input->post('produsen'),
					  'HARGA'		=> $this->input->post('harga'),
					  'JUMLAH_STOK'	=> $this->input->post('stok'),
					  'FOTO'		=> $foto['file_name'] 
				);
		$this->db->where('KD_OBAT', $kd_ob)->update('obat', $data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus($kd_sp)
	{
		$this->db->where('KD_SUPPLIER', $kd_sp)->delete('obat');
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

	public function getDataSupp()
	{
		return $this->db->order_by('NAMA_SUPPLIER', 'ASC')->get('supplier')->result();
	}

}

/* End of file Obat_model.php */
/* Location: ./application/models/Obat_model.php */