<?php

/**
 * Created by PhpStorm.
 * User: hienl
 * Date: 3/8/2017
 * Time: 10:53 PM
 */
class Search extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Media_Model');
        $this->load->model('Singer_Model');
    }

    public function index(){
        $q = $this->input->get('q', TRUE);
        if(empty($q)){
            $q = "";
        }
        $list_result = $this->Media_Model->search_media($q);
        $this->template->content->view('search/index', array(
            'keyword'=> $q,
            'list_result' => $list_result
        ));
        $this->template->publish();
    }
}