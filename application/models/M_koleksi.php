<?php

class M_koleksi extends CI_Model {

    public function get_koleksi_by_peminjam($id_peminjam) {
        $this->db->select('koleksi.*, buku.judul'); 
        $this->db->from('koleksi');
        $this->db->join('buku', 'koleksi.id_buku = buku.id', 'left');
        $this->db->where('koleksi.id_peminjam', $id_peminjam);
        return $this->db->get()->result();
    }

    public function add($id_peminjam, $id_buku) {
        // Cek apakah buku sudah ada di koleksi user
        $cek = $this->db->get_where('koleksi', ['id_peminjam' => $id_peminjam, 'id_buku' => $id_buku]);
        if ($cek->num_rows() > 0) {
            return false; // Buku sudah ada di koleksi
        }

        // Jika belum ada, tambahkan ke koleksi
        $data = [
            'id_peminjam' => $id_peminjam,
            'id_buku' => $id_buku,
            'tanggal_ditambahkan' => date('Y-m-d H:i:s')
        ];
        return $this->db->insert('koleksi', $data);
    }

    public function del($id_peminjam, $id_buku) {
        return $this->db->delete('koleksi', ['id_peminjam' => $id_peminjam, 'id_buku' => $id_buku]);
    }

    // public function select($id_peminjam) {
    //     $this->db->select('buku.*');
    //     $this->db->from('koleksi');
    //     $this->db->join('buku', 'koleksi.id_buku = buku.id');
    //     $this->db->where('koleksi.id_peminjam', $id_peminjam);
    //     return $this->db->get()->result();
    // }
}
?>