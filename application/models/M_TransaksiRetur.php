<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_TransaksiRetur extends CI_Model {
    private $_tableOrder = 'orders';
    private $_tableDetilOrder = 'detil_orders';
    private $_tableCustomer = 'customers';
    private $_tableProduct = 'product';
    private $_tableSize = 'size';
    private $_tableRetur = 'retur';

   public function getRetur() {
        $sql = "SELECT *
                FROM retur
                WHERE status_retur='1' OR status_retur='2'
                GROUP BY id_retur
                ORDER BY id_retur DESC";
       return $this->db->query($sql)->result();
   }

   public function getReturById($id) {
        $sql = "SELECT a.id_retur, b.id_order, g.id_resi, tgl_retur, nm_customer, no_rekening, grandtotal_retur, bukti_refund, email_customer
                FROM retur a, detil_retur b, detil_orders c, orders d, customer e, confirm f, resi g
                WHERE a.id_retur=b.id_retur AND b.id_order=c.id_order AND c.id_order=d.id_order AND d.id_customer=e.id_customer AND d.id_order=f.id_order AND d.id_order=g.id_order AND b.id_retur='$id'
                GROUP BY b.id_retur
                ORDER BY b.id_retur";
        return $this->db->query($sql)->result();
   }

   public function getDetilRetur($id) {
       $sql = "SELECT d.id_product, nm_size, harga, qty_retur, alasan, subtotal_retur
                FROM retur a, detil_retur b, detil_orders c, product d, size e 
                WHERE a.id_retur=b.id_retur AND b.id_order=c.id_order AND b.id_product=c.id_product AND b.id_size=c.id_size AND c.id_product=d.id_product AND c.id_size=e.id_size AND a.id_retur='$id'
                ORDER BY d.id_product";
        return $this->db->query($sql)->result();
   }

   public function updateStatus() {
        $data = array(
            'bukti_refund'=>$this->_uploadImage(),
            'status_retur'=>'2'
        );
        $this->db->where('id_retur',$this->input->post('id_retur'));
        $this->db->update($this->_tableRetur, $data);

        return true;
   }

   private function _uploadImage() {
        $date = date("ymd");
        $retur = $this->input->post('id_retur');
        $config['upload_path'] = './upload/refund/';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = $retur.$date;
        $config['overwrite'] = true;
        $config['max_size'] = 1024;

        $this->load->library('upload',$config);
        if ($this->upload->do_upload('bukti_refund')) {
            return $this->upload->data('file_name');
        }

        return "NOIG.jpg";
    }
}