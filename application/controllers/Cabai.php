<?php

class Cabai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_cabai');
		$this->load->model('model_transaksi');

		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('Login'));
		}
		
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
		$tanggal = $this->input->post("tanggal");
		$counter = $this->input->post("counter");

		//mengambil nilai kode, harga_bs, dan harga_bersih dari Serialize ajax dan memasukkannya ke array
		$kode_cabai = $this->input->post('cabai');
		$bs = $this->input->post('harga_bs');
		$bersih = $this->input->post('harga_bersih');

		//jika kode tidak benilai unik, maka false
		if (count($kode_cabai) == count(array_unique($kode_cabai))) {
			$state = 1;
			foreach ($kode_cabai as $key => $val) {
				$number_row = $this->model_cabai->cek_harga_cabai($val, $tanggal);

				if ($number_row > 0)	{
					$state = 0;
					break;
				}
			}

			if ($state == 1) {
				$i=0;
				foreach ($kode_cabai as $key => $val) {

					$data1[$i]['kode_cabai'] = $val;
					$data1[$i]['harga_bs'] = $bs[$key];
					$data1[$i]['harga_bersih'] = $bersih[$key];
					$data1[$i]['tanggal'] = $tanggal;
					$i++;
				}

				$this->model_cabai->submitPetani($data1);

				//untuk update nilai saldo petani, jika pada saat input setoran, harga cabai belum diinputkan
				$transpetani = $this->model_cabai->tb_transpetani($tanggal);
				if (!empty($transpetani)) {
					$j=0;
					foreach ($transpetani as $key) {

						$id_transaksi = $key->id;
						$id_petani = $key->id_petani;
						$jumlah_uang = $key->harga_bs * $key->berat_bs + $key->harga_bersih * ($key->berat_kotor - $key->berat_bs - $key->berat_susut);
						$saldo_petani = $key->saldo_petani;
						$new_saldo = $saldo_petani + $jumlah_uang;

						// $id_trans[$j] = $id_transaksi;
						// $data2[$j]['tanggal'] = $key->tanggal;
						// $data2[$j]['id_petani'] = $id_petani;
						// $data2[$j]['kode_cabai'] = $key->kode_cabai;
						// $data2[$j]['berat_kotor'] = $key->berat_kotor;
						// $data2[$j]['berat_bs'] = $key->berat_bs;
						// $data2[$j]['berat_susut'] = $key->berat_susut;
						// $data2[$j]['saldo'] = $new_saldo;


						$data2[$j]['id'] = $id_transaksi;
						$data2[$j]['saldo'] = $new_saldo;

						$data3[$j]['id'] = $id_petani;
						$data3[$j]['saldo'] = $new_saldo;

						$j++;
					}

					$this->model_cabai->update_saldoTrans($data2);
					$this->model_cabai->update_saldoPetani($data3);
				}
				echo 'input harga cabai berhasil';
			}
			else echo 'Mohon ulangi pengisian, harga cabai telah diinputkan sebelumnya';
		}
		else {
			echo 'Mohon ulangi pengisian, harga cabai telah diinputkan sebelumnya';
		}
		
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

		echo 1;
	}

	function get_jenis()	{
		$id_cabai = $this->input->post('id');
		$query = $this->model_cabai->get_jenis($id_cabai);

		echo json_encode($query);
	}

	function get_harga()	{
		$id_cabai = $this->input->post('id');
		$query = $this->model_cabai->get_harga($id_cabai);

		echo json_encode($query);
	}

	function update_jenis()	{
		$kode = $this->input->post('kode');
		$jenis = $this->input->post('jenis');

		$data = array('jenis' => $jenis);

		$this->model_cabai->update_jenis($kode, $data);

		echo 1;
	}

	function update_harga()	{
		$tanggal = $this->input->post('tanggal');
		$id = $this->input->post('id');
		$harga_bersih = $this->input->post('harga_bersih');
		$harga_bs = $this->input->post('harga_bs');

		$data = array(
			'harga_bersih' => $harga_bersih,
			'harga_bs' => $harga_bs);

		$this->model_cabai->update_harga($id, $data);

		//untuk update nilai saldo_petani dan saldo_trans
		$transpetani = $this->model_cabai->tb_transpetani($tanggal);
		if (!empty($transpetani)) {
			$j=0;
			foreach ($transpetani as $key) {
				$id_transaksi = $key->id;
				$id_petani = $key->id_petani;
				$jumlah_uang = $key->harga_bs * $key->berat_bs + $key->harga_bersih * ($key->berat_kotor - $key->berat_bs - $key->berat_susut );
				$new_jumlah_uang = $harga_bs * $key->harga_bs + $harga_bersih * ($key->berat_kotor - $key->berat_bs - $key->berat_susut );
				$saldo_petani = $key->saldo_petani;
				$saldo_trans = $key->saldo_trans;
				$new_saldo_petani = $saldo_petani - $jumlah_uang + $new_jumlah_uang;
				$new_saldo_trans = $saldo_trans - $jumlah_uang + $new_jumlah_uang;

				$data2[$j]['id'] = $id_transaksi;
				$data2[$j]['saldo'] = $new_saldo_trans;

				$data3[$j]['id'] = $id_petani;
				$data3[$j]['saldo'] = $new_saldo_petani;

				$j++;
			}

			$this->model_cabai->update_saldoTrans($data2);
			$this->model_cabai->update_saldoPetani($data3);
		}

		echo 1;
	}

}

?>