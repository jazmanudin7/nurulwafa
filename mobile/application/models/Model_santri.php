<?php

class Model_santri extends CI_Model
{
	function getDataSantri($rowno, $rowperpage, $nps = "", $nama_santri = "")
	{
		$this->db->select('*');
		$this->db->from('santri');
		$this->db->join('kelas', 'kelas.kode_kelas=santri.kode_kelas');
		$this->db->join('asrama', 'asrama.kode_asrama=santri.kode_asrama');
		$this->db->order_by('nama_santri', 'ASC');

		if ($nps != '') {
			$this->db->where('nps', $nps);
		}

		if ($nama_santri != '') {
			$this->db->like('nama_santri', $nama_santri);
		}

		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getRecordSantri($nps = "", $nama_santri = "")
	{

		$this->db->select('count(*) as allcount');
		$this->db->from('santri');
		$this->db->join('kelas', 'kelas.kode_kelas=santri.kode_kelas');
		$this->db->join('asrama', 'asrama.kode_asrama=santri.kode_asrama');
		$this->db->order_by('nama_santri', 'ASC');

		if ($nps != '') {
			$this->db->where('nps', $nps);
		}

		if ($nama_santri != '') {
			$this->db->like('nama_santri', $nama_santri);
		}
		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	function insert()
	{

		$nps 				= $this->input->post('nps');
		$nama_santri 		= $this->input->post('nama_santri');
		$jk 				= $this->input->post('jk');
		$tempat_lahir 		= $this->input->post('tempat_lahir');
		$kode_asrama 		= $this->input->post('kode_asrama');
		$kode_kelas 		= $this->input->post('kode_kelas');
		$tgl_lahir 			= $this->input->post('tgl_lahir');
		$alamat 			= $this->input->post('alamat');
		$kota 				= $this->input->post('kota');
		$konsulat 			= $this->input->post('konsulat');
		$nama_ayah 			= $this->input->post('nama_ayah');
		$pekerjaan_ayah 	= $this->input->post('pekerjaan_ayah');
		$pendidikan_ayah 	= $this->input->post('pendidikan_ayah');
		$nama_ibu 			= $this->input->post('nama_ibu');
		$pekerjaan_ibu 		= $this->input->post('pekerjaan_ibu');
		$pendidikan_ibu 	= $this->input->post('pendidikan_ibu');
		$alamat_ortu 		= $this->input->post('alamat_ortu');
		$no_hp 				= $this->input->post('no_hp');
		$status 			= $this->input->post('status');
		$data = array(

			'nps' 				=> $nps,
			'nama_santri' 		=> $nama_santri,
			'jk' 				=> $jk,
			'kode_asrama' 		=> $kode_asrama,
			'kode_kelas' 		=> $kode_kelas,
			'tempat_lahir' 		=> $tempat_lahir,
			'tgl_lahir'  		=> $tgl_lahir,
			'alamat'  			=> $alamat,
			'kota'  			=> $kota,
			'konsulat'  		=> $konsulat,
			'nama_ayah'  		=> $nama_ayah,
			'pekerjaan_ayah'  	=> $pekerjaan_ayah,
			'pendidikan_ayah' 	=> $pendidikan_ayah,
			'nama_ibu'  		=> $nama_ibu,
			'pekerjaan_ibu'  	=> $pekerjaan_ibu,
			'pendidikan_ibu'  	=> $pendidikan_ibu,
			'alamat_ortu'  		=> $alamat_ortu,
			'no_hp' 			=> $no_hp,
			'status' 			=> "Aktif"

		);

		$this->db->insert('santri', $data);
		redirect('InputSantri');
	}

	function delete()
	{

		$nps	= $this->uri->segment(3);
		$this->db->delete('santri', array('nps' => $nps));
	}

	function getSantri()
	{

		$nps	= $this->uri->segment(3);
		return $this->db->get_where('santri', array('nps' => $nps));
	}

	function update()
	{

		$nps 				= $this->input->post('nps');
		$nama_santri 		= $this->input->post('nama_santri');
		$jk 				= $this->input->post('jk');
		$tempat_lahir 		= $this->input->post('tempat_lahir');
		$tgl_lahir 			= $this->input->post('tgl_lahir');
		$alamat 			= $this->input->post('alamat');
		$kota 				= $this->input->post('kota');
		$konsulat 			= $this->input->post('konsulat');
		$nama_ayah 			= $this->input->post('nama_ayah');
		$pekerjaan_ayah 	= $this->input->post('pekerjaan_ayah');
		$pendidikan_ayah 	= $this->input->post('pendidikan_ayah');
		$nama_ibu 			= $this->input->post('nama_ibu');
		$pekerjaan_ibu 		= $this->input->post('pekerjaan_ibu');
		$pendidikan_ibu 	= $this->input->post('pendidikan_ibu');
		$alamat_ortu 		= $this->input->post('alamat_ortu');
		$no_hp 				= $this->input->post('no_hp');
		$status 			= $this->input->post('status');
		$data = array(

			'nama_santri' 		=> $nama_santri,
			'jk' 				=> $jk,
			'tempat_lahir' 		=> $tempat_lahir,
			'tgl_lahir'  		=> $tempat_lahir,
			'alamat'  			=> $alamat,
			'kota'  			=> $kota,
			'konsulat'  		=> $konsulat,
			'nama_ayah'  		=> $nama_ayah,
			'pekerjaan_ayah'  	=> $pekerjaan_ayah,
			'pendidikan_ayah' 	=> $pendidikan_ayah,
			'nama_ibu'  		=> $nama_ibu,
			'pekerjaan_ibu'  	=> $pekerjaan_ibu,
			'pendidikan_ibu'  	=> $pendidikan_ibu,
			'alamat_ortu'  		=> $alamat_ortu,
			'no_hp' 			=> $no_hp,
			'status' 			=> $status,

		);
		$this->db->where('nps', $nps);
		$this->db->update('santri', $data);
		redirect('santri');
	}
}
