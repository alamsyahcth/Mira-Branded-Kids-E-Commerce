<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_DataOngkir extends CI_Controller {

	public function __construct(){
        parent::__construct();
        //$this->load->model('M_MasterBarang');
        $this->load->library('form_validation');
        $this->load->library('rajaongkir');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index() {
        $this->load->view('Function/Ongkir');
    }

    public function getProvinsi() {
        $provinces = $this->rajaongkir->province();
        $this->output->set_content_type('aplication/json')->set_output($provinces);
    }

     public function getKota($id_provinces) {
        $kota = $this->rajaongkir->city($id_provinces);
        $this->output->set_content_type('aplication/json')->set_output($kota);
    }

    public function getOngkir($origin,$destination,$weight,$courier) {
        $ongkir = $this->rajaongkir->cost($origin,$destination,$weight,$courier);
        $this->output->set_content_type('aplication/json')->set_output($ongkir);
    }

   
}
