<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi2 extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_transaksi_petani');
	}

	public function index()
		{
			$data['tb_transaksi']=$this->model_transaksi_petani->tb_transaksi();
            $timezone = new DateTimeZone('Asia/Jakarta');
            
            $dt = new DateTime();
            $dt->setTimezone($timezone);
            $date = $dt->format('Y-m-d');
            $data['today'] = $date;

            $data['harga_today'] = $this->model_transaksi_petani->harga_today($date);

			$this->load->view('transaksi',$data);
		}

    public function autocomplete(){
        $this->load->view('autocomplete');
    }

	function get_petani(){
        if (isset($_GET['term'])) {
            $result = $this->model_transaksi_petani->search_petani($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama;
                echo json_encode($arr_result);
            }
        }
    }


    function tambah_transaksi(){
    	$tanggal = $this->input->post('tanggal');
    	$id_petani = $this->input->post('id_petani');
    	$kode_cabai = $this->input->post('kode_cabai');
    	$berat_bs = $this->input->post('berat_bs');
    	$berat_bersih = $this->input->post('berat_bersih');
    	$bon = $this->input->post('bon');

    	$data = array(
    		'tanggal' => $tanggal,
    		'id_petani' => $id_petani,
    		'kode_cabai' => $kode_cabai,
    		'berat_bs' => $berat_bs,
    		'berat_bersih' => $berat_bersih,
    		'bon' => $bon );

    	$this->model_transaksi_petani->input_transaksi($data);
    	redirect('Transaksi2');
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
}
?>