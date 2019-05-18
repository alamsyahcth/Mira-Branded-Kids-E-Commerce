<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_Dashboard');
        $this->load->library('form_validation');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
	}
	
	public function index() {
        $data['totalCustomer'] = $this->M_Dashboard->getTotalCustomer();
        $data['pesananTerbaru'] = $this->M_Dashboard->getPesananTerbaru();
        $data['totalTransaksi'] = $this->M_Dashboard->getTotalTransaksi();
        $data['transaksiSelesai'] = $this->M_Dashboard->getTransaksiSelesai();
        $data['transaksiBatal'] = $this->M_Dashboard->getTransaksiBatal();
        $data['transaksiRetur'] = $this->M_Dashboard->getJumlahRetur();
        $data['saran'] = $this->M_Dashboard->getSaran();
        $this->load->view('dashboard', $data);
	}
}
