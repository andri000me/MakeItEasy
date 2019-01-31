<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_perusahaan extends CI_Model {
	public function SubmitPengeluaran($data)
	{
		$this->db->insert('pengeluaran', $data);
	}

	public function SubmitPemasukan($data)
	{
		$this->db->insert('pemasukan', $data);
	}

	public function Pengeluaran()
	{
		$query = $this->db->query('SELECT * FROM pengeluaran ORDER BY id DESC');
		return $query->result();
	}

	public function Pemasukan()
	{
		$query = $this->db->query('SELECT * FROM pemasukan ORDER BY id DESC');
		return $query->result();
	}

	public function rekap_petani_harian($month)
	{
		$query = $this->db->query(
			"SELECT x.tanggal, SUM(x.berat_kotor) as berat_kotor, SUM(x.bon) as bon, SUM(x.jumlah_uang) as jumlah_uang FROM
				(SELECT a.tanggal, (a.berat_kotor), a.bon, (a.berat_kotor-a.berat_bs-a.berat_susut)*b.harga_bersih + a.berat_bs*b.harga_bs as jumlah_uang
				FROM transaksi_petani a LEFT JOIN harga_cabai_petani b ON a.kode_cabai = b.kode_cabai
				UNION ALL 
				SELECT tanggal, berat_kotor, bon, berat_bs*harga_bs + (berat_kotor-berat_bs-berat_susut)*harga_bersih as jumlah_uang FROM transaksi_petaninonmitra) x
			WHERE tanggal LIKE '$month%' GROUP BY tanggal ORDER BY tanggal ASC");
		return $query->result();
	}


	public function rekap_pembeli_harian($month)
	{
		$query= $this->db->query(
			"SELECT x.tanggal, SUM(x.bersih) as bersih, SUM(x.jumlah_uang) as jumlah_uang, SUM(x.transferan) as transferan 
				FROM
				(SELECT a.tanggal, a.bersih, a.harga * a.bersih as jumlah_uang, a.transferan FROM transaksi_pembeli a
					UNION ALL
					SELECT b.tanggal, b.bersih, b.harga*b.bersih as jumlah_uang, b.transferan FROM transaksi_pembelinonmitra b) x
				WHERE tanggal LIKE '$month%' GROUP BY tanggal ORDER BY tanggal ASC ");
		return $query->result();
	}

	public function rekap_pemasukan_pengeluaran($month)
	{
		$query= $this->db->query(
			"SELECT tanggal, SUM(pemasukan) as pemasukan, SUM(pengeluaran) as pengeluaran FROM 
				(SELECT tanggal, harga_satuan*jumlah as pemasukan, NULL as pengeluaran FROM pemasukan GROUP BY tanggal 
				UNION ALL 
				SELECT tanggal, NULL as pemasukan, harga_satuan*jumlah as pengeluaran FROM pengeluaran) x 
			WHERE tanggal LIKE '$month%' GROUP BY tanggal ORDER BY tanggal ASC ");

		return $query->result();
	}

	public function rincian_cabai($month)
	{
		$query= $this->db->query(
			"SELECT a.jenis, SUM(b.bersih) as bersih FROM
				(SELECT tanggal, kode_cabai as kode, bersih FROM transaksi_pembelinonmitra
					UNION ALL 
					SELECT tanggal, kode, bersih FROM transaksi_pembeli) b
				JOIN tb_cabai a ON a.kode = b.kode WHERE b.tanggal LIKE '$month%' GROUP BY a.jenis
			");

		return $query->result();
	}
}