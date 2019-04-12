<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TransaksiPembayaran extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_TransaksiPembayaran');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $data['order'] = $this->M_TransaksiPembayaran->getOrder();
        $this->load->view('TransaksiPembayaran/V_TransaksiPembayaran', $data);
    }

    public function dataOrder($id) {
        $data['resiId'] = $this->M_TransaksiPembayaran->resiID();
        $data['order'] = $this->M_TransaksiPembayaran->getOrder();
        $data['orderId'] = $this->M_TransaksiPembayaran->getOrderById($id);
        $data['resi'] = $this->M_TransaksiPembayaran->getDataResi($id);
        $data['detil_order'] = $this->M_TransaksiPembayaran->getDetilOrder($id);
        $this->load->view('TransaksiPembayaran/V_TransaksiUpdatePembayaran', $data);
    }

    public function edit() {
        if ($this->M_TransaksiPembayaran->cekResi($this->input->post('id_order'))) {
            $this->session->set_flashdata('fail','Maaf resi sudah pernah diinput');
            redirect('admin/C_TransaksiPembayaran');
        } else {
            $this->M_TransaksiPembayaran->save();
            $this->M_TransaksiPembayaran->updateStatus($this->input->post('id_order'));
            $this->emailResi($_POST['email_customer'],$_POST['id_order'],$_POST['no_resi']);
            $this->session->set_flashdata('success','Status berhasil diubah');
            redirect('admin/C_TransaksiPembayaran');
        }
    }

    public function viewImage($id) {
        $data['orderId'] = $this->M_TransaksiPembayaran->getOrderById($id);
        $this->load->view('TransaksiPembayaran/V_TransaksiBuktiPembayaran', $data);
    }

    public function emailResi($email, $id_order, $no_resi) {
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
        $this->email->subject('Konfirmasi Pengiriman');
        $this->email->message(
            '
            <h1 style="font-face:sans-serif; color:#7971ea;">Mira Branded Kids</h1>
            <h4>Hai, Selamat pesanan kamu dengan ID Order '.$id_order.' sudah dikirim</h4>
            <h4>Untuk melacak pesanan kamu, bisa dengan menggunakan nomor resi dibawah ini pada web jasa pengiriman yang kamu pilih, berikut nomor resi kamu</h4>
            <h2>'.$no_resi.'</h2>
            '
        );

        return $this->email->send();
    }
    
}
