<?php

/**
 * Created by PhpStorm.
 * User: hienlt0610
 * Date: 3/11/2017
 * Time: 2:41 PM
 */
class Singer_Model extends CI_Model
{
    public function get_singer_by_id($id){
        if($id === NULL) return false;
        $query = $this->db->query("SELECT *
                                   FROM singer
                                   WHERE singer_id = ".$id);
        $row = $query->row();
        if(isset($row))
            return $row;
        return false;
    }

    public function get_list_singer($limit = false){
        if($limit)
            $this->db->limit($limit);
        $query = $this->db->get('singer');
        return $query->result();
    }

    public function get_list_singer_by_media($id){
        $query = $this->db->query("SELECT singer.* FROM singer, media_singer WHERE singer.singer_id = media_singer.singer_id AND media_singer.m_id = ".$id);
        return $query->result();
    }
}