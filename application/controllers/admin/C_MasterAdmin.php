<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MasterAdmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_MasterAdmin');
        $this->load->library('form_validation');

        //Session User
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index() {
        $data['admin'] = $this->M_MasterAdmin->getAll();
        $this->load->view('MasterAdmin/V_MasterAdmin', $data);
    }

    public function cekUsername() {
        if ($this->M_MasterAdmin->cekUsername($_POST['username'])) {
            echo '<p class="text-danger">Maaf Username sudah ada</p>';
        } else {
            echo '<p class="text-success">Username tersedia</p>';
        }
    }

    public function add() {
        $table = $this->M_MasterAdmin;
        $validation = $this->form_validation;
        $validation->set_rules($table->rules());

        if ($validation->run()) {
            if($table->cekUsername($this->input->post('username'))) {
                $this->session->set_flashdata('tambah_fail','Maaf Username sudah ada');
                redirect('admin/C_MasterAdmin/index');
            } else {
                $table->save();
                $this->session->set_flashdata('tambah_sukses','Data Berhasil Disimpan');
                redirect('admin/C_MasterAdmin/index');
            }

        }
    }

    public function edit() {
        $table = $this->M_MasterAdmin;
        $validasi = $this->form_validation;
        $validasi->set_rules($table->rules());

        if ($validasi->run()) {
            $table->update();
            $this->session->set_flashdata('tambah_sukses','Data Berhasil Diupdate');
            redirect('admin/C_MasterAdmin/edit');
        }

        $data['k'] = $table->getById($this->session->userdata('username'));
        $this->load->view('MasterAdmin/V_MasterUpdateAdmin',$data);
    }

    public function delete($id) {
        if(!isset($id)) {show_404();}

        if ($this->M_MasterAdmin->cekAdmin($id)) {
            $this->session->set_flashdata('del_fail','Data Gagal Dihapus, karena sudah digunakan dalam reply komentar');
            redirect('admin/C_MasterAdmin');
        } else if ($this->M_MasterAdmin->delete($id)) {
            $this->session->set_flashdata('del_sukses','Data Berhasil Dihapus');
            redirect('admin/C_MasterAdmin');
        }
    }
}
