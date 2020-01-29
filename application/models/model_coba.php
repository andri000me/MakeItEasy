<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_coba extends CI_Model {

	var $table = 'tb_petani';
    var $column_order = array('a.id_petani','b.desa', null); //set column field database for datatable orderable
    var $column_search = array('b.nama','b.desa'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_table_query()
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
 
    private function _get_datatables_query()
    {
        $i = 0;
        foreach ($this->column_search as $item) // loop column 
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
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
    	$this->_get_table_query();
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
    	$this->_get_table_query();
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->_get_table_query();
        return $this->db->count_all_results();
    }
 
    public function get_by_id($id)
    {
        $this->_get_table_query();
        $this->db->where('a.id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
}