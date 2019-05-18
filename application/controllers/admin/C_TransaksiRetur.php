<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TransaksiRetur extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_TransaksiRetur');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $data['retur'] = $this->M_TransaksiRetur->getRetur();
        $this->load->view('TransaksiRetur/V_TransaksiRetur', $data);
    }

    public function dataRetur($id) {
        $data['retur'] = $this->M_TransaksiRetur->getRetur();
        $data['returId'] = $this->M_TransaksiRetur->getReturById($id);
        $data['detil_retur'] = $this->M_TransaksiRetur->getDetilRetur($id);
        $this->load->view('TransaksiRetur/V_TransaksiUpdateRetur', $data);
    }
    public function edit() {
        $id_retur = $this->input->post('id_retur');
        $email = $this->input->post('email_customer');
        $this->M_TransaksiRetur->updateStatus();
        $this->emailRefund($email,$id_retur);
        $this->session->set_flashdata('success','Status berhasil diubah');
        redirect('admin/C_TransaksiRetur');
    }

    public function emailRefund($email,$id_retur) {
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
		$this->email->subject('Data Refund');
				
        $this->email->message(
            '
            <h1 style="font-face:sans-serif; color:#7971ea;">Mira Branded Kids</h1>
            <h4>Hai, Selamat data retur kamu dengan ID Retur '.$id_retur.' sudah ditransfer</h4>
            <h4>Untuk mengetahui bukti refund, bisa dengan mencetak refund</h4>
            <p style="font-family:Helvetica; margin:10px; text-align: left;"><a href="'.site_url('Refund/index/'.$id_retur).'" style="background: #7971ea; border:none; padding: 5px 32px; text-align: center; text-decoration: none; color: #f5f6fa; font-size: 10pt; border-radius: 5px;">Cetak Refund</a></p>
            '
        );

        return $this->email->send();
    }
    
}
