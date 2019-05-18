<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MasterProduct extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_MasterProduct');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $data['autonumber'] = $this->M_MasterProduct->autonumber();
        $data['product'] = $this->M_MasterProduct->getAll();
        $this->load->view('MasterProduct/V_MasterProduct', $data);
    }

    public function add(){
        $table = $this->M_MasterProduct;
        $validation = $this->form_validation;
        $validation->set_rules($table->rules());
        $data['autonumber'] = $table->autonumber();
        $data['kategori'] = $table->getKategori();
        $data['size'] = $table->getSize();

        if ($validation->run()) {
            $table->save();
            $this->session->set_flashdata('tambah_sukses', 'Data Berhasil Disimpan');
            redirect('admin/C_MasterProduct/index');
        }
        
        $this->load->view('MasterProduct/V_MasterTambahProduct', $data);
    }

    public function edit($id=null) {
        if(!isset($id)) {redirect('admin/C_MasterProduct/index');}

        $table = $this->M_MasterProduct;
        $validation = $this->form_validation;
        $validation->set_rules($table->rules());

        if ($validation->run()) {
            $table->update();
            $this->session->set_flashdata('edit_sukses', 'Data Berhasil Diupdate');
            redirect('admin/C_MasterProduct/index');
        }

        $data['product'] = $table->getById($id);
        $data['kategori'] = $table->getKategori();
        $data['size'] = $table->getDetilSize($id);
        //if (!data['barang']) show_404();

        $this->load->view('MasterProduct/V_MasterUpdateProduct', $data);
    }

    public function delete($id_product) {

        if ($this->M_MasterProduct->cekProduct($id_product)) {
            $this->session->set_flashdata('del_fail', 'Data Gagal Dihapus Karena stok sudah dientry');
            redirect('admin/C_MasterProduct/index');
        } else if($this->M_MasterProduct->delete($id_product)) {
            $this->session->set_flashdata('del_sukses', 'Data Berhasil Dihapus');
            redirect('admin/C_MasterProduct/index');
        }
    }

    public function view($id) {
        if(!isset($id)) {show_404();}

        $table = $this->M_MasterProduct;
        $data['product'] = $table->getById($id);
        $data['kategori'] = $table->getKategoriWhere($data['product']->id_kategori);
        $data['size'] = $table->getDetilSize($id);
        $data['comment'] = $table->getComment($id);
        $data['reply'] = $table->getReply($id);

        $this->load->view('MasterProduct/V_ViewProduct', $data);
    }

    public function stok($id) {
        $data['id'] = $id;
        $data['detil_size'] = $this->M_MasterProduct->getDetilSize($id);
        $data['sizeBaru'] = $this->M_MasterProduct->getSizeBaru($id);
        $this->load->view('MasterProduct/V_MasterStokProduct', $data);
    }

    public function editStok() {
        $this->M_MasterProduct->updateStok();
        $this->session->set_flashdata('edit_sukses','Stok Berhasil di Update');
        redirect('admin/C_MasterProduct');
    }

    public function tambahStok() {
        $this->M_MasterProduct->addStok();
        $this->session->set_flashdata('tambah_sukses','Stok Berhasil di Update');
        redirect('admin/C_MasterProduct');
    }
    
    public function pdf() {
        ob_start();
        $data['product'] = $this->M_MasterProduct->getAll();
        $data['getStok'] = $this->M_MasterProduct->getDetilSizeAll();
        $this->load->view('MasterProduct/V_MasterCetakProduct', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('L','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('DataProduct'.microtime().'.pdf','D');
    }

    public function reply() {
        $reply_id = $this->M_MasterProduct->replyID();
        $this->M_MasterProduct->saveReply($reply_id);
        redirect('admin/C_MasterProduct/view/'.$_POST['id_product']);
    }
    
}
