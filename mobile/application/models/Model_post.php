<?php

class Model_post extends CI_Model
{
	function getDataPost($rowno, $rowperpage, $tanggal = "", $judul = "")
	{
		$this->db->select('*');
		$this->db->from('post');
		$this->db->order_by('post.tanggal', 'desc');

		if ($tanggal != '') {
			$this->db->where('santri.tanggal', $tanggal);
		}

		if ($judul != '') {
			$this->db->like('santri.judul', $judul);
		}

		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getRecordPost($tanggal = "", $judul = "")
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('post');
		$this->db->order_by('post.tanggal', 'desc');

		if ($tanggal != '') {
			$this->db->where('santri.tanggal', $tanggal);
		}

		if ($judul != '') {
			$this->db->like('santri.judul', $judul);
		}

		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	function insert($foto)
	{

		$judul 				= $this->input->post('judul');
		$tanggal 			= $this->input->post('tanggal');
		$deskripsi 			= $this->input->post('deskripsi');

		$data = array(

			'judul' 			=> $judul,
			'tanggal' 			=> $tanggal,
			'deskripsi' 		=> $deskripsi,
			'foto' 				=> $foto,

		);
		$this->db->insert('post', $data);
		redirect('post');
	}

	function delete()
	{

		$id	= $this->uri->segment(3);
		$this->db->delete('post', array('id' => $id));
	}

	function getPost()
	{

		$id	= $this->uri->segment(3);
		return $this->db->query("SELECT * FROM post WHERE post.id = '$id' ");
	}

	function update()
	{

		$id 				= $this->input->post('id');
		$judul 				= $this->input->post('judul');
		$tanggal 			= $this->input->post('tanggal');
		$deskripsi 			= $this->input->post('deskripsi');

		$data = array(

			'judul' 			=> $judul,
			'tanggal' 			=> $tanggal,
			'deskripsi' 		=> $deskripsi,

		);

		$this->db->where('id', $id);
		$this->db->update('post', $data);
		redirect('post');
	}
}
