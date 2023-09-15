<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CartHandler extends CI_Controller
{

	public $statusCode = 200;
	public $output;
	public $registered = true;

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

		$this->data['cart'] = [
			"count" => $this->cart->total_items(),
		];
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
		// print_r($this->CartModel->count_all());
		// print_r();

		$this->load->view('pages/cart/home', $this->data);
	}

	/**
	 * Checkout Page View
	*/
	public function confirm()
	{
		if($this->cartModel->count_all()>0){
			$cart = $this->cartModel->get_with_products();
		}
		$this->data['cart_contents'] = $cart;
		$this->data['page'] = [
			"title" => "Cart Page"
		];
		$this->load->view('pages/cart/checkout', $this->data);
	}

	/* POST Requests */

		
	/**
	 * empty
	 * 
	 * Empty the Cart Data
	 *
	 * @return void
	 */
	public function empty()
	{
		$this->cart->destroy();
		// $this->load->view('welcome_message');
	}
	
	/**
	 * add
	 *
	 * Adds Data to the Cart Library Object
	 * 
	 * @return void
	 */
	public function add()
	{
		$response = null;

		// Clean AJAX Data
		$stream_clean = xss_clean($this->input->raw_input_stream);
		$request = json_decode($stream_clean);
		$id = $request->id;

		// Get Existing Cart Library Session Instance
		$old_cart_lib = $this->cart->contents();

		$this->data =  array(
			'product_id' => $id,
		);


		// Get Existing Product Model Instance to be added to Cart
		$product_details = json_decode($this->ProductModel->get_where(['id' => $id]), true, 4);

		/**
		 * Initialize Default Cart Library object For all users. 
		 * 
		 * - Too much Work to be done on updating the right product quantity
		 * - Also work on adding different products in the cart.
		 * 
		 */

		// Initialize the Cart Array for the 'cart' Library
		$cart_data = [
			'id' => $id,
			'qty' => $request->qty,
			'price' => $product_details['discount_price'],
			'name'   => str_split($product_details['name'], 15)[0],
		];

		/**
		 * Update Cart Item if exist otherwise insert new item.
		 */
		if (count($old_cart_lib) > 0) {
			foreach ($old_cart_lib as $item) {
				if ($item['id'] == $id) {
					$cart_data = [
						'rowid' => $item['rowid'],
						'qty' => $item['qty'] + $request->qty,
					];
					$this->cart->update($cart_data);
					$response['success'] = true;
					$response['method'] = "Update";
				} else {
					$this->cart->insert($cart_data);
					$response['success'] = true;
					$response['method'] = "Insert";
				}
				# code...
			}
		} else {
			$this->cart->insert($cart_data);
			$response['success'] = true;
			$response['method'] = "Insert";
		}

		$this->session->set_flashdata(['cart_success' => true]);
		$this->session->set_flashdata(['cart_product_id' => $id]);

		// Return JSON Response.
		return $this->output
			->set_status_header($this->statusCode)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response));
	}

	public function remove()
	{
		$response = null;

		// Clean AJAX Data
		$stream_clean = xss_clean($this->input->raw_input_stream);
		$request = json_decode($stream_clean);
		$id = $request->rowid;

		// Get Existing Cart Library Session Instance
		$old_cart_lib = $this->cart->contents();

		if (count($old_cart_lib) > 0) {
			foreach ($old_cart_lib as $item) {
				if ($item['rowid'] == $id) {
					$this->cart->remove($item['rowid']);
					$response['success'] = true;
					$response['method'] = "Delete";
				} else {
					$response['success'] = false;
				}
				# code...
			}
		}

		return $this->output
			->set_status_header($this->statusCode)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response));
	}

	public function edit()
	{
		$this->load->view('welcome_message');
	}

	public function process()
	{
		// Clean AJAX Data
		$stream_clean = xss_clean($this->input->raw_input_stream);
		$request = json_decode($stream_clean);
		$id = $request->id;

		$this->data =  array(
			'product_id' => $id,
		);

		// Get Existing Cart Model Instance
		$old_cart = $this->CartModel->get_where($this->data, false);

		if ($this->session->has_userdata('user')) {
			/**
			 * Check if any item exist in the Cart Table in DB Update Count or Add new Data otherwise. 
			 */

			 if (null !== $old_cart) {
				$response = $this->CartModel->update_count(['id' => $old_cart['id']]);
			} else {
				$response = $this->CartModel->add($this->data);
			}

			/** 
			 * Set Flashdata to display Success Message 
			 */
		} else {
			redirect(base_url('login'));
		}
	}
}
