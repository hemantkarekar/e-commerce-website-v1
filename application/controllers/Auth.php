<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model("user/UserModel", 'User');
	}

	public function login()
	{
		$form_data = $this->input->post();
		$user = $this->User->authorize($form_data);
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
							redirect(base_url($user['username'] . "/account"));
							break;

						default:
							redirect(base_url($user['username'] . "/account"));
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
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
