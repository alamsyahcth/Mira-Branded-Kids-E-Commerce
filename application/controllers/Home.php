<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_FrontProduct');
        $this->load->library('pagination');
    }

    public function index(){

        //Navbar Kategori
        $data['kategori'] = $this->M_FrontProduct->getKategori();
        $data['banner'] = $this->M_FrontProduct->getBanner();

        //Pagination
        $config['base_url'] = site_url('home/index');
        $config['total_rows'] = $this->M_FrontProduct->countData();
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows']/$config['per_page'];
        $config['num_links'] = floor($choice);

        //Styling Pagination
        $config['first_link']       = 'first';
        $config['last_link']        = 'last';
        $config['next_link']        = 'next';
        $config['prev_link']        = 'prev';
        $config['full_tag_open']    = '<div class="pagging text-center><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item" style="text-decoration:none; list-style-type: none;"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active" style="text-decoration:none; list-style-type: none;"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item" style="text-decoration:none; list-style-type: none;"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item" style="text-decoration:none; list-style-type: none;"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item" style="text-decoration:none; list-style-type: none;"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item" style="text-decoration:none; list-style-type: none;"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $data['page'] = $this->pagination->initialize($config) ? $this->uri->segment(3) : 0;
        $data['data'] = $this->M_FrontProduct->getAllForPage($config['per_page'], $data['page']);

        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('front/V_FrontHome', $data);
    }

    public function saran() {
        $saran_id = $this->M_FrontProduct->saranID();
        $date = date("Y-m-d");
        $data = array(
            'id_saran'=>$saran_id,
            'tanggal_saran'=>$date,
            'isi_saran'=>$this->input->post('isi_saran'),
            'id_customer'=>$this->session->userdata('id_customer')
        );
        $this->M_FrontProduct->saveSaran($data);
        redirect('home');
    }

}