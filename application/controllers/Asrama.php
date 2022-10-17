<?php
class Asrama extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->Model(array('Model_asrama'));
		ceklogin();
	}

	function index($rowno = 0)
	{
		$nama_asrama  	= "";
		if ($this->input->post('submit') != NULL) {
			$nama_asrama 	= $this->input->post('nama_asrama');
			$data 	= array(

				'nama_asrama'		 	=> $nama_asrama,

			);
			$this->session->set_userdata($data);
		} else {
			if ($this->session->userdata('nama_asrama') != NULL) {
				$nama_asrama = $this->session->userdata('nama_asrama');
			}
		}

		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcount 	  = $this->Model_asrama->getRecordAsrama($nama_asrama);
		$users_record = $this->Model_asrama->getDataAsrama($rowno, $rowperpage, $nama_asrama);
		$config['base_url'] 		= base_url() . 'asrama/index';
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

		$data['pagination'] 	= $this->pagination->create_links();
		$data['data'] 			= $users_record;
		$data['row'] 			= $rowno;
		$data['nama_asrama']	= $nama_asrama;
		$this->template->load('template', 'asrama/view', $data);
	}

	public function input()
	{

		if (isset($_POST['submit'])) {
			$this->Model_asrama->insert();
		} else {
			$this->load->view('asrama/input');
		}
	}

	public function hapus()
	{
		$this->Model_asrama->delete();
		redirect('asrama');
	}

	public function edit()
	{

		if (isset($_POST['submit'])) {
			$this->Model_asrama->update();
		} else {
			$data['asrama'] 	= $this->Model_asrama->getasrama()->row_array();
			$this->load->view('asrama/edit', $data);
		}
	}
}
