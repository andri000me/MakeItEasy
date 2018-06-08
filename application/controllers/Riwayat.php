<?php

class Riwayat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_riwayat');
		
	}

	public function index()
		{
			$this->load->view('header');
			$this->load->view('transaksi_petani');
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
    		'enddate' => $enddate );

		$this->load->view('header');
		$this->load->view('riwayat_petani', $data); 
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

}
?>