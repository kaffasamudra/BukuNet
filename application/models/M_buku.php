<?php

class M_buku extends CI_Model
{
	
    public function get_buku() {
        return $this->db->get('buku')->result();
    }

    public function get_buku_id($id) {
        return $this->db->get_where('buku', ['id' => $id])->row();
    }
}