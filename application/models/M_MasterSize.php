<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_MasterSize extends CI_Model {
    private $_table = 'size';

    public $id_size;
    public $nm_size;

   public function rules() {
       return[
           [
               'field'=>'id_size',
               'label'=>'ID Size',
               'rules'=>'required'
           ],

           [
               'field'=>'nm_size',
               'label'=>'Nama Size',
               'rules'=>'required'
           ]
        ];
    }
   
   public function autonumber() {
       $this->db->select('RIGHT(id_size,1) as maxKode');
       $this->db->order_by('id_size','desc');
       $query = $this->db->get($this->_table);

       if ($query->num_rows() <> 0) {
           $data = $query->row();
           $kode = intval($data->maxKode)+1;
       } else {
           $kode = 1;
       }

       $kodeMax = "S".str_pad($kode,1,"0", STR_PAD_LEFT);
       return $kodeMax;
   }

   public function getAll() {
       return $this->db->get($this->_table)->result();
   }

   public function getById($id) {
        return $this->db->get_where($this->_table, ['id_size'=>$id])->row();
   }

   public function cekSize($id) {
       $this->db->where('id_size',$id);
       $query = $this->db->get('detil_size');
       if($query->num_rows() > 0) {
           return true;
       } else {
           return false;
       }
   }
   
   public function save() {
        $post = $this->input->post();
        $this->id_size = $post['id_size'];
        $this->nm_size = $post['nm_size'];
        $this->db->insert($this->_table, $this);
   }

   public function update() {
        $post = $this->input->post();
        $this->id_size = $post['id_size'];
        $this->nm_size = $post['nm_size'];
        $this->db->update($this->_table, $this, array('id_size'=>$post['id_size']));
   }

   public function delete($id) {
       return $this->db->delete($this->_table, array('id_size'=>$id));
   }
}