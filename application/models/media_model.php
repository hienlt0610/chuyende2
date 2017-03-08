<?php

/**
 * Created by PhpStorm.
 * User: hienl
 * Date: 3/8/2017
 * Time: 9:47 PM
 */
class Media_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_id($id){
        if($id === NULL) return false;
        $query = $this->db->query("SELECT * FROM media WHERE m_id = ".$id);
        $row = $query->row();
        if(isset($row))
            return $row;
        return false;
    }

    public function get_list_singer_by_id($id){
        if($id === NULL) return false;
        $query = $this->db->query("SELECT singer.* FROM singer, media_singer where media_singer.singer_id = singer.singer_id && media_singer.m_id = ".$id);
        return $query->result();
    }
}