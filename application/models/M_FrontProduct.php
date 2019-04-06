<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_FrontProduct extends CI_Model {
    public function __construct() {
        parent::__construct();

        $this->proTable = 'product';
        $this->cusTable = 'customer';
        $this->ordTable = 'orders';
        $this->ordItemTable = 'order_details';
        $this->katTable = 'kategori';
        $this->sizeTable = 'size';
    }

    //get Kategori
    public function getKategori() {
        return $this->db->get($this->katTable)->result();
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

    public function getDetilSize($id) {
        $sql = "SELECT b.id_size, nm_size, stok
                FROM product a, detil_size b, size c
                WHERE a.id_product=b.id_product AND b.id_size=c.id_size
                AND a.id_product='$id'";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function orderID() {
        $this->db->select('RIGHT(orders_id,4) as MaxKode');
        $this->db->order_by('orders_id','desc');
        $query = $this->db->get($this->ordTable);

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->MaxKode)+1;
        } else {
            $kode = 1;
        }

        $kodeMax = str_pad($kode,4,"0", STR_PAD_LEFT);
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

    public function insertCustomer($data) {
        if (!array_key_exists("created", $data)) {
            $data["created"] = date('Y-m-d H:i:s');
        }
        if (!array_key_exists("modified", $data)) {
            $data["modified"] = date('Y-m-d H:i:s');
        }

        $insert = $this->db->insert($this->cusTable, $data);

        return $insert?$this->db->insert_id():false;
    }

    public function insertOrder($data) {
        if (!array_key_exists("orders_created", $data)) {
            $data["orders_created"] = date('Y-m-d H:i:s');
        }
        if (!array_key_exists("orders_modified", $data)) {
            $data["orders_modified"] = date('Y-m-d H:i:s');
        }

        $insert = $this->db->insert($this->ordTable, $data);

        return $insert?$this->db->insert_id():false;
    }

    public function insertOrderItems($data=array()) {
        $insert = $this->db->insert_batch($this->ordItemTable, $data);

        return $insert?true:false;
    }

    public function getDataCustomers($ordID) {
        $sql = "SELECT a.customer_id, name, address, email, phone
                FROM customers a, orders b
                WHERE a.customer_id=b.customer_id AND b.orders_id='$ordID'";
        $query = $this->db->query($sql);

        return $query->result();
        //return !empty($result)?$result:false;
    }

    public function getDataOrder($ordID) {
        $sql =  "SELECT a.id_barang, nm_barang, quantity, sub_total, grand_total
                 FROM barang a, order_details b, orders c
                 WHERE a.id_barang=b.id_barang AND b.orders_id=c.orders_id AND c.orders_id='$ordID'
                 ORDER BY a.id_barang asc";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function getGrandTotal($ordID) {
        $sql =  "SELECT grand_total FROM orders WHERE orders_id='$ordID'";
        $query = $this->db->query($sql);

        return $query->result();
    }

}

?>