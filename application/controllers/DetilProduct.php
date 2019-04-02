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
        $ukuran = $this->input->post('ukuran');
        $id=$id_barang.$ukuran;
        $pro = $this->M_FrontProduct->getRows($id_barang);

        $data = array(
            'id'=>$id,
            'id_barang'=>$pro['id_barang'],
            'qty'=>$qty,
            'name'=>$pro['nm_barang'],
            'price'=>$pro['harga'],
            'Size'=>$ukuran,
            'image'=>$pro['gambar'],
            'weight'=>1
        );

        $this->cart->insert($data);
        redirect('cart');
    }

}