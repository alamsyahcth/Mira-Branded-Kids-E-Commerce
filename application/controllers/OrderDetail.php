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
        $data['customer'] = $this->M_FrontProduct->getDataCustomers($ordID);
        $data['order'] = $this->M_FrontProduct->getDataOrder($ordID);
        $data['gtotal'] = $this->M_FrontProduct->getGrandTotal($ordID);

        $this->load->view('Front/V_FrontOrderDetail', $data);
    }

}