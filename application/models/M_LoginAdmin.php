<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_LoginAdmin extends CI_Model {
    //private $_table='admin';
   
    public function authentication($username,$password) {
       return $this->db->query("SELECT * FROM admin WHERE username='$username' AND password=MD5('$password') LIMIT 1");
    }
}

?>