<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MasterSize extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_MasterSize');
        $this->load->library('form_validation');

        //Session User
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index() {
        $data['autonumber'] = $this->M_MasterSize->autonumber();
        $data['size'] = $this->M_MasterSize->getAll();
        $this->load->view('MasterSize/V_MasterSize', $data);
    }

    public function add() {
        $table = $this->M_MasterSize;
        $validation = $this->form_validation;
        $validation->set_rules($table->rules());

        if ($validation->run()) {
            $table->save();
            $this->session->set_flashdata('tambah_sukses','Data Berhasil Disimpan');
            redirect('admin/C_MasterSize/index');
        }
    }

    public function edit($id = null) {
        if($id==null) { redirect('admin/C_MasterSize');}

        $table = $this->M_MasterSize;
        $validasi = $this->form_validation;
        $validasi->set_rules($table->rules());

        if ($validasi->run()) {
            $table->update();
            $this->session->set_flashdata('edit_sukses','Data Berhasil Diupdate');
            redirect('admin/C_MasterSize');
        }

        $data['k'] = $table->getById($id);
        $data['size'] = $this->M_MasterSize->getAll();
        $this->load->view('MasterSize/V_MasterUpdateSize',$data);
    }

    public function delete($id) {
        if(!isset($id)) {show_404();}

        if ($this->M_MasterSize->cekSize($id)) {
             $this->session->set_flashdata('del_fail','Data Gagal Dihapus');
            redirect('admin/C_MasterSize');
        } else if ($this->M_MasterSize->delete($id)) {
            $this->session->set_flashdata('del_sukses','Data Berhasil Dihapus');
            redirect('admin/C_MasterSize');
        }
    }
}
