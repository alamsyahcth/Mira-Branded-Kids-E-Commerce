<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_LaporanBestSeller extends CI_Model {
    public function getTotalOrder($month,$year) {
        $sql = "SELECT COUNT(id_order) AS data FROM orders WHERE month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }

    public function getBestSellerOrderMonth($month,$year) {
        $sql = "SELECT b.id_product, nm_product, harga, COUNT(b.id_product) AS product_all, SUM(qty) AS data_qty, SUM(sub_total) AS data_subtotal
                FROM product a, detil_orders b, orders c
                WHERE a.id_product=b.id_product AND b.id_order=c.id_order AND month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'
                GROUP BY b.id_product
                ORDER BY data_qty DESC";
        return $this->db->query($sql)->result();
    }

    public function getBestSellerMonth($month,$year) {
        $sql = "SELECT b.id_product, nm_product, harga, COUNT(b.id_product) AS product_all, SUM(qty) AS data_qty, SUM(sub_total) AS data_subtotal
                FROM product a, detil_orders b, orders c
                WHERE a.id_product=b.id_product AND b.id_order=c.id_order AND status='5' AND month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'
                GROUP BY b.id_product
                ORDER BY data_qty DESC";
        return $this->db->query($sql)->result();
    }

     public function getGTSalesMonth($month,$year) {
        $sql = "SELECT SUM(grand_total) as data_grandtotal
                FROM orders
                WHERE month(tanggal_order) = '$month' AND year(tanggal_order) = '$year' AND status='5'";
        return $this->db->query($sql)->result();
    }
    
}