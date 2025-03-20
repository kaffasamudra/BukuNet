<?php

class Buku extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_buku');
		$this->load->model('M_users');
		$this->load->model('M_koleksi');
		$this->load->model('M_ulasan');
	}

	public function index()
	{
		$data['buku'] = $this->M_buku->get_buku_aktif();
		$data['users'] = $this->M_users->get_users();
        $data['rata_rating'] = $this->M_ulasan->getRataRating();
        // var_dump($data['rata_rating']);
		$this->load->view('user/buku', $data);
	}

	// public function daftar_buku() {
    //     $data['buku'] = $this->M_buku->get_buku_aktif();
    //     $this->load->view('user/daftar_buku', $data);
    // }
}