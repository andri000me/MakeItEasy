<?php

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_transaksi_petani');
	}
	
	public function index()
		{
			$this->load->view('header');
			$this->load->view('transaksi_petani');
			$this->load->view('footer');
		}

	public function transpetani()
		{
			$data['tb_transaksi']=$this->model_transaksi_petani->tb_transaksi();
            $timezone = new DateTimeZone('Asia/Jakarta');
            
            $dt = new DateTime();
            $dt->setTimezone($timezone);
            $date = $dt->format('Y-m-d');
            $data['today'] = $date;

            $data['harga_today'] = $this->model_transaksi_petani->harga_today($date);

			$this->load->view('header');
			$this->load->view('transaksi_petaniREV', $data);
			$this->load->view('footer');
		}

	public function transborong()
		{
			$this->load->view('transaksi_pemborong');
		}

}
