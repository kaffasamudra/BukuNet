<?php

class Admin extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
	}

	public function index() {
		$this->load->view('admin/login_admin')
	}
}