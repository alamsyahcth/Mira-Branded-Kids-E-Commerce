<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Retur extends CI_Model {
    private $_tableRetur = 'retur';
    private $_tableDetRetur = 'detil_retur';
    private $_tableOrder = 'orders';
    private $_tableDetOrder = 'detil_orders';
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
                WHERE a.id_order=b.id_order AND b.id_order=c.id_order AND b.id_customer=d.id_customer AND status='5' AND b.id_customer='$id' AND CURDATE() < DATE_ADD(tanggal_resi, INTERVAL 4 DAY)
                GROUP BY a.id_order";
        return $this->db->query($sql)->result();
    }

    public function getFaktur($id) {
        $sql ="SELECT a.id_retur, e.id_resi, nm_customer, telp_customer, email_customer, no_rekening, grandtotal_retur, alamat_kirim, kode_pos,kurir, tanggal_resi, bukti_refund
                FROM retur a, detil_retur b, detil_orders c, orders d, resi e, customer f, confirm g
                WHERE a.id_retur=b.id_retur AND b.id_order=c.id_order AND c.id_order=d.id_order AND d.id_order=e.id_order AND d.id_customer=f.id_customer AND d.id_order=g.id_order AND a.id_retur='$id'
                GROUP BY a.id_retur";
        return $this->db->query($sql)->result();
    }

    public function getDetilOrder() {
        $sql = "SELECT * FROM detil_orders";
        return $this->db->query($sql)->result();
    }

    public function cekRetur($id) {
        $sql ="SELECT *
                FROM retur a, detil_retur b, orders c
                WHERE a.id_retur=b.id_retur AND b.id_order=c.id_order AND c.id_customer='$id'
                GROUP BY a.id_retur";
        return $this->db->query($sql)->result();
    }

    public function cekOrder() {
        $sql ="SELECT a.id_order
                FROM detil_orders a, detil_retur b
                WHERE a.id_order=b.id_order
                GROUP BY a.id_order";
        return $this->db->query($sql)->result();
    }
    
    public function getReturOrder($id) {
        $sql ="SELECT a.id_retur, b.id_order, c.id_product, nm_product, gambar, harga, e.id_size, nm_size, qty_retur, subtotal_retur, alasan 
                FROM retur a, detil_retur b, detil_orders c, product d, size e
                WHERE a.id_retur=b.id_retur AND b.id_order=c.id_order AND b.id_product=c.id_product AND b.id_size=c.id_size AND c.id_product=d.id_product AND c.id_size=e.id_size AND a.id_retur='$id'";
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

     public function cekDataReturSimpan($id_order) {
        $sql = "SELECT *
                FROM detil_retur a, detil_orders b
                WHERE a.id_order=b.id_order AND a.id_order='$id_order'
                GROUP BY a.id_order";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1) {
            return true;
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
    
    public function save() {
        $post = $this->input->post();
        $dataOrder = array(
            'id_retur'=>$post['id_retur'],
            'tgl_retur'=>$post['tgl_retur'],
            'status_retur'=>$post['status_retur']
        );

        $data = array();
        $i=0;
        foreach ($post['id_return'] as $id) {
            array_push($data, array(
                'id_retur'=>$id,
                'id_order'=>$post['id_order'][$i],
                'id_product'=>$post['id_product'][$i],
                'id_size'=>$post['id_size'][$i],
                'qty_retur'=>$post['qty_retur'][$i],
                'subtotal_retur'=>$post['subtotal_retur'][$i],
                'alasan'=>$post['alasan'][$i]
            ));
            $i++;
        }

        $this->db->insert($this->_tableRetur, $dataOrder);
        $this->saveBatch($data);
    }

    public function saveBatch($data=array()) {
        $this->db->insert_batch($this->_tableDetRetur, $data);
        return true;
    }

    public function update() {
        $post = $this->input->post();
        $grand_total=0;
        $i=0;
        foreach ($post['id_order'] as $id) {
            $data = array(
                'id_retur'=>$post['id_retur'],
                'id_order'=>$id,
                'id_product'=>$post['id_product'][$i],
                'id_size'=>$post['id_size'][$i],
                'qty_retur'=>$post['qty'][$i],
                'subtotal_retur'=>$post['qty'][$i]*$post['harga'][$i],
                'alasan'=>$post['alasan'][$i]
            );
            $this->db->where('id_retur',$post['id_retur']);
            $this->db->where('id_product',$post['id_product'][$i]);
            $this->db->where('id_size',$post['id_size'][$i]);
            $this->db->update($this->_tableDetRetur, $data);
            $sub_total = $post['qty'][$i]*$post['harga'][$i];
            $grand_total = $grand_total+$sub_total;
            $i++;
        }

        $dataOrder = array(
            'id_retur'=>$post['id_retur'],
            'grandtotal_retur'=>$grand_total,
            'bukti_refund'=>'-'
        );

        $this->db->where('id_retur',$post['id_retur']);
        $this->db->update($this->_tableRetur, $dataOrder);
        return true;
    }

    public function delete($id_retur,$id_product,$id_size) {
        $sql = "DELETE FROM detil_retur WHERE id_retur='$id_retur' AND id_product='$id_product' AND id_size='$id_size'";
        return $this->db->query($sql);
    }

}