<?php

class Transaksi extends CI_Controller {

	public function index()
		{
			$this->load->view('header');
			$this->load->view('transaksi_petani');
			$this->load->view('footer');
		}

	public function transpetani()
		{
			$this->load->view('header');
			$this->load->view('transaksi_petaniREV');
			$this->load->view('footer');
		}

	public function transborong()
		{
			$this->load->view('transaksi_pemborong');
		}

}
