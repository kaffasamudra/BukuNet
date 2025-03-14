<?php

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_users','user');
	}

	public function index()
	{
		$this->load->view('user/login_user');
	}

	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('user/login_user');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->user->get_user($email);

			 if ($user && password_verify($password, $user->password)) {
				$this->session->set_userdata('nama', $user->nama);
				$this->session->set_userdata('email', $user->email);
				$this->session->set_userdata('alamat', $user->alamat);
				$this->session->set_userdata('id', $user->id);

				redirect(base_url("bukunet"));
			} else {
				$this->session->set_flashdata('error', 'nama atau password salah');
				redirect(base_url("loginuser"));
			}
		}
	}

	public function registrasi()
	{
		$this->load->view('user/register');
	}

	public function register() {
	    $this->load->library('form_validation');

	    $this->form_validation->set_rules('nama', 'Nama', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
	    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

	    if ($this->form_validation->run() == FALSE) {
	        $this->load->view('user/register');
	    } else {
	        $data = [
	            'nama'     => $this->input->post('nama'),
	            'email'    => $this->input->post('email'),
	            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Hash password
	        ];

	        if ($this->user->insert_user($data)) {
	            $this->session->set_flashdata('success', 'Registration successful!');
	            redirect('loginuser');
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