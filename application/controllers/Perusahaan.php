<?php

class Perusahaan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_perusahaan');	
	}

	public function index()
		{
			$data['pengeluaran'] = $this->model_perusahaan->Pengeluaran();
			$data['pemasukan'] = $this->model_perusahaan->Pemasukan();

			$this->load->view('header');
			$this->load->view('perusahaanYP', $data);
		}

	function Pengeluaran()
	{
		$tanggal = $this->input->post('tanggal');
		$jenis = $this->input->post('jenis');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');

		$data = array(
			'tanggal' => $tanggal,
			'jenis' => $jenis,
			'harga_satuan' => $harga,
			'jumlah' => $jumlah );

		$this->model_perusahaan->SubmitPengeluaran($data);
		redirect('Perusahaan');
	}

	function Pemasukan()
	{
		$tanggal = $this->input->post('tanggal');
		$jenis = $this->input->post('jenis');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');

		$data = array(
			'tanggal' => $tanggal,
			'jenis' => $jenis,
			'harga_satuan' => $harga,
			'jumlah' => $jumlah );

		$this->model_perusahaan->SubmitPemasukan($data);
		redirect('Perusahaan');
	}

	function Dashboard()
	{
		$this->load->view('header');
		$this->load->view('PerusahaanREV');
	}

}