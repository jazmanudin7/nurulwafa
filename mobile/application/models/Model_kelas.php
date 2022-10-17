<?php

class Model_kelas extends CI_Model
{
	function getDataKelas($rowno, $rowperpage, $nama_kelas = "")
	{
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->order_by('nama_kelas', 'desc');


		if ($nama_kelas != '') {
			$this->db->like('nama_kelas', $nama_kelas);
		}

		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getRecordKelas($nama_kelas = "")
	{

		$this->db->select('count(*) as allcount');
		$this->db->from('kelas');

		if ($nama_kelas != '') {
			$this->db->like('nama_kelas', $nama_kelas);
		}
		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	function insert()
	{

		$nama_kelas 		= $this->input->post('nama_kelas');
		$wali_kelas 		= $this->input->post('wali_kelas');
		$data = array(

			'nama_kelas' 		=> $nama_kelas,
			'wali_kelas'  		=> $wali_kelas,

		);

		$this->db->insert('kelas', $data);
		redirect('kelas');
	}

	function delete()
	{

		$kode_kelas	= $this->uri->segment(3);
		$this->db->delete('kelas', array('kode_kelas' => $kode_kelas));
	}

	function getKelas()
	{

		$kode_kelas	= $this->uri->segment(3);
		return $this->db->get_where('kelas', array('kode_kelas' => $kode_kelas));
	}

	function update()
	{

		$kode_kelas 		= $this->input->post('kode_kelas');
		$nama_kelas 		= $this->input->post('nama_kelas');
		$wali_kelas 		= $this->input->post('wali_kelas');

		$data = array(

			'nama_kelas' 		=> $nama_kelas,
			'wali_kelas'  		=> $wali_kelas,

		);

		$this->db->where('kode_kelas', $kode_kelas);
		$this->db->update('kelas', $data);
		redirect('kelas');
	}
}
