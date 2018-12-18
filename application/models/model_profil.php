<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_profil extends CI_Model {

	public function tb_petani() {
		$query = $this->db->query("SELECT id, nama, nama_panggil, desa, no_telp, saldo, jaminan, kemitraan, tenggat FROM tb_petani ORDER BY id DESC");
		return $query->result();
	}

	public function tb_pembeli() {
		$query = $this->db->query("SELECT id, nama, alamat, no_telp, saldo FROM tb_pembeli ORDER BY id DESC");
		return $query->result();
	}

	public function profil_petani($id) {
		$query = $this->db->query("SELECT * FROM tb_petani WHERE id='$id'");
		return $query->row();
	}

	public function profil_pembeli($id) {
		$query = $this->db->query("SELECT * FROM tb_pembeli WHERE id='$id'");
		return $query->row();
	}

	public function transaksi_petani($id)	{
		$query = $this->db->query("SELECT a.id, a.tanggal, a.kode_cabai, a.berat_kotor, a.berat_bs, a.berat_susut, c.harga_bersih, c.harga_bs, a.bon, a.saldo FROM transaksi_petani a LEFT JOIN harga_cabai_petani c ON a.kode_cabai=c.kode_cabai AND a.tanggal=c.tanggal WHERE a.id_petani='$id'");
		return $query->result();
	}

	public function transaksi_pembeli($id)	{
		$query = $this->db->query("SELECT * FROM transaksi_pembeli WHERE id_pembeli='$id'");
		return $query->result();
	}

	public function count_petani()	{
		$query = $this->db->query("SELECT COUNT(id) as jumlah FROM tb_petani");
		return $query->row()->jumlah;
	}

	public function count_pembeli()	{
		$query = $this->db->query("SELECT COUNT(id) as jumlah FROM tb_pembeli");
		return $query->row()->jumlah;
	}
}
?>