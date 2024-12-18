<?php

class Admin extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
	}

	public function index() {
		$this->load->view('admin/login_admin');
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

    public function registrasi()
    {
        $this->load->view('admin/register');
    }

    public function register() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/register');
        } else {
            $data = [
                'nama'     => $this->input->post('nama'),
                'email'    => $this->input->post('email'),
                'password' => $this->input->post('password'),
            ];

            if ($this->user->insert_user($data)) {
                $this->session->set_flashdata('success', 'Registration successful!');
                redirect('loginadmin');
            } else {
                $this->session->set_flashdata('error', 'Registration failed, try again!');
                redirect('registrasi');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('user/Users/index');
    }
}