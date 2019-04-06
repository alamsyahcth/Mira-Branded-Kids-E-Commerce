<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_FrontProduct');
        $this->load->model('M_MasterCustomer');
        $this->load->library('form_validation');
        
        if($this->session->userdata('on') != TRUE) {
           redirect('Login');
        }
    }
    
    public function index(){

        //Navbar Kategori
        $data['kategori'] = $this->M_FrontProduct->getKategori();
        $data['customer'] = $this->M_MasterCustomer->getById($this->session->userdata('id_customer'));
        
        $this->load->view('Front/V_FrontAkun', $data);
    }

    public function edit($id=null) {
        if ($id=null) {redirect('Akun');}
        
        $table = $this->M_MasterCustomer;
        $validation = $this->form_validation;
        $validation->set_rules($table->rules());

        if ($validation->run()) {
            $table->update();
            $this->session->set_flashdata('update_success','Data berhasil di update');
            redirect('Akun');
        }

        $data['kategori'] = $this->M_FrontProduct->getKategori();
        $data['k'] = $table->getById($id);
        $this->load->view('Front/V_FrontEditAkun',$data);
    }

}