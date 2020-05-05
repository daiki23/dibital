<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

	public function getJumlahSupp()
	{
		return $this->db->from('supplier')->count_all_results();
	}

	public function getJumlahObat()
	{
		return $this->db->from('obat')->count_all_results();
	}

	public function getJumlahTrans()
	{
		return $this->db->from('transaksi')->count_all_results();
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */