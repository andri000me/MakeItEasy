<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Excel_import extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('excel_import_model');
		$this->load->library('excel');

		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('Login'));
		}
	}	

	function index()
	{
		$this->load->view('header');
		$this->load->view('import_petani');
	}

	function fetch()
	{
		$data = $this->excel_import_model->select();
		$output ='
		<h3 align="center">Total Data - ' .$data->num_rows(). '</h3>
		 <table class="table table-bordered table-striped" id="example1">
              <thead>
                <tr class="bg-success">
                  <th style="text-align: center; line-height: 50px">ID</th> 
				  <th style="text-align: center; line-height: 50px">Kemitraan</th>                
                  <th style="text-align: center; line-height: 50px">Nama Lengkap</th>
                  <th style="text-align: center; line-height: 50px">Nama Panggil</th>
                  <th style="text-align: center; line-height: 50px">Asal Daerah</th>
                  <th style="text-align: center; line-height: 50px">Alamat</th>
                  <th style="text-align: center; line-height: 50px">No Telp/HP</th>
                  <th style="text-align: center; line-height: 50px">Saldo</th>
                  <th style="text-align: center; line-height: 50px">Jaminan </th>
                </tr>
              </thead>
		';
		foreach ($data->result() as $row) 
		{
			$output .= '
			<tr>
				<td>' .$row->id. '</td>
				<td>' .$row->kemitraan. '</td>
				<td>' .$row->nama. '</td>
				<td>' .$row->nama_panggil. '</td>
				<td>' .$row->desa. '</td>
				<td>' .$row->alamat. '</td>
				<td>' .$row->no_telp. '</td>
				<td>' .$row->saldo. '</td>
				<td>' .$row->jaminan. '</td>
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
					$kemitraan = $worksheet->getCellByColumnAndRow(0,$row)->getValue();
					$nama = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
					$nama_panggil = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
					$desa = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
					$alamat = $worksheet->getCellByColumnAndRow(4,$row)->getValue();
					$no_telp = $worksheet->getCellByColumnAndRow(5,$row)->getValue();
					$saldo = $worksheet->getCellByColumnAndRow(6,$row)->getValue();
					$jaminan = $worksheet->getCellByColumnAndRow(7,$row)->getValue();

					if(empty($nama) or empty($nama_panggil) or empty($desa) or empty($alamat) or empty($no_telp) or empty($saldo) )
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
							'kemitraan'=> $kemitraan,
							'nama' => $nama,
							'nama_panggil' => $nama_panggil,
							'desa' => $desa,
							'alamat' => $alamat,
							'no_telp' => $no_telp,
							'saldo' => $saldo,
							'jaminan' => $jaminan
						);
						$success++;
					}
				}
			}
			$this->excel_import_model->insert($data);
			// if(isset($_GET['success'])){
				echo "".$success." Data BERHASIL diimport.</br>"
					.$failed. " Data GAGAL diimport";
				// }


		}
	}
}

?>