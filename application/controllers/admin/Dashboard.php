<?php

class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('M_admin');
    }

	public function index() {
		$data['admin'] = $this->M_admin->get_users();
		$this->load->view('admin/dashboard', $data);
	}
}