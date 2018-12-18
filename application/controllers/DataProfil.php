<?php

class DataProfil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_profil');
		
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
				'profil' => $this->model_profil->profil_petani($id),
				'tb_transaksi' => $this->model_profil->transaksi_petani($id)
			);

			$this->load->view('header');
			$this->load->view('detail_petaniREV', $data);
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