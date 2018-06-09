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
            'cabai_selected' => $this->input->post('cabai') ? $this->input->post('cabai') : '$row->jenis' // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
            );
                
			$this->load->view('header');
			$this->load->view('transaksi_petani', $data);
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
            'harga_today' => $this->model_transaksi->harga_todayPembeli($date), 
            'dd_cabai' => $this->model_transaksi->dd_cabai(),
            'cabai_selected' => $this->input->post('cabai') ? $this->input->post('cabai') : '$row->jenis', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
            );

			$this->load->view('header');
            $this->load->view('transaksi_pemborong', $data);
		}

    function edit_transborong() {
        $id_transaksi = $this->input->post('id_transaksi');
        $query = $this->model_transaksi->edit_transborong($id_transaksi);
        echo json_encode($query);
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

    function get_hargaPetani(){
        $tanggal = $this->input->post('tanggal');
        $kode_cabai = $this->input->post('kode_cabai');
        $query = $this->model_transaksi->harga_petani($tanggal, $kode_cabai);
        echo json_encode($query);
    }

    function get_hargaPembeli(){
        $tanggal = $this->input->post('tanggal');
        $kode_cabai = $this->input->post('kode_cabai');
        $query = $this->model_transaksi->harga_pembeli($tanggal, $kode_cabai);
        echo $query;
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
        $harga = $this->model_transaksi->harga_pembeli($tanggal, $kode_cabai);
        $jumlah_uang = $harga * $bersih;

        //menghitung saldo sekarang
        if (!empty($kode_cabai) && !empty($colly) && !empty($bersih) && empty($transferan)) {
            $new_saldo = $saldo - $jumlah_uang;

            $data1 = array(
                'tanggal' => $tanggal,
                'id_pembeli' => $id_pembeli,
                'kode' => $kode_cabai,
                'colly' => $colly,
                'bersih' => $bersih,
                'saldo' => $new_saldo,
            );
        }
        elseif (empty($kode_cabai) && empty($colly) && empty($bersih) && !empty($transferan)) {
            $new_saldo = $saldo + $transferan;

            $data1 = array(
                'tanggal' => $tanggal,
                'id_pembeli' => $id_pembeli,
                'transferan' => $transferan,
                'saldo' => $new_saldo,
            );

        }
        elseif (!empty($kode_cabai) && !empty($colly) && !empty($bersih) && !empty($transferan)) {
            $new_saldo = $saldo - $jumlah_uang + $transferan;

            $data1 = array(
                'tanggal' => $tanggal,
                'id_pembeli' => $id_pembeli,
                'kode' => $kode_cabai,
                'colly' => $colly,
                'bersih' => $bersih,
                'transferan' => $transferan,
                'saldo' => $new_saldo,
            );
        }
        else {
            echo '<script language="javascript">';
            echo 'alert("isi form dengan benar!")';
            echo '</script>';
        }

        $data2['saldo'] = $new_saldo;

        $this->model_transaksi->update_saldo_pembeli($data2, $id_pembeli);
        $this->model_transaksi->input_transaksi_pembeli($data1);
        
        redirect('Transaksi/transborong');
    }

    //update transaksi
    function update_transborong(){
        $id_transaksi = $this->input->post('id_transaksi');
        $tanggal = $this->input->post('tanggal');
        $id_pembeli = $this->input->post('id_pembeli');
        $kode_cabai = $this->input->post('cabai');
        $colly = $this->input->post('colly');
        $bersih = $this->input->post('bersih');
        $transferan = $this->input->post('transferan');
        $saldo = $this->input->post('saldo_pembeli');
        $harga = $this->model_transaksi->harga_pembeli($tanggal, $kode_cabai);
        $jumlah_uang = $harga * $bersih;

        //menghitung saldo sekarang
        if (!empty($kode_cabai) && !empty($colly) && !empty($bersih) && empty($transferan)) {
            $new_saldo = $saldo - $jumlah_uang;

            $data1 = array(
                'tanggal' => $tanggal,
                'id_pembeli' => $id_pembeli,
                'kode' => $kode_cabai,
                'colly' => $colly,
                'bersih' => $bersih,
                'saldo' => $new_saldo,
            );
        }
        elseif (empty($kode_cabai) && empty($colly) && empty($bersih) && !empty($transferan)) {
            $new_saldo = $saldo + $transferan;

            $data1 = array(
                'tanggal' => $tanggal,
                'id_pembeli' => $id_pembeli,
                'transferan' => $transferan,
                'saldo' => $new_saldo,
            );

        }
        elseif (!empty($kode_cabai) && !empty($colly) && !empty($bersih) && !empty($transferan)) {
            $new_saldo = $saldo - $jumlah_uang + $transferan;

            $data1 = array(
                'tanggal' => $tanggal,
                'id_pembeli' => $id_pembeli,
                'kode' => $kode_cabai,
                'colly' => $colly,
                'bersih' => $bersih,
                'transferan' => $transferan,
                'saldo' => $new_saldo,
            );
        }
        else {
            echo '<script language="javascript">';
            echo 'alert("isi form dengan benar!")';
            echo '</script>';
        }

        $data2['saldo'] = $new_saldo;

        $this->model_transaksi->update_saldo_pembeli($data2, $id_pembeli);
        $this->model_transaksi->update_transaksi_pembeli($data1, $id);
        
        redirect('Transaksi/transborong');
    }

    function tambah_transpetani(){
        $tanggal = $this->input->post('tanggal');
        $id_petani = $this->input->post('id_petani');
        $kode_cabai = $this->input->post('cabai');
        $berat_kotor = $this->input->post('berat_kotor');
        $berat_bs = $this->input->post('berat_bs');
        $saldo = $this->input->post('saldo_petani');
        $harga_bersih = $this->model_transaksi->harga_petani($tanggal, $kode_cabai)->harga_bersih;
        $harga_bs = $this->model_transaksi->harga_petani($tanggal, $kode_cabai)->harga_bs;
        $jumlah_uang = ($harga_bersih * ($berat_kotor - $berat_bs)) + ($harga_bs * $berat_bs);

        //menghitung saldo sekarang
        $new_saldo = $saldo + $jumlah_uang;

        $data1 = array(
            'tanggal' => $tanggal,
            'id_petani' => $id_petani,
            'kode_cabai' => $kode_cabai,
            'berat_kotor' => $berat_kotor,
            'berat_bs' => $berat_bs,
            'saldo' => $new_saldo,
        );

        $data2['saldo'] = $new_saldo;

        $this->model_transaksi->update_saldo_petani($data2, $id_petani);
        $this->model_transaksi->input_transaksi_petani($data1);
        
        redirect('Transaksi/transpetani');
    }

    public function delete_petani() {
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('transaksi_petani');

        redirect('Transaksi/transpetani');
    }

    public function delete_pembeli() {
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('transaksi_pembeli');

        redirect('Transaksi/transborong');
    }


}
