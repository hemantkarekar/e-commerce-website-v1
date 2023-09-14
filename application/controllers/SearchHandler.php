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
        $this->load->library('cart');
        $this->data['cart'] = [
			"count" => $this->cart->total_items(),
		];


        if ($this->session->has_userdata('user')) {
            $this->user = $this->session->userdata('user');
            $this->data['user'] = $this->user;
        }
    }

    public function index()
    {

    }

    public function results()
    {
        $per_page = 10;
        $page = $this->input->get('page');
        $page = ($page != null) ? $page : 0;
        $keyword = $this->input->get("sk");
        $this->load->library('pagination');

        $products_results = json_decode($this->ProductModel->get_like($keyword, null), true, 6);

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
        $products_results_limit = json_decode($this->ProductModel->get_like($keyword, ['offset'=> $page * $per_page, 'count' => $per_page]), true, 6);
        $this->data['products']['data'] = $products_results_limit;
        $this->data['products']['results']['count'] = $pagination['total_rows'];
        $this->data['products']['pagination'] = $this->pagination->create_links();

        $this->load->view('pages/products/search', $this->data);
    }
}
