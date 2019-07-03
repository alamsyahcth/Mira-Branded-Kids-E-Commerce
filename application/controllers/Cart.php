<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_FrontProduct');
    }

    public function index() {

        //Navbar Kategori
        $data['kategori'] = $this->M_FrontProduct->getKategori();

        $this->load->view('front/V_FrontCart',$data);
    }

    public function updateItemQty() {
        $update = 0;

        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');

        if (!empty($rowid) && !empty($qty)) {
            $data = array(
                'rowid' => $rowid,
                'qty' => $qty
            );

           $update = $this->cart->update($data);
        }

        echo $update?'ok':'err';
    }

    public function removeCart($rowid,$id_product,$id_size,$qty) {
        if ($this->M_FrontProduct->tambahDataStok($id_product,$id_size,$qty)) {
            $this->cart->remove($rowid);

            redirect('cart');
        }
        
    }

}