<?php

class Model_sp extends CI_Model
{
	function getDataSP($rowno, $rowperpage, $nps = "", $nama_santri = "")
	{
		$this->db->select('*');
		$this->db->from('sp');
		$this->db->join('santri', 'santri.nps=sp.nps');
		$this->db->join('asrama', 'asrama.kode_asrama=santri.kode_asrama');
		$this->db->join('kelas', 'kelas.kode_kelas=santri.kode_kelas');
		$this->db->order_by('sp.tanggal', 'desc');

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

	function getRecordSP($nps = "", $nama_santri = "")
	{
		$this->db->select('count(*) as allcount');
		$this->db->join('santri', 'santri.nps=sp.nps');
		$this->db->join('asrama', 'asrama.kode_asrama=santri.kode_asrama');
		$this->db->join('kelas', 'kelas.kode_kelas=santri.kode_kelas');
		$this->db->from('sp');
		$this->db->order_by('sp.tanggal', 'desc');

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
		$tanggal 			= $this->input->post('tanggal');
		$keterangan 		= $this->input->post('keterangan');
		$tahun_ajaran 		= $this->session->userdata('tahun_ajaran');
		$semester 			= $this->session->userdata('semester');
		$data = array(

			'nps' 				=> $nps,
			'tanggal' 			=> $tanggal,
			'keterangan' 		=> $keterangan,
			'tahun_ajaran' 		=> $tahun_ajaran,
			'semester' 			=> $semester,

		);

		$this->db->insert('sp', $data);
		redirect('sp');
	}

	function delete()
	{

		$kode_sp	= $this->uri->segment(3);
		$this->db->delete('sp', array('kode_sp' => $kode_sp));
	}

	function getSP()
	{

		$kode_sp	= $this->uri->segment(3);
		return $this->db->query("SELECT * FROM sp INNER JOIN santri ON santri.nps = sp.nps WHERE sp.kode_sp = '$kode_sp' ");
	}

	function update()
	{

		$kode_sp 			= $this->input->post('kode_sp');
		$nps 				= $this->input->post('nps');
		$tanggal 			= $this->input->post('tanggal');
		$keterangan 		= $this->input->post('keterangan');
		$tahun_ajaran 		= $this->session->userdata('tahun_ajaran');
		$semester 			= $this->session->userdata('semester');

		$data = array(

			'nps' 				=> $nps,
			'tanggal' 			=> $tanggal,
			'keterangan' 		=> $keterangan,
			'tahun_ajaran' 		=> $tahun_ajaran,
			'semester' 			=> $semester,

		);

		$this->db->where('kode_sp', $kode_sp);
		$this->db->update('sp', $data);
		redirect('sp');
	}
}
