<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MasterBanner extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_MasterBanner');
        $this->load->library('form_validation');

        //Session User
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index() {
        $data['autonumber'] = $this->M_MasterBanner->autonumber();
        $data['banner'] = $this->M_MasterBanner->getAll();
        $this->load->view('MasterBanner/V_MasterBanner', $data);
    }

    public function add() {
        $table = $this->M_MasterBanner;
        $validation = $this->form_validation;
        $validation->set_rules($table->rules());

        if ($validation->run()) {
            $table->save();
            $this->session->set_flashdata('tambah_sukses','Data Berhasil Disimpan');
            redirect('admin/C_MasterBanner/index');
        }
    }

    public function edit($id = null) {
        if($id==null) { redirect('admin/C_MasterBanner');}

        $table = $this->M_MasterBanner;
        $validasi = $this->form_validation;
        $validasi->set_rules($table->rules());

        if ($validasi->run()) {
            $table->update();
            $this->session->set_flashdata('edit_sukses','Data Berhasil Diupdate');
            redirect('admin/C_MasterBanner');
        }

        $data['k'] = $table->getById($id);
        $data['banner'] = $table->getAll();
        $this->load->view('MasterBanner/V_MasterUpdateBanner',$data);
    }

    public function delete($id) {
        if(!isset($id)) {show_404();}

        if ($this->M_MasterBanner->delete($id)) {
            $this->session->set_flashdata('del_sukses','Data Berhasil Dihapus');
            redirect('admin/C_MasterBanner');
        }
    }
}
