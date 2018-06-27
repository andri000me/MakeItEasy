<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_perusahaan extends CI_Model {
	public function SubmitPengeluaran($data)
	{
		$this->db->insert('pengeluaran', $data);
	}

	public function SubmitPemasukan($data)
	{
		$this->db->insert('pemasukan', $data);
	}

	public function Pengeluaran()
	{
		$query = $this->db->query('SELECT * FROM pengeluaran ORDER BY id DESC');
		return $query->result();
	}

	public function Pemasukan()
	{
		$query = $this->db->query('SELECT * FROM pemasukan ORDER BY id DESC');
		return $query->result();
	}
}