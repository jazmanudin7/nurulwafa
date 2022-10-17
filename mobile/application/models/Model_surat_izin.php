<?php

class Model_surat_izin extends CI_Model
{
	function getDataSuratIzin($rowno, $rowperpage, $nps = "", $nama_santri = "")
	{
		$this->db->select('*');
		$this->db->from('surat_izin');
		$this->db->join('santri', 'santri.nps=surat_izin.nps');
		$this->db->join('asrama', 'asrama.kode_asrama=santri.kode_asrama');
		$this->db->join('kelas', 'kelas.kode_kelas=santri.kode_kelas');
		$this->db->order_by('surat_izin.tanggal', 'desc');

		if ($nps != '') {
			$this->db->where('santri.nps', $nps);
		}

		if ($nama_santri != '') {
			$this->db->like('santri.nama_santri', $nama_santri);
		}

		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getRecordSuratIzin($nps = "", $nama_santri = "")
	{

		$this->db->select('count(*) as allcount');
		$this->db->join('santri', 'santri.nps=surat_izin.nps');
		$this->db->join('asrama', 'asrama.kode_asrama=santri.kode_asrama');
		$this->db->join('kelas', 'kelas.kode_kelas=santri.kode_kelas');
		$this->db->from('surat_izin');
		$this->db->order_by('surat_izin.tanggal', 'desc');

		if ($nps != '') {
			$this->db->where('santri.nps', $nps);
		}

		if ($nama_santri != '') {
			$this->db->like('santri.nama_santri', $nama_santri);
		}
		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	function insert()
	{

		$nps 				= $this->input->post('nps');
		$dari 				= $this->input->post('dari');
		$sampai 			= $this->input->post('sampai');
		$keterangan 		= $this->input->post('keterangan');
		$tahun_ajaran 		= $this->session->userdata('tahun_ajaran');
		$semester 			= $this->session->userdata('semester');
		$data = array(

			'nps' 				=> $nps,
			'tanggal' 			=> Date('Y-m-d H:i:s'),
			'dari' 				=> $dari,
			'sampai' 			=> $sampai,
			'keterangan' 		=> $keterangan,
			'tahun_ajaran' 		=> $tahun_ajaran,
			'semester' 			=> $semester,

		);

		$this->db->insert('surat_izin', $data);
		redirect('surat_izin');
	}

	function disapprove()
	{

		$kode_absensi	= $this->uri->segment(3);
		$data = array(

			'tanggal_kembali'	=> '0000-00-00',

		);

		$this->db->where('kode_absensi', $kode_absensi);
		$this->db->update('surat_izin', $data);
	}

	function approve()
	{

		$kode_absensi		= $this->uri->segment(3);
		$tanggal 			= $this->input->post('tanggal');
		$alasan_terlambat	= $this->input->post('alasan_terlambat');
		if ($alasan_terlambat != "") {
			$alasan_terlambat		= $this->input->post('alasan_terlambat');
		} else {
			$alasan_terlambat		= "-";
		}
		$data = array(

			'tanggal_kembali'	=> $tanggal,
			'alasan_terlambat'	=> $alasan_terlambat,

		);

		$this->db->where('kode_absensi', $kode_absensi);
		$this->db->update('surat_izin', $data);

		$absensi	= $this->db->query("SELECT * FROM surat_izin WHERE surat_izin.kode_absensi = '$kode_absensi' ")->row_array();
		$nps	 	= $absensi['nps'];
		$santri		= $this->db->query("SELECT * FROM santri WHERE santri.nps = '$nps' ")->row_array();

		$sampai         = $absensi['sampai'];
		$TglSampai      = new DateTime($sampai);
		$kembali        = $absensi['tanggal_kembali'];
		$tglKembali     = new DateTime($kembali);

		$sisaIzin       = $TglSampai->diff($tglKembali)->format("%d");

		$api_key    	= '0cdd2e4f2647300294c511ba336cc3296c08ca13';
		$id_device  	= '6164';
		$url        	= 'https://api.watsap.id/send-message';
		$no_hp      	= $santri['no_hp'];
		if ($sisaIzin != 0) {
			$pesan      = "Assalamualaikum.. Kami dari Pesantren Nurul Wafa, ingin memberitahukan bahwa santri yang bernama *" . $santri['nama_santri'] . "*, terlambat " . $sisaIzin . " Hari dengan alasan *" . $alasan_terlambat . "* dan sudah tiba di pesantren pada *Tanggal " . DateToIndo($tanggal) . "*";
		} else {
			$pesan      = "Assalamualaikum.. Kami dari Pesantren Nurul Wafa, ingin memberitahukan bahwa santri yang bernama *" . $santri['nama_santri'] . "*, sudah tiba di pesantren pada *Tanggal " . DateToIndo($tanggal) . "*";
		}
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 0);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_POST, 1);

		$data_post = [
			'id_device' 	=> $id_device,
			'api-key' 		=> $api_key,
			'no_hp'   		=> $no_hp,
			'pesan'   		=> $pesan
		];
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
		curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($curl);
		curl_close($curl);
		redirect('surat_izin');
	}

	function delete()
	{

		$kode_absensi	= $this->uri->segment(3);
		$this->db->delete('surat_izin', array('kode_absensi' => $kode_absensi));
	}

	function getSuratIzin()
	{

		$kode_absensi		= $this->uri->segment(3);
		return $this->db->query("SELECT * FROM surat_izin INNER JOIN santri ON santri.nps = surat_izin.nps WHERE surat_izin.kode_absensi = '$kode_absensi' ");
	}

	function update()
	{

		$kode_absensi 		= $this->input->post('kode_absensi');
		$nps 				= $this->input->post('nps');
		$dari 				= $this->input->post('dari');
		$sampai 			= $this->input->post('sampai');
		$keterangan 		= $this->input->post('keterangan');

		$data = array(

			'nps' 				=> $nps,
			'dari' 				=> $dari,
			'sampai' 			=> $sampai,
			'keterangan' 		=> $keterangan,
		);

		$this->db->where('kode_absensi', $kode_absensi);
		$this->db->update('surat_izin', $data);
		redirect('surat_izin');
	}
}
