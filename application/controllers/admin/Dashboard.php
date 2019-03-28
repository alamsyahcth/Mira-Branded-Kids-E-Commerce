<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        //$this->load->model('M_MasterBarang');
        $this->load->library('form_validation');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
	}
	
	public function index() {
		$this->load->view('dashboard');
	}
}
