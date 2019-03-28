<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_MasterKategori extends CI_Model {
    private $_table = 'kategori';

    public $kd_kategori;
    public $nm_kategori;

   public function rules() {
       return[
           [
               'field'=>'kd_kategori',
               'label'=>'Kode Kategori',
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
       $this->db->select('RIGHT(kd_kategori,1) as maxKode');
       $this->db->order_by('kd_kategori','desc');
       $query = $this->db->get($this->_table);

       if ($query->num_rows() <> 0) {
           $data = $query->row();
           $kode = intval($data->maxKode)+1;
       } else {
           $kode = 1;
       }

       $kodeMax = "K".str_pad($kode,1,"0", STR_PAD_LEFT);
       return $kodeMax;
   }

   public function getAll() {
       return $this->db->get($this->_table)->result();
   }

   public function getById($id) {
        return $this->db->get_where($this->_table, ['kd_kategori'=>$id])->row();
   }
   
   public function save() {
       $post = $this->input->post();
       $this->kd_kategori = $post['kd_kategori'];
       $this->nm_kategori = $post['nm_kategori'];
       $this->db->insert($this->_table, $this);
   }

   public function update() {
       $post = $this->input->post();
       $this->kd_kategori = $post['kd_kategori'];
       $this->nm_kategori = $post['nm_kategori'];
       $this->db->update($this->_table, $this, array('kd_kategori'=>$post['kd_kategori']));
   }

   public function delete($id) {
       return $this->db->delete($this->_table, array('kd_kategori'=>$id));
   }
}