<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CartHandler extends CI_Controller
{

	public $statusCode = 200;
	public $output;
	public $registered = false;

	public $user = [];
	public $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->model("CartModel");
		$this->load->model("ProductModel");
		$this->load->library('cart');

		$this->load->helper('string');

		if ($this->session->has_userdata('user')) {
			$this->user = $this->session->userdata('user');
			$this->data['user'] = $this->user;
		}
	}

	public function index()
	{
		/** 
		 * - Check if User is registered? 
		 * 		- If True,  clear the Cart Session and Load Cart from the DB.
		 * 		- If False, load the cart from the session and prompt user to login.
		 * 
		 */

		$dc = [];
		$count = [];
		$cart = [];

		$cart_content = $this->cart->contents();
		for ($i = 0; $i < count($cart_content); $i++) {
			array_push($count, $i);
		}
		
		$dc = array_combine($count, $cart_content);
		foreach ($dc as $key => $value) {
			
			$product = $this->ProductModel->get_where(['id' => $value['id']]);

			$cart = array_merge($cart, [
				$key => [

					'cart' => $value,
					'product' => json_decode($product, true, 4)
				]
			]);
		}
		$this->data['cart_contents'] = $cart;
		$this->data['page'] = [
			"title" => "Cart Page"
		];
		$this->load->view('pages/cart/checkout', $this->data);
	}
}
