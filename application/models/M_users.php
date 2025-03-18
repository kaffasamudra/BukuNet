<?php
class M_users extends CI_Model
{
	function get_user($email) {
		$where = array(
			'email' => $email,
		);
		$this->db->where($where);
		$query = $this->db->get('users')->result();
		foreach ($query as $key => $value) {
			return $value;
		}
	}
	public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    public function get_users() {
        $id=$this->session->userdata("id");
        $this->db->where("id",$id);
        return $this->db->get('users')->result();
    }

    public function update_avatar($id, $avatar) {
    $this->db->where('id', $id);
    return $this->db->update('users', ['avatar' => $avatar]);
}
}