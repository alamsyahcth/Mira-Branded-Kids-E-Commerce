<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_TransaksiPemesanan extends CI_Model {
    private $_tableOrder = 'orders';
    private $_tableDetilOrder = 'detil_orders';
    private $_tableCustomer = 'customers';
    private $_tableProduct = 'product';
    private $_tableSize = 'size';

   public function getOrder($id=null) {
       if(!empty($id)) {
           $sql = "SELECT *
                FROM customer a, orders b
                WHERE a.id_customer=b.id_customer AND b.id_order='$id' AND b.status='1' OR b.status='2'
                ORDER BY b.id_order";
       } else {
            $sql = "SELECT *
                    FROM customer a, orders b
                    WHERE a.id_customer=b.id_customer AND b.status='1' OR b.status='2'
                    ORDER BY b.id_order DESC";
       }
       return $this->db->query($sql)->result();
   }

   public function getDetilOrder($id) {
       $sql = "SELECT *
                FROM orders a, detil_orders b, product c, size d
                WHERE a.id_order=b.id_order AND b.id_product=c.id_product AND b.id_size=d.id_size AND a.id_order='$id'
                ORDER BY b.id_product";
        return $this->db->query($sql)->result();
   }

   public function getById($id) {
        return $this->db->get_where($this->_table, ['id_kategori'=>$id])->row();
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