<?php

class Perusahaan extends CI_Controller {


	public function index()
		{
			$this->load->view('header');
			$this->load->view('perusahaanREV');
		}

}