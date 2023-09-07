<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * ## Controller for the User Dashboard.
 * @version 1.1
 * Handles the types of Users
 * 
 * ### Types of Users
 * - Normal User
 * - Business User
 * 		
 * ### Normal User
 * Can See the past purchases. 
 * Can download the invoices for the certain period.
 * Can claim for the refunds for the certain period.
 * 
 * ### Business User
 * Additionally to Normal User a Business User can manage its GST Invoices  
 * 
 * Maps to the following URL
 * @see {user_name}/dashboard
 * 	
 * @author Sociomark
 */
class UserDashboard extends CI_Controller
{
	public $userData = [];
	public $menu = [];
	public $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->model("user/UserModel", 'User');
		$this->load->model("panel/DashboardControl", 'DashboardControl');

		if ($this->session->has_userdata('user')) {
			$this->userData = (array)$this->User->get($id);
		} else {
			redirect('/login');
		}
	}

	public function index()
	{
		$this->data = [
			'page' => [
				'title' => "Dashboard"
			],
		];
		$id = $_SESSION['user']['id'];
		$this->data['user'] = $this->userData;
		switch ($this->userData['type']) {
			case 'business':
				# code...
				$this->load->helper('dashboard_menu');

				$this->menu = json_decode($this->DashboardControl->menu_options(), 3);
				$this->data['menu'] =  $this->menu;
				$this->load->view('pages/panel/business/home', $this->data);
				break;

			default:
				$this->load->view('pages/panel/default/home', $this->data);
				break;
		}
	}

	public function orders_history()
	{
	}
}
