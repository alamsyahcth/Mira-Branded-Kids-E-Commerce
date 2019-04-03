<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_MasterBanner extends CI_Model {
    private $_table = 'banner';

    public $id_banner;
    public $gambar_banner='NOIG.jpg';
    public $judul_banner;
    public $deskripsi_banner;
    public $status_banner;

    public function rules() {
        return[
            [
                'field'=>'id_banner',
                'label'=>'ID Banner',
                'rules'=>'required'
            ],

            [
                'field'=>'judul_banner',
                'label'=>'Judul Banner',
                'rules'=>'required'
            ],

            [
                'field'=>'deskripsi_banner',
                'label'=>'Deskripsi Banner',
                'rules'=>'required'
            ],

            [
                'field'=>'status_banner',
                'label'=>'Status Banner',
                'rules'=>'required'
            ]
            ];
        }
    
    public function autonumber() {
        $this->db->select('RIGHT(id_banner,1) as maxKode');
        $this->db->order_by('id_banner','desc');
        $query = $this->db->get($this->_table);

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->maxKode)+1;
        } else {
            $kode = 1;
        }

        $kodeMax = "N".str_pad($kode,1,"0", STR_PAD_LEFT);
        return $kodeMax;
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id) {
            return $this->db->get_where($this->_table, ['id_banner'=>$id])->row();
    }
    
    public function save() {
            $post = $this->input->post();
            $this->id_banner = $post['id_banner'];
            $this->gambar_banner = $this->_uploadImage();
            $this->judul_banner = $post['judul_banner'];
            $this->deskripsi_banner = $post['deskripsi_banner'];
            $this->status_banner = $post['status_banner'];
            $this->db->insert($this->_table, $this);
    }

    public function update() {
            $post = $this->input->post();
            $this->id_banner = $post['id_banner'];
            if (!empty($_FILES["gambar_banner"]["name"])) {
                $this->gambar_banner = $this->_uploadImage();
            } else {
                $this->gambar_banner = $post['old_pic'];
            }
            $this->deskripsi_banner = $post['deskripsi_banner'];
            $this->judul_banner = $post['judul_banner'];
            $this->status_banner = $post['status_banner'];
            $this->db->update($this->_table, $this, array('id_banner'=>$post['id_banner']));
    }

    public function delete($id) {
        $this->_delImage($id);
        return $this->db->delete($this->_table, array('id_banner'=>$id));
    }

    private function _uploadImage() {
        $date = date("ymdhms");
        $config['upload_path'] = './upload/banner/';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = $this->id_banner.$date;
        $config['overwrite'] = true;
        $config['max_size'] = 1024;

        $this->load->library('upload',$config);
        if ($this->upload->do_upload('gambar_banner')) {
            return $this->upload->data('file_name');
        }

        return "NOIG.jpg";
    }

    private function _delImage($id) {
        $item = $this->getById($id);

        if ($item->gambar_banner != 'NOIG.jpg') {
            $filename = explode(".",$item->gambar_banner)[0];
            return array_map('unlink',glob(FCPATH."upload/banner/$filename.*"));
        }
    }
}