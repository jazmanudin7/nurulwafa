<?php
class SP extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->Model(array('Model_sp'));
		ceklogin();
	}

	function index($rowno = 0)
	{
		$nps 			= "";
		$nama_santri  	= "";
		if ($this->input->post('submit') != NULL) {
			$nama_santri 	= $this->input->post('nama_santri');
			$nps 			= $this->input->post('nps');
			$data 	= array(

				'nama_santri'		 	=> $nama_santri,
				'nps'	 	 			=> $nps,

			);
			$this->session->set_userdata($data);
		} else {
			if ($this->session->userdata('nama_santri') != NULL) {
				$nama_santri = $this->session->userdata('nama_santri');
			}
			if ($this->session->userdata('nps') != NULL) {
				$nps = $this->session->userdata('nps');
			}
		}

		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcount 	  = $this->Model_sp->getRecordSP($nps, $nama_santri);
		$users_record = $this->Model_sp->getDataSP($rowno, $rowperpage, $nps, $nama_santri);
		$config['base_url'] 		= base_url() . 'sp/index';
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
		$data['nps'] 			= $nps;
		$data['nama_santri']	= $nama_santri;
		$this->template->load('template', 'sp/view', $data);
	}

	public function input()
	{

		if (isset($_POST['submit'])) {
			$this->Model_sp->insert();
			redirect('SP');
		} else {
			$this->template->load('template', 'sp/input');
		}
	}

	public function hapus()
	{
		$this->Model_sp->delete();
		redirect('SP');
	}

	public function edit()
	{

		if (isset($_POST['submit'])) {
			$this->Model_sp->update();
			redirect('SP');
		} else {
			$data['sp'] 	= $this->Model_sp->getSP()->row_array();
			$this->template->load('template', 'sp/edit', $data);
		}
	}
}
