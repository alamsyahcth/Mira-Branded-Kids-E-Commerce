<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_MasterBarang extends CI_Model {
    private $_table="barang";

    public $id_barang;
    public $nm_barang;
    public $harga;
    public $stok;
    public $gambar='NOIG.jpg';
    public $deskripsi;

    public function rules() {
        return [
            [
                'field'=>'nm_barang',
                'label'=>'nama barang',
                'rules'=>'required'
            ],

            [
                'field'=>'harga',
                'label'=>'harga',
                'rules'=>'required'
            ],

            [
                'field'=>'stok',
                'label'=>'stok',
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

        $kodeMax = "B".str_pad($kode,3,"0", STR_PAD_LEFT);
        return $kodeMax;
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->_table, ['id_barang'=>$id])->row();
    }

    public function save() {
        $post = $this->input->post();
        $this->id_barang = $post['id_barang'];
        $this->nm_barang = $post['nm_barang'];
        $this->harga = $post['harga'];
        $this->stok = $post['stok'];
        $this->gambar = $this->_uploadImage();
        $this->deskripsi = $post['deskripsi'];
        $this->db->insert($this->_table, $this);
    }

    public function update() {
        $post = $this->input->post();
        $this->id_barang = $post['id_barang'];
        $this->nm_barang = $post['nm_barang'];
        $this->harga = $post['harga'];
        $this->stok = $post['stok'];
        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadImage();
        } else {
            $this->gambar = $post['old_pic'];
        }
        $this->deskripsi = $post['deskripsi'];
        $this->db->update($this->_table, $this, array('id_barang'=>$post['id_barang']));
    }

    public function delete($id) {
        $this->_delImage($id);
        return $this->db->delete($this->_table, array('id_barang'=>$id));
    }

    private function _uploadImage() {
        $config['upload_path'] = './upload/barang/';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = $this->id_barang;
        $config['overwrite'] = true;
        $config['max_size'] = 1024; //1 MB
        //$config['height'] = 1024;
        //$config['width'] = 728;

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