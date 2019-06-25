<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_FrontProduct');
        $this->load->model('M_MasterCustomer');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index(){

        //Navbar Kategori
        $data['kategori'] = $this->M_FrontProduct->getKategori();

        $data['autonumber'] = $this->M_MasterCustomer->customerId();
        $this->load->view('front/V_FrontSignup', $data);
    }

    public function cekEmail() {
        if($this->M_MasterCustomer->getEmailCustomer($_POST['email_customer'])) {
            echo '<label class="text-danger"><span>Maaf email sudah terdaftar</span></label>';
        } else {
            echo '<label class="text-success"><span>Email Tersedia</span></label>';
        }
    }

    public function add() {
        $table = $this->M_MasterCustomer;
        $validation = $this->form_validation;
        $validation->set_rules($table->rules());

        if($validation->run()) {
            if($this->M_MasterCustomer->getEmailCustomer($this->input->post('email_customer'))) {
                $this->session->set_flashdata('Fail','Maaf email sudah terdaftar');
                redirect('SignUp');
            } else {
                $table->save();
                $this->konfirmasiEmail($this->input->post('email_customer'),$this->input->post('id_customer'));
                $this->session->set_flashdata('signup_success','Akun berhasil dibuat, silahkan konfirmasi email anda');
                redirect('Login');
            }
        }
    }

    public function konfirmasiEmail($email,$id_customer) {
        $from = 'mirabrandedkids@gmail.com';

        //Konfigurasi Email
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'mirabrandedkids@gmail.com';
        $config['smtp_pass'] = 'mira1234%';
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['newline'] = "\r\n";
        
        $this->email->initialize($config);

        $this->email->from($from,'Mira Branded Kids');
        $this->email->to($email);
        $this->email->subject('Konfirmasi Email');
        $this->email->message(
            '
            <h1 style="font-face:sans-serif; color:#7971ea;">Mira Branded Kids</h1>
            <h4>Hai, Selamat akun anda berhasil dibuat. Konfirmasikan email kamu dengan klik disini <a href="'.site_url('SignUp/konfirmasi/'.$id_customer).'">Konfirmasi</a></h4>
            '
        );

        return $this->email->send();
    }

    public function konfirmasi($id_customer) {
        $konfirmasi = $this->M_MasterCustomer->konfirmasiAkun($id_customer);

        if($konfirmasi) {
            $this->session->set_flashdata('confirm_success','Konfirmasi akun berhasil silahkan login');
            redirect('Login');
        }
    }

}