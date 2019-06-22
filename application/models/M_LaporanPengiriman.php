<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_LaporanPengiriman extends CI_Model {
    public function getTotalOrder($month,$year) {
        $sql = "SELECT COUNT(id_order) AS data FROM orders WHERE month(tanggal_order) = '$month' AND year(tanggal_order) = '$year'";
        return $this->db->query($sql)->result();
    }

    public function getSendMonth($month,$year) {
        $sql = "SELECT a.id_resi, b.id_order, tanggal_resi, nm_customer, kurir, ongkir, alamat_kirim
                FROM resi a, orders b, customer c
                WHERE a.id_order=b.id_order AND b.id_customer=c.id_customer AND month(tanggal_resi) = '$month' AND year(tanggal_resi)='$year'";
        return $this->db->query($sql)->result();
    }
    
}