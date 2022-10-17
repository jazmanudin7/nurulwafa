<?php
class Surat_izin extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->Model(array('Model_surat_izin'));
		ceklogin();
	}

	function index($rowno = 0)
	{
		$jk 			= "";
		$nama_santri  	= "";
		if ($this->input->post('submit') != NULL) {
			$nama_santri 	= $this->input->post('nama_santri');
			$jk 			= $this->input->post('jk');
			$data 	= array(

				'nama_santri'		 	=> $nama_santri,
				'jk'	 	 			=> $jk,

			);
			$this->session->set_userdata($data);
		} else {
			if ($this->session->userdata('nama_santri') != NULL) {
				$nama_santri = $this->session->userdata('nama_santri');
			}
			if ($this->session->userdata('jk') != NULL) {
				$jk = $this->session->userdata('jk');
			}
		}

		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcount 	  = $this->Model_surat_izin->getRecordSuratIzin($jk, $nama_santri);
		$users_record = $this->Model_surat_izin->getDataSuratIzin($rowno, $rowperpage, $jk, $nama_santri);
		$config['base_url'] 		= base_url() . 'surat_izin/index';
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
		$data['jk'] 			= $jk;
		$data['nama_santri']	= $nama_santri;
		$this->template->load('template', 'surat_izin/view', $data);
	}

	public function delete_checkbox()
	{

		$nps = $this->input->post('nps');
		$this->db->where_in('nps', explode(",", $nps));
		$this->db->delete('surat_izin');
		echo json_encode(['success' => "Item Deleted successfully."]);
	}

	public function input()
	{

		if (isset($_POST['submit'])) {
			$this->Model_surat_izin->insert();
		} else {
			$this->load->view('surat_izin/input');
		}
	}

	public function disapprove()
	{
		$this->Model_surat_izin->disapprove();
		redirect('surat_izin');
	}

	public function approve()
	{
		if (isset($_POST['submit'])) {
			$this->Model_surat_izin->approve();
		} else {
			$data['surat_izin'] 	= $this->Model_surat_izin->getSuratIzin()->row_array();
			$this->load->view('surat_izin/approve', $data);
		}
	}

	public function detail()
	{
		$data['surat_izin'] 	= $this->Model_surat_izin->getSuratIzin()->row_array();
		$this->load->view('surat_izin/detail', $data);
	}

	public function hapus()
	{
		$this->Model_surat_izin->delete();
		redirect('surat_izin');
	}

	public function edit()
	{

		if (isset($_POST['submit'])) {
			$this->Model_surat_izin->update();
		} else {
			$data['surat_izin'] 	= $this->Model_surat_izin->getSuratIzin()->row_array();
			$this->load->view('surat_izin/edit', $data);
		}
	}

	function getSantri()
	{
		$keyword      	= $this->uri->segment(3);
		$data 			= $this->db->query("SELECT * FROM santri  WHERE nama_santri LIKE '$keyword%'");
		foreach ($data->result() as $row) {
			$arr['query']           = $keyword;
			$arr['suggestions'][] = array(
				'value'			  	=> $row->nama_santri,
				'nps'	    		=> $row->nps
			);
		}
		echo json_encode($arr);
	}
}
