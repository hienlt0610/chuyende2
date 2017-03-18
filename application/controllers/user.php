<?php

/**
 * Created by PhpStorm.
 * User: hienl
 * Date: 3/8/2017
 * Time: 8:20 PM
 */
class User extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
    }
    
    public function index()
    {
        redirect('home');
    }

    public function login(){
        $data = array();
        if($this->input->post('btn-login')){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if(strlen($username) == 0 || strlen($password) == 0){
                $data['error'] = 'Vui long nhap day du username hoac password';
            }else{
                if($this->User_Model->check_login($username, $password)){
                    $newdata = array(
                            'username'  => $username,
                            'logged_in' => TRUE
                    );
                    $this->session->set_userdata($newdata);
                    redirect('home');
                }else{
                    $data['error'] = 'Tai khoan hoac mat khau khong chinh xac!!!';
                }
            }
            
        }
        
        //Set view
        $this->template->content->view('user/login',$data);
        //publist layoy
        $this->template->publish();
    }

    public function register(){
        $this->template->content->view('user/register');
        $this->template->publish();
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('home');
    }
}