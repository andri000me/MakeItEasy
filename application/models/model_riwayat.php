<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_riwayat extends CI_Model {

  var $order = array('id' => 'desc'); // default order

//RIWAYAT TRANSAKSI PETANI (SETORAN)
  private function _get_list_setoran_petani()
  {
      $this->db->select('a.id, a.id_petani, b.nama, b.desa, a.tanggal, a.kode_cabai, a.berat_kotor, a.berat_bs, a.berat_susut, c.harga_bersih, c.harga_bs, a.saldo');
      $this->db->from('transaksi_petani a');
      $this->db->join('tb_petani b', 'a.id_petani=b.id');
      $this->db->join('harga_cabai_petani c', 'a.kode_cabai=c.kode_cabai');
      $this->db->where('a.tanggal=c.tanggal');

      if ($_POST['startdate']!='' && $_POST['enddate']!='') {
            $startdate = $_POST['startdate'];
            $enddate = $_POST['enddate'];
            $where = "a.tanggal BETWEEN '$startdate' AND '$enddate'";
           $this->db->where($where);
        }
  }


//END RIWAYAT TRANSAKSI PETANI (SETORAN)


//RIWAYAT TRANSAKSI PETANI (BON)
  private function _get_list_bon_petani()
  {
    $this->db->select('a.id, a.id_petani, b.nama, b.desa, a.tanggal, a.bon, a.saldo');
    $this->db->from('transaksi_petani a');
    $this->db->join('tb_petani b', 'a.id_petani=b.id');
    $bon="a.bon IS NOT NULL";
    $this->db->where($bon);

    if ($_POST['startdate']!='' && $_POST['enddate']!='') {
            $startdate = $_POST['startdate'];
            $enddate = $_POST['enddate'];
            $where = "a.tanggal BETWEEN '$startdate' AND '$enddate'";
           $this->db->where($where);
        }
  }
//END RIWAYAT TRANSAKSI PETANI (BON)


//RIWAYAT TRANSAKSI PEMBELI
  private function _get_list_trans_pembeli()
  {
    $this->db->select('a.id, a.id_pembeli, b.nama, b.alamat, a.tanggal, a.kode, a.colly, a.kode, a.bersih, a.saldo, a.transferan, a.harga as harga_bersih');
    $this->db->from('transaksi_pembeli a');
    $this->db->join('tb_pembeli b', 'a.id_pembeli=b.id');

    if ($_POST['startdate']!='' && $_POST['enddate']!='') {
            $startdate = $_POST['startdate'];
            $enddate = $_POST['enddate'];
            $where = "a.tanggal BETWEEN '$startdate' AND '$enddate'";
           $this->db->where($where);
        }
  }
//END RIWAYAT TRANSAKSI PEMBELI

  
//RIWAYAT TRANSAKSI PETANI NON MITRA
  private function _get_list_trans_petani_nonMitra()
  {
    $this->db->from('transaksi_petaninonmitra');

    if ($_POST['startdate']!='' && $_POST['enddate']!='') {
            $startdate = $_POST['startdate'];
            $enddate = $_POST['enddate'];
            $where = "tanggal BETWEEN '$startdate' AND '$enddate'";
           $this->db->where($where);
        }
  }
//END RIWAYAT TRANSAKSI PETANI NON MITRA

//RIWAYAT TRANSAKSI PEMBELI NON MITRA
  private function _get_list_trans_pembeli_nonMitra()
  {
    $this->db->from('transaksi_pembelinonmitra');

    if ($_POST['startdate']!='' && $_POST['enddate']!='') {
            $startdate = $_POST['startdate'];
            $enddate = $_POST['enddate'];
            $where = "tanggal BETWEEN '$startdate' AND '$enddate'";
           $this->db->where($where);
        }
  }
//RIWAYAT TRANSAKSI PEMBELI NON MITRA

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
      $query = $this->db->query("SELECT a.id, a.id_transaksi, a.tanggal, a.barang, a.harga, a.kuantitas, b.nama, b.desa, a.keterangan FROM transaksi_bon a JOIN tb_petani b ON a.id_petani = b.id WHERE id_transaksi = '$id'");
      if($query->num_rows() > 0)
        {
          return $query->result();
        }
      else
        {
          return array();
        }
    }


  //FOR DATATABLES
    private function _get_datatables_query($column_search, $column_order)
    {
        $i = 0;
        foreach ($column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($column_search, $column_order, $list)
    {
        $this->$list();
        $this->_get_datatables_query($column_search, $column_order);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($column_search, $column_order, $list)
    {
      $this->$list();
      $this->_get_datatables_query($column_search, $column_order);
      $query = $this->db->get();
      return $query->num_rows();
    }
 
    public function count_all($list)
    {
      $this->$list();
      return $this->db->count_all_results();
    }

  //END FOR DATATABLES

}
?>