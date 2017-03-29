<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_Model');
        $this->load->model('Media_Model');
        $this->load->model('Singer_Model');
        $this->load->library('pagination');
        $this->init_paging();
    }

    public function index()
	{

	}

	public function detail($cate_id = NULL){
	    if(empty($cate_id)){
            show_404();
        }
        $category = $this->Category_Model->get_by_id($cate_id);
	    if(!$category){
	        show_404();
        }

        $list_song = $this->Media_Model->get_list_song_by_category($cate_id);

        //Set paging
        $this->page_config["base_url"] = category_url($category->cate_id, $category->cate_id);
        $this->page_config["total_rows"] = count($list_song);
        $this->pagination->initialize($this->page_config);
        $page = !empty($this->input->get('page', true)) ? $this->input->get('page', true): 1;
        $start = $page*$this->page_config['per_page']-$this->page_config['per_page'];

        $data = array(
            'category' => $category,
            'list_song' => $this->Media_Model->get_list_song_by_category($cate_id, $start, $this->page_config['per_page']),
            'paging' => $this->pagination->create_links(),
            'top_10_song' => $this->Media_Model->get_top_song()
        );
        $this->template->content->view('category/detail',$data);
        $this->template->publish();
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
}
