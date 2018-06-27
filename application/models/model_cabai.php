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
  		$query = $this->db->query("SELECT a.id, a.id_petani, a.berat_bs, a.berat_kotor, a.kode_cabai, c.harga_bersih, c.harga_bs, a.saldo as saldo_trans, b.saldo as saldo_petani FROM transaksi_petani a JOIN harga_cabai_petani c ON a.kode_cabai=c.kode_cabai AND a.tanggal=c.tanggal INNER JOIN tb_petani b ON a.id_petani=b.id WHERE a.tanggal='$tanggal'");
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
		$this->db->update_batch('transaksi_petani', $data, 'id');
	}

	function update_saldoPetani($data)	{
		$this->db->update_batch('tb_petani', $data, 'id');
	}

}
?>
