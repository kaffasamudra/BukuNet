<?php

class Koleksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_koleksi');
        $this->load->model('M_users');
        $this->load->model('M_buku');
        $this->load->library('session');
    }

    public function index() {
        if (!$this->session->userdata('id')) {
            redirect('loginuser'); // Redirect jika belum login
        }

        $id_peminjam = $this->session->userdata('id'); // Ambil ID user yang login

        $data['koleksi'] = $this->M_koleksi->get_koleksi_by_peminjam($id_peminjam);
        $data['users'] = $this->M_users->get_users();
        $data['buku']=$this->M_buku->get_buku();
        
        $this->load->view('user/koleksi', $data);
    }

    public function toggle() {
        $id_peminjam = $this->session->userdata('id');
        $id_buku = $this->input->post('id_buku');

        if (!$id_peminjam) {
            echo json_encode(['status' => 'error', 'message' => 'Harap login terlebih dahulu.']);
            return;
        }

        // Cek apakah buku sudah ada di koleksi
        if ($this->M_koleksi->cek_koleksi($id_peminjam, $id_buku)) {
            // Jika sudah ada, hapus dari koleksi
            if ($this->M_koleksi->del($id_peminjam, $id_buku)) {
                echo json_encode(['status' => 'removed', 'message' => 'Buku dihapus dari koleksi.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus buku dari koleksi.']);
            }
        } else {
            // Jika belum ada, tambahkan ke koleksi
            if ($this->M_koleksi->add($id_peminjam, $id_buku)) {
                echo json_encode(['status' => 'added', 'message' => 'Buku berhasil ditambahkan ke koleksi.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan buku ke koleksi.']);
            }
        }
    }

    // public function tambah() {

    //     $id_peminjam = $this->session->userdata('id');
    //     $id_buku = $this->input->post('id_buku');
    // 	if (!$this->session->userdata('id')) {
	//         redirect('login'); // Kembali ke login kalau belum login
	//     }

    //     if ($this->M_koleksi->add($id_peminjam, $id_buku)) {
    //         echo json_encode(['status' => 'success', 'message' => 'Buku berhasil ditambahkan ke koleksi.']);
    //     } else {
    //         echo json_encode(['status' => 'error', 'message' => 'Buku sudah ada di koleksi.']);
    //     }
    // }

    // public function hapus() {
    //     $id_peminjam = $this->session->userdata('id');
    //     $id_buku = $this->input->post('id_buku');

    //     if (!$id_peminjam) {
    //         echo json_encode(['status' => 'error', 'message' => 'Harap login terlebih dahulu.']);
    //         return;
    //     }

    //     if ($this->M_koleksi->del($id_peminjam, $id_buku)) {
    //         echo json_encode(['status' => 'success', 'message' => 'Buku dihapus dari koleksi.']);
    //     } else {
    //         echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus buku dari koleksi.']);
    //     }
    // }

    // public function daftar() {
	//     $id_peminjam = $this->session->userdata('id');

	//     if (!$id_peminjam) {
	//         $this->session->set_flashdata('error', 'Harap login terlebih dahulu.');
	//         redirect('login'); // Arahkan ke halaman login
	//         return;
	//     }

	//     $data = $this->M_koleksi->select($id_peminjam);

	//     // Simpan data ke session kalau perlu, atau langsung redirect
	//     $this->session->set_flashdata('koleksi', $data);
	//     redirect('koleksi'); // Ganti dengan halaman yang diinginkan
	// }

    // public function daftar() {
    //     $id_peminjam = $this->session->userdata('id');

    //     if (!$id_peminjam) {
    //         echo json_encode(['status' => 'error', 'message' => 'Harap login terlebih dahulu.']);
    //         return;
    //     }

    //     $data = $this->M_koleksi->select($id_peminjam);
    //     echo json_encode(['status' => 'success', 'koleksi' => $data]);
    // }
}
?>