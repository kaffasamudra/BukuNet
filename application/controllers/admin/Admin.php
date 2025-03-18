<?php

class Admin extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin', 'admin');
	}

	public function index() {
		$this->load->view('admin/login_admin');
	}

    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login_admin');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $admin = $this->admin->get_admin($email);
            
            if ($admin && password_verify($password, $admin->password)) {
                $this->session->set_userdata('nama', $admin->nama);
                $this->session->set_userdata('role', $admin->role);
                $this->session->set_userdata('bagian', $admin->bagian);
                $this->session->set_userdata('avatar', $admin->avatar);
                $this->session->set_userdata('id_admin', $admin->id);

                // Redirect based on role
                if ($admin->role == 'admin') {
                    redirect('admin');
                } else if ($admin->role == 'petugas') {
                    redirect('petugas');
                }
                echo $admin->role;
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('adminlogin');
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
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/register');
        } else {
            $data = [
                'nama'     => $this->input->post('nama'),
                'email'    => $this->input->post('email'),
                'alamat'    => $this->input->post('alamat'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                // 'role'     => $this->input->post('role'),
            ];

            if ($this->admin->insert_admin($data)) {
                $this->session->set_flashdata('success', 'Registration successful!');
                redirect('loginadmin');
            } else {
                $this->session->set_flashdata('error', 'Registration failed, try again!');
                redirect('registrasii');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/Admin/index');
    }
}