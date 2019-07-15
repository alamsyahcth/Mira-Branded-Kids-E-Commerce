<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_FrontProduct extends CI_Model {
    public function __construct() {
        parent::__construct();

        $this->proTable = 'product';
        $this->cusTable = 'customer';
        $this->ordTable = 'orders';
        $this->ordItemTable = 'detil_orders';
        $this->katTable = 'kategori';
        $this->sizeTable = 'size';
        $this->bankTable = 'bank';
        $this->detSizeTabele = 'detil_size';
        $this->resiTable = 'detil_size';
        $this->commentTable = 'comment';
        $this->saranTable = 'saran';
        $this->bannerTable = 'banner';
    }

    //get Kategori
    public function getKategori() {
        return $this->db->get($this->katTable)->result();
    }

    public function getBanner() {
        return $this->db->get($this->bannerTable)->result();
    }

    //Pagination Function
    public function getAllForPage($limit,$start) {
        return $this->db->get($this->proTable,$limit,$start);
    }

    //Pagination Function Kategori
    public function getForPageKategori($id,$limit,$start) {
        $this->db->where(['id_kategori'=>$id]);
        return $this->db->get($this->proTable,$limit,$start);
    }

    public function countData() {
        return $this->db->count_all($this->proTable);
    }

    public function getById($id) {
        return $this->db->get_where($this->proTable, ['id_product'=>$id])->row();
    }

    public function getSize($id) {
        return $this->db->get_where($this->sizeTable, ['id_size'=>$id])->row_array();
    }

    public function getCustomer($id) {
        return $this->db->get_where($this->cusTable, ['id_customer'=>$id])->row_array();
    }

    public function getComment($id) {
        $sql = "SELECT *
                FROM customer a, comment b
                WHERE a.id_customer=b.id_customer AND b.id_product='$id'";
        return $this->db->query($sql)->result();
    }

    public function getReply($id) {
        $sql = "SELECT *
                FROM reply a, comment b, product c
                WHERE a.id_comment=b.id_comment AND b.id_product=c.id_product AND b.id_product='$id'";
        return $this->db->query($sql)->result();
    }

    public function getOrderCustomer($id) {
        $this->db->where('id_customer',$id);
        return $this->db->get($this->ordTable)->result();
    }

    public function getResi($id) {
        $sql = "SELECT a.id_order, tanggal_order, status, grand_total, no_resi
                FROM orders a, resi b, customer c
                WHERE a.id_order=b.id_order AND a.id_customer=c.id_customer AND c.id_customer='$id'
                ORDER BY a.id_order DESC";
        return $this->db->query($sql)->result();
    }

    public function getBank() {
        return $this->db->get($this->bankTable)->result();
    }

    public function authentication($email, $password) {
        return $this->db->query("SELECT * FROM customer WHERE email_customer='$email' AND password_customer=md5('$password') AND status_customer='1' LIMIT 1");
    }

    public function getDetilSize($id) {
        $sql = "SELECT b.id_size, nm_size, stok
                FROM product a, detil_size b, size c
                WHERE a.id_product=b.id_product AND b.id_size=c.id_size
                AND a.id_product='$id'";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function getStok($id,$size) {
        //$this->db->select('stok');
        //$this->db->where('id_product', $id);
        //$this->db->where('id_size', $size);
        $sql = "SELECT stok FROM detil_size WHERE id_product='$id' AND id_size='$size'";
        $data['tahta'] = $this->db->query($sql)->result();
        foreach ($tahta as $t) {
            return $t->stok;
        }
        //return $this->db->get('detil_size')->result();
    }

    public function kurangDataStok($id_product,$id_size,$qty) {
        $sql = "UPDATE detil_size SET stok=stok-'$qty' WHERE id_product = '$id_product' AND id_size='$id_size'";
        $query = $this->db->query($sql);
        return true;
    }

    public function tambahDataStok($id_product,$id_size,$qty) {
        $sql = "UPDATE detil_size SET stok=stok+'$qty' WHERE id_product = '$id_product' AND id_size='$id_size'";
        $query = $this->db->query($sql);
        return true;
    }

    public function cekStok($id_product,$id_size) {
        $sql = "SELECT stok
                FROM product a, detil_size b, size c
                WHERE a.id_product=b.id_product AND b.id_size=c.id_size AND b.id_product = '$id_product' AND b.id_size='$id_size'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }

    public function orderID() {
        $this->db->select('RIGHT(id_order,4) as MaxKode');
        $this->db->order_by('id_order','desc');
        $query = $this->db->get($this->ordTable);
        $date = date("ymd");
        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->MaxKode)+1;
        } else {
            $kode = 1;
        }

        $kodeMax = 'O'.$date.str_pad($kode,4,"0", STR_PAD_LEFT);
        return $kodeMax;
    }

    public function commentID() {
        $this->db->select('RIGHT(id_comment,4) as MaxKode');
        $this->db->order_by('id_comment','desc');
        $query = $this->db->get($this->commentTable);
        $date = date("ymd");
        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->MaxKode)+1;
        } else {
            $kode = 1;
        }

        $kodeMax = 'K'.$date.str_pad($kode,4,"0", STR_PAD_LEFT);
        return $kodeMax;
    }

    public function saranID() {
        $this->db->select('RIGHT(id_saran,4) as MaxKode');
        $this->db->order_by('id_saran','desc');
        $query = $this->db->get($this->saranTable);
        $date = date("ymd");
        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->MaxKode)+1;
        } else {
            $kode = 1;
        }

        $kodeMax = '0'.$date.str_pad($kode,4,"0", STR_PAD_LEFT);
        return $kodeMax;
    }

    //get rows untuk mengambil data berasarkan id untuk dimasukkan ke cart
    public function getRows($id='') {
        $this->db->select('*');
        $this->db->from($this->proTable);
        if ($id) {
            $this->db->where('id_product', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $this->db->order_by('nm_product', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }

        return !empty($result)?$result:false;
    }

    public function insertOrder($data) {
        $insert = $this->db->insert($this->ordTable, $data);
        return $insert?$this->db->insert_id():false;
    }

    public function saveSaran($data) {
        return $this->db->insert($this->saranTable,$data);
    }

    public function insertOrderItems($data=array()) {
        $insert = $this->db->insert_batch($this->ordItemTable, $data);
        return $insert?true:false;
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

    public function orderUpdate($id_order) {
        $data = array(
            'status'=>'3'
        );
        $this->db->where('id_order', $id_order);
        return $this->db->update($this->_tableOrder,$data);
    }

    public function ubahStatusOrder($id) {
        $data = array(
            'status'=>'5'
        );
        $this->db->where('id_order', $id);
        return $this->db->update($this->ordTable,$data);
    }

    public function saveComment($id) {
        $data = array(
            'id_comment'=>$id,
            'tanggal_comment'=>$this->input->post('tanggal_comment'),
            'isi_comment'=>$this->input->post('isi_comment'),
            'id_product'=>$this->input->post('id_product'),
            'id_customer'=>$this->input->post('id_customer')
        );

        return $this->db->insert($this->commentTable,$data);
    }

}

?>