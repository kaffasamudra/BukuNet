<?php
class M_admin extends CI_Model
{
	function get_user($email,$password) {
		$where = array(
			'email' => $email,
			'password' => $password,
		);
		$this->db->where($where);
		$query = $this->db->get('admin')->result();
		foreach ($query as $key => $value) {
			return $value;
		}
	}
	public function insert_user($data) {
        return $this->db->insert('admin', $data);
    }

    public function get_users() {
        $id=$this->session->userdata("id_user");
        $this->db->where("id",$id);
        return $this->db->get('admin')->result();
    }
}