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
        $data['size'] = $this->M_FrontProduct->getDetilSize($id);
        $this->load->view('Front/V_FrontDetilProduct', $data);
    }

    public function cekProduct() {
        $getStok = $this->M_FrontProduct->getStok($this->input->post('id'),$this->input->post('ukuran'));
        echo json_encode($getStok);
        //$this->load->view('Front/V_FrontDetilProduct', $data);
    }

    public function addToCart() {
        $id_product = $this->input->post('id');
        $qty = $this->input->post('qty');
        $ukuran = $this->input->post('ukuran');
        $berat = $this->input->post('berat');
        $id=$id_product.$ukuran;
        $nm_ukuran = $this->M_FrontProduct->getSize($ukuran);
        $pro = $this->M_FrontProduct->getRows($id_product);

        $data = array(
            'id'=>$id,
            'id_product'=>$pro['id_product'],
            'qty'=>$qty,
            'name'=>$pro['nm_product'],
            'price'=>$pro['harga'],
            'Size'=>$ukuran,
            'nm_size'=>$nm_ukuran['nm_size'],
            'image'=>$pro['gambar'],
            'weight'=>$berat
        );

        $this->cart->insert($data);
        redirect('cart');
    }

}