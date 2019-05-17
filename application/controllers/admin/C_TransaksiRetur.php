<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TransaksiRetur extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_TransaksiRetur');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $data['retur'] = $this->M_TransaksiRetur->getRetur();
        $this->load->view('TransaksiRetur/V_TransaksiRetur', $data);
    }

    public function dataRetur($id) {
        $data['retur'] = $this->M_TransaksiRetur->getRetur();
        $data['returId'] = $this->M_TransaksiRetur->getReturById($id);
        $data['detil_retur'] = $this->M_TransaksiRetur->getDetilRetur($id);
        $this->load->view('TransaksiRetur/V_TransaksiUpdateRetur', $data);
    }
    public function edit() {
        $this->M_TransaksiRetur->updateStatus();
        $this->session->set_flashdata('success','Status berhasil diubah');
        redirect('admin/C_TransaksiRetur');
    }
    
}
