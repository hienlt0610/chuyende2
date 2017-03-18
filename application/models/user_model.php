<?php

/**
 * Created by PhpStorm.
 * User: hienl
 * Date: 3/8/2017
 * Time: 9:44 PM
 */
class User_Model extends CI_Model
{
    public function check_login($user, $pass){
        $this->db->from('user');
        $this->db->where('user_name', $user);
        $row = $this->db->get()->row();
        if(!isset($row)){
            return false;
        }
        if($row->user_password != $pass){
            return false;
        }
        
        return $row;
    }
}