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
		$this->load->model("auth/AuthorizerModel", 'auth');
		$this->load->model("User");
	}

	public function login()
	{
		$form_data = $this->input->post();
		$user = $this->User->authorize($form_data);
		if (count($user) == 0) {
			$this->session->set_flashdata('error', 'Login Failed');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$_SESSION['user'] = $user;
			redirect("/");
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
		redirect('/login');
	}

	public function loggedIn()
	{
		return true;
	}

	/**
	 * USER RESTRICTIONS
	 */
	public function restrict($group = null, $single = null)
	{
		if ($group === null) {
			if ($this->loggedIn() === true) {
				return true;
			} else {
				$this->lang->load('errors');
				$this->error->set_message('insufficient_privs');
				$this->show_error();
			}
		} elseif ($this->loggedIn() === true) {
			$level = $this->config->item('auth_groups')[$group];
			$userLevel = $this->session->userdata('groupId');

			if ($userLevel > $level || ($single === true && $userLevel !== $level)) {
				$this->lang->load('errors');
				$this->error->set_message('insufficient_privs');
				$this->show_error();
			}
			return true;
		} else {
			redirect($this->config->item('auth_login'), 'refresh');
		}
	}
}
