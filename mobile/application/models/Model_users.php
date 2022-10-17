<?php

class Model_users extends CI_Model
{
	function getDataUsers($rowno, $rowperpage, $nama_lengkap = "")
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('santri', 'santri.nps=users.no_uniq', 'left');
		$this->db->where('level!=', 'Administrator');
		$this->db->order_by('nama_lengkap', 'desc');


		if ($nama_lengkap != '') {
			$this->db->like('nama_lengkap', $nama_lengkap);
		}

		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getRecordUsers($nama_lengkap = "")
	{

		$this->db->select('count(*) as allcount');
		$this->db->from('users');
		$this->db->join('santri', 'santri.nps=users.no_uniq', 'left');
		$this->db->where('level!=', 'Administrator');

		if ($nama_lengkap != '') {
			$this->db->like('nama_lengkap', $nama_lengkap);
		}
		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	function insert()
	{

		$nama_lengkap 		= $this->input->post('nama_lengkap');
		$username 			= $this->input->post('username');
		$password 			= $this->input->post('password');
		$no_uniq 			= $this->input->post('no_uniq');
		$level 				= $this->input->post('level');
		$data = array(

			'nama_lengkap' 		=> $nama_lengkap,
			'username'  		=> $username,
			'password'  		=> $password,
			'no_uniq'  			=> $no_uniq,
			'level'  			=> $level,
			'id_profile'  		=> 1,

		);

		$this->db->insert('users', $data);
		redirect('users');
	}

	function delete()
	{

		$id	= $this->uri->segment(3);
		$this->db->delete('users', array('id' => $id));
	}

	function getusers()
	{

		$id 		= $this->input->post('id');
		return $this->db->get_where('users', array('id' => $id));
	}

	function update()
	{

		$id 				= $this->input->post('id');
		$nama_lengkap 		= $this->input->post('nama_lengkap');
		$username 			= $this->input->post('username');
		$password 			= $this->input->post('password');
		$no_uniq 			= $this->input->post('no_uniq');
		$level 				= $this->input->post('level');
		$data = array(

			'nama_lengkap' 		=> $nama_lengkap,
			'username'  		=> $username,
			'password'  		=> $password,
			'no_uniq'  			=> $no_uniq,
			'level'  			=> $level,
			'id_profile'  		=> 1,

		);


		$this->db->where('id', $id);
		$this->db->update('users', $data);
		redirect('users');
	}
}
