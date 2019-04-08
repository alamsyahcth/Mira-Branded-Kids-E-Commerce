<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TransaksiPemesanan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_TransaksiPemesanan');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $data['order'] = $this->M_TransaksiPemesanan->getOrder();
        $this->load->view('TransaksiPemesanan/V_TransaksiPemesanan', $data);
    }

    public function dataOrder($id) {
        $data['order'] = $this->M_TransaksiPemesanan->getOrder();
        $data['orderId'] = $this->M_TransaksiPemesanan->getOrderById($id);
        $data['detil_order'] = $this->M_TransaksiPemesanan->getDetilOrder($id);
        $this->load->view('TransaksiPemesanan/V_TransaksiUpdatePemesanan', $data);
    }
    public function edit($id) {
        $this->M_TransaksiPemesanan->updateStatus($id);
        $this->session->set_flashdata('success','Status berhasil diubah');
        redirect('admin/C_TransaksiPemesanan');
    }
    
}
