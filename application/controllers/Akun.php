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
        $data['order'] = $this->M_FrontProduct->getOrderCustomer($this->session->userdata('id_customer'));
        $data['resi'] = $this->M_FrontProduct->getResi($this->session->userdata('id_customer'));
        $data['customer'] = $this->M_MasterCustomer->getById($this->session->userdata('id_customer'));
        
        $this->load->view('fFront/V_FrontAkun', $data);
    }

    public function edit() { 
        $table = $this->M_MasterCustomer;
        $validation = $this->form_validation;
        $validation->set_rules($table->rules());

        if ($validation->run()) {
            if($this->M_MasterCustomer->getEmailCustomerById($_POST['email_customer'],$_POST['id_customer'])) {
                $this->session->set_flashdata('Fail','Maaf email sudah terdaftar');
                redirect('Akun/edit');
            } else if ($this->M_MasterCustomer->getPasswordCustomer($_POST['password_lama'])) {
                $this->session->set_flashdata('Fail_Password','Maaf Password yang anda masukkan salah');
                redirect('Akun/edit');
            } else {
                $table->update();
                $this->session->set_flashdata('update_success','Data berhasil di update');
                redirect('Akun');
            }
        }

        $data['kategori'] = $this->M_FrontProduct->getKategori();
        $data['k'] = $table->getById($this->session->userdata('id_customer'));
        $this->load->view('front/V_FrontEditAkun',$data);
    }

    public function ubahStatus($id) {
        $this->M_FrontProduct->ubahStatusOrder($id);
        redirect('Akun');
    }

}