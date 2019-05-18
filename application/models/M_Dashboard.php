<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {
   public function getTotalCustomer() {
       $sql = "SELECT COUNT(id_customer) AS data FROM customer";
       return $this->db->query($sql)->result();
   }

   public function getPesananTerbaru() {
       $sql = "SELECT COUNT(id_order) AS data FROM orders WHERE status='1'";
       return $this->db->query($sql)->result();
   }

   public function getTotalTransaksi() {
       $sql = "SELECT COUNT(id_order) AS data FROM orders";
       return $this->db->query($sql)->result();
   }

   public function getTransaksiSelesai() {
       $sql = "SELECT COUNT(id_order) AS data FROM orders WHERE status='5'";
       return $this->db->query($sql)->result();
   }

   public function getTransaksiBatal() {
       $sql = "SELECT COUNT(id_order) AS data FROM orders WHERE status='6'";
       return $this->db->query($sql)->result();
   }

   public function getJumlahRetur() {
       $sql = "SELECT COUNT(id_retur) AS data FROM retur";
       return $this->db->query($sql)->result();
   }

   public function getSaran() {
        $sql = "SELECT *
                FROM customer a, saran b
                WHERE a.id_customer=b.id_customer
                GROUP BY b.id_saran DESC";
        return $this->db->query($sql)->result();
    }
}