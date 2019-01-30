<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_transaksi extends CI_Model {
	public function tb_transpetani()
	{
  		$query = $this->db->query("SELECT a.id, a.id_petani, b.nama, b.desa, a.tanggal, a.berat_bs, a.berat_kotor, a.berat_susut, a.kode_cabai, c.harga_bersih, c.harga_bs, a.bon, a.saldo, b.kemitraan FROM transaksi_petani a LEFT JOIN harga_cabai_petani c ON a.kode_cabai=c.kode_cabai AND a.tanggal=c.tanggal INNER JOIN tb_petani b ON a.id_petani=b.id ORDER BY a.id DESC LIMIT 50");
  		if($query->num_rows() > 0)
  			{
  				return $query->result();
  			}
  		else
  			{
  				return array();
  			}
	}

  public function tb_transborong()
  {
      $query = $this->db->query("SELECT a.id, a.id_pembeli, b.nama, b.alamat, a.tanggal, a.colly, a.kode, a.bersih, a.harga, a.transferan, a.saldo FROM transaksi_pembeli a LEFT JOIN tb_pembeli b ON a.id_pembeli=b.id ORDER BY a.id DESC LIMIT 50");
      if($query->num_rows() > 0)
        {
          return $query->result();
        }
      else
        {
          return array();
        }
  }

  // public function edit_transpetani($id)
  // {
  //   $query = $this->db->query("SELECT a.id, a.id_petani, b.nama, b.desa, a.saldo as saldo_trans, b.saldo as saldo_petani, a.tanggal, a.kode_cabai, a.berat_kotor, a.berat_bs, c.harga_bersih, c.harga_bs FROM transaksi_petani a LEFT JOIN harga_cabai_petani c ON a.kode_cabai=c.kode_cabai AND a.tanggal=c.tanggal INNER JOIN tb_petani b ON a.id_petani=b.id WHERE a.id='$id'");

  //   return $query->row();
  // } 

  public function edit_transborong($id)
  {
    $query = $this->db->query("SELECT a.id, a.id_pembeli, b.nama, b.alamat, b.saldo as saldo_pembeli, a.tanggal, a.colly, a.kode, a.bersih, a.harga, c.jenis, a.transferan, a.saldo as saldo_trans FROM transaksi_pembeli a LEFT JOIN tb_pembeli b ON a.id_pembeli=b.id INNER JOIN tb_cabai c ON a.kode=c.kode WHERE a.id='$id'");

    return $query->row();
  }

	function search_petani($nama){
        $this->db->select('id, nama, desa, saldo, kemitraan');
        $this->db->limit(10);
        $this->db->from('tb_petani');
        $this->db->like('nama', $nama);
        $this->db->order_by('nama', 'ASC');
        return $this->db->get()->result_array();
    }

  function search_petaniMitra($nama){
        $this->db->select('id, nama, desa, saldo, kemitraan');
        $this->db->limit(10);
        $this->db->from('tb_petani');
        $this->db->like('nama', $nama);
        $this->db->where('kemitraan', 1);
        $this->db->order_by('nama', 'ASC');
        return $this->db->get()->result_array();
    }

  function search_pembeli($nama){
        $this->db->select('id, nama, alamat, saldo');
        $this->db->limit(10);
        $this->db->from('tb_pembeli');
        $this->db->like('nama', $nama);
        $this->db->order_by('nama', 'ASC');
        return $this->db->get()->result_array();
    }

  function input_transaksi_petani($data){
    $this->db->insert('transaksi_petani', $data);
    $insert_id = $this->db->insert_id();

    return $insert_id;
  }

  function update_saldo_petani($data, $id){
    $this->db->where('id', $id);
    $this->db->update('tb_petani', $data);
  }

  function update_transaksi_petani($data, $id){
    $this->db->where('id', $id);
    $this->db->update('transaksi_petani', $data);
  }

  function input_transaksi_pembeli($data){
  	$this->db->insert('transaksi_pembeli', $data);
  }

  function update_saldo_pembeli($data, $id){
    $this->db->where('id', $id);
    $this->db->update('tb_pembeli', $data);
  }

  function update_transaksi_pembeli($data, $id){
    $this->db->where('id', $id);
    $this->db->update('transaksi_pembeli', $data);
  }

  function input_transaksi_petaniNonMitra($data){
    $this->db->insert('transaksi_petaninonmitra', $data);
  }

  function input_transaksi_pembeliNonMitra($data){
    $this->db->insert('transaksi_pembelinonmitra', $data);
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

  function harga_petani($tanggal, $kode_cabai){
    $query = $this->db->query("SELECT harga_bs, harga_bersih FROM harga_cabai_petani WHERE tanggal='$tanggal' AND kode_cabai='$kode_cabai'");
        $result = $query->row();
        return $result;
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

  function dd_cabai()
    {
        // ambil data dari db
        $this->db->order_by('jenis', 'asc');
        $result = $this->db->get('tb_cabai');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[''] = 'Pilih Jenis Cabai';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->kode] = $row->jenis." (".$row->kode.")";
            }
        }
        return $dd;
    }

  function max_tanggal()  {
    $query = $this->db->query("SELECT MAX(tanggal) as max_tanggal FROM harga_cabai_petani");
    return $query->row()->max_tanggal;
  }

  // function delete_transpetani($id)  {
  //     $this->db->where('id',$id);
  //     $this->db->delete('transaksi_petani');
  // }

  function delete_transborong($id) {
      $this->db->where('id',$id);
      $this->db->delete('transaksi_pembeli');
  }

  function tb_transpetaniNonMitra() {
    $query = $this->db->query("SELECT * FROM transaksi_petaninonmitra ORDER BY id DESC");
    return $query->result();
  }

  function tb_transpembeliNonMitra() {
    $query = $this->db->query("SELECT * FROM transaksi_pembelinonmitra ORDER BY id DESC");
    return $query->result();
  }

  function inputBatchBon($data)  {
    $this->db->insert_batch('transaksi_bon', $data);
  }

  function inputUangBon($data)  {
    $this->db->insert('transaksi_bon', $data);
  }

  function saldoPetani($id) {
    $query = $this->db->query("SELECT saldo FROM tb_petani WHERE id='$id'");
    return $query->row();
  }

  function trans_bon()  {
    $query = $this->db->query("SELECT a.id, a.tanggal, a.id_petani, a.barang, a.harga, a.kuantitas, a.ambil_uang, b.nama, b.desa FROM transaksi_bon a JOIN tb_petani b ON a.id_petani=b.id ORDER BY a.id DESC LIMIT 100");
    return $query->result();
  }

  function add_petani($data)  {
    $this->db->insert('tb_petani', $data);
  }

  function add_pembeli($data)  {
    $this->db->insert('tb_pembeli', $data);
  }

}
?>