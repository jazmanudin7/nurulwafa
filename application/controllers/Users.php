<?php
class Users extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->Model(array('Model_users'));
		ceklogin();
	}

	function index($rowno = 0)
	{
		$nama_lengkap  	= "";
		if ($this->input->post('submit') != NULL) {
			$nama_lengkap 	= $this->input->post('nama_lengkap');
			$data 	= array(

				'nama_lengkap'		 	=> $nama_lengkap,

			);
			$this->session->set_userdata($data);
		} else {
			if ($this->session->userdata('nama_lengkap') != NULL) {
				$nama_lengkap = $this->session->userdata('nama_lengkap');
			}
		}

		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcount 	 				= $this->Model_users->getRecordUsers($nama_lengkap);
		$users_record 				= $this->Model_users->getDataUsers($rowno, $rowperpage, $nama_lengkap);
		$config['base_url'] 		= base_url() . 'users/index';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] 		= $allcount;
		$config['per_page'] 		= $rowperpage;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);

		$data['pagination'] 		= $this->pagination->create_links();
		$data['data'] 				= $users_record;
		$data['row'] 				= $rowno;
		$data['nama_lengkap']			= $nama_lengkap;
		$this->template->load('template', 'users/view', $data);
	}

	public function input()
	{

		if (isset($_POST['submit'])) {
			$this->Model_users->insert();
		} else {
			$this->load->view('users/input');
		}
	}

	public function hapus()
	{
		$this->Model_users->delete();
		redirect('users');
	}

	public function edit()
	{

		if (isset($_POST['submit'])) {
			$this->Model_users->update();
		} else {
			$data['users'] 	= $this->Model_users->getusers()->row_array();
			$this->load->view('users/edit', $data);
		}
	}
}
