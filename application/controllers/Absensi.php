<?php
class Absensi extends CI_Controller
{
	function __construct()
	{

		parent::__construct();
		$this->load->Model(array('Model_absensi'));
		ceklogin();
	}


	function viewAbsensiBerjamaah($rowno = 0)
	{
		$shalat 			= "";
		$tanggal  			= "";
		if ($this->input->post('submit') != NULL) {
			$tanggal 			= $this->input->post('tanggal');
			$shalat 			= $this->input->post('shalat');
			$data 	= array(

				'tanggal'		 			=> $tanggal,
				'shalat'	 	 			=> $shalat,

			);
			$this->session->set_userdata($data);
		} else {
			if ($this->session->userdata('tanggal') != NULL) {
				$tanggal = $this->session->userdata('tanggal');
			}
			if ($this->session->userdata('shalat') != NULL) {
				$shalat = $this->session->userdata('shalat');
			}
		}

		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcount 	  = $this->Model_absensi->getRecordAbsensiBerjamaah($shalat, $tanggal);
		$users_record = $this->Model_absensi->getDataAbsensiBerjamaah($rowno, $rowperpage, $shalat, $tanggal);
		$config['base_url'] 		= base_url() . 'absensi/viewAbsensiBerjamaah';
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
		$data['shalat'] 			= $shalat;
		$data['tanggal']			= $tanggal;
		$this->template->load('template', 'absensi/viewAbsensiBerjamaah', $data);
	}

	public function inputAbsensiBerjamaah()
	{
		if (isset($_POST['submit'])) {
			$this->Model_absensi->inputAbsensiBerjamaah();
		} else {
			$data['codeotomatis'] 	= $this->Model_absensi->codeOtomatisAbsensiBerjamaah();
			$this->load->view('absensi/inputAbsensiBerjamaah', $data);
		}
	}

	public function hapusAbsensiBerjamaah()
	{
		$this->Model_absensi->hapusAbsensiBerjamaah();
	}

	public function updateKeteranganAbsensiBerjamaah()
	{
		$this->Model_absensi->updateKeteranganAbsensiBerjamaah();
	}

	public function editAbsensiBerjamaah()
	{

		$data['absensi'] 	= $this->Model_absensi->getAbsensiBerjamaah()->row_array();
		$this->load->view('absensi/editAbsensiBerjamaah', $data);
	}

	public function detailAbsensiBerjamaah()
	{

		$data['absensi'] 	= $this->Model_absensi->getAbsensiBerjamaah()->row_array();
		$data['detail'] 	= $this->Model_absensi->getAbsensiBerjamaahDetail()->result();
		$this->load->view('absensi/detailAbsensiBerjamaah', $data);
	}

	function viewAbsensiKehadiran($rowno = 0)
	{
		$shalat 			= "";
		$tanggal  			= "";
		if ($this->input->post('submit') != NULL) {
			$tanggal 			= $this->input->post('tanggal');
			$shalat 			= $this->input->post('shalat');
			$data 	= array(

				'tanggal'		 			=> $tanggal,
				'shalat'	 	 			=> $shalat,

			);
			$this->session->set_userdata($data);
		} else {
			if ($this->session->userdata('tanggal') != NULL) {
				$tanggal = $this->session->userdata('tanggal');
			}
			if ($this->session->userdata('shalat') != NULL) {
				$shalat = $this->session->userdata('shalat');
			}
		}

		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcount 	  = $this->Model_absensi->getRecordAbsensiKehadiran($shalat, $tanggal);
		$users_record = $this->Model_absensi->getDataAbsensiKehadiran($rowno, $rowperpage, $shalat, $tanggal);
		$config['base_url'] 		= base_url() . 'absensi/viewAbsensiKehadiran';
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
		$data['shalat'] 			= $shalat;
		$data['tanggal']			= $tanggal;
		$this->template->load('template', 'absensi/viewAbsensiKehadiran', $data);
	}

