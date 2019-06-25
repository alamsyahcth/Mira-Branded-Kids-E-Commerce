<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_FrontProduct');
        $this->load->model('M_Retur');
        $this->load->library('form_validation');

        if($this->session->userdata('on') != TRUE) {
            redirect('Login/logout');
        }
    }

    public function index(){

        //Navbar Kategori
        $data['kategori'] = $this->M_FrontProduct->getKategori();
        $data['order'] = $this->M_Retur->getOrder($this->session->userdata('id_customer'));
        $data['retur'] = $this->M_Retur->cekRetur($this->session->userdata('id_customer'));
        $data['id_retur'] = $this->M_Retur->returID();
        $data['orderData'] = $this->M_Retur->getDetilOrder();
        $data['cekOrder'] = $this->M_Retur->cekOrder();

        $this->load->view('front/V_FrontRetur', $data);
    }

    public function aksi() {
        if ($this->M_Retur->cekDataReturSimpan($this->input->post($id_order))) {
            redirect('retur');
        } else {
            $this->M_Retur->save();
            redirect('Retur/dataRetur/'.$this->input->post('id_retur'));
        }
    }

    public function updateRetur() {
        $this->M_Retur->update();
        $id_retur = $this->input->post('id_retur2');
        $email_customer = $this->input->post('email_customer');
        $no_rekening = $this->input->post('no_rekening');
        $this->emailRetur($email_customer,$id_retur,$no_rekening);
        redirect('Retur');
    }

    public function dataRetur($id) {
        $data['kategori'] = $this->M_FrontProduct->getKategori();
        $data['getFaktur'] = $this->M_Retur->getFaktur($id);
        $data['getRetur'] = $this->M_Retur->getReturOrder($id);
        $this->load->view('front/V_FrontAksiRetur', $data);
    }

    public function deleteData($id_retur,$id_product,$id_size) {
        $this->M_Retur->delete($id_retur,$id_product,$id_size);
        redirect('Retur/dataRetur/'.$id_retur);
    }

    public function emailRetur($email,$id_retur,$no_rekening) {
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

        $data['getFaktur'] = $this->M_Retur->getFaktur($id_retur);
        $data['retur'] = $this->M_Retur->getReturOrder($id_retur);

        $this->email->from($from,'Mira Branded Kids');
        $this->email->to($email);
		$this->email->subject('Data Retur');
				
        $this->email->message($this->load->view('front/V_FrontEmailRetur',$data, TRUE));

        return $this->email->send();
    }
    
    public function cetakRetur($id) {
        ob_start();
        $data['getFaktur'] = $this->M_Retur->getFaktur($id);
        $data['retur'] = $this->M_Retur->getReturOrder($id);
        $this->load->view('front/V_FrontCetakRetur', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('p','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('Retur-'.md5($id).'.pdf','D');
    }

}