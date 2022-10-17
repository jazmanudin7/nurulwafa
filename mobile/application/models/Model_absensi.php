<?php

class Model_absensi extends CI_Model
{

	function getDataAbsensiBerjamaah($rowno, $rowperpage, $shalat = "", $tanggal = "")
	{
		$this->db->select('*');
		$this->db->from('absensi_berjamaah');
		$this->db->join('asrama', 'asrama.kode_asrama=absensi_berjamaah.kode_asrama');
		$this->db->order_by('tanggal', 'desc');

		if ($shalat != '') {
			$this->db->where('shalat', $shalat);
		}

		if ($tanggal != '') {
			$this->db->like('tanggal', $tanggal);
		}

		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getRecordAbsensiBerjamaah($shalat = "", $tanggal = "")
	{

		$this->db->select('count(*) as allcount');
		$this->db->from('absensi_berjamaah');
		$this->db->join('asrama', 'asrama.kode_asrama=absensi_berjamaah.kode_asrama');
		$this->db->order_by('tanggal', 'desc');

		if ($shalat != '') {
			$this->db->where('shalat', $shalat);
		}

		if ($tanggal != '') {
			$this->db->like('tanggal', $tanggal);
		}
		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	function inputAbsensiBerjamaah()
	{

		$no_absensi 		= $this->input->post('no_absensi');
		$shalat 			= $this->input->post('shalat');
		$tanggal 			= $this->input->post('tanggal');
		$kode_asrama 		= $this->input->post('kode_asrama');
		$tahun_ajaran 		= $this->session->userdata('tahun_ajaran');
		$semester 			= $this->session->userdata('semester');
		$data = array(

			'no_absensi'  		=> $no_absensi,
			'shalat' 			=> $shalat,
			'tanggal' 			=> $tanggal,
			'kode_asrama' 		=> $kode_asrama,
			'tahun_ajaran' 		=> $tahun_ajaran,
			'semester' 			=> $semester,

		);

		$santri = $this->db->query("SELECT * FROM santri 
		INNER JOIN asrama ON asrama.kode_asrama = santri.kode_asrama 
		WHERE santri.kode_asrama = '$kode_asrama' ")->result();
		foreach ($santri as $s) {
			$dataSantri = array(

				'no_absensi'  		=> $no_absensi,
				'nps' 				=> $s->nps,
				'keterangan' 		=> "Hadir",

			);
			$this->db->insert('absensi_berjamaah_detail', $dataSantri);
		}

		$this->db->insert('absensi_berjamaah', $data);
		redirect('absensi/viewAbsensiBerjamaah');
	}

	function hapusAbsensiBerjamaah()
	{

		$no_absensi	= $this->uri->segment(3);
		$this->db->delete('absensi_berjamaah', array('no_absensi' => $no_absensi));
		$this->db->delete('absensi_berjamaah_detail', array('no_absensi' => $no_absensi));
		redirect('absensi/viewAbsensiBerjamaah');
	}

	function getAbsensiBerjamaahDetail()
	{
		$no_absensi 		= $this->uri->segment(3);
		if ($no_absensi != "") {
			$noabsensi 		= $this->uri->segment(3);
		} else {
			$noabsensi 		= $this->input->post('no_absensi');
		}
		return $this->db->query("SELECT * FROM absensi_berjamaah_detail 
		INNER JOIN santri ON santri.nps = absensi_berjamaah_detail.nps 
		WHERE absensi_berjamaah_detail.no_absensi = '$noabsensi' ");
	}

	function getAbsensiBerjamaah()
	{
		$no_absensi 		= $this->uri->segment(3);
		if ($no_absensi != "") {
			$noabsensi 		= $this->uri->segment(3);
		} else {
			$noabsensi 		= $this->input->post('no_absensi');
		}
		return $this->db->query("SELECT * FROM absensi_berjamaah 
		INNER JOIN asrama ON asrama.kode_asrama = absensi_berjamaah.kode_asrama 
		WHERE no_absensi = '$noabsensi' 
		ORDER BY absensi_berjamaah.no_absensi DESC
		");
	}

	function editAbsensiBerjamaah()
	{

		$no_absensi 		= $this->input->post('no_absensi');
		$shalat 			= $this->input->post('shalat');
		$tanggal 			= $this->input->post('tanggal');
		$kode_asrama 		= $this->input->post('kode_asrama');
		$data = array(

			'no_absensi'  		=> $no_absensi,
			'tanggal' 			=> $tanggal,
			'kode_asrama' 		=> $kode_asrama,
			'shalat' 			=> $shalat,

		);

		$this->db->where('no_absensi', $no_absensi);
		$this->db->update('absensi_berjamaah', $data);
		redirect('absensi/viewAbsensiBerjamaah');
	}

	function updateKeteranganAbsensiBerjamaah()
	{

		$no_absensi 		= $this->input->post('no_absensi');
		$nps 				= $this->input->post('nps');
		$keterangan 		= $this->input->post('keterangan');
		$data = array(

			'keterangan'  		=> $keterangan,

		);

		$this->db->where('no_absensi', $no_absensi);
		$this->db->where('nps', $nps);
		$this->db->update('absensi_berjamaah_detail', $data);
	}

	function codeOtomatisAbsensiBerjamaah()
	{
		$bulanini	= date('m');
		$this->db->select('Right(absensi_berjamaah.no_absensi,3) as kode ', false);
		$this->db->where('mid(no_absensi,3,2)', $bulanini);
		$this->db->order_by('tanggal', 'desc');
		$this->db->limit(1);
		$query 		= $this->db->get('absensi_berjamaah');
		if ($query->num_rows() <> 0) {
			$data 	= $query->row();
			$kode 	= intval($data->kode) + 1;
		} else {
			$kode 	= 1;
		}
		$kodemax 	= str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi  	= "AB" . date('m') . date('y') . $kodemax;
		return $kodejadi;
	}

	//Berjamaah
	function getDataAbsensiKehadiran($rowno, $rowperpage, $shalat = "", $tanggal = "")
	{
		$this->db->select('*');
		$this->db->from('absensi_kehadiran');
		$this->db->join('asrama', 'asrama.kode_asrama=absensi_kehadiran.kode_asrama');
		$this->db->order_by('tanggal', 'desc');

		if ($shalat != '') {
			$this->db->where('shalat', $shalat);
		}

		if ($tanggal != '') {
			$this->db->like('tanggal', $tanggal);
		}

		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getRecordAbsensiKehadiran($shalat = "", $tanggal = "")
	{

		$this->db->select('count(*) as allcount');
		$this->db->from('absensi_kehadiran');
		$this->db->join('asrama', 'asrama.kode_asrama=absensi_kehadiran.kode_asrama');
		$this->db->order_by('tanggal', 'desc');

		if ($shalat != '') {
			$this->db->where('shalat', $shalat);
		}

		if ($tanggal != '') {
			$this->db->like('tanggal', $tanggal);
		}
		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	function inputAbsensiKehadiran()
	{

		$no_absensi 		= $this->input->post('no_absensi');
		$tanggal 			= $this->input->post('tanggal');
		$kode_asrama 		= $this->input->post('kode_asrama');
		$tahun_ajaran 		= $this->session->userdata('tahun_ajaran');
		$semester 			= $this->session->userdata('semester');
		$data = array(

			'no_absensi'  		=> $no_absensi,
			'tanggal' 			=> $tanggal,
			'kode_asrama' 		=> $kode_asrama,
			'tahun_ajaran' 		=> $tahun_ajaran,
			'semester' 			=> $semester,

		);

		$santri = $this->db->query("SELECT * FROM santri 
		INNER JOIN asrama ON asrama.kode_asrama = santri.kode_asrama 
		WHERE santri.kode_asrama = '$kode_asrama' ")->result();
		foreach ($santri as $s) {
			$dataSantri = array(

				'no_absensi'  		=> $no_absensi,
				'nps' 				=> $s->nps,
				'keterangan' 		=> "Hadir",

			);
			$this->db->insert('absensi_kehadiran_detail', $dataSantri);
		}

		$this->db->insert('absensi_kehadiran', $data);
		redirect('absensi/viewAbsensiKehadiran');
	}

	function hapusAbsensiKehadiran()
	{

		$no_absensi	= $this->uri->segment(3);
		$this->db->delete('absensi_kehadiran', array('no_absensi' => $no_absensi));
		$this->db->delete('absensi_kehadiran_detail', array('no_absensi' => $no_absensi));
		redirect('absensi/viewAbsensiKehadiran');
	}

	function getAbsensiKehadiranDetail()
	{
		$no_absensi 		= $this->uri->segment(3);
		if ($no_absensi != "") {
			$noabsensi 		= $this->uri->segment(3);
		} else {
			$noabsensi 		= $this->input->post('no_absensi');
		}
		return $this->db->query("SELECT * FROM absensi_kehadiran_detail 
		INNER JOIN santri ON santri.nps = absensi_kehadiran_detail.nps 
		INNER JOIN asrama ON asrama.kode_asrama = santri.kode_asrama 
		WHERE absensi_kehadiran_detail.no_absensi = '$noabsensi' ");
	}

	function getAbsensiKehadiran()
	{
		$no_absensi 		= $this->uri->segment(3);
		if ($no_absensi != "") {
			$noabsensi 		= $this->uri->segment(3);
		} else {
			$noabsensi 		= $this->input->post('no_absensi');
		}
		return $this->db->query("SELECT * FROM absensi_kehadiran 
		INNER JOIN asrama ON asrama.kode_asrama = absensi_kehadiran.kode_asrama 
		WHERE no_absensi = '$noabsensi' 
		ORDER BY absensi_kehadiran.no_absensi DESC
		");
	}

	function getAbsensiBerjamaahDetailSantri($bulan, $tahun, $shalat)
	{
		$nps 				= $this->session->userdata('no_uniq');

		return $this->db->query("SELECT * FROM absensi_berjamaah_detail 
		INNER JOIN absensi_berjamaah ON absensi_berjamaah.no_absensi = absensi_berjamaah_detail.no_absensi 
		INNER JOIN santri ON santri.nps = absensi_berjamaah_detail.nps 
		INNER JOIN asrama ON asrama.kode_asrama = santri.kode_asrama 
		WHERE absensi_berjamaah_detail.nps = '$nps' AND MONTH(absensi_berjamaah.tanggal) = '$bulan' AND YEAR(absensi_berjamaah.tanggal) = '$tahun' AND absensi_berjamaah.shalat = '$shalat'
		ORDER BY tanggal ASC");
	}

	function getAbsensiKehadiranDetailSantri($bulan, $tahun)
	{
		$nps 				= $this->session->userdata('no_uniq');

		return $this->db->query("SELECT * FROM absensi_kehadiran_detail 
		INNER JOIN absensi_kehadiran ON absensi_kehadiran.no_absensi = absensi_kehadiran_detail.no_absensi 
		INNER JOIN santri ON santri.nps = absensi_kehadiran_detail.nps 
		INNER JOIN asrama ON asrama.kode_asrama = santri.kode_asrama 
		WHERE absensi_kehadiran_detail.nps = '$nps' AND MONTH(absensi_kehadiran.tanggal) = '$bulan' AND YEAR(absensi_kehadiran.tanggal) = '$tahun' 
		ORDER BY tanggal ASC");
	}

	function getAbsensiMengajiDetailSantri($bulan, $tahun, $waktu_mengaji)
	{
		$nps 				= $this->session->userdata('no_uniq');

        if($waktu_mengaji != ''){
            $waktu_mengaji = "AND absensi_mengaji.waktu_mengaji = '$waktu_mengaji'";
        }
		return $this->db->query("SELECT * FROM absensi_mengaji_detail 
		INNER JOIN absensi_mengaji ON absensi_mengaji.no_absensi = absensi_mengaji_detail.no_absensi 
		INNER JOIN santri ON santri.nps = absensi_mengaji_detail.nps 
		INNER JOIN asrama ON asrama.kode_asrama = santri.kode_asrama 
		WHERE absensi_mengaji_detail.nps = '$nps' AND MONTH(absensi_mengaji.tanggal) = '$bulan' AND YEAR(absensi_mengaji.tanggal) = '$tahun' "
		.$waktu_mengaji 
		."
		ORDER BY tanggal ASC");
	}


	function editAbsensiKehadiran()
	{

		$no_absensi 		= $this->input->post('no_absensi');
		$tanggal 			= $this->input->post('tanggal');
		$kode_asrama 		= $this->input->post('kode_asrama');
		$data = array(

			'no_absensi'  		=> $no_absensi,
			'tanggal' 			=> $tanggal,
			'kode_asrama' 		=> $kode_asrama,

		);

		$this->db->where('no_absensi', $no_absensi);
		$this->db->update('absensi_kehadiran', $data);
		redirect('absensi/viewAbsensiKehadiran');
	}

	function updateKeteranganAbsensiKehadiran()
	{

		$no_absensi 		= $this->input->post('no_absensi');
		$nps 				= $this->input->post('nps');
		$keterangan 		= $this->input->post('keterangan');
		$data = array(

			'keterangan'  		=> $keterangan,

		);

		$this->db->where('no_absensi', $no_absensi);
		$this->db->where('nps', $nps);
		$this->db->update('absensi_kehadiran_detail', $data);
	}

	function codeOtomatisAbsensiKehadiran()
	{
		$bulanini	= date('m');
		$this->db->select('Right(absensi_kehadiran.no_absensi,3) as kode ', false);
		$this->db->where('mid(no_absensi,3,2)', $bulanini);
		$this->db->order_by('no_absensi', 'desc');
		$this->db->limit(1);
		$query 		= $this->db->get('absensi_kehadiran');
		if ($query->num_rows() <> 0) {
			$data 	= $query->row();
			$kode 	= intval($data->kode) + 1;
		} else {
			$kode 	= 1;
		}
		$kodemax 	= str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi  	= "AK" . date('m') . date('y') . $kodemax;
		return $kodejadi;
	}


	//Mengaji
	function getDataAbsensiMengaji($rowno, $rowperpage, $shalat = "", $tanggal = "")
	{
		$this->db->select('*');
		$this->db->from('absensi_mengaji');
		$this->db->join('kelas', 'kelas.kode_kelas=absensi_mengaji.kode_kelas');
		$this->db->join('kitab', 'kitab.kode_kitab=absensi_mengaji.kode_kitab');
		$this->db->order_by('tanggal', 'desc');

		if ($shalat != '') {
			$this->db->where('shalat', $shalat);
		}

		if ($tanggal != '') {
			$this->db->like('tanggal', $tanggal);
		}

		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getRecordAbsensiMengaji($shalat = "", $tanggal = "")
	{

		$this->db->select('count(*) as allcount');
		$this->db->from('absensi_mengaji');
		$this->db->join('kelas', 'kelas.kode_kelas=absensi_mengaji.kode_kelas');
		$this->db->join('kitab', 'kitab.kode_kitab=absensi_mengaji.kode_kitab');
		$this->db->order_by('tanggal', 'desc');

		if ($shalat != '') {
			$this->db->where('shalat', $shalat);
		}

		if ($tanggal != '') {
			$this->db->like('tanggal', $tanggal);
		}
		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	function inputAbsensiMengaji()
	{

		$no_absensi 		= $this->input->post('no_absensi');
		$tanggal 			= $this->input->post('tanggal');
		$kode_kelas 		= $this->input->post('kode_kelas');
		$kode_kitab 		= $this->input->post('kode_kitab');
		$tahun_ajaran 		= $this->session->userdata('tahun_ajaran');
		$semester 			= $this->session->userdata('semester');
		$data = array(

			'no_absensi'  		=> $no_absensi,
			'tanggal' 			=> $tanggal,
			'kode_kelas' 		=> $kode_kelas,
			'kode_kitab' 		=> $kode_kitab,
			'tahun_ajaran' 		=> $tahun_ajaran,
			'semester' 			=> $semester,

		);

		$santri = $this->db->query("SELECT * FROM santri 
		INNER JOIN kelas ON kelas.kode_kelas = santri.kode_kelas 
		WHERE santri.kode_kelas = '$kode_kelas' ")->result();
		foreach ($santri as $s) {
			$dataSantri = array(

				'no_absensi'  		=> $no_absensi,
				'nps' 				=> $s->nps,
				'keterangan' 		=> "Hadir",

			);
			$this->db->insert('absensi_mengaji_detail', $dataSantri);
		}

		$this->db->insert('absensi_mengaji', $data);
		redirect('absensi/viewAbsensimengaji');
	}

	function hapusAbsensiMengaji()
	{

		$no_absensi	= $this->uri->segment(3);
		$this->db->delete('absensi_mengaji', array('no_absensi' => $no_absensi));
		$this->db->delete('absensi_mengaji_detail', array('no_absensi' => $no_absensi));
		redirect('absensi/viewAbsensimengaji');
	}

	function getAbsensiMengajiDetail()
	{

		$no_absensi 		= $this->uri->segment(3);
		if ($no_absensi != "") {
			$noabsensi 		= $this->uri->segment(3);
		} else {
			$noabsensi 		= $this->input->post('no_absensi');
		}
		return $this->db->query("SELECT * FROM absensi_mengaji_detail 
		INNER JOIN santri ON santri.nps = absensi_mengaji_detail.nps 
		WHERE absensi_mengaji_detail.no_absensi = '$noabsensi' ");
	}

	function getAbsensiMengaji()
	{
		$no_absensi 		= $this->uri->segment(3);
		if ($no_absensi != "") {
			$noabsensi 		= $this->uri->segment(3);
		} else {
			$noabsensi 		= $this->input->post('no_absensi');
		}
		return $this->db->query("SELECT * FROM absensi_mengaji 
		INNER JOIN kelas ON kelas.kode_kelas = absensi_mengaji.kode_kelas 
		INNER JOIN kitab ON kitab.kode_kitab = absensi_mengaji.kode_kitab 
		WHERE no_absensi = '$noabsensi' 
		ORDER BY absensi_mengaji.no_absensi DESC
		");
	}

	function editAbsensiMengaji()
	{

		$no_absensi 		= $this->input->post('no_absensi');
		$tanggal 			= $this->input->post('tanggal');
		$kode_kelas 		= $this->input->post('kode_kelas');
		$kode_kitab 		= $this->input->post('kode_kitab');
		$data = array(

			'no_absensi'  		=> $no_absensi,
			'tanggal' 			=> $tanggal,
			'kode_kelas' 		=> $kode_kelas,
			'kode_kitab' 		=> $kode_kitab,

		);

		$this->db->where('no_absensi', $no_absensi);
		$this->db->update('absensi_mengaji', $data);
		redirect('absensi/viewAbsensimengaji');
	}

	function updateKeteranganAbsensiMengaji()
	{

		$no_absensi 		= $this->input->post('no_absensi');
		$nps 				= $this->input->post('nps');
		$keterangan 		= $this->input->post('keterangan');
		$data = array(

			'keterangan'  		=> $keterangan,

		);

		$this->db->where('no_absensi', $no_absensi);
		$this->db->where('nps', $nps);
		$this->db->update('absensi_mengaji_detail', $data);
	}

	function codeOtomatisAbsensiMengaji()
	{
		$bulanini	= date('m');
		$this->db->select('Right(absensi_mengaji.no_absensi,3) as kode ', false);
		$this->db->where('mid(no_absensi,3,2)', $bulanini);
		$this->db->order_by('no_absensi', 'desc');
		$this->db->limit(1);
		$query 		= $this->db->get('absensi_mengaji');
		if ($query->num_rows() <> 0) {
			$data 	= $query->row();
			$kode 	= intval($data->kode) + 1;
		} else {
			$kode 	= 1;
		}
		$kodemax 	= str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi  	= "AM" . date('m') . date('y') . $kodemax;
		return $kodejadi;
	}
}
