<?php

class Perusahaan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_perusahaan');
		$this->load->model('model_profil');	
	}

	public function index()
		{
			$data['pengeluaran'] = $this->model_perusahaan->Pengeluaran();
			$data['pemasukan'] = $this->model_perusahaan->Pemasukan();

			$this->load->view('header');
			$this->load->view('perusahaanYP', $data);
		}

	function Pengeluaran()
	{
		$tanggal = $this->input->post('tanggal');
		$jenis = $this->input->post('jenis');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');

		$data = array(
			'tanggal' => $tanggal,
			'jenis' => $jenis,
			'harga_satuan' => $harga,
			'jumlah' => $jumlah );

		$this->model_perusahaan->SubmitPengeluaran($data);
		redirect('Perusahaan');
	}

	function Pemasukan()
	{
		$tanggal = $this->input->post('tanggal');
		$jenis = $this->input->post('jenis');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');

		$data = array(
			'tanggal' => $tanggal,
			'jenis' => $jenis,
			'harga_satuan' => $harga,
			'jumlah' => $jumlah );

		$this->model_perusahaan->SubmitPemasukan($data);
		redirect('Perusahaan');
	}

	function Dashboard()
	{
		$timezone = new DateTimeZone('Asia/Jakarta');
            
            $dt = new DateTime();
            $dt->setTimezone($timezone);
            $date = $dt->format('Y-m');



		$data = array(
			'jumlah_petani' => $this->model_profil->count_petani(),
			'jumlah_pembeli' => $this->model_profil->count_pembeli(),
			'today_month' => $date,
			'rekap_petani_harian' => $this->model_perusahaan->rekap_petani_harian($date),
			'rekap_pembeli_harian' => $this->model_perusahaan->rekap_pembeli_harian($date),
			'rekap_pemasukan_pengeluaran' => $this->model_perusahaan->rekap_pemasukan_pengeluaran($date) 
		);

		$this->load->view('header');
		$this->load->view('PerusahaanREV', $data);
	}

	function DashboardDate()
	{
		$date = $this->input->post('lihatTanggal');

		$data = array(
			'jumlah_petani' => $this->model_profil->count_petani(),
			'jumlah_pembeli' => $this->model_profil->count_pembeli(),
			'today_month' => $date,
			'rekap_petani_harian' => $this->model_perusahaan->rekap_petani_harian($date),
			'rekap_pembeli_harian' => $this->model_perusahaan->rekap_pembeli_harian($date),
			'rekap_pemasukan_pengeluaran' => $this->model_perusahaan->rekap_pemasukan_pengeluaran($date) 
		);

		$this->load->view('header');
		$this->load->view('PerusahaanREV', $data);
	}

	function delete_catatan()
	{
		$id = $this->input->post('id');
		$table = $this->input->post('table');

		$this->db->where('id', $id);
		$this->db->delete($table);

		echo "success";
	}

	function edit_catatan()	{
		$id = $this->input->post('id');
		$table = $this->input->post('table');

		$query = $this->db->get_where($table, array('id' => $id));

		echo json_encode($query->row());
	}

	function update_catatan()	{
		$id = $this->input->post('id');
		$table = $this->input->post('table');
		$tanggal =  $this->input->post('tanggal');
		$jenis = $this->input->post('jenis');
		$harga_satuan = $this->input->post('harga_satuan');
		$jumlah = $this->input->post('jumlah');

		$data = array(
			'tanggal' => $tanggal,
			'jenis' => $jenis,
			'harga_satuan' => $harga_satuan,
			'jumlah' => $jumlah );

		$this->db->where('id', $id);
		$this->db->update($table, $data);

		echo "success";
	}

	function rekap_cabai()	{
		$data = $this->model_perusahaan->rincian_cabai();

		echo json_encode($data);
	}

	function coba()	{
		$rekap_petani = $this->db->query(
			"SELECT x.tanggal, SUM(x.berat_kotor) as berat_kotor, SUM(x.bon) as bon, SUM(x.jumlah_uang) as jumlah_uang FROM
				(SELECT a.tanggal, (a.berat_kotor), a.bon, (a.berat_kotor-a.berat_bs-a.berat_susut)*b.harga_bersih + a.berat_bs*b.harga_bs as jumlah_uang
				FROM transaksi_petani a LEFT JOIN harga_cabai_petani b ON a.kode_cabai = b.kode_cabai
				UNION ALL 
				SELECT tanggal, berat_kotor, bon, berat_bs*harga_bs + (berat_kotor-berat_bs-berat_susut)*harga_bersih as jumlah_uang FROM transaksi_petaninonmitra) x
			GROUP BY tanggal ORDER BY tanggal ASC")
			;

		$rekap_pembeli = $this->db->query(
			"SELECT x.tanggal, SUM(x.bersih) as bersih, SUM(x.jumlah_uang) as jumlah_uang, SUM(x.transferan) as transferan 
				FROM
				(SELECT a.tanggal, a.bersih, a.harga * a.bersih as jumlah_uang, a.transferan FROM transaksi_pembeli a
					UNION ALL
					SELECT b.tanggal, b.bersih, b.harga*b.bersih as jumlah_uang, b.transferan FROM transaksi_pembelinonmitra b) x
				GROUP BY tanggal ORDER BY tanggal ASC"
		);
		$data = $rekap_petani->result();
		$rekapPembeli = $rekap_pembeli->result();

		$rekap_cabai = $this->model_perusahaan->rincian_cabai();

		$tabel['jumlahan'] = $data;
		$tabel['rekapPembeli'] = $rekapPembeli;
		$tabel['cabai'] = $rekap_cabai;

		$this->load->view('coba', $tabel);
	}

}