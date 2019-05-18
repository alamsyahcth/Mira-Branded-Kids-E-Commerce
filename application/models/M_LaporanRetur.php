<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_LaporanRetur extends CI_Model {
    public function getTotalOrder($month,$year) {
        $sql = "SELECT COUNT(id_order) AS data FROM orders WHERE month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }

    public function getReturMonth($month,$year) {
        $sql = "SELECT a.id_retur, tgl_retur, nm_customer, grandtotal_retur, status_retur
                FROM retur a, detil_retur b, detil_orders c, orders d, customer e
                WHERE a.id_retur=b.id_retur AND b.id_order=c.id_order AND c.id_order=d.id_order AND d.id_customer=e.id_customer AND month(tgl_retur) = '$month' AND year(tgl_retur)='$year'
                GROUP BY a.id_retur
                ORDER BY a.id_retur ASC";
        return $this->db->query($sql)->result();
    }

    public function getDetReturMonth($month,$year) {
        $sql = "SELECT a.id_retur, d.id_product, nm_product, harga, f.id_size, nm_size, qty_retur, alasan, subtotal_retur
        FROM retur a, detil_retur b, detil_orders c, product d, size f
        WHERE a.id_retur=b.id_retur AND b.id_order=c.id_order AND b.id_product=c.id_product AND b.id_size=c.id_size AND c.id_product=d.id_product AND c.id_size=f.id_size  AND month(tgl_retur) = '$month' AND year(tgl_retur)='$year'";
        return $this->db->query($sql)->result();
    }

     public function getGTReturMonth($month,$year) {
        $sql = "SELECT SUM(grandtotal_retur) as data_grandtotal
                FROM retur
                WHERE month(tgl_retur) = '5' AND year(tgl_retur) = '2019'";
        return $this->db->query($sql)->result();
    }
    
}