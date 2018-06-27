<?php

class Cabai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_cabai');
		$this->load->model('model_transaksi');
		
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

		$this->load->view('header');
		$this->load->view('cabai_harga_jenis', $data);
	}

	function submitHargaPetani()	{
		$tanggal = $this->input->post('tanggal');
		$kode = $this->input->post('cabai[]');
		$harga_bs = $this->input->post('harga_bs[]');
		$harga_bersih = $this->input->post('harga_bersih[]');

		$i=0;
		foreach ($kode as $key => $val) {
			$data1[$i]['kode_cabai'] = $val;
			$data1[$i]['harga_bs'] = $harga_bs[$key];
			$data1[$i]['harga_bersih'] = $harga_bersih[$key];
			$data1[$i]['tanggal'] = $tanggal;
			$i++;
		}
		$this->model_cabai->submitPetani($data1);

		$transpetani = $this->model_cabai->tb_transpetani($tanggal);
		if (!empty($transpetani)) {
			$j=0;
			foreach ($transpetani as $key) {
				$id_transaksi = $key->id;
				$id_petani = $key->id_petani;
				$jumlah_uang = $key->harga_bs * $key->berat_bs + $key->harga_bersih * ($key->berat_kotor - $key->berat_bs);
				$saldo_petani = $key->saldo_petani;
				$new_saldo = $saldo_petani + $jumlah_uang;

				$data2[$j]['id'] = $id_transaksi;
				$data2[$j]['saldo'] = $new_saldo;

				$data3[$j]['id'] = $id_petani;
				$data3[$j]['saldo'] = $new_saldo;

				$j++;
			}

			$this->model_cabai->update_saldoTrans($data2);
			$this->model_cabai->update_saldoPetani($data3);
		}
		
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