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

	function search_barang($barang){
        $this->db->select('id, barang, harga_jual, stok');
        $this->db->limit(10);
        $this->db->from('tb_bon');
        $this->db->like('barang', $barang);
        $this->db->where('stok != 0');
        $this->db->order_by('barang', 'ASC');
        return $this->db->get()->result_array();
    }

}