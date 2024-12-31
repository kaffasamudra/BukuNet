<?php
class M_peminjaman extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_peminjaman() {
        return $this->db->get('peminjaman')->result();
    }

    public function insert_peminjaman($data) {
        return $this->db->insert('peminjaman', $data);
    }
}
