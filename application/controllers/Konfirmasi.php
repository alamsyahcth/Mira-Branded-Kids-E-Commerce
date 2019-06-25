<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_FrontProduct');
        $this->load->model('M_Konfirmasi');
        $this->load->library('form_validation');

        if($this->session->userdata('on') != TRUE) {
            redirect('Login/logout');
        }
    }

    public function index(){

        //Navbar Kategori
        $data['kategori'] = $this->M_FrontProduct->getKategori();
        $data['confirmId'] = $this->M_Konfirmasi->confirmID();
        $data['bank'] = $this->M_Konfirmasi->getBank();

        $this->load->view('front/V_FrontKonfirmasi', $data);
    }

    public function cekOrder() {
        if ($this->M_Konfirmasi->cekDataOrder($this->input->post('id_order'),$this->input->post('id_customer'))) {
            echo '<p class="text-success">Data ditemukan</p>';
        } else {
            echo '<p class="text-danger">Maaf data tidak ditemukan</p>';
        }
    }

    public function add() {
        $table = $this->M_Konfirmasi;
        $validasi = $this->form_validation;
        $validasi->set_rules($table->rules());

        if ($validasi->run()) {
            if ($table->cekDataOrderTersedia($this->input->post('id_order'),$this->input->post('id_customer'))) {
                $this->session->set_flashdata('fail','Maaf Data order tidak ditemukan');
                redirect('Konfirmasi');
            } else {
                $table->save();
                $table->orderUpdate($this->input->post('id_order'));
                $this->session->set_flashdata('success','Data konfirmasi berhasil dikirim');
                redirect('Konfirmasi');
            }
        }
    }

}