<?php

class M_buku extends CI_Model
{
	
    public function get_buku() {
        return $this->db->get('buku')->result();
    }

    public function add() {
        return $this->db->insert('buku');
    }

    public function get_buku_id($id) {
        return $this->db->get_where('buku', ['id' => $id])->row();
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

    public function update_status($id, $status) {
        $this->db->where('id', $id);
        return $this->db->update('buku', ['status' => $status]);
    }

    // Fungsi untuk mendapatkan buku yang statusnya "on"
    public function get_buku_aktif() {
        $this->db->where('status', 'on');
        return $this->db->get('buku')->result();
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