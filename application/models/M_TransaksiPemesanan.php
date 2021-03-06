<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_TransaksiPemesanan extends CI_Model {
    private $_tableOrder = 'orders';
    private $_tableDetilOrder = 'detil_orders';
    private $_tableCustomer = 'customers';
    private $_tableProduct = 'product';
    private $_tableSize = 'size';

   public function getOrder() {
        $sql = "SELECT *
                FROM customer a, orders b
                WHERE a.id_customer=b.id_customer AND b.status='1' OR b.status='2'
                GROUP BY b.id_order
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

   public function updateStatus($id) {
        $data = array(
            'status'=>'2'
        );
        $this->db->where('id_order',$id);
        $this->db->update($this->_tableOrder, $data);

        return true;
   }
}