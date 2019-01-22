<?php

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_admin');
		
	}

	public function index()
	{
		$this->load->view('loginMIE');
	}

	function Auth()
    {
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek_admin=$this->model_admin->auth_admin($password, 1);
 
        if($cek_admin->num_rows() > 0){ //jika password bener
            $data=$cek_admin->row_array();
        	$this->session->set_userdata('masuk',TRUE);
            $this->session->set_userdata('ses_id',$data['id_admin']);
            $this->session->set_userdata('ses_name', $data['name']);
            $this->session->set_userdata('ses_password', $data['password']);

            redirect('Transaksi/transpetani');
 
        }else{ 
                $url=base_url('/Login');
                echo $this->session->set_flashdata('msg','<i class="text-yellow fa fa-warning" style="padding-top:8px"></i>  Password Salah!');
                redirect($url);
             }
    }
 
    function logout()
    {
        $this->session->sess_destroy();
        $url=base_url('/Login');
        redirect($url);
    }

}

?>