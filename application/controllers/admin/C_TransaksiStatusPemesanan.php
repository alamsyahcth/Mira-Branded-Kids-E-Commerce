<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TransaksiStatusPemesanan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_TransaksiStatusPemesanan');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $data['order'] = $this->M_TransaksiStatusPemesanan->getOrder();
        $this->load->view('TransaksiStatusPemesanan/V_TransaksiStatusPemesanan', $data);
    }
    
    public function edit($id) {
        $this->M_TransaksiPemesanan->updateStatus($id);
        $this->session->set_flashdata('success','Status berhasil diubah');
        redirect('admin/C_TransaksiPemesanan');
    }
    
}
