<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_LaporanPemesanan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_LaporanPemesanan');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $this->load->view('LaporanPemesanan/V_LaporanPemesanan');
    }

    public function cetak() {
        ob_start();
        $data['bulan'] = $this->input->post('bulan');
        $data['tahun'] = $this->input->post('tahun');
        $data['orderMonth'] = $this->M_LaporanPemesanan->getOrderMonth($this->input->post('bulan'),$this->input->post('tahun'));
        $data['detOrderMonth'] = $this->M_LaporanPemesanan->getDetOrderMonth($this->input->post('bulan'),$this->input->post('tahun'));
        $data['rowOrderMonth'] = $this->M_LaporanPemesanan->getRowOrderMonth();
        $data['pesan'] = $this->M_LaporanPemesanan->getPesan($this->input->post('bulan'),$this->input->post('tahun'));
        $data['konfirmasi'] = $this->M_LaporanPemesanan->getKonfirmasi($this->input->post('bulan'),$this->input->post('tahun'));
        $data['bayar'] = $this->M_LaporanPemesanan->getBayar($this->input->post('bulan'),$this->input->post('tahun'));
        $data['kirim'] = $this->M_LaporanPemesanan->getKirim($this->input->post('bulan'),$this->input->post('tahun'));
        $data['selesai'] = $this->M_LaporanPemesanan->getSelesai($this->input->post('bulan'),$this->input->post('tahun'));
        $data['batal'] = $this->M_LaporanPemesanan->getBatal($this->input->post('bulan'),$this->input->post('tahun'));
        $data['total_order'] = $this->M_LaporanPemesanan->getTotalOrder($this->input->post('bulan'),$this->input->post('tahun'));
        $this->load->view('LaporanPemesanan/V_CetakLaporanPemesanan', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('L','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('LaporanPemesanan'.microtime().'.pdf','D');
    }
    
}
