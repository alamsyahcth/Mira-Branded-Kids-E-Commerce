<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_MasterProduct extends CI_Model {
    private $_table="product";
    private $_tableKat="kategori";

    public $id_product;
    public $alt_product;
    public $nm_product;
    public $harga;
    public $berat;
    public $gambar='NOIG.jpg';
    public $deskripsi;
    public $id_kategori;

    public function rules() {
        return [
            [
                'field'=>'alt_product',
                'label'=>'Nama Alternatif',
                'rules'=>'required'
            ],

            [
                'field'=>'nm_product',
                'label'=>'Nama Product',
                'rules'=>'required'
            ],

            [
                'field'=>'harga',
                'label'=>'harga',
                'rules'=>'required'
            ],

            [
                'field'=>'berat',
                'label'=>'berat',
                'rules'=>'required'
            ],

            [
                'field'=>'deskripsi',
                'label'=>'deskripsi',
                'rules'=>'required'
            ]
        ];
    }

    public function autonumber() {
        $this->db->select('RIGHT(id_barang,3) as MaxKode');
        $this->db->order_by('id_barang','desc');
        $query = $this->db->get($this->_table);

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->MaxKode)+1;
        } else {
            $kode = 1;
        }

        $kodeMax = "P".str_pad($kode,3,"0", STR_PAD_LEFT);
        return $kodeMax;
    }

    public function getKategori() {
        return $this->db->get($this->_tableKat)->result();
    }
    
    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->_table, ['id_barang'=>$id])->row();
    }

    public function save() {
        $post = $this->input->post();
        $this->id_product = $post['id_product'];
        $this->alt_product = $post['alt_product'];
        $this->nm_product = $post['nm_product'];
        $this->harga = $post['harga'];
        $this->berat = $post['berat'];
        $this->gambar = $this->_uploadImage();
        $this->deskripsi = $post['deskripsi'];
        $this->id_kategori = $post['id_kategori'];
        $this->db->insert($this->_table, $this);
    }

    public function update() {
        $post = $this->input->post();
        $this->id_product = $post['id_product'];
        $this->alt_product = $post['alt_product'];
        $this->nm_product = $post['nm_product'];
        $this->harga = $post['harga'];
        $this->berat = $post['berat'];
        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadImage();
        } else {
            $this->gambar = $post['old_pic'];
        }
        $this->deskripsi = $post['deskripsi'];
        $this->id_kategori = $post['id_kategori'];
        $this->db->insert($this->_table, $this);
    }

    public function delete($id) {
        $this->_delImage($id);
        return $this->db->delete($this->_table, array('id_product'=>$id));
    }

    private function _uploadImage() {
        $config['upload_path'] = './upload/product/';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = $this->id_barang.date("ymdhms");
        $config['overwrite'] = true;
        $config['max_size'] = 1024; //1 MB
        $config['height'] = 700;
        $config['width'] = 700;

        $this->load->library('upload',$config);
        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data('file_name');
        }
            return "NOIG.jpg";
    }

    private function _delImage($id) {
        $product = $this->getById($id);

        if ($product->gambar != "NOIG.jpg") {
            $filename = explode(".",$product->gambar)[0];
            return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
        }
    }


}

?>