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

        $this->load->view('Front/V_FrontRetur', $data);
    }

    public function aksi($id) {
        //$data['detil_order'] = $this->M_Retur->getDetilOrder($id);
        $data['order'] = $this->M_Retur->getReturOrder($id);
        $data['kategori'] = $this->M_FrontProduct->getKategori();
        $data['returId'] = $this->M_Retur->returID();
        //$returId = $this->M_Retur->returID();
        //$tanggal = date("Y-m-d");

        /*$insertData = array(
            'id_retur'=>$returId,
            'tgl_retur'=>$tanggal,
            'status_retur'=>'1'
        );

        $this->M_Retur->save($insertData);*/

        $this->load->view('Front/V_FrontAksiRetur', $data);
    }

    public function addRetur() {
        $data = array(
            'id_retur'=>$this->input->post('id_retur'),
            'id_order'=>$this->input->post('id_order'),
            'id_product'=>$this->input->post('id_product'),
            'id_size'=>$this->input->post('id_size'),
            'alasan'=>$this->input->post('alasan')
        );
        $this->M_Retur->saveBatch($data);
    }

    /*public function cekOrder() {
        if ($this->M_Konfirmasi->cekDataOrder($_POST['id_order'],$_POST['id_customer'])) {
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
    }*/

}