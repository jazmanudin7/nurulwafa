<?php

class Model_kitab extends CI_Model
{
	function getDataKitab($rowno, $rowperpage, $nama_kitab = "")
	{
		$this->db->select('*');
		$this->db->from('kitab');
		$this->db->order_by('nama_kitab', 'desc');


		if ($nama_kitab != '') {
			$this->db->like('nama_kitab', $nama_kitab);
		}

		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getRecordKitab($nama_kitab = "")
	{

		$this->db->select('count(*) as allcount');
		$this->db->from('kitab');

		if ($nama_kitab != '') {
			$this->db->like('nama_kitab', $nama_kitab);
		}
		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	function insert()
	{

		$nama_kitab 		= $this->input->post('nama_kitab');
		$data = array(

			'nama_kitab' 		=> $nama_kitab,

		);

		$this->db->insert('kitab', $data);
		redirect('kitab');
	}

	function delete()
	{

		$kode_kitab	= $this->uri->segment(3);
		$this->db->delete('kitab', array('kode_kitab' => $kode_kitab));
	}

	function getKitab()
	{

		$kode_kitab 		= $this->input->post('kode_kitab');
		return $this->db->get_where('kitab', array('kode_kitab' => $kode_kitab));
	}

	function update()
	{

		$kode_kitab 		= $this->input->post('kode_kitab');
		$nama_kitab 		= $this->input->post('nama_kitab');

		$data = array(

			'nama_kitab' 		=> $nama_kitab,

		);

		$this->db->where('kode_kitab', $kode_kitab);
		$this->db->update('kitab', $data);
		redirect('kitab');
	}
}
