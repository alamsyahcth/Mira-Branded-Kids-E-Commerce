<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_FrontProduct');
		$this->load->library('form_validation');
		$this->load->library('rajaongkir');
		$this->load->helper('form');

		if($this->session->userdata('on') != TRUE) {
            redirect('Login');
        }
	}

	public function index(){

		if ($this->cart->total_items() < 1) {
			redirect('cart');
		}
			//Navbar Kategori
		
			$custData = $data = array();

			$submit = $this->input->post('placeOrder');
			if (isset($submit)) {
				$this->form_validation->set_rules('name','Name','required');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('phone','Phone','required');
				$this->form_validation->set_rules('address','Address','required');

				$custData = array(
					'name'=>strip_tags($this->input->post('name')),
					'email'=>strip_tags($this->input->post('email')),
					'phone'=>strip_tags($this->input->post('phone')),
					'address'=>strip_tags($this->input->post('address'))
				);

				if ($this->form_validation->run() == true) {
					$insert = $this->M_FrontProduct->insertCustomer($custData);

					if ($insert) {
						$order = $this->placeOrder($insert);

						if ($order) {
							$this->session->set_flashdata('msg','success');
							redirect('Checkout/orderSuccess');
						} else {
							$data['error_msg'] = 'Order Gagal';
						}
					
					} else {
						$data['error_msg'] = 'Order Gagal';
					}
				}
			}
			
			$data['bank'] = $this->M_FrontProduct->getBank();
			$data['customer'] = $this->M_FrontProduct->getCustomer($this->session->userdata('id_customer'));
			$data['custData'] = $custData;
			$data['kategori'] = $this->M_FrontProduct->getKategori();
			$this->load->view('Front/V_FrontCheckout', $data);

	}

	public function placeOrder($custID) {

		$data['orderID'] = $this->M_FrontProduct->orderID();
		$ordData = array(
			'orders_id'=>$data['orderID'],
			'customer_id'=>$custID,
			'grand_total'=>$this->cart->total()
		);

		//Insert Table Order
		$insertOrder = $this->M_FrontProduct->insertOrder($ordData);
		$this->insertItemData($data['orderID']);
		//return false;
	}

	public function insertItemData($ordID) {
		$cartItems = $this->cart->contents();
		$ordItemData = array();
		$i=0;
		foreach ($cartItems as $item) {
			$ordItemData[$i]['orders_id'] = $ordID; //table orders
			$ordItemData[$i]['id_barang'] = $item['id'];
			$ordItemData[$i]['quantity'] = $item['qty'];
			$ordItemData[$i]['sub_total'] = $item['subtotal'];
			$i++;
		}
		//Insert Table Detil Order
		$insertOrderItems = $this->M_FrontProduct->insertOrderItems($ordItemData);

		if ($insertOrderItems) {
			$this->cart->destroy();
			$this->session->set_flashdata('msg','success');
			redirect('OrderDetail/index/'.$ordID);
			return $insertOrderItems;
		}
	}

	public function orderSuccess() {
		//$data['order'] = $this->product->getOrder($ordId);
		$this->load->view('Front/orderDetail');
	}
	//Ongkir Function
	public function getProvinsi() {
        $provinces = $this->rajaongkir->province();
        $this->output->set_content_type('aplication/json')->set_output($provinces);
    }

     public function getKota($id_provinces) {
        $kota = $this->rajaongkir->city($id_provinces);
        $this->output->set_content_type('aplication/json')->set_output($kota);
    }

    public function getOngkir($origin,$destination,$weight,$courier) {
        $ongkir = $this->rajaongkir->cost($origin,$destination,$weight,$courier);
        $this->output->set_content_type('aplication/json')->set_output($ongkir);
    }

}