<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderDetail extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_FrontProduct');
        $this->load->library('pagination');
    }

    public function index($ordID){

        //Navbar Kategori
        $data['kategori'] = $this->M_FrontProduct->getKategori();
        $data['bank'] = $this->M_FrontProduct->getBank();
        $data['customer'] = $this->M_FrontProduct->getDataCustomers($ordID);
        $data['order'] = $this->M_FrontProduct->getDataOrder($ordID);
        $data['gtotal'] = $this->M_FrontProduct->getGrandTotal($ordID);

        $this->load->view('front/V_FrontOrderDetail', $data);
    }

    public function cetakInvoice($ordID) {
        ob_start();
        $data['bank'] = $this->M_FrontProduct->getBank();
        $data['customer'] = $this->M_FrontProduct->getDataCustomers($ordID);
        $data['order'] = $this->M_FrontProduct->getDataOrder($ordID);
        $data['gtotal'] = $this->M_FrontProduct->getGrandTotal($ordID);
        $this->load->view('front/V_FrontInvoice', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('p','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('Invoice-'.md5($ordID).'.pdf','D');
    }

}