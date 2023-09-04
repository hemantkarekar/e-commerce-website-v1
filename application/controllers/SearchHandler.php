<?php

class SearchHandler extends CI_Controller
{
    public $user = [];
    public $data = [];
    public $visited_history = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');


        if ($this->session->has_userdata('user')) {
            $this->user = $this->session->userdata('user');
            $this->data['user'] = $this->user;
        }
    }

    public function index($page = null)
    {
        $per_page = 24;
        $page = ($page != null) ? $page : 0;

        $this->load->helper('string');
        $products_all = json_decode($this->ProductModel->get([]), true, 4);
        $products_current = json_decode($this->ProductModel->get(['offset' => $per_page, 'count' => $page]), true, 4);

        $this->load->library('pagination');

        $pagination['base_url'] = base_url('search');
        $pagination['total_rows'] = count($products_all);
        $pagination['per_page'] = $per_page;
        $pagination["cur_page"] = $page;

        $this->pagination->initialize($pagination);

        // echo $this->pagination->create_links();
        // // echo 
        // echo $page . "to"  . $page + $per_page;

        // echo count($products_all);


        $this->data['page'] = [
            "title" => "Products",
        ];
        $this->data['products']['data'] = $products_current;
        $this->data['products']['pagination'] = $this->pagination->create_links();

        $this->load->view('pages/products/home', $this->data);
    }

    public function results($page = null)
    {
        $per_page = 5;
        $page = ($page != null) ? $page : 0;
        $keyword = $this->input->get("sk");
        $this->load->library('pagination');

        $products_results = json_decode($this->ProductModel->get_like($keyword), true, 6);

        $pagination['base_url'] = base_url('search');
        $pagination['total_rows'] = count($products_results);
        $pagination['per_page'] = $per_page;
        $pagination["cur_page"] = $page;
        $pagination['use_page_numbers'] = TRUE;
        $pagination['page_query_string'] = TRUE;
        $pagination['query_string_segment'] = 'page';
        $pagination['reuse_query_string'] = TRUE;

        $this->pagination->initialize($pagination);

        $this->data['page'] = [
            "title" => "Products",
        ];
        $this->data['products']['data'] = $products_results;
        $this->data['products']['pagination'] = $this->pagination->create_links();

        $this->load->view('pages/products/home', $this->data);
    }
}
