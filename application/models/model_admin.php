<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_admin extends CI_Model {

	public function auth_admin($password, $id)
	{
		$query = $this->db->query("SELECT * FROM tb_admin WHERE id_admin='$id' AND password='$password' ");
		return $query;
	}

	function update_password($id, $data)
	{
		$this->db->where('id_admin', $id);
		$this->db->update('tb_admin', $data);
	}
}