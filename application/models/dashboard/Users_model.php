<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

    function  __construct(){
        parent::__construct();
    }

    public function loginCheck($email){
        $this->db
        ->select("*")
        ->from("usuarios")
        ->where("email",$email);

        $result = $this->db->get();

        if($result->num_rows() > 0):
            return $result->row();
        else:
            return NULL;
        endif;
    }

}