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
			redirect('Cabai/hargaJenis');
		}

	function riwayatPetani()	{
			$this->load->view('header');
			$this->load->view('cabai_riwayatPetani');
	}

	public function list_riwayat_cabai()
    {
        $column_order = array(null,'a.tanggal','b.jenis', 'a.kode_cabai', 'a.harga_bs', 'a.harga_bersih', null); //set column field database for datatable orderable
        $column_search = array('b.jenis','a.kode_cabai'); //set column field database for datatable searchable just firstname , lastname , address are searchable
        $list = $this->model_cabai->get_datatables($column_search, $column_order, '_get_list_riwayat_cabai');
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->tanggal;
            $row[]= $key->jenis;
            $row[] = $key->kode_cabai;
            $row[] = number_format($key->harga_bs,0,',','.');
            $row[] = number_format($key->harga_bersih,0,',','.');

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" title="Edit" href="javascript:void(0)" onclick="editHarga('."'".$key->id."'".')">Edit</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_cabai->count_all('_get_list_riwayat_cabai'),
                        "recordsFiltered" => $this->model_cabai->count_filtered($column_search, $column_order, '_get_list_riwayat_cabai'),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function list_transaksi_changed(){
    	$column_order = array(null,'a.tanggal','b.id_petani', 'b.nama', 'a.kode_cabai', null, null, null, 'a.saldo', 'b.saldo'); //set column field database for datatable orderable
        $column_search = array('b.nama','a.saldo', 'b.saldo'); //set column field database for datatable searchable just firstname , lastname , address are searchable
        $list = $this->model_cabai->get_datatables($column_search, $column_order, '_get_list_transaksi_changed');
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
        	$berat_bersih = $key->berat_kotor - $key->berat_bs - $key->berat_susut;
        	$jumlah_uang = ($berat_bersih * $key->harga_bersih) + ($key->berat_bs * $key->harga_bs);

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->tanggal;
            $row[] = $key->id_petani;
            $row[] = $key->nama;
            $row[] = $key->kode_cabai;
            $row[] = $key->berat_bs;
            $row[] = $berat_bersih;
            $row[] = number_format($jumlah_uang,0,',','.');
            $row[] = number_format($key->saldo_transaksi,0,',','.');
            $row[] = number_format($key->saldo_petani,0,',','.');

            //add html for action
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_cabai->count_all('_get_list_transaksi_changed'),
                        "recordsFiltered" => $this->model_cabai->count_filtered($column_search, $column_order, '_get_list_transaksi_changed'),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);	
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
		$kode_cabai = $this->input->post('kode_cabai');
		$harga_bersih = $this->input->post('harga_bersih');
		$harga_bs = $this->input->post('harga_bs');

		$data = array(
			'harga_bersih' => $harga_bersih,
			'harga_bs' => $harga_bs);


		//untuk update nilai saldo_petani dan saldo_trans
		//ambil harga lama
		$transpetani = $this->model_cabai->tb_transpetani_update($tanggal, $kode_cabai);

		// simpan harga baru
		$this->model_cabai->update_harga($id, $data);

		if (!empty($transpetani)) {
			$j=0;
			foreach ($transpetani as $key) {
				$id_transaksi = $key->id;
				$id_petani = $key->id_petani;
				$jumlah_uang = $key->harga_bs * $key->berat_bs + $key->harga_bersih * ($key->berat_kotor - $key->berat_bs - $key->berat_susut );
				$new_jumlah_uang = $harga_bs * $key->berat_bs + $harga_bersih * ($key->berat_kotor - $key->berat_bs - $key->berat_susut );
				$saldo_petani = $key->saldo_petani;
				// $saldo_trans = $key->saldo_trans;
				$new_saldo_petani = $saldo_petani + ($new_jumlah_uang - $jumlah_uang);
				// $new_saldo_trans = $saldo_trans + ($new_jumlah_uang - $jumlah_uang);

				$data2[$j]['id'] = $id_transaksi;
				$data2[$j]['saldo'] = $new_saldo_petani;
				date_default_timezone_set('Asia/Jakarta');
				$data2[$j]['updated_at'] = date('Y-m-d H:i:s');

				$data3[$j]['id'] = $id_petani;
				$data3[$j]['saldo'] = $new_saldo_petani;

				$j++;
			}

			$this->model_cabai->update_saldoPetani($data3);
			$this->model_cabai->update_saldoTrans($data2);
		}

		$return_data = array(
			'tanggal' => $tanggal,
			'kode_cabai' => $kode_cabai 
		);

		echo json_encode($return_data);
	}

	public function ConfirmEdit()
	{
		$this->load->view('cabai_confirmEdit');
	}

}

?>