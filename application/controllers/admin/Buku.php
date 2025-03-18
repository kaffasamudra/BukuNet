<?php

/**
 * 
 */
class Buku extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_buku');
	}

	public function petugas()
	{
		$data['buku'] = $this->M_buku->get_buku();
		$this->load->view('admin/petugas/data_buku', $data);
	}

	public function admin()
	{
		$data['buku'] = $this->M_buku->get_buku();
		$this->load->view('admin/data_buku', $data);
	}
}