<?php

/**
 * 
 */
class Buku extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_buku');
	}

	public function petugas()
	{
		$data['buku'] = $this->M_buku->get_buku();
		$this->load->view('admin/petugas/data_buku', $data);
	}

	public function admin()
	{
		$data['buku'] = $this->M_buku->get_buku();
		$this->load->view('admin/data_buku', $data);
	}

    public function tambah() {
        if ($this->input->post()) {
            $data = [
                'judul' => $this->input->post('judul'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'kategori' => $this->input->post('kategori'),
                'jumlah' => $this->input->post('jumlah'),
            ];
            $this->M_buku->insert($data);
            redirect('buku');
        } else {
            $this->load->view('buku/tambah');
        }
    }

    public function update($id) {
        $data = [
            'judul' => $this->input->post('judul'),
            'penulis' => $this->input->post('penulis'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'kategori' => $this->input->post('kategori'),
            'jumlah' => $this->input->post('jumlah'),
        ];
        $this->M_buku->update($id, $data);
        redirect('databuku');
    }

    public function toggle_status($id) {
        $buku = $this->db->get_where('buku', ['id' => $id])->row();
        if ($buku) {
            $status_baru = ($buku->status == 'on') ? 'off' : 'on'; // Ubah status
            $this->M_buku->update_status($id, $status_baru);

            // Kirim response JSON untuk AJAX
            echo json_encode(['status' => $status_baru]);
        }
    }

    // Fungsi untuk user agar hanya melihat buku yang aktif
    
}