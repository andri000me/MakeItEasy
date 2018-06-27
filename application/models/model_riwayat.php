<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_riwayat extends CI_Model {

	public function riwayat_transpetani($startdate, $enddate)
  	{
      $query = $this->db->query("SELECT a.id, a.id_petani, b.nama, b.desa, a.tanggal, a.kode_cabai, a.berat_kotor, a.berat_bs, c.harga_bersih, a.saldo FROM transaksi_petani a JOIN tb_petani b JOIN harga_cabai_petani c WHERE (a.tanggal BETWEEN '$startdate' AND '$enddate') AND a.id_petani=b.id AND a.kode_cabai=c.kode_cabai AND a.tanggal=c.tanggal");
      if($query->num_rows() > 0)
        {
          return $query->result();
        }
      else
        {
          return array();
        }
  	}

  	public function riwayat_transborong($startdate, $enddate)
  	{
      $query = $this->db->query("SELECT a.id, a.id_pembeli, b.nama, b.alamat, a.tanggal, a.kode, a.colly, a.kode, a.bersih, a.saldo, a.transferan, a.harga as harga_bersih FROM transaksi_pembeli a JOIN tb_pembeli b ON a.id_pembeli=b.id WHERE a.tanggal BETWEEN '$startdate' AND '$enddate'");
      if($query->num_rows() > 0)
        {
          return $query->result();
        }
      else
        {
          return array();
        }
  	}

    public function riwayat_transpetaniNonMitra($startdate, $enddate)
    {
      $query = $this->db->query("SELECT * FROM transaksi_petaninonmitra WHERE tanggal BETWEEN '$startdate' AND '$enddate'");
      if($query->num_rows() > 0)
        {
          return $query->result();
        }
      else
        {
          return array();
        }
    }

    public function riwayat_transpembeliNonMitra($startdate, $enddate)
    {
      $query = $this->db->query("SELECT * FROM transaksi_pembelinonmitra WHERE tanggal BETWEEN '$startdate' AND '$enddate'");
      if($query->num_rows() > 0)
        {
          return $query->result();
        }
      else
        {
          return array();
        }
    }

}
?>