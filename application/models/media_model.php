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
        $this->db->select('media.*');
        $this->db->from('media');
        $this->db->join('album','media.album_id = album.album_id', 'left');
        $this->db->join('category','media.cate_id = category.cate_id', 'left');
        $this->db->where('media.m_id', $id);

        $query = $this->db->get();
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

    public function get_list_song_random($limit){
        $this->db->from('media');
        $this->db->order_by('RAND()');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function get_list_song_by_singer($id, $offset = 0, $limit = false){
        $sql = 'SELECT media.* FROM media LEFT JOIN media_singer
                ON media_singer.m_id = media.m_id
                WHERE media_singer.singer_id = '.$id;
        if($limit)
            $sql.= ' LIMIT '.$offset.','.$limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_list_song_by_category($cate_id, $offset = 0, $limit = false){
        $this->load->model("Singer_Model");
        $this->db->select('*');
        $this->db->from('media');
        $this->db->where('cate_id', $cate_id);
        $this->db->limit($limit, $offset);
        $list_song = $this->db->get()->result();

        foreach($list_song as &$song){
            $song->singer = $this->Singer_Model->get_list_singer_by_media($song->m_id);
        }
        return $list_song;
    }

    public function get_top_song(){
        $this->db->select("*");
        $this->db->from('media');
        $this->db->order_by('m_viewed', 'desc');
        $this->db->limit(10);
        return $this->db->get()->result();
    }

    public function increase_view_count($media_id){
        $this->db->where('m_id', $media_id);
        $this->db->set('m_viewed', 'm_viewed + 1', false);
        $this->db->update('media');
    }

    public function search_media($keyword){
        $sql = 'SELECT media.* FROM media, media_singer, singer 
                    WHERE media_singer.m_id = media.m_id 
                    AND media_singer.singer_id = singer.singer_id 
                    AND (media.m_title 
                    LIKE \'%'.$keyword.'%\' OR singer.singer_name LIKE \'%'.$keyword.'%\')';
        $query = $this->db->query($sql);
        return $query->result();
    }
}