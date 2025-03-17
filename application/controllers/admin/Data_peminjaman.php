<?php

/**
 * 
 */
class Data_peminjaman extends CI_Controller
{
	
	public function __construct() {
        parent::__construct();
        $this->load->model('M_peminjaman');
        $this->load->model('M_users');
        $this->load->model('M_buku');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function petugas() {
        $data['users'] = $this->M_users->get_users();
        $data['peminjaman'] = $this->M_peminjaman->get_peminjaman();
        $this->load->view('admin/petugas/data_peminjaman', $data);
    }

    public function admin() {
        $data['users'] = $this->M_users->get_users();
        $data['peminjaman'] = $this->M_peminjaman->get_peminjaman();
        $this->load->view('admin/petugas/data_peminjaman', $data);
    }

    public function edit($id) {
    	$denda=$this->input->post("denda");
        $data = array(
        	"tanggal_dikembalikan" => date("Y-m-d"),
        	'denda'	=> $denda,
            'status' => 'Dikembalikan'
        );
        
        $update = $this->M_peminjaman->update_status($id, $data);
        
        if ($update) {
            $this->session->set_flashdata('success', 'Status berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status.');
        }
        
        redirect('datapeminjaman');
    }
}