<?php

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang');
		
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
				'tanggal' => $this->input->post('tanggal'),
				'barang' => $this->input->post('barang'),
				'harga_beli' => $this->input->post('harga_beli'),
				'harga_jual' => $this->input->post('harga_jual'),
				'stok' => $this->input->post('stok'),
				'jumlah_bayar' => $this->input->post('jumlah_bayar')
			);

			$this->model_barang->submitBarang($data);

			redirect('Barang');
		}

	public function get_barang()
		{
	        $barang = $this->input->get('barang[]');
	        $query = $this->model_barang->search_barang($barang);
	        echo json_encode($query);
		}


}
?>