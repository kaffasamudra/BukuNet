<?php

/**
 * 
 */
class M_buku extends CI_Model
{
	
    public function get_all_buku() {
        return $this->db->get('buku')->result();
    }
}