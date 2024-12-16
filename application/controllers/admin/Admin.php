<?php

class Admin extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
	}

	public function index() {
		$this->load->view('admin/login_admin')
	}

    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/login_admin');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user = $this->m_user->get_user($username, $password);
            
            if ($user->username == $username && $user->password == $password) {
                $this->session->set_userdata('username', $user->username);
                $this->session->set_userdata('role', $user->role);
                $this->session->set_userdata('bagian', $user->bagian);
                $this->session->set_userdata('avatar', $user->avatar);
                $this->session->set_userdata('id_user', $user->id);

                $this->log_login($user->id, $user->username);

                // Redirect based on role
                if ($user->role == 'Karyawan') {
                    redirect('staffapp');
                } else if ($user->role == 'Direksi') {
                    redirect('direksiview');
                } else if ($user->role == 'Kepala Bagian') {
                    redirect('bagianview');
                }  
                echo $user->role;
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('userlogin');
            }
        }
    }
}