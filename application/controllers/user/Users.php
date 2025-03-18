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
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/register');
        } else {
            $config['upload_path']   = './assets/img';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE; // Supaya nama file unik

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('avatar')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', "Upload gagal: $error");
                redirect('registrasi');
            } else {
                $upload_data = $this->upload->data();
                $avatar = $upload_data['file_name'];

                $data = [
                    'nama'     => $this->input->post('nama'),
                    'email'    => $this->input->post('email'),
                    'alamat'   => $this->input->post('alamat'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'phone'     => $this->input->post('phone'),
                    'avatar'   => $avatar
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
    }

    public function update_foto() {
	    $id_user = $this->session->userdata('id_user'); // Ambil ID user dari session

	    // Konfigurasi upload gambar
	    $config['upload_path']   = './uploads/';
	    $config['allowed_types'] = 'jpg|jpeg|png';
	    $config['max_size']      = 2048;
	    $config['encrypt_name']  = TRUE; // Supaya nama file unik

	    $this->load->library('upload', $config);

	    if (!$this->upload->do_upload('foto')) {
	        // Jika upload gagal
	        $this->session->set_flashdata('error', $this->upload->display_errors());
	        redirect('user/profile'); // Kembali ke halaman profil
	    } else {
	        // Jika upload berhasil
	        $upload_data = $this->upload->data();
	        $foto_baru = $upload_data['file_name']; // Ambil nama file baru

	        // Ambil foto lama dari database
	        $user = $this->user->get_user_by_id($id_user);
	        $foto_lama = $user->foto;

	        // Hapus foto lama jika ada
	        if ($foto_lama && file_exists('./uploads/' . $foto_lama)) {
	            unlink('./uploads/' . $foto_lama);
	        }

	        // Update foto di database
	        $this->user->update_foto($id_user, $foto_baru);

	        $this->session->set_flashdata('success', 'Foto berhasil diperbarui!');
	        redirect('user/profile'); // Kembali ke halaman profil
	    }
	}

    public function logout() {
	    $this->session->sess_destroy();
	    redirect('user/Users/index');
	}

}