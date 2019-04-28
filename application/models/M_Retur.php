<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Retur extends CI_Model {
    private $_tableRetur = 'retur';
    private $_tableDetRetur = 'detil_retur';
    private $_tableOrder = 'orders';
    private $_tableBank = 'bank';
    
    public function returID() {
        $this->db->select('RIGHT(id_retur,4) as MaxKode');
        $this->db->order_by('id_retur','desc');
        $query = $this->db->get($this->_tableRetur);
        $date = date("ymd");
        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->MaxKode)+1;
        } else {
            $kode = 1;
        }

        $kodeMax = 'R'.$date.str_pad($kode,4,"0", STR_PAD_LEFT);
        return $kodeMax;
    }

    public function getBank() {
        return $this->db->get($this->_tableBank)->result();
    }

    public function getOrder($id) {
        $sql ="SELECT a.id_order, id_resi, tanggal_order, tanggal_resi, DATE_ADD(tanggal_resi, INTERVAL 3 DAY), CURDATE()
                FROM detil_orders a, orders b, resi c, customer d
                WHERE a.id_order=b.id_order AND b.id_order=c.id_order AND b.id_customer=d.id_customer AND b.id_customer='$id' AND CURDATE() < DATE_ADD(tanggal_resi, INTERVAL 4 DAY)
                GROUP BY a.id_order";
        return $this->db->query($sql)->result();
    }

    public function cekRetur($id) {
        $sql ="SELECT *
                FROM retur a, detil_retur b, orders c
                WHERE a.id_retur=b.id_retur AND b.id_order=c.id_order AND c.id_customer='$id'";
        return $this->db->query($sql)->result();
    }
    
    public function getReturOrder($id) {
        $sql ="SELECT d.id_order, a.id_product, gambar, nm_product, b.id_size, nm_size, qty
                FROM product a, size b, detil_orders c, orders d, resi e
                WHERE a.id_product=c.id_product AND b.id_size=c.id_size AND d.id_order=c.id_order AND d.id_order=e.id_order AND e.id_resi='$id'
                ORDER BY a.id_product";
        return $this->db->query($sql)->result();
    }

    public function cekDataOrder($id_order,$id_customer) {
        $this->db->where('id_order',$id_order);
        $this->db->where('id_customer',$id_customer);
        $query = $this->db->get($this->_tableOrder);
        if ($query->num_rows() < 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cekDataOrderTersedia($id_order,$id_customer) {
        $this->db->where('id_order',$id_order);
        $this->db->where('id_customer',$id_customer);
        $query = $this->db->get($this->_tableOrder);
        if ($query->num_rows() < 1) {
            return true;
        }
    }

    public function orderUpdate($id_order) {
        $data = array(
            'status'=>'3'
        );
        $this->db->where('id_order', $id_order);
        return $this->db->update($this->_tableOrder,$data);
    }
    
    public function save($data) {
        $this->db->insert($this->_tableRetur, $data);
    }

    public function saveBatch($data) {
        $this->db->insert($this->_tableDetRetur, $data);
    }

    public function delete($id) {
        $this->_delImage($id);
        return $this->db->delete($this->_table, array('id_bank'=>$id));
    }

}