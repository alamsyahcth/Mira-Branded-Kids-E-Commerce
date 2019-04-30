<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_LaporanPenjualan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_LaporanPenjualan');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $this->load->view('LaporanPenjualan/V_LaporanPenjualan');
    }

    public function cetak() {
        ob_start();
        $data['bulan'] = $this->input->post('bulan');
        $data['tahun'] = $this->input->post('tahun');
        $data['salesMonth'] = $this->M_LaporanPenjualan->getSalesMonth($this->input->post('bulan'),$this->input->post('tahun'));
        $data['detSalesMonth'] = $this->M_LaporanPenjualan->getDetSalesMonth($this->input->post('bulan'),$this->input->post('tahun'));
        $data['GTMonth'] = $this->M_LaporanPenjualan->getGTSalesMonth($this->input->post('bulan'),$this->input->post('tahun'));
       
        $this->load->view('LaporanPenjualan/V_CetakLaporanPenjualan', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('L','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('LaporanPenjualan'.microtime().'.pdf','D');
    }
    
}
