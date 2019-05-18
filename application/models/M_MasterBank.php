<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_MasterBank extends CI_Model {
    private $_table = 'bank';

    public $id_bank;
    public $nm_bank;
    public $no_rektoko;
    public $atas_nama;
    public $logo_bank='NOIG.jpg';

    public function rules() {
        return[
            [
                'field'=>'id_bank',
                'label'=>'ID Bank',
                'rules'=>'required'
            ],

            [
                'field'=>'nm_bank',
                'label'=>'Nama Bank',
                'rules'=>'required'
            ],

            [
                'field'=>'no_rektoko',
                'label'=>'Nama Bank',
                'rules'=>'required'
            ],

            [
                'field'=>'atas_nama',
                'label'=>'Atas Nama',
                'rules'=>'required'
            ]
            ];
        }
    
    public function autonumber() {
        $this->db->select('RIGHT(id_bank,2) as maxKode');
        $this->db->order_by('id_bank','desc');
        $query = $this->db->get($this->_table);

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->maxKode)+1;
        } else {
            $kode = 1;
        }

        $kodeMax = "B".str_pad($kode,2,"0", STR_PAD_LEFT);
        return $kodeMax;
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id) {
            return $this->db->get_where($this->_table, ['id_bank'=>$id])->row();
    }

    public function cekBank($id) {
       $this->db->where('id_bank',$id);
       $query = $this->db->get('confirm');
       if($query->num_rows() > 0) {
           return true;
       } else {
           return false;
       }
    }
    
    public function save() {
            $post = $this->input->post();
            $this->id_bank = $post['id_bank'];
            $this->nm_bank = $post['nm_bank'];
            $this->no_rektoko = $post['no_rektoko'];
            $this->atas_nama = $post['atas_nama'];
            $this->logo_bank = $this->_uploadImage();
            $this->db->insert($this->_table, $this);
    }

    public function update() {
            $post = $this->input->post();
            $this->id_bank = $post['id_bank'];
            $this->nm_bank = $post['nm_bank'];
            $this->no_rektoko = $post['no_rektoko'];
            $this->atas_nama = $post['atas_nama'];
            if (!empty($_FILES["logo_bank"]["name"])) {
                $this->logo_bank = $this->_uploadImage();
            } else {
                $this->logo_bank = $post['old_pic'];
            }
            $this->db->update($this->_table, $this, array('id_bank'=>$post['id_bank']));
    }

    public function delete($id) {
        $this->_delImage($id);
        return $this->db->delete($this->_table, array('id_bank'=>$id));
    }

    private function _uploadImage() {
        $date = date("ymdhms");
        $config['upload_path'] = './upload/bank/';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = $this->id_bank.$date;
        $config['overwrite'] = true;
        $config['max_size'] = 1024;

        $this->load->library('upload',$config);
        if ($this->upload->do_upload('logo_bank')) {
            return $this->upload->data('file_name');
        }

        return "NOIG.jpg";
    }

    private function _delImage($id) {
        $item = $this->getById($id);

        if ($item->logo_bank != 'NOIG.jpg') {
            $filename = explode(".",$item->logo_bank)[0];
            return array_map('unlink',glob(FCPATH."upload/bank/$filename.*"));
        }
    }
}