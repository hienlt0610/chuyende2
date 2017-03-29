<?php

/**
 * Created by PhpStorm.
 * User: hienl
 * Date: 3/8/2017
 * Time: 9:47 PM
 */
class Category_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_id($id){
        if($id === NULL) return false;
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('cate_id', $id);

        $query = $this->db->get();
        $row = $query->row();
        if(isset($row))
            return $row;
        return false;
    }

    public function get_list_category(){
        $this->load->model("Media_Model");
        $this->db->select('*');
        $this->db->from('category');
        $list_category = $this->db->get()->result();
        foreach($list_category as &$category){
            $list_song = $this->Media_Model->get_list_song_by_category($category->cate_id, 0, 4);
            $category->songs = $list_song;
        }
        return $list_category;
    }
}