<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_LaporanPengiriman extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_LaporanPengiriman');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $this->load->view('LaporanPengiriman/V_LaporanPengiriman');
    }

    public function cetak() {
        ob_start();
        $data['bulan'] = $this->input->post('bulan');
        $data['tahun'] = $this->input->post('tahun');
        $data['sendMonth'] = $this->M_LaporanPengiriman->getSendMonth($this->input->post('bulan'),$this->input->post('tahun'));
       
        $this->load->view('LaporanPengiriman/V_CetakLaporanPengiriman', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('L','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('LaporanPengiriman'.microtime().'.pdf','D');
    }
    
}
