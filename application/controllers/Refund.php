<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refund extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_FrontProduct');
        $this->load->model('M_Retur');
        $this->load->library('form_validation');
    }

    public function index($id) {
        ob_start();
        $data['getFaktur'] = $this->M_Retur->getFaktur($id);
        $data['retur'] = $this->M_Retur->getReturOrder($id);
        $this->load->view('front/V_FrontCetakRefund', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('p','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('Refund-'.md5($id).'.pdf','D');
    }

}