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

	public function menu()
	{
		$this->template->load('template', 'menu');
	}
}
