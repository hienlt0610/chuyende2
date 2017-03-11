<?php

/**
 * Created by PhpStorm.
 * User: hienlt0610
 * Date: 3/11/2017
 * Time: 1:46 PM
 */
class Singer extends MY_Controller
{
    public $page_config = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Singer_Model');
        $this->load->model('Media_Model');
        $this->load->model('Album_Model');
        $this->load->library('pagination');
        $this->init_paging();
    }

    public function init_paging(){
        //Config page

        $this->page_config['page_query_string'] = TRUE;
        // Number of items you intend to show per page.
        $this->page_config["per_page"] = 10;
        // Use pagination number for anchor URL.
        $this->page_config['use_page_numbers'] = TRUE;
        $this->page_config['query_string_segment'] = 'page';
        //Set that how many number of pages you want to view.
        $this->page_config['num_links'] = 3;

        //Customize page
        $this->page_config['prev_link'] = '&lt;';
        $this->page_config['next_link'] = '&gt;';
        $this->page_config['cur_tag_open'] = '<li class="active"><a href="#">';
        $this->page_config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $this->page_config['num_tag_open'] = '<li>';
        $this->page_config['num_tag_close'] = '</li>';
        $this->page_config['prev_tag_open'] = '<li>';
        $this->page_config['prev_tag_close'] = '</li>';
        $this->page_config['next_tag_open'] = '<li>';
        $this->page_config['next_tag_close'] = '</li>';
        $this->page_config['first_tag_open'] = '<li>';
        $this->page_config['first_tag_close'] = '</li>';
        $this->page_config['last_tag_open'] = '<li>';
        $this->page_config['last_tag_close'] = '</li>';
    }

    public function detail($id){
        $singer = $this->Singer_Model->get_singer_by_id($id);
        if(empty($singer))
            return show_404();
        $this->template->content->view('singer/detail', array(
            'singer' => $singer,
            'list_song' => $this->Media_Model->get_list_song_by_singer($singer->singer_id),
            'list_album' => $this->Album_Model->get_list_album_by_singer($singer->singer_id,0,8),
            'other_singer' =>$this->Singer_Model->get_list_singer(10)
        ));
        $this->template->publish();
    }

    public function song($singer_id){
        $singer = $this->Singer_Model->get_singer_by_id($singer_id);
        if(empty($singer))
            return show_404();
        $list_song = $this->Media_Model->get_list_song_by_singer($singer->singer_id);

        // To initialize "$config" array and set to pagination library.
        // Set base_url for every links
        $this->page_config["base_url"] = singer_song_url($singer->singer_id, $singer->singer_name);
        // Set total rows in the result set you are creating pagination for.
        $this->page_config["total_rows"] = count($list_song);

        $this->pagination->initialize($this->page_config);
        $page = !empty($this->input->get('page', true)) ? $this->input->get('page', true): 1;
        $start = $page*$this->page_config['per_page']-$this->page_config['per_page'];
        $this->template->content->view('singer/song_list', array(
            'singer' => $singer,
            'list_song' => $this->Media_Model->get_list_song_by_singer($singer->singer_id,$start, $this->page_config['per_page']),
            'other_singer' =>$this->Singer_Model->get_list_singer(10),
            'paging' => $this->pagination->create_links()
        ));
        $this->template->publish();
    }

    public function album($singer_id){
        $singer = $this->Singer_Model->get_singer_by_id($singer_id);
        if(empty($singer))
            return show_404();

        $list_album = $this->Album_Model->get_list_album_by_singer($singer->singer_id);
        $this->page_config["base_url"] = singer_album_url($singer->singer_id, $singer->singer_name);
        // Set total rows in the result set you are creating pagination for.
        $this->page_config["total_rows"] = count($list_album);
        $this->pagination->initialize($this->page_config);

        $page = !empty($this->input->get('page', true)) ? $this->input->get('page', true): 1;
        $start = $page*$this->page_config['per_page']-$this->page_config['per_page'];

        $this->template->content->view('singer/album_list', array(
            'singer' => $singer,
            'list_album' => $this->Album_Model->get_list_album_by_singer($singer->singer_id, $start, $this->page_config['per_page']),
            'other_singer' =>$this->Singer_Model->get_list_singer(10),
            'paging' => $this->pagination->create_links()
        ));
        $this->template->publish();
    }
}