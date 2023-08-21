<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    //BagOPS and Admin
	public function getPanenLaporan($tanggal_awal, $tanggal_akhir)
	{
		$query = "SELECT *, (SELECT count('panen.id_panen') FROM panen WHERE panen.status_panen = 'selesai') AS jumlah_panen FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query)->result_array();
	}

	public function getPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$query = "SELECT *, (SELECT count('panen.id_panen') FROM panen WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ) AS jumlah_panen FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query);
	}

	public function getTandanPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$query = "SELECT *, sum(panen.jumlah_tandan) as jumlah_tandan FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		";
		return $this->db->query($query);
	}

	public function getTandanKgPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$query = "SELECT *, sum(panen.tandan_kg) as tandan_kg
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		";
		return $this->db->query($query);
	}

	public function getRataTandanPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$query = "SELECT *, sum(panen.rata_tandan) as rata_tandan
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		";
		return $this->db->query($query);
	}

	public function getBrondolanPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$query = "SELECT *, sum(panen.brondolan) as brondolan
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		";
		return $this->db->query($query);
	}

	public function getTandanMentahPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$query = "SELECT *, sum(panen.tandan_mentah) as tandan_mentah
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		";
		return $this->db->query($query);
	}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	// administrator Unit
	public function getPanenLaporanUnitAdministrator($tanggal_awal, $tanggal_akhir)
	{
		$id_unit = $this->session->userdata('id_unit');
		$query = "SELECT *, (SELECT count('panen.id_panen') FROM panen INNER JOIN unit ON panen.id_unit = unit.id_unit WHERE panen.status_panen = 'selesai' AND unit.id_unit = '$id_unit') AS jumlah_panen FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		AND unit.id_unit = '$id_unit'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query)->result_array();
	}


	public function getPanenLaporanSortTglUnitAdministrator($tanggal_awal, $tanggal_akhir)
	{
		$id_unit = $this->session->userdata('id_unit');
		$query = "SELECT *, (SELECT count('panen.id_panen') FROM panen INNER JOIN unit ON panen.id_unit = unit.id_unit WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND unit.id_unit = '$id_unit') AS jumlah_panen FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		AND unit.id_unit = '$id_unit'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query);
	}

	public function getPanenLaporanSortStatusPanenUnitAdministrator($tanggal_awal, $tanggal_akhir, $status_panen)
	{
		$id_unit = $this->session->userdata('id_unit');
		$query = "SELECT *, (SELECT count('panen.status_panen') FROM panen INNER JOIN unit ON panen.id_unit = unit.id_unit WHERE panen.status_panen = '$status_panen' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND unit.id_unit = '$id_unit') AS '$status_panen' FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = '$status_panen' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		AND unit.id_unit = '$id_unit'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query);
	}

	public function getPanenUnitLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$id_unit = $this->session->userdata('id_unit');
		$query = "SELECT *, (SELECT count('panen.id_panen') FROM panen WHERE panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir') AS jumlah_panen FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND unit.id_unit = '$id_unit'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query);
	}

	public function getTandanPanenUnitLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$id_unit = $this->session->userdata('id_unit');
		$query = "SELECT *, sum(panen.jumlah_tandan) as jumlah_tandan
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
		AND unit.id_unit = '$id_unit'
		";
		return $this->db->query($query);
	}

	public function getTandanKgPanenUnitLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$id_unit = $this->session->userdata('id_unit');
		$query = "SELECT *, sum(panen.tandan_kg) as tandan_kg
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND unit.id_unit = '$id_unit'
		";
		return $this->db->query($query);
	}

	public function getRataTandanPanenUnitLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$id_unit = $this->session->userdata('id_unit');
		$query = "SELECT *, sum(panen.rata_tandan) as rata_tandan
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND unit.id_unit = '$id_unit'
		";
		return $this->db->query($query);
	}

	public function getBrondolanPanenUnitLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{

		$id_unit = $this->session->userdata('id_unit');
		$query = "SELECT *, sum(panen.brondolan) as brondolan
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND unit.id_unit = '$id_unit'
		";
		return $this->db->query($query);
	}

	public function getTandanMentahPanenUnitLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$id_unit = $this->session->userdata('id_unit');
		$query = "SELECT *, sum(panen.tandan_mentah) as tandan_mentah
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND unit.id_unit = '$id_unit'
		";
		return $this->db->query($query);
	}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//Asis afd and Kerani Panen
	public function getPanenAfdelingLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$id_afdeling = $this->session->userdata('id_afdeling');	
		$query = "SELECT *, (SELECT count('panen.id_panen') FROM panen WHERE panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND afdeling.id_afdeling = '$id_afdeling') AS jumlah_panen FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND afdeling.id_afdeling = '$id_afdeling'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query);
	}

	public function getTandanPanenAfdelingLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$id_afdeling = $this->session->userdata('id_afdeling');
		$query = "SELECT *, sum(panen.jumlah_tandan) as jumlah_tandan
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
		AND afdeling.id_afdeling = '$id_afdeling'
		";
		return $this->db->query($query);
	}

	public function getTandanKgPanenAfdelingLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$id_afdeling = $this->session->userdata('id_afdeling');
		$query = "SELECT *, sum(panen.tandan_kg) as tandan_kg
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
		AND afdeling.id_afdeling = '$id_afdeling'
		";
		return $this->db->query($query);
	}

	public function getRataTandanPanenAfdelingLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$id_afdeling = $this->session->userdata('id_afdeling');
		$query = "SELECT *, sum(panen.rata_tandan) as rata_tandan
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
		AND afdeling.id_afdeling = '$id_afdeling'
		";
		return $this->db->query($query);
	}

	public function getBrondolanPanenAfdelingLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$id_afdeling = $this->session->userdata('id_afdeling');
		$query = "SELECT *, sum(panen.brondolan) as brondolan
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
		AND afdeling.id_afdeling = '$id_afdeling'
		";
		return $this->db->query($query);
	}

	public function getTandanMentahPanenAfdelingLaporanSortTgl($tanggal_awal, $tanggal_akhir)
	{
		$id_afdeling = $this->session->userdata('id_afdeling');
		$query = "SELECT *, sum(panen.tandan_mentah) as tandan_mentah
		FROM panen
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
		AND afdeling.id_afdeling = '$id_afdeling'
		";
		return $this->db->query($query);
	}

	public function getPanenLaporanSortStatusPanen($tanggal_awal, $tanggal_akhir, $status_panen)
	{
		$query = "SELECT *, (SELECT count('panen.status_panen') FROM panen WHERE panen.status_panen = '$status_panen' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir') AS '$status_panen' FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = '$status_panen' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query);
	}

	public function getPanenLaporanAfdelingAdministrator($tanggal_awal, $tanggal_akhir)
	{

		$id_afdeling = $this->session->userdata('id_afdeling');
		$query = "SELECT *, (SELECT count('panen.id_panen') FROM panen INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling WHERE panen.status_panen = 'selesai' AND afdeling.id_afdeling = '$id_afdeling') AS jumlah_panen FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		AND afdeling.id_afdeling = '$id_afdeling'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query)->result_array();
	}


	public function getPanenLaporanSortTglAfdelingAdministrator($tanggal_awal, $tanggal_akhir)
	{
		$id_afdeling = $this->session->userdata('id_afdeling');
		$query = "SELECT *, (SELECT count('panen.id_panen') FROM panen INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND afdeling.id_afdeling = '$id_afdeling') AS jumlah_panen FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = 'selesai' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		AND afdeling.id_afdeling = '$id_afdeling'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query);
	}

	public function getPanenLaporanSortStatusPanenAfdelingAdministrator($tanggal_awal, $tanggal_akhir, $status_panen)
	{
		$id_afdeling = $this->session->userdata('id_afdeling');
		$query = "SELECT *, (SELECT count('panen.status_panen') FROM panen INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling WHERE panen.status_panen = '$status_panen' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND afdeling.id_afdeling = '$id_afdeling') AS '$status_panen' FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen = '$status_panen' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		AND unit.id_unit = '$id_afdeling'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query);
	}
}
