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
			$data = array(
				'tb_barang' => $this->model_barang->tb_barang() );

			$this->load->view('header');
			$this->load->view('barangbon', $data);
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

	function edit_barang()	{
		$id = $this->input->post('id');
		$query = $this->model_barang->edit_barang($id);

		echo json_encode($query);
	}

	function delete_barangBon()	{
		$id = $this->input->post('id');

		$this->model_barang->delete_barangBon($id);
		echo 1;
	}

	function updateBarang()	{
		$id_barang = $this->input->post('id_barang');
		$barang = $this->input->post('barang');
		$harga = $this->input->post('harga');

		$data = array(
			'barang' => $barang,
			'harga' => $harga );

		$this->model_barang->updateBarang($id_barang, $data);

		echo 'berhasil';
	}


}
?>