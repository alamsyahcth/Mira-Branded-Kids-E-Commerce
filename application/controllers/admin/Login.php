<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_LoginAdmin');
    }

    public function index(){
        $this->load->view('V_LoginAdmin');
    }

    public function auth() {
        $username = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek = $this->M_LoginAdmin->authentication($username,$password);
        if ($cek->num_rows() > 0) {
            $data = $cek->row_array();

            $this->session->set_userdata('masuk',TRUE);
            $this->session->set_userdata('username',$data['username']);
            redirect('admin/dashboard');  
        } else {
            //$this->load->view('V_LoginAdmin');
            $this->session->set_flashdata('msg_fail','Maaf Username Atau Password Salah !');
            redirect('admin/login'); 
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
        $this->session->set_flashdata('msg_logout','Anda telah logout silahkan login jika ingin mengakses sistem');
    }

}