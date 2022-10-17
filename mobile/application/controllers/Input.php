<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
	}

	public function index()
	{
		$this->load->view('InputSantri');
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
		redirect('Input');
	}
}
