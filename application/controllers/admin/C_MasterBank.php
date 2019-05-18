<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MasterBank extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_MasterBank');
        $this->load->library('form_validation');

        //Session User
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index() {
        $data['autonumber'] = $this->M_MasterBank->autonumber();
        $data['bank'] = $this->M_MasterBank->getAll();
        $this->load->view('MasterBank/V_MasterBank', $data);
    }

    public function add() {
        $table = $this->M_MasterBank;
        $validation = $this->form_validation;
        $validation->set_rules($table->rules());

        if ($validation->run()) {
            $table->save();
            $this->session->set_flashdata('tambah_sukses','Data Berhasil Disimpan');
            redirect('admin/C_MasterBank/index');
        }
    }

    public function edit($id = null) {
        if($id==null) { redirect('admin/C_MasterBank');}

        $table = $this->M_MasterBank;
        $validasi = $this->form_validation;
        $validasi->set_rules($table->rules());

        if ($validasi->run()) {
            $table->update();
            $this->session->set_flashdata('edit_sukses','Data Berhasil Diupdate');
            redirect('admin/C_MasterBank');
        }

        $data['k'] = $table->getById($id);
        $data['bank'] = $table->getAll();
        $this->load->view('MasterBank/V_MasterUpdateBank',$data);
    }

    public function delete($id) {
        if(!isset($id)) {show_404();}

        if ($this->M_MasterBank->cekBank($id)) {
            $this->session->set_flashdata('del_fail','Data Gagal Dihapus, karena sudah digunakan dalam transaksi');
            redirect('admin/C_MasterBank');
        } else if ($this->M_MasterBank->delete($id)) {
            $this->session->set_flashdata('del_sukses','Data Berhasil Dihapus');
            redirect('admin/C_MasterBank');
        }
    }
}
