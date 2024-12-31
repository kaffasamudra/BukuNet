<?php
class Peminjaman extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_peminjaman');
        $this->load->model('M_users');
        $this->load->model('M_buku');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $data['users'] = $this->M_users->get_users();
        
        $data['peminjaman'] = $this->M_peminjaman->get_peminjaman();
        $data['buku'] = $this->M_buku->get_buku();
        $this->load->view('user/peminjaman', $data);
    }

    public function form($id_buku) {
        // Pastikan user sudah login
        if (!$this->session->userdata('id')) {
            redirect('loginuser'); // Redirect jika belum login
        }

        // Ambil data user yang sedang login
        $id_user = $this->session->userdata('id');
        $user = $this->M_users->get_users($id_user);

        // Ambil data buku berdasarkan ID
        $buku = $this->M_buku->get_buku_id($id_buku);

        if (!$buku) {
            show_404();
        }

        // Kirim data ke view
        $data['user'] = $user;
        $data['buku'] = $buku;
        $this->load->view('user/peminjaman', $data);
    }

    public function simpan() {
        if (!$this->session->userdata('id')) {
            redirect('loginuser'); // Redirect jika belum login
        }

        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_petugas' => 1, // Sesuaikan dengan admin/petugas
            'id_buku' => $this->input->post('id_buku'),
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_kembali' => date('Y-m-d', strtotime("+7 days")),
            'status' => 'dipinjam'
        ];

        $this->M_peminjaman->insert_peminjaman($data);
        redirect('peminjaman');
    }
}
