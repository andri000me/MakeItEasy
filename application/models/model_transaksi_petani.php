<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_transaksi_petani extends CI_Model {
	public function tb_transaksi()
	{
		$query = $this->db->query("SELECT tanggal, nama_petani, asal_daerah, kode_cabai, berat_kotor, berat_bs, jumlah_uang FROM transaksi_petani");
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

  function tb_cabai(){
    $query = $this->db->query("SELECT kode, jenis, harga_bs, harga_bersih FROM tb_cabai");
      if($query->num_rows() > 0)
        {
          return $query->result();
        }
      else
        {
          return array();
        }
  }

  function dd_cabai()
    {
        // ambil data dari db
        $result = $this->db->get('tb_cabai');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[''] = 'Pilih Jenis Cabai';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->kode] = $row->jenis;
            }
        }
        return $dd;
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

  function hargaBS($kode_cabai){
    $query = $this->db->query("SELECT harga_bs FROM tb_cabai WHERE kode='$kode_cabai'");
      if($query->num_rows() > 0)
        {
          return $query->row()->harga_bs;
        }
      else
        {
          return array();
        }
  }

  function hargaBersih($kode_cabai){
    $query = $this->db->query("SELECT harga_bersih FROM tb_cabai WHERE kode='$kode_cabai'");
      if($query->num_rows() > 0)
        {
          return $query->row()->harga_bersih;
        }
      else
        {
          return array();
        }
  }

  function update_harga($data){
    $this->db->update_batch('tb_cabai', $data, 'kode');
  }
}
?>