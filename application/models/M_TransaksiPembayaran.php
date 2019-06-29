<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_TransaksiPembayaran extends CI_Model {
    private $_tableOrder = 'orders';
    private $_tableDetilOrder = 'detil_orders';
    private $_tableCustomer = 'customers';
    private $_tableProduct = 'product';
    private $_tableConfirm = 'confirm';
    private $_tableSize = 'size';
    private $_tableResi = 'resi';

    public function getOrder() {
        $sql = "SELECT *
                FROM customer a, orders b
                WHERE a.id_customer=b.id_customer AND b.status='3' OR b.status='4'
                GROUP BY b.id_order
                ORDER BY b.id_order DESC";
       return $this->db->query($sql)->result();
    }

    public function getOrderById($id) {
        $sql = "SELECT *
            FROM customer a, orders b, confirm c, bank d
            WHERE a.id_customer=b.id_customer AND b.id_order=c.id_order AND c.id_bank=d.id_bank AND b.id_order='$id'
            GROUP BY b.id_order
            ORDER BY b.id_order";
        return $this->db->query($sql)->result();
    }

    public function getLabel($id) {
        $sql = "SELECT *
            FROM customer a, orders b, confirm c, bank d
            WHERE a.id_customer=b.id_customer AND b.id_order=c.id_order AND c.id_bank=d.id_bank AND b.id_order='$id'
            GROUP BY b.id_order
            ORDER BY b.id_order";
        return $this->db->query($sql)->result();
    }

    public function getDetilOrder($id) {
       $sql = "SELECT *
                FROM orders a, detil_orders b, product c, size d, resi e
                WHERE a.id_order=b.id_order AND b.id_product=c.id_product AND b.id_size=d.id_size AND a.id_order='$id'
                ORDER BY b.id_product";
        return $this->db->query($sql)->result();
    }

    public function getDataResi($id) {
       $sql = "SELECT *
                FROM orders a, resi b
                WHERE a.id_order=b.id_order AND a.id_order='$id'";
        return $this->db->query($sql)->result();
    }

    public function cekResi($id) {
       $sql = "SELECT *
                FROM resi
                WHERE id_order='$id'";
        $query =  $this->db->query($sql);

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function resiID() {
        $this->db->select('RIGHT(id_resi,4) as MaxKode');
        $this->db->order_by('id_resi','desc');
        $query = $this->db->get($this->_tableResi);
        $date = date("ymd");
        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->MaxKode)+1;
        } else {
            $kode = 1;
        }

        $kodeMax = 'S'.$date.str_pad($kode,4,"0", STR_PAD_LEFT);
        return $kodeMax;
    }

    public function save() {
        $data = array(
            'id_resi'=>$this->input->post('id_resi'),
            'no_resi'=>$this->input->post('no_resi'),
            'tanggal_resi'=>$this->input->post('tanggal_resi'),
            'id_order'=>$this->input->post('id_order')
        );
        return $this->db->insert($this->_tableResi,$data);
    }

    public function updateStatus($id) {
        $data = array(
            'status'=>'4'
        );
        $this->db->where('id_order',$id);
        $this->db->update($this->_tableOrder, $data);

        return true;
    }

    public function updateTolakPembayaranOrder($id) {
        $data = array(
            'status'=>'2'
        );
        $this->db->where('id_order',$id);
        $this->db->update($this->_tableOrder, $data);
    }

    public function updateTolakPembayaranConfirm($id) {
        $data = array(
            'status_confirm'=>'2'
        );
        $this->db->where('id_confirm',$id);
        $this->db->update($this->_tableConfirm, $data);
    }

    public function getDataCustomers($ordID) {
        $sql = "SELECT a.id_customer, nm_customer, alamat_customer, email_customer, telp_customer, kurir, ongkir, kode_pos, b.id_order
                FROM customer a, orders b
                WHERE a.id_customer=b.id_customer AND b.id_order='$ordID'";
        $query = $this->db->query($sql);

        return $query->result();
        //return !empty($result)?$result:false;
    }

    public function getDataOrder($ordID) {
        $sql =  "SELECT a.id_product, nm_product, qty, nm_size, sub_total, grand_total
                 FROM product a, detil_orders b, orders c, size d
                 WHERE a.id_product=b.id_product AND b.id_order=c.id_order AND b.id_size=d.id_size AND c.id_order='$ordID'
                 ORDER BY a.id_product asc";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function getGrandTotal($ordID) {
        $sql =  "SELECT grand_total FROM orders WHERE id_order='$ordID'";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function getResi($ordID) {
        $sql =  "SELECT *
                 FROM orders a, resi b
                 WHERE a.id_order=b.id_order AND a.id_order='$ordID'";
        $query = $this->db->query($sql);

        return $query->result();
    }
}