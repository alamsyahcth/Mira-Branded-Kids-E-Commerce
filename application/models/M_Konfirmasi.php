<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Konfirmasi extends CI_Model {
    private $_tableConfirm = 'confirm';
    private $_tableOrder = 'orders';
    private $_tableBank = 'bank';

    public $id_confirm;
    public $tanggal_confirm;
    public $tanggal_transfer;
    public $jumlah_transfer;
    public $no_rekening;
    public $bukti_transfer='NOIG.jpg';
    public $nm_pengirim;
    public $id_bank;
    public $id_order;

    public function rules() {
        return[
            [
                'field'=>'id_confirm',
                'label'=>'ID Confirm',
                'rules'=>'required'
            ],

            [
                'field'=>'tanggal_confirm',
                'label'=>'Tanggal Confirm',
                'rules'=>'required'
            ],

             [
                'field'=>'tanggal_transfer',
                'label'=>'Tanggal Transfer',
                'rules'=>'required'
            ],

            [
                'field'=>'jumlah_transfer',
                'label'=>'Jumlah Transfer',
                'rules'=>'required'
            ],

            [
                'field'=>'no_rekening',
                'label'=>'Nomor Rekening',
                'rules'=>'required'
            ],

            [
                'field'=>'nm_pengirim',
                'label'=>'Nama Pengirim',
                'rules'=>'required'
            ],

            [
                'field'=>'id_bank',
                'label'=>'ID Bank',
                'rules'=>'required'
            ],

            [
                'field'=>'id_order',
                'label'=>'ID Order',
                'rules'=>'required'
            ]
            ];
        }
    
    public function confirmID() {
        $this->db->select('RIGHT(id_confirm,4) as MaxKode');
        $this->db->order_by('id_confirm','desc');
        $query = $this->db->get($this->_tableConfirm);
        $date = date("ymd");
        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->MaxKode)+1;
        } else {
            $kode = 1;
        }

        $kodeMax = 'C'.$date.str_pad($kode,4,"0", STR_PAD_LEFT);
        return $kodeMax;
    }

    public function getBank() {
        return $this->db->get($this->_tableBank)->result();
    }

    public function cekDataOrder($id_order,$id_customer) {
        $this->db->where('id_order',$id_order);
        $this->db->where('id_customer',$id_customer);
        $query = $this->db->get($this->_tableOrder);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cekDataOrderTersedia($id_order,$id_customer) {
        $sql = "SELECT *
                FROM orders
                WHERE id_order='$id_order' AND id_customer='$id_customer' AND status ='2'";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 0) {
            return true;
        }
    }

    public function cekConfirm($id_order) {
        $this->db->where('id_order',$id_order);
        $query = $this->db->get($this->_tableConfirm);
        if ($query->num_rows() == 1) {
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
        $this->id_confirm = $post['id_confirm'];
        $this->tanggal_confirm = $post['tanggal_confirm'];
        $this->tanggal_transfer = $post['tanggal_transfer'];
        $this->jumlah_transfer = $post['jumlah_transfer'];
        $this->no_rekening = $post['no_rekening'];
        $this->nm_pengirim = $post['nm_pengirim'];
        $this->status_confirm = '1';
        $this->id_bank = $post['id_bank'];
        $this->id_order = $post['id_order'];
        $this->bukti_transfer = $this->_uploadImage();
        $this->db->insert($this->_tableConfirm, $this);
    }

    public function delete($id) {
        $this->_delImage($id);
        return $this->db->delete($this->_table, array('id_bank'=>$id));
    }

    private function _uploadImage() {
        $date = date("ymd");
        $config['upload_path'] = './upload/confirm/';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = $this->id_confirm.$date;
        $config['overwrite'] = true;
        $config['max_size'] = 1024;

        $this->load->library('upload',$config);
        if ($this->upload->do_upload('bukti_transfer')) {
            return $this->upload->data('file_name');
        }

        return "NOIG.jpg";
    }

    private function _delImage($id) {
        $item = $this->getById($id);

        if ($item->logo_bank != 'NOIG.jpg') {
            $filename = explode(".",$item->logo_bank)[0];
            return array_map('unlink',glob(FCPATH."upload/bank/$filename.*"));
        }
    }
}