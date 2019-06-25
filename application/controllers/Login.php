<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_FrontProduct');
        $this->load->library('pagination');
    }

    public function index(){

        //Navbar Kategori
        $data['kategori'] = $this->M_FrontProduct->getKategori();

        $this->load->view('front/V_FrontLogin', $data);
    }

    public function auth() {
        $email = htmlspecialchars($this->input->post('email_customer',TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password_customer',TRUE), ENT_QUOTES);

        $cek = $this->M_FrontProduct->authentication($email,$password);

        if ($cek->num_rows() > 0) {
            $data = $cek->row_array();

            $this->session->set_userdata('on', TRUE);
            $this->session->set_userdata('id_customer', $data['id_customer']);
            $this->session->set_userdata('nm_customer', $data['nm_customer']);
            $this->session->set_userdata('email_customer', $data['email_customer']);

            redirect('home');
        } else {
            $this->session->set_flashdata('login_fail','Maaf username atau password salah');
            redirect('Login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Login');
    }

}