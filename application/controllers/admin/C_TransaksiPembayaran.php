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
            $email_customer = $this->input->post('email_customer');
            $id_order = $this->input->post('id_order');
            $no_resi = $this->input->post('no_resi');
            $id_resi = $this->input->post('id_resi');
            $kurir = $this->input->post('kurir');
            $this->M_TransaksiPembayaran->save();
            $this->M_TransaksiPembayaran->updateStatus($this->input->post('id_order'));
            $this->emailResi($email_customer,$id_order,$no_resi,$id_resi,$kurir);
            $this->session->set_flashdata('success','Status berhasil diubah');
            redirect('admin/C_TransaksiPembayaran');
        }
    }

    public function tolakPembayaran() {
        $id_confirm = $this->input->post('id_confirm');
        $id_order = $this->input->post('id_order');
        $email = $this->input->post('email_customer');
        $this->M_TransaksiPembayaran->updateTolakPembayaranOrder($id_order);
        $this->M_TransaksiPembayaran->updateTolakPembayaranConfirm($id_confirm);
        $this->emailPenolakan($email,$id_order);
        redirect('admin/C_TransaksiPembayaran');
    }

    public function viewImage($id) {
        $data['orderId'] = $this->M_TransaksiPembayaran->getOrderById($id);
        $this->load->view('TransaksiPembayaran/V_TransaksiBuktiPembayaran', $data);
    }

    public function label() {
        ob_start();
        $id_order = $this->input->post('id_orderLabel');
        $data['label'] = $this->M_TransaksiPembayaran->getLabel($id_order);
        //$data['GTMonth'] = $this->M_LaporanPenjualan->getGTSalesMonth($this->input->post('bulan'),$this->input->post('tahun'));
       
        $this->load->view('TransaksiPembayaran/V_CetakLabel', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('CetakLabel'.microtime().'.pdf','D');
    }

    public function emailResi($email, $id_order, $no_resi, $id_resi, $kurir) {
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
            <h2 style="font-weight:bold;">Berikut No.Faktur anda : '.$id_resi.'</h2>
            <h4>Dikirim menggunakan jasa pengiriman'.$kurir.'</h4>
            <h4>Untuk melacak pesanan kamu, bisa dengan menggunakan nomor resi dibawah ini pada web jasa pengiriman yang kamu pilih, berikut nomor resi kamu</h4>
            <h2>'.$no_resi.'</h2><br>
            <p style="font-family:Helvetica; margin:10px; text-align: left;"><a href="'.site_url('Pengiriman/faktur/'.$id_order).'" style="background: #7971ea; border:none; padding: 5px 32px; text-align: center; text-decoration: none; color: #f5f6fa; font-size: 10pt; border-radius: 5px;">Cetak Faktur</a></p>
            '
        );

        return $this->email->send();
    }

    public function emailPenolakan($email,$id_order) {
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
        $this->email->subject('Konfirmasi Penolakan Pembayaran');
        $this->email->message(
            '
            <h1 style="font-face:sans-serif; color:#7971ea;">Mira Branded Kids</h1>
            <h4>Hai, Mohon maaf data pembayaran kamu untuk order dengan ID Order '.$id_order.' tidak valid, mohon untuk mengirim kembali data konfirmasi pembayaran kamu dan pastikan bahwa datanya valid, Terima Kasih</h4>
            <h4>Regards, Mira Admin</h4>
            '
        );

        return $this->email->send();
    }
    
}
