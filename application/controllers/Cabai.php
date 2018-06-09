<?php

class Cabai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_cabai');
		
	}

	public function index()
		{
			$this->load->view('header');
			$this->load->view('harga_cabebon');
			$this->load->view('footer');
		}

	function riwayatPetani()	{
			$startdate = $this->input->post('start');
	    	$enddate = $this->input->post('end');

	    	$data = array(
	    		'riwayat_cabai' =>  $this->model_cabai->cabai_petani($startdate, $enddate),
	    		'startdate' => $startdate,
	    		'enddate' => $enddate );

			$this->load->view('header');
			$this->load->view('cabai_riwayatPetani', $data);
	}

	function riwayatPembeli()	{
		$startdate = $this->input->post('start');
	    	$enddate = $this->input->post('end');

	    	$data = array(
	    		'riwayat_cabai' =>  $this->model_cabai->cabai_pembeli($startdate, $enddate),
	    		'startdate' => $startdate,
	    		'enddate' => $enddate );

			$this->load->view('header');
			$this->load->view('cabai_riwayatPembeli', $data);
	}

	function hargaJenis()	{
		$timezone = new DateTimeZone('Asia/Jakarta');
            
        $dt = new DateTime();
        $dt->setTimezone($timezone);
        $date = $dt->format('Y-m-d');

		$data = array(
			'tb_cabaiActive' => $this->model_cabai->tb_cabaiActive(),
			'tb_cabai' => $this->model_cabai->tb_cabai(),
			'today' => $date,
			'harga_cabai_petani' => $this->model_cabai->hargaPetani($date),
			'harga_cabai_pembeli' => $this->model_cabai->hargaPembeli($date),
			 );

		$this->load->view('header');
		$this->load->view('cabai_harga_jenis', $data);
	}

	function submitHargaPetani()	{
		$tanggal = $this->input->post('tanggal');
		$kode = $this->input->post('kode[]');
		$harga_bs = $this->input->post('harga_bs[]');
		$harga_bersih = $this->input->post('harga_bersih[]');

		$i=0;
		foreach ($kode as $key => $val) {
			$data[$i]['kode_cabai'] = $val;
			$data[$i]['harga_bs'] = $harga_bs[$key];
			$data[$i]['harga_bersih'] = $harga_bersih[$key];
			$data[$i]['tanggal'] = $tanggal;
			$i++;
		}

		$this->model_cabai->submitPetani($data);
		
		redirect('Cabai/hargaJenis');
	}

	function submitHargaPembeli()	{
		$tanggal = $this->input->post('tanggal');
		$kode = $this->input->post('kode[]');
		$harga_bs = $this->input->post('harga_bs[]');
		$harga_bersih = $this->input->post('harga_bersih[]');

		$i=0;
		foreach ($kode as $key => $val) {
			$data[$i]['kode_cabai'] = $val;
			$data[$i]['harga_bs'] = $harga_bs[$key];
			$data[$i]['harga_bersih'] = $harga_bersih[$key];
			$data[$i]['tanggal'] = $tanggal;
			$i++;
		}

		$this->model_cabai->submitPembeli($data);
		
		redirect('Cabai/hargaJenis');
	}

	function tambahCabai()	{
		$kode_cabai = $this->input->post('kode_cabai');
		$jenis_cabai = $this->input->post('jenis_cabai');

		$data = array(
			'kode' => $kode_cabai ,
			'jenis' => $jenis_cabai );

		$this->model_cabai->tambahCabai($data);

		redirect('Cabai/hargaJenis');
	}

}

?>