<?php
class Kelas extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->Model(array('Model_kelas'));
		ceklogin();
	}

	function index($rowno = 0)
	{
		$nama_kelas  	= "";
		if ($this->input->post('submit') != NULL) {
			$nama_kelas 	= $this->input->post('nama_kelas');
			$data 	= array(

				'nama_kelas'		 	=> $nama_kelas,

			);
			$this->session->set_userdata($data);
		} else {
			if ($this->session->userdata('nama_kelas') != NULL) {
				$nama_kelas = $this->session->userdata('nama_kelas');
			}
		}

		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcount 	  = $this->Model_kelas->getRecordkelas($nama_kelas);
		$users_record = $this->Model_kelas->getDatakelas($rowno, $rowperpage, $nama_kelas);
		$config['base_url'] 		= base_url() . 'kelas/index';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] 		= $allcount;
		$config['per_page'] 		= $rowperpage;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link bg-dark">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link bg-dark">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link bg-dark">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link bg-dark">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link bg-dark">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link bg-dark">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);

		$data['pagination'] 	= $this->pagination->create_links();
		$data['data'] 			= $users_record;
		$data['row'] 			= $rowno;
		$data['nama_kelas']		= $nama_kelas;
		$this->template->load('template', 'kelas/view', $data);
	}

	public function input()
	{

		if (isset($_POST['submit'])) {
			$this->Model_kelas->insert();
		} else {
			$this->template->load('template', 'kelas/input');
		}
	}

	public function hapus()
	{
		$this->Model_kelas->delete();
		redirect('kelas');
	}

	public function edit()
	{

		if (isset($_POST['submit'])) {
			$this->Model_kelas->update();
		} else {
			$data['kelas'] 	= $this->Model_kelas->getkelas()->row_array();
			$this->template->load('template', 'kelas/edit', $data);
		}
	}
}
