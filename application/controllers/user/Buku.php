<?php

class Buku extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_buku');
	}

	public function index()
	{
		$data['buku']=$this->M_buku->get_buku();
		$this->load->view('user/buku', $data);
	}
}