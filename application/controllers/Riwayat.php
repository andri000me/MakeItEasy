<?php

class Riwayat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
		{
			$this->load->view('header');
			$this->load->view('transaksi_petani');
			$this->load->view('footer');
		}

	public function datapetani()
    {
        $this->load->view('header');
        $this->load->view('data_petani');
        $this->load->view('footer');
    }

    public function riwayatpetani()
    {
        $this->load->view('header');
        $this->load->view('riwayat_petani');
        $this->load->view('footer');   
    }

    public function riwayatpemborong()
    {
        $this->load->view('header');
        $this->load->view('riwayat_pemborong');
        $this->load->view('footer');   
    }

}
?>