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

    function ubah_password()
    {
    	$this->load->view('ubah_password');
    }

    function check_password()
    {
        $password = $this->input->post('old_password');

        $check = $this->model_admin->auth_admin($password, 1);
        
        if($check->num_rows() > 0){
            echo json_encode(false);
        } else {
            echo json_encode(true);
        }
    }

    function update_password()
    {
    	$new_password = $this->input->post("new_password");

        $data['password'] = $new_password;

    	$result = $this->model_admin->update_password(1, $data);
        //show success or error message
        // if ($result==true) {
        //     $this->session->set_flashdata('true', 'Password berhasil diubah, silakan login kembali');
        // } else {
        //     $this->session->set_flashdata('error', 'Error! Tidak berhasil');
        // }

        redirect('Login');
    }

}

?>