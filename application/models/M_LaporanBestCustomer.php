<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_LaporanBestCustomer extends CI_Model {
    public function getTotalOrder($month,$year) {
        $sql = "SELECT COUNT(id_order) AS data FROM orders WHERE month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }

    public function getBestCustomerOrderMonth($month,$year) {
        $sql = "SELECT a.id_customer, nm_customer, b.id_order, COUNT(b.id_order) AS data_order, SUM(sub_total) AS data_subtotal
                FROM customer a, orders b, detil_orders c
                WHERE a.id_customer=b.id_customer AND b.id_order=c.id_order AND status = '5' AND month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'
                GROUP BY a.id_customer
                ORDER BY data_order DESC";
        return $this->db->query($sql)->result();
    }

     public function getGTSalesMonth($month,$year) {
        $sql = "SELECT SUM(grand_total) as data_grandtotal
                FROM orders
                WHERE month(tanggal_order) = '$month' AND year(tanggal_order) = '$year' AND status='5'";
        return $this->db->query($sql)->result();
    }
    
}