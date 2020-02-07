<?php

class DataProfil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_profil');

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

	public function petani()
		{
			$timezone = new DateTimeZone('Asia/Jakarta');
            
            $dt = new DateTime();
            $dt->setTimezone($timezone);
            $date = $dt->format('Y-m-d');

			$data['tb_petani'] = $this->model_profil->tb_petani();
			$data['today'] = $date;
			$data['jumlah_petani'] = $this->model_profil->count_petani();

			$this->load->view('header');
			$this->load->view('list_petani', $data);
		}

	public function pemborong()
		{
			$data['tb_pembeli'] = $this->model_profil->tb_pembeli();
			$data['jumlah_pembeli'] = $this->model_profil->count_pembeli();

			$this->load->view('header');
			$this->load->view('list_pemborong', $data);
		}

	public function detailPetani()
		{
			$id = $this->uri->segment(3);

			$data = array(
				'profil' => $this->model_profil->profil_petani($id)
			);

			$this->load->view('header');
			$this->load->view('detail_petaniREV', $data);
		}

	public function get_transaksi_petani()
		{
			$id = $_POST['id'];

              $column_order = array(null, 'a.tanggal', 'a.kode_cabai', null, null, null, null, null, null, null, null, null, null);
              $column_search = array('a.tanggal', 'a.kode_cabai', 'a.bon');
              $list = $this->model_profil->get_datatables($column_search, $column_order, '_get_list_transaksi_petani');
              $data = array();
              $no = $_POST['start'];
              foreach ($list as $key) {
              	if (!is_null($key->berat_kotor)) {
              		$berat_bersih = $key->berat_kotor - $key->berat_bs - $key->berat_susut;
              		$jumlah_uang = ($berat_bersih * $key->harga_bersih) + ($key->berat_bs * $key->harga_bs);
              	}

              	$no++;
              	$row = array();
              	$row[] = $no;
              	$row[] = $key->tanggal;
              	$row[] = $key->kode_cabai;
              	$row[] = number_format($key->berat_kotor,2,',','.');
              	$row[] = number_format($key->berat_bs,2,',','.');
              	if (!is_null($key->berat_kotor)) {
              		$row[] = number_format($berat_bersih,2,',','.');
              		$row[] = 'Rp'.number_format($key->harga_bersih,0,',','.');
              		$row[] = 'Rp'.number_format($jumlah_uang,0,',','.');
              	} else{
              		$row[] = null;
              		$row[] = null;
              		$row[] = null;
              	}
              	if (!is_null($key->bon)) {
              		$row[] = 'Rp'.number_format($key->bon,0,',','.');
              	} else{
              		$row[] = null;
              	}
              	$row[] = 'Rp'.number_format($key->saldo,0,',','.');

              	if (!is_null($key->bon)) {
              		$row[] = '<a class="btn btn-sm btn-info" title="Detail" href="javascript:void(0)" onclick="detailBon('."'".$key->id."'".')">Detail</a>';
              	} else {
              		$row[] = null;
              	}

              	$data[] = $row;
              }

              $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_profil->count_all('_get_list_transaksi_petani'),
                        "recordsFiltered" => $this->model_profil->count_filtered($column_search, $column_order, '_get_list_transaksi_petani'),
                        "data" => $data,
                        "id" => $id,
                );
        //output to json format
        echo json_encode($output);
		}

	public function detailPembeli()
		{
			$id = $this->uri->segment(3);

			$data = array(
				'profil' => $this->model_profil->profil_pembeli($id),
				'tb_transaksi' => $this->model_profil->transaksi_pembeli($id)
			);

			$this->load->view('header');
			$this->load->view('detail_pemborongREV', $data);
		}

	function edit_profil_petani()	{
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT * FROM tb_petani WHERE id='$id'");

		echo json_encode($query->row());
	}

	function edit_profil_pembeli()	{
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT * FROM tb_pembeli WHERE id='$id'");

		echo json_encode($query->row());
	}

	function update_profil_petani()	{
		$id = $this->input->post('id');
		$kemitraan = $this->input->post('kemitraan');
		$nama = $this->input->post('nama');
		$nama_panggil = $this->input->post('nama_panggil');
		$desa = $this->input->post('desa');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$jaminan = $this->input->post('jaminan');

		$data = array(
			'kemitraan' => $kemitraan,
			'nama' => $nama,
			'nama_panggil' => $nama_panggil,
			'desa' => $desa,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
			'jaminan' => $jaminan );

		$this->db->where('id', $id);
		$this->db->update('tb_petani', $data);

		echo "success";
	}

	function update_saldo_petani(){
		$id = $this->input->post('id');
		$saldo = $this->input->post('saldo');

		$data = array('saldo' => $saldo);

		$this->db->where('id', $id);
		$this->db->update('tb_petani', $data);

		$this->db->select('saldo');
		$this->db->from('tb_petani');
		$this->db->where('id', $id);

		$new_saldo = $this->db->get();
		echo json_encode($new_saldo->row());
	}

	function update_profil_pembeli()	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$no_rek = $this->input->post('no_rek');

		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
			'no_rek' => $no_rek );

		$this->db->where('id', $id);
		$this->db->update('tb_pembeli', $data);

		echo "success";
	}
}
?>