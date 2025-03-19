<?php

class M_buku extends CI_Model
{
	
    public function get_buku() {
        return $this->db->get('buku')->result();
    }

    public function add() {
        return $this->db->insert('buku');
    }

    public function count_buku() {
        return $this->db->count_all('buku');
    }

    public function insert($data) {
        return $this->db->insert('buku', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('buku', $data);
    }

    public function cek_jumlah_buku($id_buku) {
        $this->db->select('jumlah');
        $this->db->from('buku');
        $this->db->where('id', $id_buku);
        $query = $this->db->get();
        $result = $query->row();

        if (!$result) {
            return false;
        }

        return ($result->jumlah > 0);
    }
}