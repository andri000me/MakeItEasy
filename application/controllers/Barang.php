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

}
?>