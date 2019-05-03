<?php

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_transaksi');
        $this->load->model('model_barang');

        if($this->session->userdata('masuk') != TRUE){
            redirect(base_url('Login'));
        }
	}
    
	public function index()
		{
			$timezone = new DateTimeZone('Asia/Jakarta');
            
            $dt = new DateTime();
            $dt->setTimezone($timezone);
            $date = $dt->format('Y-m-d');
            $max_tanggal = $this->model_transaksi->max_tanggal();

            $data = array(
            'tb_transaksi' => $this->model_transaksi->tb_transpetani(),
            'trans_bon' => $this->model_transaksi->trans_bon(),
            'today' => $date,
            'max_tanggal' => $max_tanggal,
            'harga_tanggal' => $this->model_transaksi->harga_today($max_tanggal),
            'dd_cabai' => $this->model_transaksi->dd_cabai(),
            'cabai_selected' => $this->input->post('cabai') ? $this->input->post('cabai') : '$row->jenis' // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
            );
                
            $this->load->view('header');
            $this->load->view('transaksi_petani', $data);
		}

	public function transpetani()
		{
            $timezone = new DateTimeZone('Asia/Jakarta');
            
            $dt = new DateTime();
            $dt->setTimezone($timezone);
            $date = $dt->format('Y-m-d');
            $max_tanggal = $this->model_transaksi->max_tanggal();

            $data = array(
            'tb_transaksi' => $this->model_transaksi->tb_transpetani(),
            'trans_bon' => $this->model_transaksi->trans_bon(),
            'today' => $date,
            'max_tanggal' => $max_tanggal,
            'harga_tanggal' => $this->model_transaksi->harga_today($max_tanggal),
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
            'dd_cabai' => $this->model_transaksi->dd_cabai(),
            'cabai_selected' => $this->input->post('cabai') ? $this->input->post('cabai') : '$row->jenis', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
            );

			$this->load->view('header');
            $this->load->view('transaksi_pemborong', $data);
		}

    function edit_transpetani() {
        $id_transaksi = $this->input->post('id_transaksi');
        $query = $this->model_transaksi->edit_transpetani($id_transaksi);
        echo json_encode($query);
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

    function get_petaniMitra(){
        $nama = $this->input->get('nama');
        $query = $this->model_transaksi->search_petaniMitra($nama);
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
        $harga = $this->input->post('harga_pembeli');
        $jumlah_uang = $harga * $bersih;

        //menghitung saldo sekarang
        if (!empty($kode_cabai) AND !empty($colly) AND !empty($bersih) AND empty($transferan)) {
            $new_saldo = $saldo - $jumlah_uang;

            $data1 = array(
                'tanggal' => $tanggal,
                'id_pembeli' => $id_pembeli,
                'kode' => $kode_cabai,
                'colly' => $colly,
                'bersih' => $bersih,
                'harga' => $harga,
                'saldo' => $new_saldo,
            );
        }
        elseif (empty($kode_cabai) AND empty($colly) AND empty($bersih) AND !empty($transferan)) {
            $new_saldo = $saldo + $transferan;

            $data1 = array(
                'tanggal' => $tanggal,
                'id_pembeli' => $id_pembeli,
                'transferan' => $transferan,
                'saldo' => $new_saldo,
            );

        }
        elseif (!empty($kode_cabai) AND !empty($colly) AND !empty($bersih) AND !empty($transferan)) {
            $new_saldo = $saldo - $jumlah_uang + $transferan;

            $data1 = array(
                'tanggal' => $tanggal,
                'id_pembeli' => $id_pembeli,
                'kode' => $kode_cabai,
                'colly' => $colly,
                'bersih' => $bersih,
                'harga' => $harga,
                'transferan' => $transferan,
                'saldo' => $new_saldo,
            );
        }
        else {
            redirect('Error');
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
        $berat_susut = $this->input->post('berat_susut');
        $saldo = $this->model_transaksi->saldoPetani($id_petani)->saldo;
        $harga_bersih = $this->model_transaksi->harga_petani($tanggal, $kode_cabai)->harga_bersih;
        $harga_bs = $this->model_transaksi->harga_petani($tanggal, $kode_cabai)->harga_bs;
        $jumlah_uang = ($harga_bersih * ($berat_kotor - $berat_bs - $berat_susut)) + ($harga_bs * $berat_bs);

        //menghitung saldo sekarang
        $new_saldo = $saldo + $jumlah_uang;

        $data1 = array(
            'tanggal' => $tanggal,
            'id_petani' => $id_petani,
            'kode_cabai' => $kode_cabai,
            'berat_kotor' => $berat_kotor,
            'berat_bs' => $berat_bs,
            'berat_susut' => $berat_susut,
            'saldo' => $new_saldo,
        );

        $data2['saldo'] = $new_saldo;

        $this->model_transaksi->update_saldo_petani($data2, $id_petani);
        $this->model_transaksi->input_transaksi_petani($data1);
        
        redirect('Transaksi/transpetani');
    }

    // public function delete_petani() {
    //     $id = $this->uri->segment(3);

    //     $key = $this->model_transaksi->edit_transpetani($id);

    //     $id_petani = $key->id_petani;
    //     $jumlah_uang = $key->harga_bs * $key->berat_bs + $key->harga_bersih * ($key->berat_kotor - $key->berat_bs);
    //     $saldo_trans = $key->saldo_trans;
    //     $new_saldo = $saldo_trans - $jumlah_uang;
    //     $data = array('saldo' => $new_saldo);

    //     $this->model_transaksi->delete_transpetani($id);
    //     $this->model_transaksi->update_saldo_petani($data, $id_petani);

    //     redirect('Transaksi/transpetani');
    // }

    public function delete_pembeli() {
        $id = $this->uri->segment(3);

        $key = $this->model_transaksi->edit_transborong($id);

        $id_pembeli = $key->id_pembeli;
        $bersih = $key->bersih;
        $harga = $key->harga;
        $transferan = $key->transferan;
        $saldo_trans = $key->saldo_trans;

        if (empty($transferan)) {
            $new_saldo = $saldo_trans + ($bersih * $harga);
        }
        elseif (empty($harga)) {
            $new_saldo = $saldo_trans - $transferan;
        }
        else {
            $new_saldo = $saldo_trans + ($bersih * $harga) - $transferan;
        }

        $data = array('saldo' => $new_saldo);

        $this->model_transaksi->delete_transborong($id);
        $this->model_transaksi->update_saldo_pembeli($data, $id_pembeli);

        redirect('Transaksi/transborong');
    }

    public function transnon()
        {
            $timezone = new DateTimeZone('Asia/Jakarta');
            
            $dt = new DateTime();
            $dt->setTimezone($timezone);
            $date = $dt->format('Y-m-d');
             $max_tanggal = $this->model_transaksi->max_tanggal();

            $data = array(
            'transpetani' => $this->model_transaksi->tb_transpetaniNonMitra(),
            'transpembeli' => $this->model_transaksi->tb_transpembeliNonMitra(),
            'today' => $date, 
            'max_tanggal' => $max_tanggal,
            'harga_tanggal' => $this->model_transaksi->harga_today($max_tanggal),
            'dd_cabai' => $this->model_transaksi->dd_cabai(),
            'cabai_selected' => $this->input->post('cabai') ? $this->input->post('cabai') : '$row->jenis' // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
            );
                
            $this->load->view('header');
            $this->load->view('transaksi_nonmitra', $data);
        }

        function tambah_transpetaniNonMitra(){
            $tanggal = $this->input->post('tanggal');
            $nama_petani = $this->input->post('nama_petani');
            $kode_cabai = $this->input->post('cabai');
            $berat_kotor = $this->input->post('berat_kotor');
            $berat_bs = $this->input->post('berat_bs');
            $berat_susut = $this->input->post('berat_susut');
            $harga_bersih = $this->input->post('harga_petani');
            $harga_bs = $this->input->post('harga_bs');

            $data = array(
                'tanggal' => $tanggal,
                'nama_petani' => $nama_petani,
                'kode_cabai' => $kode_cabai,
                'harga_bersih' => $harga_bersih,
                'harga_bs' => $harga_bs,
                'berat_kotor' => $berat_kotor,
                'berat_bs' => $berat_bs,
                'berat_susut' => $berat_susut
            );

            $this->model_transaksi->input_transaksi_petaniNonMitra($data);
            
            redirect('Transaksi/transnon');
        }

        function tambah_transpembeliNonMitra(){
            $tanggal = $this->input->post('tanggal');
            $nama_pembeli = $this->input->post('nama_pembeli');
            $asal_daerah = $this->input->post('asal_daerah');
            $kode_cabai = $this->input->post('cabai');
            $bersih = $this->input->post('bersih');
            $harga = $this->input->post('harga');
            $colly = $this->input->post('colly');

            $data = array(
                'tanggal' => $tanggal,
                'nama_pembeli' => $nama_pembeli,
                'asal_daerah' => $asal_daerah,
                'kode_cabai' => $kode_cabai,
                'harga' => $harga,
                'colly' => $colly,
                'bersih' => $bersih,
            );

            $this->model_transaksi->input_transaksi_pembeliNonMitra($data);
            
            redirect('Transaksi/transnon');
        }

        function delete_petaniNonMitra()    {
            $id = $this->uri->segment(3);

            $this->db->where('id',$id);
            $this->db->delete('transaksi_petaninonmitra');

            redirect('Transaksi/transnon');
        }

        function delete_pembeliNonMitra()   {
            $id = $this->uri->segment(3);

            $this->db->where('id',$id);
            $this->db->delete('transaksi_pembelinonmitra');

            redirect('Transaksi/transnon');
        }

        function submitBON()    {
            $id_petani = $this->input->post('id_petani');
            $tanggal = $this->input->post('tanggal');
            $barang = $this->input->post('barang[]');
            $qty = $this->input->post('qty[]');
            $ambil_uang = $this->input->post('ambil_uang');
            $tenggat = $this->input->post('tenggat');
            $saldo = $this->model_transaksi->saldoPetani($id_petani)->saldo;

            $initial = array(
                'id_petani' => $id_petani,
                'tanggal' => $tanggal
            );

            $id_transaksi = $this->model_transaksi->input_transaksi_petani($initial);
            
            $jumlah_uang = 0; $i=0;
            if (!empty($barang) && !empty($qty) && empty($ambil_uang)) {
                foreach ($barang as $key => $value) {
                    $price[] = $this->model_barang->price_barang($value)->harga;
                    $nama_barang[] = $this->model_barang->price_barang($value)->barang;

                    $jumlah = $qty[$key] * $price[$key];
                    $jumlah_uang = $jumlah_uang + $jumlah;

                    $data1[$i]['tanggal'] = $tanggal;
                    $data1[$i]['id_transaksi'] = $id_transaksi;
                    $data1[$i]['id_petani'] = $id_petani;
                    $data1[$i]['barang'] = $nama_barang[$key];
                    $data1[$i]['harga'] = $price[$key];
                    $data1[$i]['kuantitas'] = $qty[$key];

                    $i++;
                }
                $this->model_transaksi->inputBatchBon($data1);

            } elseif (!empty($barang) && !empty($qty) && !empty($ambil_uang)) {
                foreach ($barang as $key => $value) {
                    $price[] = $this->model_barang->price_barang($value)->harga;
                    $nama_barang[] = $this->model_barang->price_barang($value)->barang;

                    $jumlah = $qty[$key] * $price[$key];
                    $jumlah_uang = $jumlah_uang + $jumlah;

                    $data1[$i]['tanggal'] = $tanggal;
                    $data1[$i]['id_transaksi'] = $id_transaksi;
                    $data1[$i]['id_petani'] = $id_petani;
                    $data1[$i]['barang'] = $nama_barang[$key];
                    $data1[$i]['harga'] = $price[$key];
                    $data1[$i]['kuantitas'] = $qty[$key];

                    $i++;
                }

                $data2['tanggal'] = $tanggal;
                $data2['id_transaksi'] = $id_transaksi;
                $data2['id_petani'] = $id_petani;
                $data2['ambil_uang'] = $ambil_uang;
                $data2['barang'] = 'Uang';
                $data2['harga'] = $ambil_uang;
                $data2['kuantitas'] = 1;

                $jumlah_uang = $jumlah_uang + $ambil_uang;

                $this->model_transaksi->inputBatchBon($data1);
                $this->model_transaksi->inputUangBon($data2);
            }
            elseif (empty($barang) && !empty($ambil_uang)) {
                $data2['tanggal'] = $tanggal;
                $data2['id_transaksi'] = $id_transaksi;
                $data2['id_petani'] = $id_petani;
                $data2['ambil_uang'] = $ambil_uang;
                $data2['barang'] = 'Uang';
                $data2['harga'] = $ambil_uang;
                $data2['kuantitas'] = 1;

                $jumlah_uang = $jumlah_uang + $ambil_uang;

                $this->model_transaksi->inputUangBon($data2);

             } else {
                redirect('Error');
            };

            $new_saldo = $saldo - $jumlah_uang;

            $data3 = array(
                'bon' => $jumlah_uang,
                'saldo' => $new_saldo
            );

            $tenggat = !empty($tenggat) ? "$tenggat" : "NULL";

            $data4 = array(
                'saldo' => $new_saldo,
                'tenggat' => $tenggat, 
            );

            $this->model_transaksi->update_transaksi_petani($data3, $id_transaksi);
            $this->model_transaksi->update_saldo_petani($data4, $id_petani);



            redirect('Transaksi/transpetani');
        }

        function addPetani()    {
            $kemitraan = $this->input->post('kemitraan');
            $nama_petani = $this->input->post('nama_petani');
            $nama_panggil = $this->input->post('nama_panggil');
            $desa = $this->input->post('desa');
            $alamat = $this->input->post('alamat');
            $no_telp = $this->input->post('no_telp');
            $saldo = $this->input->post('saldo');
            $jaminan = $this->input->post('jaminan');

            $data = array(
                'nama' => $nama_petani,
                'nama_panggil' => $nama_panggil,
                'desa' => $desa,
                'alamat' => $alamat,
                'no_telp' => $no_telp,
                'saldo' => $saldo,
                'jaminan' => $jaminan,
                'kemitraan' => $kemitraan );

            $this->model_transaksi->add_petani($data);

            redirect('DataProfil/petani');
        }

        function addPembeli()    {
            $nama_pembeli = $this->input->post('nama_pembeli');
            $alamat = $this->input->post('alamat');
            $no_telp = $this->input->post('no_telp');
            $saldo = $this->input->post('saldo');
            $no_rek = $this->input->post('no_rek');

            $data = array(
                'nama' => $nama_pembeli,
                'alamat' => $alamat,
                'no_telp' => $no_telp,
                'no_rek' => $no_rek,
                'saldo' => $saldo  );

            $this->model_transaksi->add_pembeli($data);

            redirect('DataProfil/pemborong');
        }

}
