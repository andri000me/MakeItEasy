<?php

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang');

		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('Login'));
		}
		
	}

	public function index()
		{
			$this->load->view('header');
			$this->load->view('barangbon');
		}

	public function data_barang()
	{
        $data=$this->model_barang->tb_barang();
        echo json_encode($data);
    }

	public function submitBarang()
		{
			$data = array(
				'barang' => $this->input->post('barang'),
				'harga' => $this->input->post('harga'),
			);

			$this->model_barang->submitBarang($data);

			redirect('Barang');
		}

	public function get_barang()
		{
	        $barang = $this->input->get('barang');
	        $query = $this->model_barang->search_barang($barang);
	        echo json_encode($query);
		}

	function show_barang(){
        $kobar=$this->input->get('id');
        $data=$this->model_barang->edit_barang($kobar);
        echo json_encode($data);
    }

	function delete_barangBon()	{
		$id = $this->input->post('id');

		$this->model_barang->delete_barangBon($id);
		echo 1;
	}

	function hapus_barang()
	{
        $kobar=$this->input->post('kode');
        $data=$this->model_barang->delete_barangBon($kobar);
        echo json_encode($data);
    }

	function update_barang()
	{
        $kobar=$this->input->post('kobar');
        $nabar=$this->input->post('nabar');
        $harga=$this->input->post('harga');

        $barang = array(
        	'barang' => $nabar,
        	'harga' => $harga );

        $data=$this->model_barang->updateBarang($kobar, $barang);
        echo json_encode($data);
    }


}
?>