<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {
    public function index() {
        // Menampilkan halaman
        $this->load->view('user/dashboard');
    }
}
