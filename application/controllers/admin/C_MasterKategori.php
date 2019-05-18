<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MasterKategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_MasterKategori');
        $this->load->library('form_validation');

        //Session User
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index() {
        $data['autonumber'] = $this->M_MasterKategori->autonumber();
        $data['kategori'] = $this->M_MasterKategori->getAll();
        $this->load->view('MasterKategori/V_MasterKategori', $data);
    }

    public function add() {
        $table = $this->M_MasterKategori;
        $validation = $this->form_validation;
        $validation->set_rules($table->rules());

        if ($validation->run()) {
            $table->save();
            $this->session->set_flashdata('tambah_sukses','Data Berhasil Disimpan');
            redirect('admin/C_MasterKategori/index');
        }
    }

    public function edit($id = null) {
        if($id==null) { redirect('admin/C_MasterKategori');}

        $table = $this->M_MasterKategori;
        $validasi = $this->form_validation;
        $validasi->set_rules($table->rules());

        if ($validasi->run()) {
            $table->update();
            $this->session->set_flashdata('edit_sukses','Data Berhasil Diupdate');
            redirect('admin/C_MasterKategori');
        }

        $data['k'] = $table->getById($id);
        $data['kategori'] = $table->getAll();
        $this->load->view('MasterKategori/V_MasterUpdateKategori',$data);
    }

    public function delete($id) {
        if(!isset($id)) {show_404();}

        if ($this->M_MasterKategori->cekKategori($id)) {
            $this->session->set_flashdata('del_fail','Data Gagal Dihapus, karena sudah di gunakan dalam transaksi');
            redirect('admin/C_MasterKategori');
        } else if ($this->M_MasterKategori->delete($id)) {
            $this->session->set_flashdata('del_sukses','Data Berhasil Dihapus');
            redirect('admin/C_MasterKategori');
        }
    }
}
