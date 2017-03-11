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
        $query = $this->db->query("SELECT media.*, album.*, category.*
                                   FROM media, album, category
                                   WHERE media.album_id = album.album_id
                                   AND media.cate_id = category.cate_id
                                   AND media.m_id = ".$id);
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

    public function get_list_song($limit){
        $this->load->model("Singer_Model");
        $query = $this->db->query('SELECT media.*, album.*, category.*
                                   FROM media, album, category
                                   WHERE media.album_id = album.album_id
                                   AND media.cate_id = category.cate_id
                                   LIMIT 10');
        $list_song = $query->result();

        foreach ($list_song as &$row_song)
        {
            $row_song->singer = $this->Singer_Model->get_list_singer_by_media($row_song->m_id);
        }
        return $list_song;
    }

    public function get_list_song_by_singer($id, $offset = 0, $limit = false){
        $sql = 'SELECT media.*, album.*, category.*
                                   FROM media, album, category, media_singer
                                   WHERE media.album_id = album.album_id
                                   AND media.cate_id = category.cate_id
                                   AND media_singer.m_id = media.m_id
                                   AND media_singer.singer_id = '.$id;
        if($limit)
            $sql.= ' LIMIT '.$offset.','.$limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
}