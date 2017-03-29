<?php

/**
 * Created by PhpStorm.
 * User: hienl
 * Date: 3/8/2017
 * Time: 9:44 PM
 */
class User_Model extends CI_Model
{
    public function check_login($user, $pass)
    {
        $this->db->from('user');
        $this->db->where('user_name', $user);
        $row = $this->db->get()->row();
        if (!isset($row)) {
            return false;
        }
        if ($row->user_password != md5($pass)) {
            return false;
        }

        return $row;
    }

    public function get_user_by_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        $row = $this->db->get('user')->row();
        if (!isset($row)) {
            return false;
        }
        return $row;
    }

    public function get_user_by_username($user_name)
    {
        $this->db->where('user_name', $user_name);
        $row = $this->db->get('user')->row();
        if (!isset($row)) {
            return false;
        }
        return $row;
    }

    public function is_user_exist($username)
    {
        $this->db->where('user_name', $username);
        $row = $this->db->get('user')->row();
        if (!isset($row)) {
            return false;
        }
        return true;
    }

    public function create_user($username, $password, $email, $gender)
    {
        $data = array(
            'user_name' => $username,
            'user_password' => $password,
            'user_email' => $email,
            'user_gender' => $gender
        );
        $this->db->insert('user', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}