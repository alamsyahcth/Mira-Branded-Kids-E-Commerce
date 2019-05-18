<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MasterCustomer extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_MasterCustomer');
        $this->load->library('form_validation');
        $this->load->library('pdf');

        //Cek Login
        if ($this->session->userdata('masuk') != TRUE) {
            redirect('admin/login/logout');
        }
    }

    public function index(){
        $data['customer'] = $this->M_MasterCustomer->getAll();
        $this->load->view('MasterCustomer/V_MasterCustomer', $data);
    }

    public function delete($id) {
        if ($this->M_MasterCustomer->cekCustomer($id)) {
            $this->session->set_flashdata('del_fail', 'Data Gagal Dihapus');
            redirect('admin/C_MasterCustomer/index');
        } else if($this->M_MasterCustomer->delete($id)) {
            $this->session->set_flashdata('del_sukses', 'Data Berhasil Dihapus');
            redirect('admin/C_MasterCustomer/index');
        }
    }

    public function view($id) {
        if(!isset($id)) {show_404();}

        $table = $this->M_MasterCustomer;
        $data['customer'] = $table->getById($id);

        $this->load->view('MasterCustomer/V_ViewCustomer', $data);
    }
    
    public function pdf() {
        ob_start();
        $data['customer'] = $this->M_MasterCustomer->getAll();
        $this->load->view('MasterCustomer/V_MasterCetakCustomer', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./Assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('L','A4','en');
        $pdf->WriteHTML($html);
        $pdf->output('DataCustomer'.microtime().'.pdf','D');
    }
    
}
