<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MasterBarang extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_MasterBarang');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $data['autonumber'] = $this->M_MasterBarang->autonumber();
        $data['barang'] = $this->M_MasterBarang->getAll();
        $this->load->view('MasterBarang/V_MasterBarang', $data);
    }

    public function add(){
        $table = $this->M_MasterBarang;
        $validation = $this->form_validation;
        $validation->set_rules($table->rules());
        $data['autonumber'] = $table->autonumber();

        if ($validation->run()) {
            $table->save();
            $this->session->set_flashdata('tambah_sukses', 'Data Berhasil Disimpan');
            redirect('admin/C_MasterBarang/index');
        }

        $this->load->view('MasterBarang/V_MasterTambahBarang', $data);
    }

    public function edit($id=null) {
        if(!isset($id)) {redirect(admin/C_MasterBarang/index);}

        $table = $this->M_MasterBarang;
        $validation = $this->form_validation;
        $validation->set_rules($table->rules());

        if ($validation->run()) {
            $table->update();
            $this->session->set_flashdata('edit_sukses', 'Data Berhasil Diupdate');
            redirect('admin/C_MasterBarang/index');
        }

        $data['barang'] = $table->getById($id);
        //if (!data['barang']) show_404();

        $this->load->view('MasterBarang/V_MasterUpdateBarang', $data);
    }

    public function delete($id=null) {
        if(!isset($id)) {show_404();}

        if($this->M_MasterBarang->delete($id)) {
            $this->session->set_flashdata('del_sukses', 'Data Berhasil Dihapus');
            redirect('admin/C_MasterBarang/index');
        }
    }
    
    public function pdf() {
        ob_start();
        $data['barang'] = $this->M_MasterBarang->getAll();
        $this->load->view('MasterBarang/V_MasterCetakBarang', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('L','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('DataBarang'.microtime().'.pdf','D');
    }
    
}
