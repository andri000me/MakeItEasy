<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Import_Pembeli extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_import_pembeli');
		$this->load->library('excel');

		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('Login'));
		}
	}	

	function index()
	{
		$this->load->view('header');
		$this->load->view('import_pembeli');
	}

	function fetch()
	{
		$data = $this->model_import_pembeli->select();
		$output ='
		<h3 align="center">Total Data - ' .$data->num_rows(). '</h3>
		 <table class="table table-bordered table-striped" id="example1">
              <thead>
                <tr class="bg-danger">
                  <th style="text-align: center; line-height: 50px">ID</th> 
				  <th style="text-align: center; line-height: 50px">Nama</th>                
                  <th style="text-align: center; line-height: 50px">Alamat</th>
                  <th style="text-align: center; line-height: 50px">No HP</th>
                  <th style="text-align: center; line-height: 50px">No Rekening</th>
                  <th style="text-align: center; line-height: 50px">Saldo</th>
                </tr>
              </thead>
		';
		foreach ($data->result() as $row) 
		{
			$output .= '
			<tr>
				<td>' .$row->id. '</td>
				<td>' .$row->nama. '</td>
				<td>' .$row->alamat. '</td>
				<td>' .$row->no_telp. '</td>
				<td>' .$row->no_rek. '</td>
				<td>' .$row->saldo. '</td>
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	} 


	function import()
	{
		$failed=0;
		$success=0;
		$sama=0;

		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"]	;
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) 
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=3	; $row<=$highestRow; $row++)
				{
					$nama = $worksheet->getCellByColumnAndRow(0,$row)->getValue();
					$alamat = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
					$no_telp = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
					$no_rek = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
					$saldo = $worksheet->getCellByColumnAndRow(4,$row)->getValue();

					if(empty($nama) or empty($alamat) or empty($no_telp) or empty($saldo) )
					{
						$failed++;
						continue;
					}

					//else if (data exist)
					// {
					// 	$sama++;
					// 	continue;
					// }

					else {
						$data[] = array(
							'nama' => $nama,
							'alamat' => $alamat,
							'no_telp' => $no_telp,
							'no_rek' => $no_rek,
							'saldo' => $saldo
						);
						$success++;
					}
				}
			}
			$this->model_import_pembeli->insert($data);
			//if(isset($_GET['success'])){
				echo "".$success." Data BERHASIL diimport.</br>"
					.$failed. " Data GAGAL diimport";
			//	}
		}
	}


}

?>