<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_LaporanPemesanan extends CI_Model {
    public function getTotalOrder($month,$year) {
        $sql = "SELECT COUNT(id_order) AS data FROM orders WHERE month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }

    public function getOrderMonth($month,$year) {
        $sql = "SELECT id_order, tanggal_order, nm_customer, status
                FROM orders a, customer b
                WHERE a.id_customer=b.id_customer AND month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'
                ORDER BY id_order ASC";
        return $this->db->query($sql)->result();
    }

    public function getDetOrderMonth($month,$year) {
        $sql = "SELECT a.id_order, a.id_product, nm_product, c.id_size, nm_size, qty
                FROM detil_orders a, product b, size c, orders d
                WHERE a.id_product=b.id_product AND a.id_size=c.id_size AND a.id_order=d.id_order AND month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }

    public function getRowOrderMonth() {
        $sql = "SELECT count(a.id_product) AS roworder
                FROM detil_orders a, product b, size c
                WHERE a.id_product=b.id_product AND a.id_size=c.id_size";
        return $this->db->query($sql)->result();
    }

    public function getPesan($month,$year) {
        $sql = "SELECT count(id_order) as status_order
                FROM orders
                WHERE status = '1' AND month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }

    public function getKonfirmasi($month,$year) {
        $sql = "SELECT count(id_order) as status_order
                FROM orders
                WHERE status = '2' AND month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }

    public function getBayar($month,$year) {
        $sql = "SELECT count(id_order) as status_order
                FROM orders
                WHERE status = '3' AND month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }

    public function getKirim($month,$year) {
        $sql = "SELECT count(id_order) as status_order
                FROM orders
                WHERE status = '4' AND month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }

    public function getSelesai($month,$year) {
        $sql = "SELECT count(id_order) as status_order
                FROM orders
                WHERE status = '5' AND month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }

    public function getBatal($month,$year) {
        $sql = "SELECT count(id_order) as status_order
                FROM orders
                WHERE status = '6' AND month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }


    
}