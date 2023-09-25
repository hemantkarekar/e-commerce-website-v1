<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CheckoutHandler extends CI_Controller
{

	public $statusCode = 200;
	public $output;
	public $registered = false;

	public $user = [];
	public $data = [];
	public $order = [];
	public $cartContent = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->model("CartModel");
		$this->load->model("ProductModel");

		$this->load->model('money/payment/RazorpayModel', 'RazorPayment');

		$this->load->library('cart');

		$this->load->helper('string');

		if ($this->session->has_userdata('user')) {
			$this->user = $this->session->userdata('user');
			$this->data['user'] = $this->user;
			$this->CartModel->dump($this->cart->contents(), $this->user['id']);
		} else {
			redirect(base_url('login'));
		}
		$this->cartContent = $this->CartModel->get($this->user['id']);
	}

	public function index()
	{
		/** 
		 * - Check if User is registered? 
		 * 		- If True,  clear the Cart Session and Store Cart to the DB. [DONE]
		 * 		- If False, prompt user to login and after login redirect back to /checkout. [DONE]
		 * 
		 */
		if ($this->CartModel->count_all() > 0) {
			$cart = $this->CartModel->get_with_products();

			$subtotal = 0;
			foreach ($cart['cart'] as $item) {
				$subtotal += $item['subtotal'];
			}
			$subtotal *= 100;
			
			/**
			 * Create Order with product_conf_id
			 * Possible Output:
			 * {
			 * 		"id": "order_EKwxwAgItmmXdp",
			 * 		"entity": "order",
			 * 		"amount": 50000,
			 * 		"amount_paid": 0,
			 * 		"amount_due": 50000,
			 * 		"currency": "INR",
			 * 		"receipt": "receipt#1",
			 * 		"offer_id": null,
			 * 		"status": "created",
			 * 		"attempts": 0,
			 * 		"notes": [],
			 * 		"created_at": 1582628071
			 * 	}
			 */
			$order = $this->RazorPayment->create_order([
				'amount' => $subtotal,
				'currency' => 'INR',
				'notes' => ['key1' => 'value3', 'key2' => 'value2']
			]);

			// assign to pubic order
			$this->order = $order;
			$url = $this->RazorPayment->payment([
				"amount" => $subtotal,
				"currency" => "INR",
				"customer" => [
					"name" => "John Doe",
					"email" => "john.doe@example.com",
				],
				'callback_url' => base_url('payment/confirmed'),
				'callback_method' => 'get',
				"description" => "Payment for " . $order['id'] ??= ""
			]);

			$this->data['cart_contents'] = $cart;
			$this->data['payment']['url'] = $url;
			$this->data['page'] = [
				"title" => "Cart Page"
			];
			$this->load->view('pages/cart/checkout', $this->data);
		} else {
			redirect(base_url('cart'));
		}
	}

	public function payment_status($status)
	{
		switch ($status) {
			case 'confirmed':
				# code...
				echo "Confirmed";
				print_r($this->input->get());
				die;

				/**
				 * Create New Order
				 * --------------------------------------------
				 * $this->OrderModel->new([
				 * 		'rzp_order_id' => $this->order['id'],
				 * 		'rzp_payment_id' => $this->input->get('razorpay_payment_id'),
				 * 		'content' => json_decode($this->CartModel->get($this->user['id']), true, 4)
				 * ]);
				 * --------------------------------------------
				 * Returns OrderID
				 */

				/**
				 * Empty the Cart
				 * --------------------------------------------
				 * $this->CartModel->reset($this->user['id'])
				 * 
				 */ 
				 
				 /**
				 * Return to order-history/order/$id page in User Account
				 * --------------------------------------------
				 * redirect(base_url($this->user['username']."/order-history/order/".$this->order['id']"));
				 * 
				 */ 
				
				break;

			case 'failed':
				# code...
				/**
				 * Return to cart
				 * --------------------------------------------
				 * redirect(base_url("cart");
				 * 
				 */ 
				break;

			default:
				/**
				 * Return to cart
				 * --------------------------------------------
				 * redirect(base_url("cart");
				 * 
				 */ 
				break;
		}
	}
}
