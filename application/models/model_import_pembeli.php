<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_import_pembeli extends CI_Model{
	
	public function select()
	{
		$this->db->order_by('id','DESC');
		$query = $this->db->get('tb_pembeli');
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert_batch('tb_pembeli', $data);
	}
	// public function tb_petani() {
	// 	$query = $this->db->query("SELECT id, nama, nama_panggil, desa, no_telp, saldo, jaminan, kemitraan, tenggat FROM tb_petani ORDER BY id DESC");
	// 	return $query->result();
	// }

	public function checkNama($nama)
	{
		//??
		$query = $this->db->query("SELECT * FROM tb_pembeli WHERE NOT EXISTS (SELECT nama FROM tb_pembeli WHERE nama = '$nama')");
		return $query->result();

		
	}

	public function checkAlamat($alamat)
	{
		//??
		$query = $this->db->query("SELECT * FROM tb_pembeli WHERE NOT EXISTS (SELECT alamat FROM tb_pembeli WHERE alamat = '$alamat')");
		return $query->result();
	}

	public function count_pembeli()	{
		$query = $this->db->query("SELECT COUNT(id) as jumlah FROM tb_pembeli");
		return $query->row()->jumlah;
	}	
}

?>