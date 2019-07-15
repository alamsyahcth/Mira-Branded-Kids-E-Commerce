<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_TransaksiStatusPemesanan extends CI_Model {
    private $_tableOrder = 'orders';
    private $_tableDetilOrder = 'detil_orders';
    private $_tableCustomer = 'customers';
    private $_tableProduct = 'product';
    private $_tableSize = 'size';

   public function getOrder() {
        $sql = "SELECT *
                FROM customer a, orders b
                WHERE a.id_customer=b.id_customer
                ORDER BY b.id_order DESC";
       return $this->db->query($sql)->result();
   }

   public function getOrderById($id) {
        $sql = "SELECT *
            FROM customer a, orders b
            WHERE a.id_customer=b.id_customer AND b.id_order='$id'
            GROUP BY b.id_order
            ORDER BY b.id_order";
        return $this->db->query($sql)->result();
   }

   public function getDetilOrder($id) {
       $sql = "SELECT *
                FROM orders a, detil_orders b, product c, size d
                WHERE a.id_order=b.id_order AND b.id_product=c.id_product AND b.id_size=d.id_size AND a.id_order='$id'
                ORDER BY b.id_product";
        return $this->db->query($sql)->result();
   }

   public function batalOrder($id) {
        $data = array(
            'status'=>'6'
        );
        $this->db->where('id_order',$id);
        $this->db->update($this->_tableOrder, $data);

        return true;
   }

   public function dataOrder($id) {
       $this->db->where('id_order',$id);
       $data = $this->db->get('detil_orders');
       return $data->result_array();
   }

   public function ubahStok($id_product,$id_size,$qty) {
       $sql = "UPDATE detil_size SET stok=stok+'$qty' WHERE id_product='$id_product' AND id_size='$id_size'";
       $data = $this->db->query($sql);
       return true;
   }
}