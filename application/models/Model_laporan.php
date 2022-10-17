<?php

class Model_laporan extends CI_Model
{

	function getTahunAjaran()
	{

		return $this->db->query("SELECT tahun_ajaran FROM absensi_berjamaah GROUP BY tahun_ajaran ORDER BY tahun_ajaran ASC");
	}

	function getSantri()
	{

		return $this->db->query("SELECT * FROM santri ORDER BY santri.nama_santri ASC ");
	}

	function getKitab()
	{

		return $this->db->query("SELECT * FROM kitab ORDER BY kitab.nama_kitab ASC ");
	}

	function getKelas()
	{

		return $this->db->query("SELECT * FROM kelas ORDER BY kelas.nama_kelas ASC ");
	}

	function getAsrama()
	{

		return $this->db->query("SELECT * FROM asrama ORDER BY asrama.nama_asrama ASC ");
	}

	function getListSantri($nps, $jk, $kode_kelas, $kode_asrama, $tahun_masuk)
	{

		if ($nps != '') {
			$nps      = "AND santri.nps = '$nps' ";
		}

		if ($jk != '') {
			$jk      = "AND santri.jk = '$jk' ";
		}

		if ($kode_kelas != '') {
			$kode_kelas      = "AND santri.kode_kelas = '$kode_kelas' ";
		}

		if ($kode_asrama != '') {
			$kode_asrama      = "AND santri.kode_asrama = '$kode_asrama' ";
		}

		if ($tahun_masuk != '') {
			$tahun_masuk      = "AND LEFT(santri.nps,4) = '$tahun_masuk' ";
		}

		return $this->db->query("SELECT * FROM santri 
		LEFT JOIN kelas ON kelas.kode_kelas = santri.kode_kelas
		LEFT JOIN asrama ON asrama.kode_asrama = santri.kode_asrama
		WHERE santri.status = 'Aktif' "
			. $nps
			. $jk
			. $kode_kelas
			. $kode_asrama
			. $tahun_masuk
			. "
	  ORDER BY nama_kelas,nama_santri ASC");
	}

	function getAbsensiBerjamaah($kode_asrama = "", $nps = "")
	{

		if ($kode_asrama != '') {
			$kode_asrama      = "AND santri.kode_asrama = '$kode_asrama' ";
		}

		if ($nps != '') {
			$nps      = "AND santri.nps = '$nps' ";
		}
		return $this->db->query("SELECT 
	  *, santri.nama_santri,
	  santri.nps
	  FROM santri 
	  WHERE santri.status = 'Aktif'
	  "
			. $kode_asrama
			. $nps
			. " 
	  GROUP BY santri.nps
	  ORDER BY nama_santri ASC ");
	}

	function getAbsensiKehadiran($kode_asrama = "", $nps = "")
	{

		if ($kode_asrama != '') {
			$kode_asrama      = "AND santri.kode_asrama = '$kode_asrama' ";
		}

		if ($nps != '') {
			$nps      = "AND santri.nps = '$nps' ";
		}
		return $this->db->query("SELECT 
	  *, santri.nama_santri,
	  santri.nps
	  FROM santri 
	  WHERE santri.status = 'Aktif'
	  "
			. $kode_asrama
			. $nps
			. " 
	  GROUP BY santri.nps
	  ORDER BY nama_santri ASC ");
	}

	function getAbsensiMengaji($kode_kelas = "", $nps = "")
	{

		if ($kode_kelas != '') {
			$kode_kelas      = "AND santri.kode_kelas = '$kode_kelas' ";
		}

		if ($nps != '') {
			$nps      = "AND santri.nps = '$nps' ";
		}

		return $this->db->query("SELECT 
	  *, santri.nama_santri,
	  santri.nps
	  FROM santri 
	  WHERE santri.status = 'Aktif'
	  "
			. $kode_kelas
			. $nps
			. " 
	  GROUP BY santri.nps
	  ORDER BY nama_santri ASC ");
	}

	function getPeringatan($dari = "", $sampai = "", $nps = "", $tahun_ajaran = "", $semester = "")
	{

		if ($nps != '') {
			$nps      = "AND santri.nps = '$nps' ";
		}

		if ($dari != '') {
			$dari      = "AND sp.tanggal BETWEEN '$dari' AND '$sampai' ";
		}

		if ($semester != "") {
			$semester       =  "AND sp.semester = '$semester'";
		}

		return $this->db->query("SELECT 
	  *, santri.nama_santri,
	  santri.nps
	  FROM sp 
	  LEFT JOIN santri ON sp.nps = santri.nps
	  WHERE santri.status = 'Aktif' 
	  "
			. $nps
			. $semester
			. $dari
			. " 
	  ORDER BY tanggal ASC 
	  ");
	}

	function getSuratIzin($dari = "", $sampai = "", $nps = "", $tahun_ajaran = "", $semester = "", $jk = "", $kode_kelas = "", $kode_asrama = "")
	{

		if ($nps != '') {
			$nps      = " AND santri.nps = '$nps' ";
		}
		
		if ($kode_kelas != '') {
			$kode_kelas      = " AND santri.kode_kelas = '$kode_kelas' ";
		}
		
		if ($kode_asrama != '') {
			$kode_asrama      = " AND santri.kode_asrama = '$kode_asrama' ";
		}
		
		if ($jk != '') {
			$jk      = " AND santri.jk = '$jk' ";
		}

		if ($dari != '') {
			$dari      = " AND surat_izin.dari BETWEEN '$dari' AND '$sampai' AND surat_izin.sampai BETWEEN '$dari' AND '$sampai'";
		}

		if ($semester != "") {
			$semester       =  "AND surat_izin.semester = '$semester'";
		}

		return $this->db->query("SELECT 
	  *, santri.nama_santri,
	  santri.nps
	  FROM surat_izin 
	  INNER JOIN santri ON surat_izin.nps = santri.nps
	  LEFT JOIN kelas ON kelas.kode_kelas = santri.kode_kelas
	  LEFT JOIN asrama ON asrama.kode_asrama = santri.kode_asrama
	  WHERE santri.status = 'Aktif' AND surat_izin.tahun_ajaran = '$tahun_ajaran' 
	  "
			. $nps
			. $dari
			. $semester
			. $jk
			. $kode_kelas
			. $kode_asrama
			. " 
	  ORDER BY dari ASC ");
	}
}
