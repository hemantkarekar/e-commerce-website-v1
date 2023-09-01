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

	public function __construct()
	{
		parent::__construct();
		$this->load->model("user/UserModel", 'User');
		$this->load->model("panel/DashboardControl", 'DashboardControl');
	}

	public function index()
	{
		$this->load->helper('dashboard_menu');
		$menu = [];
		$menu = json_decode($this->DashboardControl->menu_options(), 3);
		$data = [
			'page' => [
				'title' => "Dashboard"
			],
			'menu' => $menu
		];
		if ($this->session->has_userdata('user')) {
			$id = $_SESSION['user']['id'];
			$user = (array)$this->User->get($id);
			$data['user'] = $user;

			switch ($user['type']) {
				case 'business':
					# code...
					$this->load->view('pages/panel/business/home', $data);
					break;

				default:
					$this->load->view('pages/panel/default/home', $data);
					break;
			}
		} else {
			redirect('/login');
		}
	}
}
