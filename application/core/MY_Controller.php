<?php

/**
 * Created by PhpStorm.
 * User: hienl
 * Date: 2/22/2017
 * Time: 10:46 PM
 */
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template->title = "Nghe nhạc hay online mới nhất, tải nhạc MP3 chất lượng cao 320kbs";
    }
}