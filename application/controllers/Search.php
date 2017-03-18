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
    }

    public function index(){
        $q = $this->input->get('q', TRUE);
        $this->template->content->view('search/index', array('q'=> $q));
        $this->template->publish();
    }
}