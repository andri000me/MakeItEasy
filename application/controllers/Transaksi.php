<?php

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_transaksi_petani');
	}
    
	public function index()
		{
			$this->load->view('header');
			$this->load->view('transaksi_petani');
			$this->load->view('footer');
		}

	public function transpetani()
		{
			$data['tb_transaksi']=$this->model_transaksi_petani->tb_transaksi();
            $timezone = new DateTimeZone('Asia/Jakarta');
            
            $dt = new DateTime();
            $dt->setTimezone($timezone);
            $date = $dt->format('Y-m-d');
            $data['today'] = $date;

            $data['harga_today'] = $this->model_transaksi_petani->harga_today($date);
                
			$this->load->view('header');
			$this->load->view('transaksi_petaniREV', $data);
			// $this->load->view('footer');
		}

	function tambah_transaksi(){
    	$tanggal = $this->input->post('tanggal');
    	$nama_petani = $this->input->post('nama_petani');
    	$asal_daerah = $this->input->post('asal_daerah');
    	$kode_cabai = $this->input->post('cabai');
    	$berat_bs = $this->input->post('berat_bs');
    	$berat_kotor = $this->input->post('berat_kotor');

    	$harga_bs = $this->model_transaksi_petani->hargaBs($kode_cabai);
        $harga_bersih = $this->model_transaksi_petani->hargaBersih($kode_cabai);

    	$berat_bersih = $berat_kotor-$berat_bs;
    	$jumlah_uang = $berat_bersih*$harga_bersih + $berat_bs*$harga_bs;

    	$data = array(
    		'tanggal' => $tanggal,
    		'nama_petani' => $nama_petani,
    		'asal_daerah' => $asal_daerah,
    		'kode_cabai' => $kode_cabai,
    		'berat_bs' => $berat_bs,
    		'berat_kotor' => $berat_kotor,
    		'jumlah_uang' => $jumlah_uang);

    	$this->model_transaksi_petani->input_transaksi($data);
    	redirect('Transaksi/transpetani');
    }

    function edit_harga(){
    	$tb_transaksi = $this->model_transaksi_petani->tb_transaksi();
    	// $data = array(
    	// 		'data_cabai' => array(),
    	// 	);

		foreach ($tb_transaksi as $tb) {
			$data_cabai = array(
    				'kode' => $this->input->post('kode<?= $tb->kode ?>'),
    				'harga_bs' => $this->input->post('harga_bs<?= $tb->kode ?>'),
    				'harga_bersih' => $this->input->post('harga_bersih<?= $tb->kode ?>'),
    			);
		}

		foreach ($tb_transaksi as $tb) {
			# code...
		}

		

		$this->model_transaksi_petani->update_harga($data);
		redirect('Transaksi/transpetani');
    }

	public function transborong()
		{
			$this->load->view('header');
            $this->load->view('transaksi_pemborongREV');
            $this->load->view('footer');
		}

    function next_transaksi(){
        $tanggal = $this->input->post('tanggal');
        $id_petani = $this->input->post('id_petani');
        $kode_cabai = $this->input->post('kode_cabai');
        $berat_bs = $this->input->post('berat_bs');
        $berat_bersih = $this->input->post('berat_bersih');

        //menampilkan nama petani, daerah, dan saldo
        $data['petani'] = $this->model_transaksi_petani->petani($id_petani);

        //menghitung jumlah uang
        $hargaBs_today = $this->model_transaksi_petani->hargaBs_today($tanggal, $kode_cabai);
        $hargaBersih_today = $this->model_transaksi_petani->hargaBersih_today($tanggal, $kode_cabai);
        $harga_bs = $berat_bs * $hargaBs_today;
        $harga_bersih = $berat_bersih * $hargaBersih_today;
        $jumlah_uang = $harga_bs + $harga_bersih;
        $data['jumlah_uang'] = $jumlah_uang;

        //menghitung saldo sekarang
        $saldo = $this->model_transaksi_petani->saldo_petani($id_petani);
        $saldo_new = $saldo + $jumlah_uang;
        $data['saldo'] = $saldo_new;

        $this->load->view('transaksi_add', $data);
    }

    public function datapetani()
    {
        $this->load->view('header');
        $this->load->view('data_petani');
        $this->load->view('footer');
    }

    public function riwayatpetani()
    {
        $this->load->view('header');
        $this->load->view('riwayat_petani');
        $this->load->view('footer');   
    }

    public function riwayatpemborong()
    {
        $this->load->view('header');
        $this->load->view('riwayat_pemborong');
        $this->load->view('footer');   
    }
}
