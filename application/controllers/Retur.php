<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_FrontProduct');
        $this->load->model('M_Retur');
        $this->load->library('form_validation');

        if($this->session->userdata('on') != TRUE) {
            redirect('Login/logout');
        }
    }

    public function index(){

        //Navbar Kategori
        $data['kategori'] = $this->M_FrontProduct->getKategori();
        $data['order'] = $this->M_Retur->getOrder($this->session->userdata('id_customer'));
        $data['retur'] = $this->M_Retur->cekRetur($this->session->userdata('id_customer'));
        $data['id_retur'] = $this->M_Retur->returID();
        $data['orderData'] = $this->M_Retur->getDetilOrder();
        $data['cekOrder'] = $this->M_Retur->cekOrder();

        $this->load->view('Front/V_FrontRetur', $data);
    }

    public function aksi() {
        $this->M_Retur->save();
        redirect('Retur/dataRetur/'.$this->input->post('id_retur'));
    }

    public function updateRetur() {
        $this->M_Retur->update();
        redirect('Retur');
    }

    public function dataRetur($id) {
        $data['kategori'] = $this->M_FrontProduct->getKategori();
        $data['getRetur'] = $this->M_Retur->getReturOrder($id);
        $this->load->view('front/V_FrontAksiRetur', $data);
    }

    public function deleteData($id_retur,$id_product,$id_size) {
        $this->M_Retur->delete($id_retur,$id_product,$id_size);
        redirect('Retur/dataRetur/'.$id_retur);
    }

}