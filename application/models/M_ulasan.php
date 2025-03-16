<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ulasan extends CI_Model {
    public function tambahUlasan($data) {
        return $this->db->insert('ulasan', $data);
    }

    public function getUlasanByBuku($id_buku) {
        $this->db->select('ulasan.*, peminjam.nama');
        $this->db->from('ulasan');
        $this->db->join('peminjam', 'ulasan.id_peminjam = peminjam.id');
        $this->db->where('ulasan.id_buku', $id_buku);
        $this->db->order_by('ulasan.tanggal', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getRataRating() {
        $this->db->select_avg('rating');
        $this->db->from('ulasan');
        $this->db->group_by('id_buku');
        return $this->db->get()->result_array();
        
    }
}
?>