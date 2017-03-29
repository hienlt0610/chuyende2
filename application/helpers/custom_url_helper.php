<?php
/**
 * Created by PhpStorm.
 * User: hienlt0610
 * Date: 3/11/2017
 * Time: 1:20 PM
 */

/**
 *
 * Chuyển đổi chuỗi kí tự thành dạng slug dùng cho việc tạo friendly url.
 *
 * @access    public
 * @param    string
 * @return    string
 */
if ( ! function_exists('create_slug'))
{
    function create_slug($string) {
        $search = array (
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        ) ;
        $replace = array (
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        ) ;
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }

    function song_url($id, $title){
        $url = "bai-hat/".create_slug($title).".".$id.".html";
        return site_url($url);
    }

    function singer_url($id, $name){
        $url = "ca-si/".create_slug($name).".".$id.".html";
        return site_url($url);
    }

    function singer_song_url($id, $name){
        $url = "ca-si/".create_slug($name).".".$id."/bai-hat.html";
        return site_url($url);
    }

    function singer_album_url($id, $name){
        $url = "ca-si/".create_slug($name).".".$id."/album.html";
        return site_url($url);
    }

    function singer_video_url($id, $name){
        $url = "ca-si/".create_slug($name).".".$id."/video.html";
        return site_url($url);
    }

    function album_url($id, $name){
        $url = "album/".create_slug($name).".".$id.".html";
        return site_url($url);
    }

    function category_url($id, $name){
        $url = "the-loai/".create_slug($name).".".$id.".html";
        return site_url($url);
    }

    function playlist_url($id, $name){
        $url = "playlist/".create_slug($name).".".$id.".html";
        return site_url($url);
    }

    function videl_url($id, $name){
        $url = "video/".create_slug($name).".".$id.".html";
        return site_url($url);
    }
    function facebook_share($url){
        return 'https://www.facebook.com/sharer/sharer.php?u='.$url;
    }
}