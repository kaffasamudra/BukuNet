<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_ulasan');
    }

    public function index($id_buku) {
        $data['id_buku'] = $id_buku;
        $data['ulasan'] = $this->M_ulasan->getUlasanByBuku($id_buku);
        $data['rata_rating'] = $this->M_ulasan->getRataRating($id_buku);

        $this->load->view('ulasan', $data);
    }

    public function tambah() {
        $data = [
            'id_buku' => $this->input->post('id_buku'),
            'id_peminjam' => $this->input->post('id_peminjam'),
            'rating' => $this->input->post('rating'),
            'ulasan' => $this->input->post('ulasan'),
            'tanggal' => date('Y-m-d H:i:s')
        ];

        $this->M_ulasan->tambahUlasan($data);
        redirect('ulasan/index/' . $this->input->post('id_buku'));
    }
}
?>
