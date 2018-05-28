<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_transaksi extends CI_Model {
	public function tb_transpetani()
	{
  		$query = $this->db->query("SELECT a.id, a.id_petani, b.nama, b.desa, a.kode_cabai, a.berat_kotor, a.berat_bs, a.bon, b.saldo FROM transaksi_petani a JOIN tb_petani b WHERE a.id_petani=b.id");
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
      $query = $this->db->query("SELECT a.id, a.id_pembeli, b.nama, b.alamat, a.tanggal, a.colly, a.kode, a.bersih, c.harga_bersih, a.transferan, a.saldo FROM transaksi_pembeli a JOIN tb_pembeli b JOIN harga_cabai_pembeli c WHERE a.id_pembeli=b.id AND a.kode=c.kode_cabai AND a.tanggal=c.tanggal");
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
        $this->db->select('id, nama, desa, saldo');
        $this->db->limit(10);
        $this->db->from('tb_petani');
        $this->db->like('nama', $nama);
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

  function input_transaksi_pembeli($data){
  	$this->db->insert('transaksi_pembeli', $data);
  }

  function update_saldo_pembeli($data, $id){
    $this->db->where('id', $id);
    $this->db->update('tb_pembeli', $data);
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

  function harga_cabai($kode_cabai, $tanggal){
    $query = $this->db->query("SELECT harga_bs, harga_bersih FROM harga_cabai_petani WHERE kode_cabai='$kode_cabai' AND tanggal='$tanggal'");
        return $query->row();
  }

  function harga_pembeli_today($tanggal, $kode_cabai){
     $query = $this->db->query("SELECT harga_bersih FROM harga_cabai_pembeli WHERE kode_cabai='$kode_cabai' AND tanggal='$tanggal'");
        return $query->row()->harga_bersih;
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
                $dd[$row->kode] = $row->jenis;
            }
        }
        return $dd;
    }

}
?>