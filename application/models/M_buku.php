<?php

class M_buku extends CI_Model
{
	
    public function get_buku() {
        return $this->db->get('buku')->result();
    }

    public function get_buku_id($id) {
        return $this->db->get_where('buku', ['id' => $id])->row();
    }

    public function count_buku() {
        return $this->db->count_all('buku');
    }

    public function cek_jumlah_buku($id_buku) {
        $this->db->select('jumlah');
        $this->db->from('buku');
        $this->db->where('id', $id_buku);
        $query = $this->db->get();
        $result = $query->row();

        if (!$result) {
            return false; // Buku tidak ditemukan
        }

        return ($result->jumlah > 0); // True jika jumlah tersedia, False jika habis
    }
}