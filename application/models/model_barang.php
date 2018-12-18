<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_barang extends CI_Model {

	public function tb_barang()
	{
		$query = $this->db->query("SELECT * FROM tb_bon ORDER BY id DESC");
		return $query->result();
	}

	function submitBarang($data)
	{
		$this->db->insert('tb_bon', $data);
	}

	function search_barang($barang){
        $this->db->select('id, barang, harga');
        $this->db->limit(10);
        $this->db->from('tb_bon');
        $this->db->like('barang', $barang);
        $this->db->order_by('barang', 'ASC');
        return $this->db->get()->result_array();
    }

    public function price_barang($id)
	{
		$query = $this->db->query("SELECT barang, harga FROM tb_bon WHERE id='$id'");
		return $query->row();
	}

	public function delete_barangBon($id)	{
		$this->db->where('id', $id);
		$this->db->delete('tb_bon');
	}

	public function edit_barang($id)	{
		$query = $this->db->query("SELECT * FROM tb_bon WHERE id='$id'");
		return $query->row();
	}

	public function updateBarang($id, $data)	{
		$this->db->where('id', $id);
		$this->db->update('tb_bon', $data);
	}
}