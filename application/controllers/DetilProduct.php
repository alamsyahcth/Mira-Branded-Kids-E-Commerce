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
        $data['comment'] = $this->M_FrontProduct->getComment($id);
        $data['reply'] = $this->M_FrontProduct->getReply($id);
        $this->load->view('front/V_FrontDetilProduct', $data);
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
        $cek = $this->M_FrontProduct->cekStok($id_product,$ukuran);
        if ($cek['stok']>=$qty) {

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

            if ($this->M_FrontProduct->kurangDataStok($id_product,$ukuran,$qty)) {
                $this->cart->insert($data);
                redirect('cart');
            }
        } else {
            $this->session->set_flashdata('fail','data stok kurang');
            redirect('DetilProduct/data/'.$id_product);
        }
    }

    public function comment() {
        $id_comment = $this->M_FrontProduct->commentID();
        $this->M_FrontProduct->saveComment($id_comment);
        redirect('DetilProduct/data/'.$_POST['id_product']);
    }

}