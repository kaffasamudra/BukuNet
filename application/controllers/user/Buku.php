<?php

class Buku extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_buku');
		$this->load->model('M_users');
	}

	public function index()
	{
		$data['buku']=$this->M_buku->get_buku();
		$data['users'] = $this->M_users->get_users();
		$this->load->view('user/buku', $data);
	}
}