<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetilProduct extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_FrontProduct');
    }
    
    public function data($id){
        //Navbar Kategori
        $data['kategori'] = $this->M_FrontProduct->getKategori();
        $data['product'] = $this->M_FrontProduct->getById($id);
        $this->load->view('Front/V_FrontDetilProduct', $data);
    }

    public function addToCart() {
        $id_barang = $this->input->post('id');
        $qty = $this->input->post('qty');
        $pro = $this->M_FrontProduct->getRows($id_barang);

        $data = array(
            'id'=>$pro['id_barang'],
            'qty'=>1,
            'name'=>$pro['nm_barang'],
            'price'=>$pro['harga'],
            'Size'=>'L',
            'image'=>$pro['gambar'],
            'weight'=>1
        );

        $this->cart->insert($data);
        redirect('cart');
    }

}