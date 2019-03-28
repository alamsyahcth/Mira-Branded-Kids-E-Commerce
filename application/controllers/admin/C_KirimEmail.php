<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_KirimEmail extends CI_Controller {

	public function __construct(){
        parent::__construct();
        //$this->load->model('M_MasterBarang');
        $this->load->library('form_validation');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $this->load->view('Function/Email');
    }

    public function send() {
        $from = $this->input->post('email_asal');
        $to = $this->input->post('email_tujuan');
        $subject = $this->input->post('subject');
        //$isi = $this->input->post('isi');

        //Konfigurasi Email
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'alamsyahcth@gmail.com';
        $config['smtp_pass'] = '04ok7g789';
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['newline'] = "\r\n";
        
        $this->email->initialize($config);

        $this->email->from($from,'Tahta');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message(
            '
            <table style="border: 2px solid black; border-collapse: collapse;">
                <tr>
                    <td width="5%">ID</td>
                    <td width="20%">Barang</td>
                    <td width="20%">Harga</td>
                </tr>
                <tr>
                    <td>001</td>
                    <td>Baju</td>
                    <td>150000</td>
                </tr>
            </table>
            <p>Konfirmasi Pembayaran</p> <a href="facebook.com">klik disini</a>
            '
        );

        if ($this->email->send()) {
            $this->session->set_flashdata('msg_emailS','Email berhasil terkirim');
            redirect('admin/C_KirimEmail/index');
        } else {
            show_error($this->email->print_debugger());
        }
    }
}