	public function inputAbsensiKehadiran()
	{
		if (isset($_POST['submit'])) {
			$this->Model_absensi->inputAbsensiKehadiran();
		} else {
			$data['codeotomatis'] 	= $this->Model_absensi->codeOtomatisAbsensiKehadiran();
			$this->load->view('absensi/inputAbsensiKehadiran', $data);
		}
	}

	public function hapusAbsensiKehadiran()
	{
		$this->Model_absensi->hapusAbsensiKehadiran();
	}

	public function updateKeteranganAbsensiKehadiran()
	{
		$this->Model_absensi->updateKeteranganAbsensiKehadiran();
	}

	public function editAbsensiKehadiran()
	{

		if (isset($_POST['submit'])) {
			$this->Model_absensi->editAbsensiKehadiran();
		} else {
			$data['absensi'] 	= $this->Model_absensi->getAbsensiKehadiran()->row_array();
			$this->load->view('absensi/editAbsensiKehadiran', $data);
		}
	}

	public function detailAbsensiKehadiran()
	{

		$data['absensi'] 	= $this->Model_absensi->getAbsensiKehadiran()->row_array();
		$data['detail'] 	= $this->Model_absensi->getAbsensiKehadiranDetail()->result();
		$this->load->view('absensi/detailAbsensiKehadiran', $data);
	}

	function viewAbsensiMengaji($rowno = 0)
	{
		$shalat 			= "";
		$tanggal  			= "";
		if ($this->input->post('submit') != NULL) {
			$tanggal 			= $this->input->post('tanggal');
			$shalat 			= $this->input->post('shalat');
			$data 	= array(

				'tanggal'		 			=> $tanggal,
				'shalat'	 	 			=> $shalat,

			);
			$this->session->set_userdata($data);
		} else {
			if ($this->session->userdata('tanggal') != NULL) {
				$tanggal = $this->session->userdata('tanggal');
			}
			if ($this->session->userdata('shalat') != NULL) {
				$shalat = $this->session->userdata('shalat');
			}
		}

		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcount 	  = $this->Model_absensi->getRecordAbsensiMengaji($shalat, $tanggal);
		$users_record = $this->Model_absensi->getDataAbsensiMengaji($rowno, $rowperpage, $shalat, $tanggal);
		$config['base_url'] 		= base_url() . 'absensi/viewAbsensiMengaji';
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
		$data['shalat'] 			= $shalat;
		$data['tanggal']			= $tanggal;

		$this->template->load('template', 'absensi/viewAbsensiMengaji', $data);
	}

	public function inputAbsensiMengaji()
	{
		if (isset($_POST['submit'])) {
			$this->Model_absensi->inputAbsensiMengaji();
		} else {
			$data['codeotomatis'] 	= $this->Model_absensi->codeOtomatisAbsensiMengaji();

			$this->load->view('absensi/inputAbsensiMengaji', $data);
		}
	}

	public function hapusAbsensiMengaji()
	{
		$this->Model_absensi->hapusAbsensiMengaji();
	}

	public function updateKeteranganAbsensiMengaji()
	{
		$this->Model_absensi->updateKeteranganAbsensiMengaji();
	}

	public function editAbsensiMengaji()
	{

		if (isset($_POST['submit'])) {
			$this->Model_absensi->editAbsensiMengaji();
		} else {
			$data['absensi'] 	= $this->Model_absensi->getAbsensiMengaji()->row_array();
			$this->load->view('absensi/editAbsensiMengaji', $data);
		}
	}

	public function detailAbsensiMengaji()
	{

		$data['absensi'] 	= $this->Model_absensi->getAbsensiMengaji()->row_array();
		$data['detail'] 	= $this->Model_absensi->getAbsensiMengajiDetail()->result();
		$this->load->view('absensi/detailAbsensiMengaji', $data);
	}

	public function viewRekapAbsensiMengaji()
	{

		$data['absensi'] 	= $this->Model_absensi->getAbsensiMengaji()->row_array();
		$data['detail'] 	= $this->Model_absensi->getAbsensiMengajiDetail()->result();
		$this->load->view('absensi/viewRekapAbsensiMengaji', $data);
	}
}
