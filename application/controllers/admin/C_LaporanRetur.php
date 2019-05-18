<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_LaporanRetur extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_LaporanRetur');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $this->load->view('LaporanRetur/V_LaporanRetur');
    }

    public function cetak() {
        ob_start();
        $data['bulan'] = $this->input->post('bulan');
        $data['tahun'] = $this->input->post('tahun');
        $data['returMonth'] = $this->M_LaporanRetur->getReturMonth($this->input->post('bulan'),$this->input->post('tahun'));
        $data['detReturMonth'] = $this->M_LaporanRetur->getDetReturMonth($this->input->post('bulan'),$this->input->post('tahun'));
        $data['GTMonth'] = $this->M_LaporanRetur->getGTReturMonth($this->input->post('bulan'),$this->input->post('tahun'));
       
        $this->load->view('LaporanRetur/V_CetakLaporanRetur', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('L','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('LaporanRetur'.microtime().'.pdf','D');
    }
    
}
