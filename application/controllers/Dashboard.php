<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		ceklogin();
	}

	public function index()
	{
		$this->template->load('template', 'dashboard');
	}
}
