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

	public function tb_cabai()	{
		$query = $this->db->query("SELECT * FROM tb_cabai");
		return $query->result();
	}

	public function tb_cabaiActive()	{
		$query = $this->db->query("SELECT * FROM tb_cabai WHERE aktif='1'");
		return $query->result();
	}

	public function tb_transpetani($tanggal)
	{
  		$query = $this->db->query("SELECT a.id, a.tanggal, a.id_petani, a.berat_bs, a.berat_kotor, a.berat_susut, a.kode_cabai, c.harga_bersih, c.harga_bs, a.saldo as saldo_trans, b.saldo as saldo_petani FROM transaksi_petani a JOIN harga_cabai_petani c ON a.kode_cabai=c.kode_cabai AND a.tanggal=c.tanggal INNER JOIN tb_petani b ON a.id_petani=b.id WHERE a.tanggal='$tanggal'");
  		if($query->num_rows() > 0)
  			{
  				return $query->result();
  			}
  		else
  			{
  				return array();
  			}
	}

	function submitPetani($data)	{
		$this->db->insert_batch('harga_cabai_petani', $data);
	}

	function tambahCabai($data)	{
		$this->db->insert('tb_cabai', $data);
	}

	function update_saldoTrans($data) {

		// $this->db->where_in('id', $id);
		// $this->db->delete('transaksi_petani');
		// $this->db->insert_batch('transaksi_petani', $data);

		$this->db->update_batch('transaksi_petani', $data, 'id');
	}

	function update_saldoPetani($data)	{
		$this->db->update_batch('tb_petani', $data, 'id');
	}

	function cek_harga_cabai($kode, $tanggal)	{
		$query = $this->db->query("SELECT kode_cabai FROM harga_cabai_petani WHERE kode_cabai='$kode' AND tanggal='$tanggal'");
		return $query->num_rows();
	}

	function get_jenis($id)	{
		$query = $this->db->query("SELECT * FROM tb_cabai WHERE kode='$id'");
		return $query->row();
	}

	function get_harga($id)	{
		$query = $this->db->query("SELECT a.*, b.jenis FROM harga_cabai_petani a JOIN tb_cabai b ON a.kode_cabai=b.kode WHERE a.id='$id'");
		return $query->row();
	}

	function update_jenis($kode, $data)	{
		$this->db->where('kode', $kode);
      	$this->db->update('tb_cabai', $data);
	}

	function update_harga($id, $data)	{
		$this->db->where('id', $id);
      	$this->db->update('harga_cabai_petani', $data);
	}

}
?>
