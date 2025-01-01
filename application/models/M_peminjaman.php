<?php
class M_peminjaman extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_peminjaman() {
        // $id=$this->session->userdata("id");
        $this->db->order_by("status","asc");
        $this->db->order_by("tanggal_pinjam","desc");
        return $this->db->get_where('peminjaman')->result();
    }

    public function insert_peminjaman($data) {
        return $this->db->insert('peminjaman', $data);
    }

    public function update_status($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('peminjaman', $data);
    }
}
