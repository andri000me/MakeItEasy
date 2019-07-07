<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatabel extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('model_barang');
    }
    function index(){
        $this->load->view('welcome_message');
    }
 
    function data_barang(){
        $data=$this->model_barang->tb_barang();
        echo json_encode($data);
    }
 
    function get_barang(){
        $kobar=$this->input->get('id');
        $data=$this->model_barang->edit_barang($kobar);
        echo json_encode($data);
    }
 
    function simpan_barang(){
        $kobar=$this->input->post('kobar');
        $nabar=$this->input->post('nabar');
        $harga=$this->input->post('harga');
        $data=$this->model_barang->submitBarang($kobar,$nabar,$harga);
        echo json_encode($data);
    }
 
    function update_barang(){
        $kobar=$this->input->post('kobar');
        $nabar=$this->input->post('nabar');
        $harga=$this->input->post('harga');

        $barang = array(
        	'barang' => $nabar,
        	'harga' => $harga );
        $data=$this->model_barang->updateBarang($kobar, $barang);
        echo json_encode($data);
    }
 
    function hapus_barang(){
        $kobar=$this->input->post('kode');
        $data=$this->model_barang->delete_barang($kobar);
        echo json_encode($data);
    }
 
}