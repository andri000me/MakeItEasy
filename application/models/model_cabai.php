<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_cabai extends CI_Model {
	
	public function cabai_petani($start, $end) {
		$query = $this->db->query("SELECT a.id, a.kode_cabai, a.tanggal, a.harga_bs, a.harga_bersih, b.jenis FROM harga_cabai_petani a JOIN tb_cabai b ON a.kode_cabai=b.kode WHERE a.tanggal BETWEEN '$start' AND '$end'");
		return $query->result();
	}

	private function _get_list_riwayat_cabai(){
		$this->db->select('a.id, a.kode_cabai, a.tanggal, a.harga_bs, a.harga_bersih, b.jenis');
		$this->db->from('harga_cabai_petani a');
		$this->db->join('tb_cabai b', 'a.kode_cabai=b.kode');
		if ($_POST['startdate']!='' && $_POST['enddate']!='') {
            $startdate = $_POST['startdate'];
            $enddate = $_POST['enddate'];
            $where = "a.tanggal BETWEEN '$startdate' AND '$enddate'";
           $this->db->where($where);
        }
	}

  private function _get_list_transaksi_changed(){
      $this->db->select('a.id, a.id_petani, b.nama, b.desa, a.tanggal, a.kode_cabai, a.berat_kotor, a.berat_bs, a.berat_susut, c.harga_bersih, c.harga_bs, a.saldo as saldo_transaksi, b.saldo as saldo_petani');
      $this->db->from('transaksi_petani a');
      $this->db->join('tb_petani b', 'a.id_petani=b.id');
      $this->db->join('harga_cabai_petani c', 'a.kode_cabai=c.kode_cabai');
      $this->db->where('a.tanggal=c.tanggal');

      $tanggal = $_POST['tanggal'];
      $kode_cabai = $_POST['kode_cabai'];

      $this->db->where('a.tanggal', $tanggal);
      $this->db->where('a.kode_cabai', $kode_cabai);
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

	public function tb_transpetani_update($tanggal, $kode_cabai)
	{
  		$query = $this->db->query("SELECT a.id, a.tanggal, a.id_petani, a.berat_bs, a.berat_kotor, a.berat_susut, a.kode_cabai, c.harga_bersih, c.harga_bs, a.saldo as saldo_trans, b.saldo as saldo_petani FROM transaksi_petani a JOIN harga_cabai_petani c ON a.kode_cabai=c.kode_cabai AND a.tanggal=c.tanggal INNER JOIN tb_petani b ON a.id_petani=b.id WHERE a.tanggal='$tanggal' AND a.kode_cabai='$kode_cabai'");
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
