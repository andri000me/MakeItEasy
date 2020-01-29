<?php
class Coba extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('model_coba');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('coba_datatable');
    }

    public function test()
    {
    	$list = $this->model_coba->get_datatables();

    	echo $list;
    }
 
    public function ajax_list()
    {
        $list = $this->model_coba->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->id_petani;
            $row[]=$person->tanggal;
            $row[] = $person->nama;
            $row[] = $person->desa;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_coba->count_all(),
                        "recordsFiltered" => $this->model_coba->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->model_coba->get_by_id($id);
        echo json_encode($data);
    }
 
    // public function ajax_update()
    // {
    //     $data = array(
    //             'firstName' => $this->input->post('firstName'),
    //             'lastName' => $this->input->post('lastName'),
    //             'gender' => $this->input->post('gender'),
    //             'address' => $this->input->post('address'),
    //             'dob' => $this->input->post('dob'),
    //         );
    //     $this->person->update(array('id' => $this->input->post('id')), $data);
    //     echo json_encode(array("status" => TRUE));
    // }
 
    // public function ajax_delete($id)
    // {
    //     $this->person->delete_by_id($id);
    //     echo json_encode(array("status" => TRUE));
    // }
 
    
}