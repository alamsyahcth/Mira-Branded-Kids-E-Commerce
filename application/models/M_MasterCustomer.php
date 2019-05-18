<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_MasterCustomer extends CI_Model {
    private $_table = 'customer';

    public $id_customer;
    public $nm_customer;
    public $email_customer;
    public $password_customer;
    public $alamat_customer;
    public $kodepos_customer;
    public $provinsi_customer;
    public $kota_customer;
    public $telp_customer;
    public $status_customer;

   public function rules() {
       return[
           [
               'field'=>'id_customer',
               'label'=>'ID Customer',
               'rules'=>'required'
           ],

           [
               'field'=>'nm_customer',
               'label'=>'Nama Customer',
               'rules'=>'required'
           ],

           [
               'field'=>'email_customer',
               'label'=>'Email Customer',
               'rules'=>'required'
           ],

           [
               'field'=>'alamat_customer',
               'label'=>'Alamat Customer',
               'rules'=>'required'
           ],

           [
               'field'=>'kodepos_customer',
               'label'=>'Kode Pos Customer',
               'rules'=>'required'
           ],

           [
               'field'=>'telp_customer',
               'label'=>'No Handphone Customer',
               'rules'=>'required'
           ],

           [
               'field'=>'status_customer',
               'label'=>'Status Customer',
               'rules'=>'required'
           ],
        ];
    }
   
    public function customerID() {
        $this->db->select('RIGHT(id_customer,1) as MaxKode');
        $this->db->order_by('id_customer','desc');
        $query = $this->db->get($this->_table);

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->MaxKode)+1;
        } else {
            $kode = 1;
        }
        $date = date("ymd");
        $kodeMax = $date.str_pad($kode,3,"0", STR_PAD_LEFT);
        return $kodeMax;
    }

   public function getAll() {
       return $this->db->get($this->_table)->result();
   }

   public function getById($id) {
        return $this->db->get_where($this->_table, ['id_customer'=>$id])->row();
   }

   public function getEmailCustomer($email) {
       $this->db->where('email_customer',$email);
       $query = $this->db->get($this->_table);

       if($query->num_rows() > 0) {
           return true;
       } else {
           return false;
       }
   }

   public function getEmailCustomerById($email,$id) {
       $this->db->where('id_customer !=',$id);
       $this->db->where('email_customer',$email);
       $query = $this->db->get($this->_table);

       if($query->num_rows() > 0) {
           return true;
       } else {
           return false;
       }
   }

   public function cekCustomer($id) {
       $this->db->where('id_customer',$id);
       $query = $this->db->get('orders');
       if($query->num_rows() > 0) {
           return true;
       } else {
           return false;
       }
   }

   public function getPasswordCustomer($password) {
       $this->db->where('password_customer', md5($password));
       $query = $this->db->get($this->_table);

       if($query->num_rows() < 0) {
           return true;
       } else {
           return false;
       }
   }
   
   public function save() {
        $post = $this->input->post();
        $this->id_customer = $post['id_customer'];
        $this->nm_customer = $post['nm_customer'];
        $this->email_customer = $post['email_customer'];
        $this->password_customer = md5($post['password_customer']);
        $this->alamat_customer = $post['alamat_customer'];
        $this->kodepos_customer = $post['kodepos_customer'];
        $this->provinsi_customer = '1';
        $this->kota_customer = '123';
        $this->telp_customer = $post['telp_customer'];
        $this->status_customer = $post['status_customer'];
        $this->db->insert($this->_table, $this);
   }

   public function konfirmasiAkun($id_customer) {
        $data = array(
            'status_customer'=>'1'
        );
        $this->db->where('id_customer', $id_customer);
        $this->db->update($this->_table, $data);

        return true;
   }

   public function update() {
        $post = $this->input->post();
        $this->id_customer = $post['id_customer'];
        $this->nm_customer = $post['nm_customer'];
        $this->email_customer = $post['email_customer'];
        $this->password_customer = md5($post['password_baru']);
        $this->alamat_customer = $post['alamat_customer'];
        $this->kodepos_customer = $post['kodepos_customer'];
        $this->provinsi_customer = $post['provinsi_customer'];
        $this->kota_customer = $post['kota_customer'];
        $this->telp_customer = $post['telp_customer'];
        $this->status_customer = $post['status_customer'];
        $this->db->update($this->_table, $this, array('id_customer'=>$post['id_customer']));
   }

   public function delete($id) {
       return $this->db->delete($this->_table, array('id_customer'=>$id));
   }
}