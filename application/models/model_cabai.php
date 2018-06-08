<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_cabai extends CI_Model {
	
	public function cabai_petani($start, $end) {
		$query = $this->db->query("SELECT a.id, a.kode_cabai, a.tanggal, a.harga_bs, a.harga_bersih, b.jenis FROM harga_cabai_petani a JOIN tb_cabai b ON a.kode_cabai=b.kode WHERE a.tanggal BETWEEN '$start' AND '$end'");
		return $query->result();
	}

	public function hargaPetani($today) {
		$query = $this->db->query("SELECT a.id, a.kode_cabai, a.tanggal, a.harga_bs, a.harga_bersih, b.jenis FROM harga_cabai_petani a JOIN tb_cabai b ON a.kode_cabai=b.kode WHERE a.tanggal='$today'");
		return $query->result();
	}

	public function cabai_pembeli($start, $end) {
		$query = $this->db->query("SELECT a.id, a.kode_cabai, a.tanggal, a.harga_bs, a.harga_bersih, b.jenis FROM harga_cabai_pembeli a JOIN tb_cabai b ON a.kode_cabai=b.kode WHERE a.tanggal BETWEEN '$start' AND '$end'");
		return $query->result();
	}

	public function hargaPembeli($today) {
		$query = $this->db->query("SELECT a.id, a.kode_cabai, a.tanggal, a.harga_bs, a.harga_bersih, b.jenis FROM harga_cabai_pembeli a JOIN tb_cabai b ON a.kode_cabai=b.kode WHERE a.tanggal='$today'");
		return $query->result();
	}

	public function tb_cabai()	{
		$query = $this->db->query("SELECT * FROM tb_cabai");
		return $query->result();
	}

	public function tb_cabaiActive()	{
		$query = $this->db->query("SELECT * FROM tb_cabai WHERE aktif='1'");
		return $query->result();
	}

	function submitPetani($data)	{
		$this->db->insert_batch('harga_cabai_petani', $data);
	}

	function submitPembeli($data)	{
		$this->db->insert_batch('harga_cabai_pembeli', $data);
	}

	function tambahCabai($data)	{
		$this->db->insert('tb_cabai', $data);
	}

}
?>
