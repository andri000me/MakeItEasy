<?php
class Excel_import_model extends CI_Model{
	
	function select()
	{
		$this->db->order_by('id','DESC');
		$query = $this->db->get('tb_petani');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('tb_petani', $data);
	}
	// public function tb_petani() {
	// 	$query = $this->db->query("SELECT id, nama, nama_panggil, desa, no_telp, saldo, jaminan, kemitraan, tenggat FROM tb_petani ORDER BY id DESC");
	// 	return $query->result();
	// }
}

?>