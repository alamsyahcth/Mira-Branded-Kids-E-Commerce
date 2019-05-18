<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_MasterProduct extends CI_Model {
    private $_table="product";
    private $_tableKat="kategori";
    private $_tableSize="size";
    private $_tabDetSize="detil_size";
    private $_tabReply="reply";

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
        $this->db->select('RIGHT(id_product,3) as MaxKode');
        $this->db->order_by('id_product','desc');
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

    public function replyID() {
        $this->db->select('RIGHT(id_reply,4) as MaxKode');
        $this->db->order_by('id_reply','desc');
        $query = $this->db->get($this->_tabReply);
        $date = date("ymd");
        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->MaxKode)+1;
        } else {
            $kode = 1;
        }

        $kodeMax = 'B'.$date.str_pad($kode,4,"0", STR_PAD_LEFT);
        return $kodeMax;
    }

    public function getKategori() {
        return $this->db->get($this->_tableKat)->result();
    }

    public function getKategoriWhere($id) {
        return $this->db->get_where($this->_tableKat, ['id_kategori'=>$id])->row();
    }

    public function getSize() {
        return $this->db->get($this->_tableSize)->result();
    }
    
    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->_table, ['id_product'=>$id])->row();
    }

    public function getDetilSize($id) {
        $sql = "SELECT a.id_product, b.id_size, nm_size, stok
                FROM product a, detil_size b, size c
                WHERE a.id_product=b.id_product AND b.id_size=c.id_size
                AND a.id_product='$id'";
        $query = $this->db->query($sql);

        return $query->result();
    }

     public function getSizeBaru($id) {
        $sql = "SELECT id_size, nm_size
                FROM size 
                WHERE id_size != ALL(
							SELECT b.id_size
							FROM product a, size b, detil_size c
							WHERE a.id_product=c.id_product AND b.id_size=c.id_size AND a.id_product='$id')";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function getComment($id) {
        $sql = "SELECT *
                FROM customer a, comment b
                WHERE a.id_customer=b.id_customer AND b.id_product='$id'";
        return $this->db->query($sql)->result();
    }

    public function getReply($id) {
        $sql = "SELECT *
                FROM reply a, comment b, product c
                WHERE a.id_comment=b.id_comment AND b.id_product=c.id_product AND b.id_product='$id'";
        return $this->db->query($sql)->result();
    }

    public function cekProduct($id) {
       $this->db->where('id_product',$id);
       $query = $this->db->get('detil_size');
       if($query->num_rows() > 0) {
           return true;
       } else {
           return false;
       }
   }

   public function getDetilSizeAll() {
        $sql = "SELECT a.id_product, b.id_size, nm_size, stok
                FROM product a, detil_size b, size c
                WHERE a.id_product=b.id_product AND b.id_size=c.id_size";
        $query = $this->db->query($sql);

        return $query->result();
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

        //Data Multiple Insert
        $data = array();
        $i=0;
        foreach ($post['id_size'] as $id) {
            array_push($data, array(
                'id_product'=>$this->id_product,
                'id_size'=>$id,
                'stok'=>$post['stok'][$i]
            ));
            $i++;
        }
        
        //Insert
        $returnInsert = $this->db->insert($this->_table, $this);
        if ($returnInsert) {
            $this->saveBatch($data);
        }
    }

    public function saveBatch($data=array()) {
        return $this->db->insert_batch($this->_tabDetSize,$data);
    }

    public function saveReply($id) {
        $data = array(
            'id_reply'=>$id,
            'tanggal_reply'=>$this->input->post('tanggal_reply'),
            'isi_reply'=>$this->input->post('isi_reply'),
            'id_comment'=>$this->input->post('id_comment'),
            'username'=>$this->input->post('username')
        );

        return $this->db->insert($this->_tabReply,$data);
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
        $returnUpdate = $this->db->update($this->_table, $this, array('id_product'=>$post['id_product']));
    }

    public function updateStok() {
        $post = $this->input->post();
        $i=0;
        foreach ($post['id_product'] as $id) {
            $data = array(
                'stok'=>$post['stok'][$i]
            );
            $this->db->where('id_product',$post['id_product'][$i]);
            $this->db->where('id_size',$post['id_size'][$i]);
            $this->db->update($this->_tabDetSize,$data);
            $i++;
        }
    }

    public function addStok() {
        $post = $this->input->post();
        $i=0;
        foreach ($post['id_product'] as $id) {
            $data = array(
                'id_product'=>$id,
                'id_size'=>$post['id_size'][$i],
                'stok'=>$post['stok'][$i]
            );
            $this->db->insert($this->_tabDetSize,$data);
            $i++;
        }
    }

    public function delete($id) {
        $this->_delImage($id);
        $this->db->delete($this->_tabDetSize, array('id_product'=>$id));
        return $this->db->delete($this->_table, array('id_product'=>$id));
    }

    private function _uploadImage() {
        $date = date("ymdhms");
        $config['upload_path'] = './upload/product/';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = $this->id_product.$date;
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