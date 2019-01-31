<?php

class Serial extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_cabai');
		$this->load->model('model_transaksi');
	}

	public function index()
		{
			$timezone = new DateTimeZone('Asia/Jakarta');
            
        $dt = new DateTime();
        $dt->setTimezone($timezone);
        $date = $dt->format('Y-m-d');
        $max_tanggal = $this->model_transaksi->max_tanggal();

		$data = array(
			'tb_cabaiActive' => $this->model_cabai->tb_cabaiActive(),
			'tb_cabai' => $this->model_cabai->tb_cabai(),
			'max_tanggal' => $max_tanggal,
            'harga_tanggal' => $this->model_transaksi->harga_today($max_tanggal),
			'harga_cabai_petani' => $this->model_cabai->hargaPetani($date),
			'dd_cabai' => $this->model_transaksi->dd_cabai(),
            'cabai_selected' => $this->input->post('cabai') ? $this->input->post('cabai') : '$row->jenis' // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
			 );
			$this->load->view('trySerialize', $data);
		}

	function submitSerial()
	{
		$cabai = $this->input->post('cabai');
		$bersih = $this->input->post('harga_bersih');
		$bs = $this->input->post('harga_bs');

		foreach ($cabai as $key) {
			echo $key;
		}
		foreach ($bersih as $key) {
			echo $key;
		}
		foreach ($bs as $key) {
			echo $key;
		}
	}
}