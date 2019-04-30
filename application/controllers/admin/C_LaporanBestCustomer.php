<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_LaporanBestCustomer extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_LaporanBestCustomer');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $this->load->view('LaporanBestCustomer/V_LaporanBestCustomer');
    }

    public function cetak() {
        ob_start();
        $data['bulan'] = $this->input->post('bulan');
        $data['tahun'] = $this->input->post('tahun');
        $data['bestCustomerOrderMonth'] = $this->M_LaporanBestCustomer->getBestCustomerOrderMonth($this->input->post('bulan'),$this->input->post('tahun'));
        //$data['bestCustomerMonth'] = $this->M_LaporanBestSeller->getBestCustomerMonth($this->input->post('bulan'),$this->input->post('tahun'));
        //$data['GTMonth'] = $this->M_LaporanPenjualan->getGTSalesMonth($this->input->post('bulan'),$this->input->post('tahun'));
       
        $this->load->view('LaporanBestCustomer/V_CetakLaporanBestCustomer', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('LaporanBestCustomer'.microtime().'.pdf','D');
    }
    
}
