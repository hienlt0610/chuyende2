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
        $this->load->library('form_validation');
    }

    public function index()
    {
        redirect('home');
    }

    public function login()
    {
        $data = array();
        if ($this->input->post('btn-login')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if (strlen($username) == 0 || strlen($password) == 0) {
                $data['error'] = 'Vui lòng nhập đầy đủ Tài khoản và mật khẩu';
            } else {
                if ($this->User_Model->check_login($username, $password)) {
                    $user_info = $this->User_Model->get_user_by_username($username);
                    $newdata = array(
                        'user_id' => $user_info->user_id,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($newdata);
                    redirect('home');
                } else {
                    $data['error'] = 'Tài khoản hoặc mật khẩu không chính xác!!!';
                }
            }

        }

        //Set view
        $this->template->content->view('user/login', $data);
        //publist layoy
        $this->template->publish();
    }

    public function register()
    {

        $this->form_validation->set_rules('username', 'Tài khoản', 'required|min_length[6]|callback_username_check');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Xác nhận mật khẩu', 'matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        $data = array();
        if ($this->input->post('signup')) {
            if ($this->form_validation->run()) {
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                $email = $this->input->post('email');
                $gender = $this->input->post('gender');
                if($this->User_Model->create_user($username, $password, $email, $gender)){
                    $this->session->set_flashdata('success_message', 'Đăng ký thành công');
                    redirect('user/register');
                }
            }
        }
        $this->template->content->view('user/register',$data);
        $this->template->publish();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function username_check($username){
        $is_exist = $this->User_Model->is_user_exist($username);
        if($is_exist){
            $this->form_validation->set_message('username_check', 'Tài khoản đã tồn tại trong hệ thống');
            return false;
        }
        return true;
    }
}