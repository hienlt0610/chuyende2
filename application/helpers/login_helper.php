<?php
/**
 * Created by PhpStorm.
 * User: hienlt0610
 * Date: 3/29/2017
 * Time: 1:14 AM
 */

function is_logged() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    $is_logined = $CI->session->userdata('logged_in');
    if (isset($is_logined) && $is_logined == true) {
        return true;
    } else {
        return false;
    }
}

function user_info(){
    if(is_logged()){
        $CI =& get_instance();
        // You may need to load the model if it hasn't been pre-loaded
        $CI->load->model('User_Model');
        $user_id = $CI->session->userdata('user_id');

        $info = $CI->User_Model->get_user_by_id($user_id);
        return $info;
    }
    return false;
}