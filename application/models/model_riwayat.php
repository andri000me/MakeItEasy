<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_riwayat extends CI_Model {

	public function riwayat_transpetani($startdate, $enddate)
  	{
      $query = $this->db->query("SELECT a.id, a.id_petani, b.nama, b.desa, a.tanggal, a.kode_cabai, a.berat_kotor, a.berat_bs, a.berat_susut, c.harga_bersih, c.harga_bs, a.saldo FROM transaksi_petani a JOIN tb_petani b JOIN harga_cabai_petani c WHERE (a.tanggal BETWEEN '$startdate' AND '$enddate') AND a.id_petani=b.id AND a.kode_cabai=c.kode_cabai AND a.tanggal=c.tanggal");
      if($query->num_rows() > 0)
        {
          return $query->result();
        }
      else
        {
          return array();
        }
  	}

  public function riwayat_transpetanibon($startdate, $enddate)
    {
      $query = $this->db->query("SELECT a.id, a.id_petani, b.nama, b.desa, a.tanggal, a.bon, a.saldo FROM transaksi_petani a JOIN tb_petani b ON a.id_petani=b.id WHERE (a.tanggal BETWEEN '$startdate' AND '$enddate') AND a.bon IS NOT NULL");
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

    public function edit_transpetani($id)
    {
      $query = $this->db->query("SELECT a.id, a.id_petani, a.bon, b.nama, b.desa, a.saldo as saldo_trans, b.saldo as saldo_petani, a.tanggal, a.kode_cabai, a.berat_kotor, a.berat_bs, a.berat_susut, c.harga_bersih, c.harga_bs, d.jenis FROM transaksi_petani a LEFT JOIN harga_cabai_petani c ON a.kode_cabai=c.kode_cabai AND a.tanggal=c.tanggal INNER JOIN tb_petani b ON a.id_petani=b.id INNER JOIN tb_cabai d ON a.kode_cabai=d.kode WHERE a.id='$id'");

      return $query->row();
    }

    public function edit_transborong($id)
    {
      $query = $this->db->query("SELECT a.id, a.id_pembeli, b.nama, b.alamat, b.saldo as saldo_pembeli, a.tanggal, a.colly, a.kode, a.bersih, a.harga, a.transferan, a.saldo as saldo_trans FROM transaksi_pembeli a LEFT JOIN tb_pembeli b ON a.id_pembeli=b.id WHERE a.id='$id'");

      return $query->row();
    }

    public function edit_transpetanibon($id)
    {
      $query = $this->db->query("SELECT a.id, a.id_petani, a.bon, a.saldo as saldo_trans, b.saldo as saldo_petani, a.tanggal FROM transaksi_petani a INNER JOIN tb_petani b ON a.id_petani=b.id WHERE a.id='$id'");

      return $query->row();
    }

    public function edit_transNonMitra($id, $table)
    {
      $query = $this->db->query("SELECT a.*, b.jenis FROM $table a JOIN tb_cabai b ON a.kode_cabai = b.kode WHERE id = '$id'");

      return $query->row();
    }

    function delete_transpetani($id)  {
      $this->db->where('id',$id);
      $this->db->delete('transaksi_petani');
    }

    function delete_transNonMitra($id, $table) {
      $this->db->where('id',$id);
      $this->db->delete($table);
    }

    function delete_bon($id)  {
      $this->db->where('id_transaksi',$id);
      $this->db->delete('transaksi_bon');
    }

    function get_saldo_petani($id)  {
      $query = $this->db->query("SELECT saldo FROM tb_petani WHERE id='$id'");
    }

    function update_saldo_petani($data, $id)  {
      $this->db->where('id', $id);
      $this->db->update('tb_petani', $data);
    }

    function update_saldo_pembeli($data, $id)  {
      $this->db->where('id', $id);
      $this->db->update('tb_pembeli', $data);
    }

    function dd_cabai()
    {
        // ambil data dari db
        $this->db->order_by('jenis', 'asc');
        $result = $this->db->get('tb_cabai');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        // $dd[''] = 'Pilih Jenis Cabai';
        // if ($result->num_rows() > 0) {
        //     foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
        //         $dd[$row->kode] = $row->jenis." (".$row->kode.")";
        //     }
        // }
        return $result->result();
    }

    function update_setoran_petani($data, $id)  {
      $this->db->where('id', $id);
      $this->db->update('transaksi_petani', $data);
    }

    function update_setoran_nonMitra($data, $id, $table)  {
      $this->db->where('id', $id);
      $this->db->update($table, $data);
    }

    function update_setoran_pembeli($data, $id)  {
      $this->db->where('id', $id);
      $this->db->update('transaksi_pembeli', $data);
    }

    function detail_bon($id)  {
      $query = $this->db->query("SELECT a.id, a.id_transaksi, a.tanggal, a.barang, a.harga, a.kuantitas, b.nama, b.desa FROM transaksi_bon a JOIN tb_petani b ON a.id_petani = b.id WHERE id_transaksi = '$id'");
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