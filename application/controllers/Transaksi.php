<?php

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_transaksi');
	}
    
	public function index()
		{
			$this->load->view('header');
			$this->load->view('transaksi_petani');
			$this->load->view('footer');
		}

	public function transpetani()
		{
            $timezone = new DateTimeZone('Asia/Jakarta');
            
            $dt = new DateTime();
            $dt->setTimezone($timezone);
            $date = $dt->format('Y-m-d');

            $data = array(
            'tb_transaksi' => $this->model_transaksi->tb_transpetani(),
            'today' => $date, 
            'harga_today' => $this->model_transaksi->harga_today($date),
            'dd_cabai' => $this->model_transaksi->dd_cabai(),
            'cabai_selected' => $this->input->post('cabai') ? $this->input->post('cabai') : '$row->jenis', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
            );
                
			$this->load->view('header');
			$this->load->view('transaksi_petaniREV', $data);
		}

	public function transborong()
		{
            $timezone = new DateTimeZone('Asia/Jakarta');
            
            $dt = new DateTime();
            $dt->setTimezone($timezone);
            $date = $dt->format('Y-m-d');

            $data = array(
            'tb_transaksi' => $this->model_transaksi->tb_transborong(),
            'today' => $date, 
            'dd_cabai' => $this->model_transaksi->dd_cabai(),
            'cabai_selected' => $this->input->post('cabai') ? $this->input->post('cabai') : '$row->jenis', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
            );

			$this->load->view('header');
            $this->load->view('transaksi_pemborongREV', $data);
		}

    //model buat autocomplete
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

    //add transaksi
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
        $this->model_transaksi->input_transaksi_pembeli($data1);
        
        redirect('Transaksi/transborong');
    }

}
