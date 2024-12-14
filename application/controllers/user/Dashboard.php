<?php

class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('M_users');
    }

	public function index() {
		$data['users'] = $this->M_users->get_users();
		$this->load->view('user/dashboard', $data);
	}
}