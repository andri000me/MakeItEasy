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

			$this->load->view('header');
			$this->load->view('list_petani', $data);
		}

	public function pemborong()
		{
			$data['tb_pembeli'] = $this->model_profil->tb_pembeli();

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
}
?>