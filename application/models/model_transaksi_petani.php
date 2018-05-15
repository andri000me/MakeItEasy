<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_transaksi_petani extends CI_Model {
	public function tb_transaksi()
	{
		$query = $this->db->query("SELECT a.id_petani, b.nama, b.desa, a.kode_cabai, a.berat_kotor, a.berat_bs, a.bon, b.saldo FROM transaksi_petani a JOIN tb_petani b WHERE a.id_petani=b.id");
  		if($query->num_rows() > 0)
  			{
  				return $query->result();
  			}
  		else
  			{
  				return array();
  			}
	}

	function search_petani($nama){
        $this->db->like('nama', $nama , 'both');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_petani')->result();
    }

    function input_transaksi($data){
    	$this->db->insert('transaksi_petani', $data);
    }

  function harga_today($date){
    $query = $this->db->query("SELECT a.kode, a.jenis, b.harga_bs, b.harga_bersih FROM tb_cabai a JOIN harga_cabai_petani b WHERE a.kode=b.kode_cabai AND b.tanggal='$date' ORDER BY a.jenis ASC");
      if($query->num_rows() > 0)
        {
          return $query->result();
        }
      else
        {
          return array();
        }
  }

  function petani($id_petani){
    $query = $this->db->query("SELECT nama, desa FROM tb_petani WHERE id='$id_petani'");
      if($query->num_rows() > 0)
        {
          return $query->row();
        }
      else
        {
          return array();
        }
  }

  function saldo_petani($id_petani){
    $query = $this->db->query("SELECT saldo FROM tb_petani WHERE id='$id_petani'");
      if($query->num_rows() > 0)
        {
          return $query->row()->saldo;
        }
      else
        {
          return array();
        }
  }

  function hargaBS_today($tanggal, $kode_cabai){
    $query = $this->db->query("SELECT a.harga_bs FROM harga_cabai a JOIN tb_cabai b WHERE a.id_cabai=b.id AND a.tanggal='$tanggal' AND b.kode='$kode_cabai'");
      if($query->num_rows() > 0)
        {
          return $query->row()->harga_bs;
        }
      else
        {
          return array();
        }
  }

  function hargaBersih_today($tanggal, $kode_cabai){
    $query = $this->db->query("SELECT a.harga_bersih FROM harga_cabai a JOIN tb_cabai b WHERE a.id_cabai=b.id AND a.tanggal='$tanggal' AND b.kode='$kode_cabai'");
      if($query->num_rows() > 0)
        {
          return $query->row()->harga_bersih;
        }
      else
        {
          return array();
        }
  }
}
?>