<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_MasterKategori extends CI_Model {
    private $_table = 'kategori';

    public $id_kategori;
    public $alt_kategori;
    public $nm_kategori;

   public function rules() {
       return[
           [
               'field'=>'id_kategori',
               'label'=>'ID Kategori',
               'rules'=>'required'
           ],

           [
               'field'=>'alt_kategori',
               'label'=>'Key Kategori',
               'rules'=>'required'
           ],

           [
               'field'=>'nm_kategori',
               'label'=>'Nama Kategori',
               'rules'=>'required'
           ]
        ];
    }
   
   public function autonumber() {
       $this->db->select('RIGHT(id_kategori,2) as maxKode');
       $this->db->order_by('id_kategori','desc');
       $query = $this->db->get($this->_table);

       if ($query->num_rows() <> 0) {
           $data = $query->row();
           $kode = intval($data->maxKode)+1;
       } else {
           $kode = 1;
       }

       $kodeMax = "K".str_pad($kode,2,"0", STR_PAD_LEFT);
       return $kodeMax;
   }

   public function getAll() {
       return $this->db->get($this->_table)->result();
   }

   public function getById($id) {
        return $this->db->get_where($this->_table, ['id_kategori'=>$id])->row();
   }

   public function cekKategori($id) {
       $this->db->where('id_kategori',$id);
       $query = $this->db->get('product');
       if($query->num_rows() > 0) {
           return true;
       } else {
           return false;
       }
   }
   
   public function save() {
        $post = $this->input->post();
        $this->id_kategori = $post['id_kategori'];
        $this->alt_kategori = $post['alt_kategori'];
        $this->nm_kategori = $post['nm_kategori'];
        $this->db->insert($this->_table, $this);
   }

   public function update() {
        $post = $this->input->post();
        $this->id_kategori = $post['id_kategori'];
        $this->alt_kategori = $post['alt_kategori'];
        $this->nm_kategori = $post['nm_kategori'];
        $this->db->update($this->_table, $this, array('id_kategori'=>$post['id_kategori']));
   }

   public function delete($id) {
       return $this->db->delete($this->_table, array('id_kategori'=>$id));
   }
}