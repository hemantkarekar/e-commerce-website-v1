<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public $user = [];
	public function __construct()
	{
		parent::__construct();
		$this->load->model("authentication/LoginModel", 'Login');
	}

	public function login()
	{
		$form_data = $this->input->post();
		$user = $this->Login->authorize($form_data);
		// print_r($form_data);
		// echo count($user);
		if (count($user) == 0) {
			redirect(base_url('login'));
		} else {
			$_SESSION['user'] = $user;
			switch ($user['role']) {
				case 'admin':
					# code...
					redirect(base_url("ecm-admin"));
					break;
				case 'manufacturer':
					# code...
					break;

				case 'vendor':
					# code...
					break;

				default:
					# code...
					switch ($user['type']) {
						case 'business':
							// redirect(base_url($user['username'] . "/account"));
							break;

						default:
							if (isset($_SERVER["HTTP_REFERER"])) {
								redirect($_SERVER["HTTP_REFERER"]);
							} else {
								redirect(base_url($user['username'] . "/account"));
							}
							break;
					}
					break;
			}
		}
	}

	public function register()
	{
		$form_data = $this->input->post();
		$form_data['password'] = password_hash($form_data['password'], PASSWORD_BCRYPT);
		$user = $this->User->new($form_data);

		$this->session->set_flashdata('success', "Added new user '" . $form_data['username'] . "' Successfully.");
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function logout()
	{
		$this->load->library('cart');
		if (count($this->cart->contents()) > 0) {
			$this->CartModel->dump($this->cart->contents(), $this->user['id']);
		}
		
		if (count($this->WishListModel->get($this->user['id'])) > 0) {
			$this->WishListModel->dump($this->cart->contents(), $this->user['id']);
		}

		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
