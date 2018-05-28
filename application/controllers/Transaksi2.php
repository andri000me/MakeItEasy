<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi2 extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_transaksi');
	}

	public function index()
		{
			$data['tb_transaksi']=$this->model_transaksi->tb_transaksi();
            $timezone = new DateTimeZone('Asia/Jakarta');
            
            $dt = new DateTime();
            $dt->setTimezone($timezone);
            $date = $dt->format('Y-m-d');
            $data['today'] = $date;

            $data['harga_today'] = $this->model_transaksi->harga_today($date);

			$this->load->view('transaksi',$data);
		}

    public function autocomplete(){
        $this->load->view('autocomplete');
    }

	function get_petani(){
        $nama = $this->input->get('nama');
        $query = $this->model_transaksi->search_petani($nama);
        echo json_encode($query);
    }

    function get_pembeli(){
        $nama = $this->input->get('nama');
        $query = $this->model_transaksi->search_pembeli($nama);
        echo json_encode($query);
    }

    function get_hargaCabai(){
        $tanggal = $this->input->post('tanggal');
        $kode_cabai = $this->input->post('kode_cabai');
        echo $tanggal;
        echo $kode_cabai;
        $query = $this->model_transaksi->harga_cabai($kode_cabai, $tanggal);
        echo json_encode($query);
    }

    function tambah_transborong(){
    	$tanggal = $this->input->post('tanggal');
    	$id_pembeli = $this->input->post('id_pembeli');
    	$kode_cabai = $this->input->post('cabai');
    	$colly = $this->input->post('colly');
    	$bersih = $this->input->post('bersih');
        $transferan = $this->input->post('transferan');
        $saldo = $this->input->post('saldo_pembeli');
        $harga = $this->model_transaksi->harga_pembeli_today($tanggal, $kode_cabai);
        $jumlah_uang = $harga * $bersih;

        //menghitung saldo sekarang
        if (!empty($kode_cabai) and !empty($colly) and !empty($bersih)) {
            $new_saldo = $saldo - $jumlah_uang;
        }
        elseif (!empty($transferan)) {
            $new_saldo = $saldo + $transferan;
        }
        elseif (!empty($kode_cabai) && !empty($colly) && !empty($bersih) && !empty($transferan)) {
            $new_saldo = $saldo - $jumlah_uang + $transferan;
        }
        else {
            echo '<script language="javascript">';
            echo 'alert("isi form dengan benar!")';
            echo '</script>';

            redirect('Transaksi/transborong');
        }

        $data1 = array(
    		'tanggal' => $tanggal,
    		'id_pembeli' => $id_pembeli,
    		'kode' => $kode_cabai,
    		'colly' => $colly,
    		'bersih' => $bersih,
            'transferan' => $transferan,
            'saldo' => $new_saldo,
    	);

        $data2['saldo'] = $new_saldo;

        $this->model_transaksi->update_saldo_pembeli($data2, $id_pembeli);
    	$this->model_transaksi->input_transaksi($data1);
        

    	redirect('Transaksi/transborong');
    }

    function next_transaksi(){
        $tanggal = $this->input->post('tanggal');
        $id_petani = $this->input->post('id_petani');
        $kode_cabai = $this->input->post('kode_cabai');
        $berat_bs = $this->input->post('berat_bs');
        $berat_bersih = $this->input->post('berat_bersih');

        //menampilkan nama petani, daerah, dan saldo
        $data['petani'] = $this->model_transaksi->petani($id_petani);

        //menghitung jumlah uang
        $hargaBs_today = $this->model_transaksi->hargaBs_today($tanggal, $kode_cabai);
        $hargaBersih_today = $this->model_transaksi->hargaBersih_today($tanggal, $kode_cabai);
        $harga_bs = $berat_bs * $hargaBs_today;
        $harga_bersih = $berat_bersih * $hargaBersih_today;
        $jumlah_uang = $harga_bs + $harga_bersih;
        $data['jumlah_uang'] = $jumlah_uang;

        //menghitung saldo sekarang
        $saldo = $this->model_transaksi->saldo_petani($id_petani);
        $saldo_new = $saldo + $jumlah_uang;
        $data['saldo'] = $saldo_new;

        $this->load->view('transaksi_add', $data);
    }
}
?>