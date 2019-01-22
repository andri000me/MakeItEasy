<?php

class Riwayat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_riwayat');
        $this->load->model('model_transaksi');

        if($this->session->userdata('masuk') != TRUE){
            redirect(base_url('Login'));
        }
		
	}

	public function index()
		{
			$this->load->view('header');
            $this->load->view('data_petani');
            $this->load->view('footer');
		}

	public function DataPetani()
    {
        $this->load->view('header');
        $this->load->view('data_petani');
        $this->load->view('footer');
    }

    public function RiwayatPetani()
    {  
    	$startdate = $this->input->post('start');
    	$enddate = $this->input->post('end');

    	$data = array(
    		'riwayat_transpetani' =>  $this->model_riwayat->riwayat_transpetani($startdate, $enddate),
    		'startdate' => $startdate,
    		'enddate' => $enddate,
            'dd_cabai' => $this->model_riwayat->dd_cabai(),
            'cabai_selected' => $this->input->post('cabai') ? $this->input->post('cabai') : '$row->jenis', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
        );

		$this->load->view('header');
		$this->load->view('riwayat_petani', $data); 
    }

    public function RiwayatPetaniBon()
    {  
        $startdate = $this->input->post('start');
        $enddate = $this->input->post('end');

        $data = array(
            'riwayat_transpetani' =>  $this->model_riwayat->riwayat_transpetanibon($startdate, $enddate),
            'startdate' => $startdate,
            'enddate' => $enddate,
            // 'dd_cabai' => $this->model_riwayat->dd_cabai(),
            // 'cabai_selected' => $this->input->post('cabai') ? $this->input->post('cabai') : '$row->jenis', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
        );

        $this->load->view('header');
        $this->load->view('riwayat_petani_bon', $data); 
    }

    public function RiwayatPemborong()
    {
        $startdate = $this->input->post('start');
    	$enddate = $this->input->post('end');

    	$data = array(
    		'riwayat_transborong' =>  $this->model_riwayat->riwayat_transborong($startdate, $enddate),
    		'startdate' => $startdate,
    		'enddate' => $enddate );
    	
		$this->load->view('header');
		$this->load->view('riwayat_pemborong', $data);
    }

    public function RiwayatPetaniNonMitra()
    {  
        $startdate = $this->input->post('start');
        $enddate = $this->input->post('end');

        $data = array(
            'riwayat_transpetani' =>  $this->model_riwayat->riwayat_transpetaniNonMitra($startdate, $enddate),
            'startdate' => $startdate,
            'enddate' => $enddate );

        $this->load->view('header');
        $this->load->view('riwayat_petaniNonMitra', $data); 
    }

    public function RiwayatPembeliNonMitra()
    {
        $startdate = $this->input->post('start');
        $enddate = $this->input->post('end');

        $data = array(
            'riwayat_transpembeli' =>  $this->model_riwayat->riwayat_transpembeliNonMitra($startdate, $enddate),
            'startdate' => $startdate,
            'enddate' => $enddate );
        
        $this->load->view('header');
        $this->load->view('riwayat_pembeliNonMitra', $data);
    }

    public function delete_transpetani()
    {
        $id = $this->input->post('id');

        $key = $this->model_riwayat->edit_transpetani($id);

        $id_petani = $key->id_petani;
        $jumlah_uang = $key->harga_bs * $key->berat_bs + $key->harga_bersih * ($key->berat_kotor - $key->berat_bs);
        $saldo_trans = $key->saldo_trans;
        $new_saldo = $saldo_trans - $jumlah_uang;
        $data = array('saldo' => $new_saldo);

        $this->model_riwayat->delete_transpetani($id);
        $this->model_riwayat->update_saldo_petani($data, $id_petani);

        echo 1;
    }

    public function delete_transpetanibon()
    {
        $id = $this->input->post('id');

        $key = $this->model_riwayat->edit_transpetanibon($id);

        $id_petani = $key->id_petani;
        $bon = $key->bon;
        $saldo_petani = $key->saldo_petani;
        $new_saldo = $saldo_petani + $bon;
        $data['saldo'] = $new_saldo;

        $this->model_riwayat->update_saldo_petani($data, $id_petani);
        $this->model_riwayat->delete_transpetani($id);
        $this->model_riwayat->delete_bon($id);
        

        echo $bon;
    }

    public function delete_transpemborong()
    {
        $id = $this->input->post('id');

        $key = $this->model_riwayat->edit_transborong($id);

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

        echo 1;
    }

    function delete_transNonMitra() {
        $id = $this->input->post('id');
        $table = $this->input->post('table');

        $this->model_riwayat->delete_transNonMitra($id, $table); 
    }

    function edit_transpetani() {
        $id_transaksi = $this->input->post('id_transaksi');
        $query = $this->model_riwayat->edit_transpetani($id_transaksi);
        echo json_encode($query);
    }

    function edit_transNonMitra() {
        $id_transaksi = $this->input->post('id_transaksi');
        $table = $this->input->post('table');
        $query = $this->model_riwayat->edit_transNonMitra($id_transaksi, $table);
        echo json_encode($query);
    }

    function updateSetoran()    {
        $id_petani = $this->input->post('id_petani');
        $id_transaksi = $this->input->post('id_transaksi');
        $berat_kotor = $this->input->post('berat_kotor');
        $berat_bs = $this->input->post('berat_bs');
        $berat_susut = $this->input->post('berat_susut');
        $saldo_trans = $this->input->post('saldo_trans');
        $saldo_petani = $this->input->post('saldo_petani');
        $jumlah_uang = $this->input->post('jumlah_uang');
        $jumlah_uang_awal = $this->input->post('jumlah_uang_awal');

        $new_saldo = $saldo_trans - $jumlah_uang_awal + $jumlah_uang;

        $new_saldo_petani = $saldo_petani - $jumlah_uang_awal + $jumlah_uang;

        $data = array(
            'berat_kotor' => $berat_kotor,
            'berat_bs' => $berat_bs,
            'berat_kotor' => $berat_kotor,
            'saldo' => $new_saldo );

        $data2 = array('saldo' => $new_saldo_petani);
        $this->model_riwayat->update_saldo_petani($data2, $id_petani);
        $this->model_riwayat->update_setoran_petani($data, $id_transaksi);

        echo 1;
    }

    function updateSetoranNonMitra()    {
        $id_transaksi = $this->input->post('id_transaksi');
        $tanggal = $this->input->post('tanggal');
        $nama_petani = $this->input->post('nama_petani');
        $harga_bersih = $this->input->post('harga_bersih');
        $harga_bs = $this->input->post('harga_bs');
        $berat_kotor = $this->input->post('berat_kotor');
        $berat_bs = $this->input->post('berat_bs');
        $berat_susut = $this->input->post('berat_susut');
        $jumlah_uang = $this->input->post('jumlah_uang');
        $table = $this->input->post('table');

        $data = array(
            'tanggal' => $tanggal,
            'nama_petani' => $nama_petani,
            'harga_bersih' => $harga_bersih,
            'harga_bs' => $harga_bs,
            'berat_kotor' => $berat_kotor,
            'berat_bs' => $berat_bs,
            'berat_susut' => $berat_susut );

        $this->model_riwayat->update_setoran_nonMitra($data, $id_transaksi, $table);
    }

    function updatePembelian()  {
        $id_pembeli = $this->input->post('id_pembeli');
        $id_transaksi = $this->input->post('id_transaksi');
        $tanggal = $this->input->post('tanggal');
        $colly = $this->input->post('colly');
        $bersih = $this->input->post('bersih');
        $harga = $this->input->post('harga');
        $saldo_pembeli = $this->input->post('saldo_pembeli');
        $saldo_trans = $this->input->post('saldo_trans');
        $jumlah_uang = $bersih * $harga;
        $jumlah_uang_awal = $this->input->post('jumlah_uang_awal');
        $transferan = $this->input->post('transferan');
        $transferan_awal = $this->input->post('transferan_awal');

        $new_saldo_pembeli = $saldo_pembeli + $jumlah_uang_awal - $transferan_awal - $jumlah_uang + $transferan;
        $new_saldo_trans = $saldo_trans + $jumlah_uang_awal - $transferan_awal - $jumlah_uang + $transferan;

        $data = array(
            'tanggal' => $tanggal,
            'colly' => $colly,
            'bersih' => $bersih,
            'harga' => $harga,
            'transferan' => $transferan,
            'saldo' => $new_saldo_trans);

        $data2 = array('saldo' => $new_saldo_pembeli);

        $this->model_riwayat->update_saldo_pembeli($data2, $id_pembeli);
        $this->model_riwayat->update_setoran_pembeli($data, $id_transaksi);

        echo $new_saldo_pembeli;
    }

    function updatePembelianNonMitra()  {
        $nama_pembeli = $this->input->post('nama_pembeli');
        $id_transaksi = $this->input->post('id_transaksi');
        $tanggal = $this->input->post('tanggal');
        $colly = $this->input->post('colly');
        $bersih = $this->input->post('bersih');
        $harga = $this->input->post('harga');
        $jumlah_uang = $bersih * $harga;
        $transferan = $this->input->post('transferan');

        $data = array(
            'tanggal' => $tanggal,
            'nama_pembeli' => $nama_pembeli,
            'colly' => $colly,
            'bersih' => $bersih,
            'harga' => $harga,
        );
        $table = 'transaksi_pembelinonmitra';

        $this->model_riwayat->update_setoran_nonMitra($data, $id_transaksi, $table);
    }

    function getDetailBon() {
        $id_transaksi = $this->input->post('id_transaksi');
        $query = $this->model_riwayat->detail_bon($id_transaksi);
        echo json_encode($query);
    }

}
?>