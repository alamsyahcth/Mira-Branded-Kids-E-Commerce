<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_TransaksiPembayaran');
    }

    public function faktur($id_order) {
        ob_start();
        $data['resi'] = $this->M_TransaksiPembayaran->getResi($id_order);
        $data['customer'] = $this->M_TransaksiPembayaran->getDataCustomers($id_order);
        $data['order'] = $this->M_TransaksiPembayaran->getDataOrder($id_order);
        $data['gtotal'] = $this->M_TransaksiPembayaran->getGrandTotal($id_order);
        $this->load->view('TransaksiPembayaran/V_FakturPengiriman', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('p','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('Faktur-'.md5($id_order).'.pdf','D');
    }

}