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
            redirect('Riwayat/RiwayatPetani');
		}

//Riwayat Transaksi Petani (Setoran)
    public function RiwayatPetani()
    {
        $this->load->view('header');
        $this->load->view('riwayat_petani');
    }

    //AJAX SHOW TABLE
    public function list_riwayat_petani()
    {
        $column_order = array(null,'a.tanggal','a.id_petani', 'b.nama', 'b.desa', 'a.kode_cabai', null, null, null, null, null, null, 'a.saldo', null); //set column field database for datatable orderable
        $column_search = array('b.nama','b.desa'); //set column field database for datatable searchable just firstname , lastname , address are searchable
        $list = $this->model_riwayat->get_datatables($column_search, $column_order, '_get_list_setoran_petani');
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            //define berat bersih & jumlah uang
            $berat_bersih = $key->berat_kotor - $key->berat_bs - $key->berat_susut;
            $jumlah_uang = ($key->berat_bs*$key->harga_bs) + ($berat_bersih*$key->harga_bersih);
    
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->tanggal;
            $row[]=$key->id_petani;
            $row[] = $key->nama;
            $row[] = $key->desa;
            $row[] = $key->kode_cabai;
            $row[] = number_format($key->berat_kotor,1);
            $row[] = number_format($key->berat_bs,1);
            $row[] = number_format($key->berat_susut,1);
            $row[] = $berat_bersih;
            $row[] = number_format($key->harga_bersih,0,',','.');
            $row[] = number_format($jumlah_uang,0,',','.');
            $row[] = number_format($key->saldo,0,',','.');

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" title="Edit" href="javascript:void(0)" onclick="editSetoran('."'".$key->id."'".')">Edit</a>
                  <a class="delete btn btn-sm btn-danger" id="del_'.$key->id.'" href="javascript:void(0)" onclick="hapusSetoran('."'".$key->id."'".')" title="Hapus">Hapus</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_riwayat->count_all('_get_list_setoran_petani'),
                        "recordsFiltered" => $this->model_riwayat->count_filtered($column_search, $column_order, '_get_list_setoran_petani'),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function edit_transpetani() {
        $id_transaksi = $this->input->post('id_transaksi');
        $query = $this->model_riwayat->edit_transpetani($id_transaksi);
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
//END Riwayat Transaksi Petani (Setoran)


//Riwayat Transaksi Petani (BON)
    public function RiwayatPetaniBon()
    {  
        $this->load->view('header');
        $this->load->view('riwayat_petani_bon'); 
    }

    public function list_riwayat_bon_petani()
    {   
        $column_order = array(null,'a.tanggal','a.id_petani', 'b.nama', 'b.desa', null, 'a.saldo', null); //set column field database for datatable orderable
        $column_search = array('b.nama','b.desa'); //set column field database for datatable searchable just firstname , lastname , address are searchable
        $list = $this->model_riwayat->get_datatables($column_search, $column_order, '_get_list_bon_petani');
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {    
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->tanggal;
            $row[] = $key->id_petani;
            $row[] = $key->nama;
            $row[] = $key->desa;
            $row[] = number_format($key->bon,0,',','.');
            $row[] = number_format($key->saldo,0,',','.');

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" title="Detail" href="javascript:void(0)" onclick="getDetailBon('."'".$key->id."'".')">Detail</a>
                  <a class="delete btn btn-sm btn-danger" id="del_'.$key->id.'" href="javascript:void(0)" onclick="deleteBon('."'".$key->id."'".')" title="Hapus">Hapus</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_riwayat->count_all('_get_list_bon_petani'),
                        "recordsFiltered" => $this->model_riwayat->count_filtered($column_search, $column_order, '_get_list_bon_petani'),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function getDetailBon() {
        $id_transaksi = $this->input->post('id_transaksi');
        $query = $this->model_riwayat->detail_bon($id_transaksi);
        echo json_encode($query);
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
//END Riwayat Transaksi Petani (BON)

//Riwayat Pembeli / Pemborong
    public function RiwayatPemborong()
    {	
		$this->load->view('header');
		$this->load->view('riwayat_pemborong');
    }

    public function list_riwayat_pembeli()
    {   
        $column_order = array(null,'a.tanggal','a.id_pembeli', 'b.nama', 'b.alamat', 'a.colly', 'a.kode', 'a.bersih', null, null, 'a.transferan', 'a.saldo', null); //set column field database for datatable orderable
        $column_search = array('b.nama','b.desa'); //set column field database for datatable searchable just firstname , lastname , address are searchable
        $list = $this->model_riwayat->get_datatables($column_search, $column_order, '_get_list_trans_pembeli');
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $jumlah_uang = $key->bersih * $key->harga_bersih;

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->tanggal;
            $row[] = $key->id_pembeli;
            $row[] = $key->nama;
            $row[] = $key->alamat;
            $row[] = $key->colly;
            $row[] = $key->kode;
            $row[] = number_format($key->bersih,1);
            $row[] = number_format($key->harga_bersih,0,',','.');
            $row[] = number_format($jumlah_uang,0,',','.');
            $row[] = number_format($key->transferan,0,',','.');
            $row[] = number_format($key->saldo,0,',','.');

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" title="Edit" href="javascript:void(0)" onclick="editPembelian('."'".$key->id."'".')">Edit</a>
                  <a class="delete btn btn-sm btn-danger" id="del_'.$key->id.'" href="javascript:void(0)" onclick="deleteTransaksi('."'".$key->id."'".')" title="Hapus">Hapus</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_riwayat->count_all('_get_list_trans_pembeli'),
                        "recordsFiltered" => $this->model_riwayat->count_filtered($column_search, $column_order, '_get_list_trans_pembeli'),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function edit_transborong() {
        $id_transaksi = $this->input->post('id_transaksi');
        $query = $this->model_transaksi->edit_transborong($id_transaksi);
        echo json_encode($query);
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
//END Riwayat Pembeli

//Riwayat Petani Non Mitra
    public function RiwayatPetaniNonMitra()
    { 
        $this->load->view('header');
        $this->load->view('riwayat_petaniNonMitra'); 
    }

    public function list_riwayat_petani_nonMitra()
    {   
        $column_order = array(null,'tanggal','nama_petani', 'kode_cabai', null, null, null, null, null, null, null);
        $column_search = array('nama_petani','kode_cabai'); //set column field database for datatable searchable just firstname , lastname , address are searchable
        $list = $this->model_riwayat->get_datatables($column_search, $column_order, '_get_list_trans_petani_nonMitra');
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $berat_bersih = $key->berat_kotor-$key->berat_bs-$key->berat_susut;
            $jumlah_uang = $berat_bersih * $key->harga_bersih + $key->berat_bs * $key->harga_bs;

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->tanggal;
            $row[] = $key->nama_petani;
            $row[] = $key->kode_cabai;
            $row[] = number_format($key->harga_bs,0,',','.');
            $row[] = number_format($key->harga_bersih,0,',','.');
            $row[] = number_format($key->berat_kotor,1);
            $row[] = number_format($key->berat_bs,1);
            $row[] = number_format($key->berat_susut,1);
            $row[] = number_format($berat_bersih,1);
            $row[] = number_format($jumlah_uang,0,',','.');

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" title="Edit" href="javascript:void(0)" onclick="editTransaksi('."'".$key->id."'".')">Edit</a>
                  <a class="delete btn btn-sm btn-danger" id="del_'.$key->id.'" href="javascript:void(0)" onclick="deleteTransaksi('."'".$key->id."'".')" title="Hapus">Hapus</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_riwayat->count_all('_get_list_trans_petani_nonMitra'),
                        "recordsFiltered" => $this->model_riwayat->count_filtered($column_search, $column_order, '_get_list_trans_petani_nonMitra'),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function edit_transNonMitra() {
        $id_transaksi = $this->input->post('id_transaksi');
        $table = $this->input->post('table');
        $query = $this->model_riwayat->edit_transNonMitra($id_transaksi, $table);
        echo json_encode($query);
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

    function delete_transNonMitra() {
        $id = $this->input->post('id');
        $table = $this->input->post('table');

        $this->model_riwayat->delete_transNonMitra($id, $table); 
    }
//END Riwayat Petani Non Mitra

//Riwayat Pembeli Non Mitra
    public function RiwayatPembeliNonMitra()
    {
        $this->load->view('header');
        $this->load->view('riwayat_pembeliNonMitra');
    }

    public function list_riwayat_pembeli_nonMitra()
    {   
        $column_order = array(null,'tanggal','nama_pembeli', 'asal_daerah', 'colly', 'kode_cabai', null, null, null, null);
        $column_search = array('nama_pembeli','kode_cabai', 'asal_daerah'); //set column field database for datatable searchable just firstname , lastname , address are searchable
        $list = $this->model_riwayat->get_datatables($column_search, $column_order, '_get_list_trans_pembeli_nonMitra');
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $jumlah_uang = $key->bersih * $key->harga;

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->tanggal;
            $row[] = $key->nama_pembeli;
            $row[] = $key->asal_daerah;
            $row[] = $key->colly;
            $row[] = $key->kode_cabai;
            $row[] = number_format($key->bersih,1);
            $row[] = number_format($key->harga,0,',','.');
            $row[] = number_format($jumlah_uang,0,',','.');

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" title="Edit" href="javascript:void(0)" onclick="editTransaksi('."'".$key->id."'".')">Edit</a>
                  <a class="delete btn btn-sm btn-danger" id="del_'.$key->id.'" href="javascript:void(0)" onclick="deleteTransaksi('."'".$key->id."'".')" title="Hapus">Hapus</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_riwayat->count_all('_get_list_trans_pembeli_nonMitra'),
                        "recordsFiltered" => $this->model_riwayat->count_filtered($column_search, $column_order, '_get_list_trans_pembeli_nonMitra'),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
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
//END Riwayat Pembeli Non Mitra

}
?>