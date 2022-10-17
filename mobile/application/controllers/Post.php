<?php
class Post extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->Model(array('Model_post'));
		ceklogin();
	}

	function index($rowno = 0)
	{
		$tanggal 			= "";
		$judul  			= "";
		if ($this->input->post('submit') != NULL) {
			$judul 				= $this->input->post('judul');
			$tanggal 			= $this->input->post('tanggal');
			$data 	= array(

				'judul'		 			=> $judul,
				'tanggal'	 			=> $tanggal,

			);
			$this->session->set_userdata($data);
		} else {
			if ($this->session->userdata('judul') != NULL) {
				$judul = $this->session->userdata('judul');
			}
			if ($this->session->userdata('tanggal') != NULL) {
				$tanggal = $this->session->userdata('tanggal');
			}
		}

		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcount 	  = $this->Model_post->getRecordPost($tanggal, $judul);
		$users_record = $this->Model_post->getDataPost($rowno, $rowperpage, $tanggal, $judul);
		$config['base_url'] 		= base_url() . 'post/index';
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
		$data['tanggal'] 		= $tanggal;
		$data['judul']			= $judul;
		$this->template->load('template', 'post/view', $data);
	}

	public function input()
	{

		if (isset($_POST['submit'])) {

			$config['upload_path'] 			= './upload/post/';
			$config['allowed_types']    	= 'gif|jpg|png|jpeg|bmp|pdf';
			$config['file_name']       		= $this->input->post('id');
			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')) {
				$_data                     	= array('upload_data' => $this->upload->data());
				$foto                      	= $_data['upload_data']['file_name'];
				$this->load->library('upload', $config);
				$this->Model_post->insert($foto);
			} else {
			}
		} else {
			$this->template->load('template', 'post/input');
		}
	}

	public function hapus()
	{
		$this->Model_post->delete();
		redirect('post');
	}

	public function detail()
	{
		$data['post'] 	= $this->Model_post->getPost()->row_array();
	    $this->template->load('template', 'post/detail', $data);
	}
	
	public function edit()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] 			= './upload/post/';
			$config['allowed_types']    	= 'gif|jpg|png|jpeg|bmp|pdf';
			$config['file_name']       		= $this->input->post('id');
			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')) {
				$_data                     	= array('upload_data' => $this->upload->data());
				$foto                      	= $_data['upload_data']['file_name'];
				$this->load->library('upload', $config);
				$this->Model_post->update($foto);
			} else {
				$foto						= $this->input->post('foto_old');
				$this->load->library('upload', $config);
				$this->Model_post->update($foto);
			}
		} else {
			$data['post'] 	= $this->Model_post->getPost()->row_array();
			$this->template->load('template', 'post/edit', $data);
		}
	}
}
