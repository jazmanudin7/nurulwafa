<?php
class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->Model(array('Model_laporan'));
		ceklogin();
	}

	function laporanSantri()
	{

		$data['santri']       	= $this->Model_laporan->getSantri();
		$data['kelas']       	= $this->Model_laporan->getKelas();
		$data['asrama']       	= $this->Model_laporan->getAsrama();
		$this->template->load('template', 'laporan/laporanSantri', $data);
	}

	function cetakSantri()
	{

		$nps                    = $this->input->post('nps');
		$jk                    	= $this->input->post('jk');
		$kode_kelas        		= $this->input->post('kode_kelas');
		$kode_asrama        	= $this->input->post('kode_asrama');
		$tahun_masuk        	= $this->input->post('tahun_masuk');
		$data['kode_asrama']	= $kode_asrama;
		$data['kode_kelas']		= $kode_kelas;
		$data['jk']				= $jk;
		$data['data']           = $this->Model_laporan->getListSantri($nps, $jk, $kode_kelas, $kode_asrama, $tahun_masuk)->result();
		if (isset($_POST['export'])) {
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Laporan Santri.xls");
		}
		$this->load->view('laporan/cetakSantri', $data);
	}

	function laporanAbsensiBerjamaah()
	{

		$data['santri']       	= $this->Model_laporan->getSantri();
		$data['asrama']       	= $this->Model_laporan->getAsrama();
		$data['tahunajaran']  	= $this->Model_laporan->getTahunAjaran();
		$this->template->load('template', 'laporan/laporanAbsensiBerjamaah', $data);
	}

	function cetakAbsensiBerjamaah()
	{

		$nps                    = $this->input->post('nps');
		$kode_asrama        	= $this->input->post('kode_asrama');
		$semester        		= $this->input->post('semester');
		$tahun_ajaran        	= $this->input->post('tahun_ajaran');
		$shalat        			= $this->input->post('shalat');
		$dari        			= $this->input->post('dari');
		$sampai        			= $this->input->post('sampai');
		$data['dari']			= $dari;
		$data['shalat']			= $shalat;
		$data['sampai']			= $sampai;
		$data['kode_asrama']	= $kode_asrama;
		$data['tahun_ajaran']	= $tahun_ajaran;
		$data['semester']		= $semester;
		$data['data']           = $this->Model_laporan->getAbsensiBerjamaah($kode_asrama, $nps)->result();
		if (isset($_POST['export'])) {
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Laporan Absensi Berjamaah.xls");
		}
		$this->load->view('laporan/cetakAbsensiBerjamaah', $data);
	}

	function laporanAbsensiKehadiran()
	{

		$data['santri']       	= $this->Model_laporan->getSantri();
		$data['asrama']       	= $this->Model_laporan->getAsrama();
		$data['tahunajaran']  	= $this->Model_laporan->getTahunAjaran();
		$this->template->load('template', 'laporan/laporanAbsensiKehadiran', $data);
	}

	function cetakAbsensiKehadiran()
	{

		$nps                    = $this->input->post('nps');
		$kode_asrama        	= $this->input->post('kode_asrama');
		$dari        			= $this->input->post('dari');
		$sampai        			= $this->input->post('sampai');
		$tahun_ajaran        	= $this->input->post('tahun_ajaran');
		$semester        		= $this->input->post('semester');
		$data['dari']			= $dari;
		$data['sampai']			= $sampai;
		$data['kode_asrama']	= $kode_asrama;
		$data['tahun_ajaran']	= $tahun_ajaran;
		$data['semester']		= $semester;
		$data['data']           = $this->Model_laporan->getAbsensiKehadiran($kode_asrama, $nps)->result();
		if (isset($_POST['export'])) {
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Laporan Absensi Kehadiran.xls");
		}
		$this->load->view('laporan/cetakAbsensiKehadiran', $data);
	}

	function laporanAbsensiMengaji()
	{

		$data['santri']       	= $this->Model_laporan->getSantri();
		$data['kelas']       	= $this->Model_laporan->getKelas();
		$data['kitab']       	= $this->Model_laporan->getKitab();
		$data['tahunajaran']  	= $this->Model_laporan->getTahunAjaran();
		$this->template->load('template', 'laporan/laporanAbsensiMengaji', $data);
	}

	function cetakAbsensiMengaji()
	{

		$nps                    = $this->input->post('nps');
		$kode_kelas        		= $this->input->post('kode_kelas');
		$kode_kitab        		= $this->input->post('kode_kitab');
		$dari        			= $this->input->post('dari');
		$sampai        			= $this->input->post('sampai');
		$tahun_ajaran        	= $this->input->post('tahun_ajaran');
		$semester        		= $this->input->post('semester');
		$data['dari']			= $dari;
		$data['sampai']			= $sampai;
		$data['kode_kelas']		= $kode_kelas;
		$data['kode_kitab']		= $kode_kitab;
		$data['tahun_ajaran']	= $tahun_ajaran;
		$data['semester']		= $semester;
		$data['data']           = $this->Model_laporan->getAbsensiMengaji($kode_kelas, $nps)->result();
		if (isset($_POST['export'])) {
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Laporan Absensi Mengaji.xls");
		}
		$this->load->view('laporan/cetakAbsensiMengaji', $data);
	}



	function laporanSuratIzin()
	{

		$data['santri']       	= $this->Model_laporan->getSantri();
		$data['asrama']       	= $this->Model_laporan->getAsrama();
		$data['kelas']       	= $this->Model_laporan->getKelas();
		$data['tahunajaran']  	= $this->Model_laporan->getTahunAjaran();
		$this->template->load('template', 'laporan/laporanSuratIzin', $data);
	}

	function cetakSuratIzin()
	{

		$nps                    = $this->input->post('nps');
		$dari        			= $this->input->post('dari');
		$sampai        			= $this->input->post('sampai');
		$tahun_ajaran        	= $this->input->post('tahun_ajaran');
		$semester        		= $this->input->post('semester');
		$kode_kelas        		= $this->input->post('kode_kelas');
		$kode_asrama        	= $this->input->post('kode_asrama');
		$jk        		        = $this->input->post('jk');
		$data['dari']			= $dari;
		$data['sampai']			= $sampai;
		$data['tahun_ajaran']	= $tahun_ajaran;
		$data['semester']		= $semester;
		$data['kode_kelas']		= $kode_kelas;
		$data['kode_asrama']    = $kode_asrama;
		$data['jk']		        = $jk;
		$data['data']           = $this->Model_laporan->getSuratIzin($dari, $sampai, $nps, $tahun_ajaran, $semester, $jk, $kode_asrama, $kode_kelas)->result();
		if (isset($_POST['export'])) {
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Laporan Surat Izin.xls");
		}
		$this->load->view('laporan/cetakSuratIzin', $data);
	}

	function laporanPeringatan()
	{

		$data['santri']       	= $this->Model_laporan->getSantri();
		$data['tahunajaran']  	= $this->Model_laporan->getTahunAjaran();
		$this->template->load('template', 'laporan/laporanPeringatan', $data);
	}

	function cetakPeringatan()
	{

		$nps                    = $this->input->post('nps');
		$dari        			= $this->input->post('dari');
		$sampai        			= $this->input->post('sampai');
		$tahun_ajaran        	= $this->input->post('tahun_ajaran');
		$semester        		= $this->input->post('semester');
		$data['dari']			= $dari;
		$data['sampai']			= $sampai;
		$data['tahun_ajaran']	= $tahun_ajaran;
		$data['semester']		= $semester;
		$data['data']           = $this->Model_laporan->getPeringatan($dari, $sampai, $nps, $tahun_ajaran, $semester)->result();
		if (isset($_POST['export'])) {
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Laporan Peringatan.xls");
		}
		$this->load->view('laporan/cetakPeringatan', $data);
	}
}
