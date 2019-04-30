<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_LaporanPenjualan extends CI_Model {
    public function getTotalOrder($month,$year) {
        $sql = "SELECT COUNT(id_order) AS data FROM orders WHERE month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }

    public function getSalesMonth($month,$year) {
        $sql = "SELECT a.id_order, c.id_resi, tanggal_order, tanggal_resi, nm_customer, grand_total, status
                FROM orders a, customer b, resi c
                WHERE a.id_customer=b.id_customer AND a.id_order=c.id_order AND month(tanggal_order) = '$month' AND year(tanggal_order)='$year' AND status='5'
                ORDER BY a.id_order ASC";
        return $this->db->query($sql)->result();
    }

    public function getDetSalesMonth($month,$year) {
        $sql = "SELECT d.id_order, a.id_product, nm_product, harga, c.id_size, nm_size, qty, sub_total
                FROM detil_orders a, product b, size c, orders d
                WHERE a.id_product=b.id_product AND a.id_size=c.id_size AND a.id_order=d.id_order AND status='5' AND month(tanggal_order) = '$month' AND year(tanggal_order)='$year'";
        return $this->db->query($sql)->result();
    }

     public function getGTSalesMonth($month,$year) {
        $sql = "SELECT SUM(grand_total) as data_grandtotal
                FROM orders
                WHERE month(tanggal_order) = '$month' AND year(tanggal_order) = '$year' AND status='5'";
        return $this->db->query($sql)->result();
    }
    
}