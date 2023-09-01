<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public $user = [];
	public $data = [];

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

		 $pagination['base_url'] = base_url('products');
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
	public function details($slug, $id)
	{
		$product_single = json_decode($this->ProductModel->get_where(['product_id' => $id]), true, 4);
		$this->data['page'] = [
			"title" => $product_single['name'],
		];
		$this->data['product'] = $product_single;
		$this->load->view('pages/products/detail', $this->data);
	}
	public function new()
	{
		$this->data['page'] = [
			'title'=> "Add New Product"
		];
		$this->data['breadcrumb'] = [
			"Home" => "",
			"Products" => "products",
			"Create Product" => "Current",
		];
		$this->load->view('dashboard/products/product_new', $this->data);
	}
	public function edit($productId)
	{
		$this->data['page'] = [
			'title'=> "Edit Product"
		];
		$this->data['breadcrumb'] = [
			"Home" => "",
			"Products" => "products",
			"Edit Product" => "Current",
		];
		$this->data['product'] = $productId;
		$this->load->view('dashboard/products/product_edit', $this->data);
	}
}
