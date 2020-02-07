<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_profil extends CI_Model {

	public function tb_petani() {
		$query = $this->db->query("SELECT id, nama, nama_panggil, desa, no_telp, saldo, jaminan, kemitraan, tenggat FROM tb_petani ORDER BY id DESC");
		return $query->result();
	}

	public function tb_pembeli() {
		$query = $this->db->query("SELECT id, nama, alamat, no_telp, saldo FROM tb_pembeli ORDER BY id DESC");
		return $query->result();
	}

	public function profil_petani($id) {
		$query = $this->db->query("SELECT * FROM tb_petani WHERE id='$id'");
		return $query->row();
	}

	public function profil_pembeli($id) {
		$query = $this->db->query("SELECT * FROM tb_pembeli WHERE id='$id'");
		return $query->row();
	}

	public function transaksi_petani($id)	{
		$query = $this->db->query("SELECT a.id, a.tanggal, a.kode_cabai, a.berat_kotor, a.berat_bs, a.berat_susut, c.harga_bersih, c.harga_bs, a.bon, a.saldo, a.updated_at FROM transaksi_petani a LEFT JOIN harga_cabai_petani c ON a.kode_cabai=c.kode_cabai AND a.tanggal=c.tanggal WHERE a.id_petani='$id' ORDER BY a.tanggal ,a.updated_at ASC");
		return $query->result();
	}

	private function _get_list_transaksi_petani(){
		$this->db->select('a.id, a.tanggal, a.kode_cabai, a.berat_kotor, a.berat_bs, a.berat_susut, c.harga_bersih, c.harga_bs, a.bon, a.saldo, a.updated_at');
		$this->db->from('transaksi_petani a');
		$this->db->join('harga_cabai_petani c', 'a.kode_cabai=c.kode_cabai AND a.tanggal = c.tanggal', 'left' );
		$id = $_POST['id'];
		$this->db->where('a.id_petani', $id);
		$this->db->order_by('a.tanggal ASC', 'a.updated_at ASC');
	}

	public function transaksi_pembeli($id)	{
		$query = $this->db->query("SELECT * FROM transaksi_pembeli WHERE id_pembeli='$id'");
		return $query->result();
	}

	public function count_petani()	{
		$query = $this->db->query("SELECT COUNT(id) as jumlah FROM tb_petani");
		return $query->row()->jumlah;
	}

	public function count_pembeli()	{
		$query = $this->db->query("SELECT COUNT(id) as jumlah FROM tb_pembeli");
		return $query->row()->jumlah;
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