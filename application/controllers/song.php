<?php

/**
 * Created by PhpStorm.
 * User: hienl
 * Date: 3/8/2017
 * Time: 10:53 PM
 */
class Song extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Media_Model');
    }

    public function index(){
        $this->template->content->view('song/index');
        $this->template->publish();
    }

    public function latest(){
        echo "Bài hát mơi";
    }

    public function detail($id = NULL){
        if($id === NULL)
            show_404();
        $media = $this->Media_Model->get_by_id($id);
        if(!$media)
            show_error("Không tìm thấy bài hát", 404,"404 Song Not Found");

        $this->template->content->view('song/detail', array(
            'media'=> $media,
            'list_singer' => $this->Media_Model->get_list_singer_by_id($id),
            'top10_song' => $this->Media_Model->get_list_song(10)
        ));
        $this->template->publish();
    }

    public function download($id){
        $outFileName = "test.mp3";
        $media = $this->Media_Model->get_by_id($id);
        $url = $media->m_url;

        $file_url = $url;
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
        readfile($file_url); // do the double-download-dance (dirty but worky)
    }
}