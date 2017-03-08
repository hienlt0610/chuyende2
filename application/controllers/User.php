<?php

/**
 * Created by PhpStorm.
 * User: hienl
 * Date: 3/8/2017
 * Time: 8:20 PM
 */
class User extends MY_Controller
{
    public function index()
    {
        redirect('home');
    }

    public function login(){
        $this->template->content->view('user/login');
        $this->template->publish();
    }

    public function register(){
        $this->template->content->view('user/register');
        $this->template->publish();
    }
}