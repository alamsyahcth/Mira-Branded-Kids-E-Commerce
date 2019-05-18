<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_MasterAdmin extends CI_Model {
    private $_table = 'admin';

    public $username;
    public $password;
    public $level;

   public function rules() {
       return[
           [
               'field'=>'username',
               'label'=>'Username',
               'rules'=>'required'
           ]
        ];
    }

   public function getAll() {
       return $this->db->get($this->_table)->result();
   }

   public function getById($id) {
        return $this->db->get_where($this->_table, ['username'=>$id])->row();
   }

    public function cekUsername($username) {
       $this->db->where('username',$username);
       $query = $this->db->get($this->_table);

       if($query->num_rows() > 0) {
           return true;
       } else {
           return false;
       }
   }

   public function cekAdmin($id) {
       $this->db->where('username',$id);
       $query = $this->db->get('reply');
       if($query->num_rows() > 0) {
           return true;
       } else {
           return false;
       }
    }
   
   public function save() {
        $post = $this->input->post();
        $this->username = $post['username'];
        $this->password = md5('admin1234');
        $this->level = '1';
        $this->db->insert($this->_table, $this);
   }

   public function update() {
        $post = $this->input->post();
        $this->username = $post['username'];
        $this->password = md5($post['password']);
        $this->level = '1';
        $this->db->update($this->_table, $this, array('username'=>$post['username']));
   }

   public function delete($id) {
       return $this->db->delete($this->_table, array('username'=>$id));
   }
}