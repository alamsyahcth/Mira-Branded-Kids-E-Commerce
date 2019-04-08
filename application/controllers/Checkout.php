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
		
		$ordData = $data = array();

		$submit = $this->input->post('placeOrder');
		if (isset($submit)) {
			$this->form_validation->set_rules('id_order','ID Order','required');
			$this->form_validation->set_rules('tanggal_order','Tanggal Order','required');
			$this->form_validation->set_rules('ongkir','Ongkir','required');
			$this->form_validation->set_rules('kurir','Kurir','required');
			$this->form_validation->set_rules('kota','Kota','required');
			$this->form_validation->set_rules('alamat_kirim','Alamat Kirim','required');
			$this->form_validation->set_rules('kode_pos','Kode Pos','required');
			$this->form_validation->set_rules('grand_total','Grand Total','required');
			$this->form_validation->set_rules('status','Status','required');
			$this->form_validation->set_rules('catatan','Catatan','required');
			$this->form_validation->set_rules('total_berat','Total Berat','required');
			$this->form_validation->set_rules('id_customer','ID Customer','required');

			//Tidak Dientry 
			$this->form_validation->set_rules('email','Email Customer','required');

			$ordData = array(
				'id_order'=>strip_tags($this->input->post('id_order')),
				'tanggal_order'=>strip_tags($this->input->post('tanggal_order')),
				'ongkir'=>strip_tags($this->input->post('ongkir')),
				'kurir'=>strip_tags($this->input->post('kurir')),
				'kota'=>strip_tags($this->input->post('kota')),
				'alamat_kirim'=>strip_tags($this->input->post('alamat_kirim')),
				'kode_pos'=>strip_tags($this->input->post('kode_pos')),
				'grand_total'=>strip_tags($this->input->post('grand_total')),
				'status'=>strip_tags($this->input->post('status')),
				'catatan'=>strip_tags($this->input->post('catatan')),
				'total_berat'=>strip_tags($this->input->post('total_berat')),
				'id_customer'=>strip_tags($this->input->post('id_customer'))
			);

			if ($this->form_validation->run() == true) {
				$insert = $this->M_FrontProduct->insertOrder($ordData);
				$order = $this->insertItemData($_POST['id_order']);
				$this->emailInvoice($_POST['email'],$_POST['id_order']);
				$this->cart->destroy();
				$this->session->set_flashdata('msg','success');
				redirect('OrderDetail/index/'.$_POST['id_order']);
			}
		}
		
		$data['bank'] = $this->M_FrontProduct->getBank();
		$data['orderId'] = $this->M_FrontProduct->orderID();
		$data['customer'] = $this->M_FrontProduct->getCustomer($this->session->userdata('id_customer'));
		//$data['ordData'] = $ordData;
		$data['kategori'] = $this->M_FrontProduct->getKategori();
		$this->load->view('Front/V_FrontCheckout', $data);
	}

	public function insertItemData($ordID) {
		$cartItems = $this->cart->contents();
		$ordItemData = array();
		$i=0;
		foreach ($cartItems as $item) {
			$ordItemData[$i]['id_order'] = $ordID; //table orders
			$ordItemData[$i]['id_product'] = $item['id_product'];
			$ordItemData[$i]['id_size'] = $item['Size'];
			$ordItemData[$i]['qty'] = $item['qty'];
			$ordItemData[$i]['sub_total'] = $item['subtotal'];
			$i++;
		}
		//Insert Table Detil Order
		$insertOrderItems = $this->M_FrontProduct->insertOrderItems($ordItemData);

		if ($insertOrderItems) {
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
	
	public function emailInvoice($email,$id_order) {
        $from = 'mirabrandedkids@gmail.com';

        //Konfigurasi Email
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'mirabrandedkids@gmail.com';
        $config['smtp_pass'] = 'mira1234%';
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['newline'] = "\r\n";
        
		$this->email->initialize($config);
		
		//$dataOrder = $this->M_FrontProduct->getOrder($id_order);
		//$dataBank = $this->M_FrontProduct->getBank();

        $this->email->from($from,'Mira Branded Kids');
        $this->email->to($email);
        $this->email->subject('Data Order');
        $this->email->message(
            '
            <table border="0" width="40%" style="text-align:center; padding: 10px; border: 1px solid #f5f6fa; border-collapse: collapse; background: #f5f6fa;">
				<tr>
					<td style="text-align: center;"><p style="color: #7971ea; font-family:Helvetica; font-weight: bold; font-size: 30pt; margin:15px;">Mira Branded Kids</p></td>
				</tr>
				<tr>
					<td><p style="color: #3d3d3d; font-family:Helvetica; font-size: 18pt; margin:10px; text-align: center;">Order Id : O1904080001</p></td>
				</tr>
				<tr>
					<td><br>
						<p style="color: #868686; font-family:Helvetica; font-size: 14pt; margin:10px; text-align: center;">Terima Kasih atas pemesanan anda !</p>
						<p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;">Hai Catur Tahta, pesanan kamu akan dikirim setelah kamu melakukan konfirmasi pembayaran !</p>
						<p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;">Silahkan konfirmasi pembayaran disini</p>
						<p style="font-family:Helvetica; margin:10px; text-align: center;"><a href="#" style="background: #7971ea; border:none; padding: 5px 32px; text-align: center; text-decoration: none; color: #f5f6fa; font-size: 10pt; border-radius: 5px;">Konfirmasi Pembayaran</a></p>
					</td>
				</tr>
				<tr>
					<td><br><br>
						<table width="100%" style="border: 2px solid #3d3d3d; padding: 10px; border-collapse: collapse; background: #f5f6fa;">
							<tr style="border: 2px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">No</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Nama Product</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Ukuran</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Qty</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Sub Total</td>
							</tr>
							<tr style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">1</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Baju Zara 01</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">XL</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">2</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Rp. 120000</td>
							</tr>
							<tr style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">1</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Baju Zara 01</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">XL</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">2</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Rp. 120000</td>
							</tr>
							<tr  style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;" colspan="4">Ongkos Kirim</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Rp.18000</td>
							</tr>
							<tr  style="border: 1px solid #5f5f5f; border-collapse: collapse; background: #f5f6fa;">
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;" colspan="4">Grand Total</td>
								<td style="text-align: center; color: #5f5f5f; font-family: helvetica;">Rp.258000</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td><br><p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;">Pembayaran dapat dilakukan dengan cara transfer bank pada bank berikut ini</p></td>
				</tr>
				<tr>
					<td><p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;">Bank Mandiri : No Rekening 12345678 atas nama Tahta</p></td>
				</tr>
				<tr>
					<td>
						<p style="color: #868686; font-family:Helvetica; font-size: 12pt; margin:10px; text-align: center;">Bank Mandiri : No Rekening 12345678 atas nama Tahta</p>
					</td>
				</tr>
			</table>
            '
        );

        return $this->email->send();
    }

}