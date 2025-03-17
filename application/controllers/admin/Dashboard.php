<?php

class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_buku');
        $this->load->model('M_peminjaman');
    }

	public function admin() {
        $data['admin'] = $this->M_admin->get_users();
        $data['count_buku'] = $this->M_buku->count_buku();
        $data['count_peminjaman'] = $this->M_peminjaman->count_peminjaman();

        $this->load->view('admin/dashboard', $data);
    }

    public function petugas() {
        $data['admin'] = $this->M_admin->get_users();
        $data['count_buku'] = $this->M_buku->count_buku();
        $data['count_peminjaman'] = $this->M_peminjaman->count_peminjaman();

        $this->load->view('admin/petugas/dashboard', $data);
    }
}