<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_barang extends CI_Model {

	public function tb_barang()
	{
		$query = $this->db->query("SELECT * FROM tb_bon");
		return $query->result();
	}

	function submitBarang($data)
	{
		$this->db->insert('tb_bon', $data);
	}

}