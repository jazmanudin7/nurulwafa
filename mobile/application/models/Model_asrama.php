<?php

class Model_asrama extends CI_Model
{
	function getDataAsrama($rowno, $rowperpage, $nama_asrama = "")
	{
		$this->db->select('*');
		$this->db->from('asrama');
		$this->db->order_by('nama_asrama', 'desc');


		if ($nama_asrama != '') {
			$this->db->like('nama_asrama', $nama_asrama);
		}

		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getRecordAsrama($nama_asrama = "")
	{

		$this->db->select('count(*) as allcount');
		$this->db->from('asrama');

		if ($nama_asrama != '') {
			$this->db->like('nama_asrama', $nama_asrama);
		}
		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	function insert()
	{

		$nama_asrama 		= $this->input->post('nama_asrama');
		$rois 				= $this->input->post('rois');
		$data = array(

			'nama_asrama' 		=> $nama_asrama,
			'rois'  			=> $rois,

		);

		$this->db->insert('asrama', $data);
		redirect('asrama');
	}

	function delete()
	{

		$kode_asrama		= $this->uri->segment(3);
		$this->db->delete('asrama', array('kode_asrama' => $kode_asrama));
	}

	function getAsrama()
	{

		$kode_asrama		= $this->uri->segment(3);
		return $this->db->get_where('asrama', array('kode_asrama' => $kode_asrama));
	}

	function update()
	{

		$kode_asrama 		= $this->input->post('kode_asrama');
		$nama_asrama 		= $this->input->post('nama_asrama');
		$rois 				= $this->input->post('rois');

		$data = array(

			'nama_asrama' 		=> $nama_asrama,
			'rois'  			=> $rois,

		);

		$this->db->where('kode_asrama', $kode_asrama);
		$this->db->update('asrama', $data);
		redirect('asrama');
	}
}
