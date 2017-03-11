<?php

/**
 * Created by PhpStorm.
 * User: hienl
 * Date: 3/8/2017
 * Time: 9:47 PM
 */
class Album_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_id($id){
        if($id === NULL) return false;
        $query = $this->db->query("SELECT album.*, category.* 
                                    FROM album, category 
                                    WHERE category.cate_id = album.cate_id
                                    AND album.album_id = ".$id);
        $row = $query->row();
        if(isset($row))
            return $row;
        return false;
    }

    public function get_list_album($limit = false){
        $sql = 'SELECT album.*, category.* FROM album, category WHERE category.cate_id = album.cate_id';
        if($limit)
            $sql.= ' LIMIT '.$limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_list_album_by_singer($singer_id,$start = 0, $limit = false){
        $this->db->select('album.*, category.*');
        $this->db->from('album');
        $this->db->join('category', 'album.cate_id = category.cate_id');
        $this->db->join('album_singer', 'album_singer.album_id = album.album_id');
        $this->db->where('album_singer.singer_id',$singer_id);
        $this->db->offset($start);
        if($limit)
            $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }


}