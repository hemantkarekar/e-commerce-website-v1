<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
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

	public $user = [];
	public $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ProductModel");
		if ($this->session->has_userdata('user')) {
			$this->user = $this->session->userdata('user');
			$this->data['user'] = $this->user;
		}
	}
	public function index()
	{
		$results = $this->ProductModel->get_random(['offset'=> 0, 'count' => 8]);
		$this->data['products']['featured'] = json_decode($results, true, 4);

		$results = $this->ProductModel->get_random(['offset'=> 0, 'count' => 8]);
		$this->data['products']['arrivals'] = json_decode($results, true, 4);
		
		$results = $this->ProductModel->get_random(['offset'=> 0, 'count' => 1]);
		$this->data['products']['offer_01'] = json_decode($results, true, 4);
		
		$results = $this->ProductModel->get_random(['offset'=> 0, 'count' => 1]);
		$this->data['products']['offer_02'] = json_decode($results, true, 4);
		
		$results = $this->ProductModel->get_random(['offset'=> 0, 'count' => 1]);
		$this->data['products']['offer_03'] = json_decode($results, true, 4);

		$this->data['page'] = [
			"title" => "Home"
		];
		$this->load->view('pages/index', $this->data);
	}

	public function login()
	{
		$this->data['page'] = [
			"title" => "Login"
		];
		$this->load->view('pages/login', $this->data);
	}
	public function register()
	{
		$this->data['page'] = [
			"title" => "Register"
		];
		$this->load->view('pages/register', $this->data);
	}


	/**
	 * do_upload
	 * --------------------------------------
	 * Codeigniter Function to Upload Multiple Files
	 * @author Hemant Karekar, Sociomark
	 * @return void
	 */
	public function do_upload()
	{
		$this->load->helper('string');

		$upload['upload_path']          = './assets/uploads/';
		$upload['allowed_types']        = 'gif|jpg|png';
		$upload['max_size']             = 10000;
		$upload['file_name']			= date('U') . "_" . random_string();

		$this->load->library('upload', $upload);

		echo "<pre>";
		print_r($_FILES['userfile']);
		if (isset($_FILES['userfile'])) {
			$files = [];
			foreach ($_FILES['userfile'] as $property => $value) {
				foreach ($value as $index => $file) {
					$files[$index][$property] = $file;
				}
			}
			for ($i = 0; $i < count($files); $i++) {
				print_r($files[$i]);
				if (!$this->upload->do_upload("userfile['name'][" . $i . "]")) {
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				} else {
					$this->data = $this->upload->data();
					print_r($this->data);
					$height = $this->input->post('height');
					switch ($height) {
						case '50':
							$this->resize($this->data, $height, true, true);
							break;
						case '16':
						case '32':
						case '100':
						case '160':
						case '240':
						case '480':
						case '600':
						case '1024':
						case '2048':
							$this->resize($this->data, $height, true, false);
							break;
						default:
							break;
					}
				}
			}
		}
	}

	/**
	 * resize
	 * --------------------------------------
	 * Codeigniter Function to Resize the Images according to the ratios.
	 * @version 1.1
	 * @author Hemant Karekar, Sociomark
	 * 
	 * @param  mixed $data - $_FILES Array
	 * @param  string $height - Height for the destination image
	 * @param  string $preserveRatio - Preserve Ratio, Important to avoid stretched resize.
	 * @param  bool $createThumb - Create a _thumb file. Default TRUE.
	 * @return void
	 */
	public function resize(array $data, $height, $preserveRatio = TRUE, $createThumb = TRUE)
	{
		$resize['image_library'] = 'gd2';
		$resize['source_image'] = $data['full_path'];
		$resize['new_image'] = $data['file_path'] . $data['raw_name'] . "-" . $height . $data['file_ext'];
		$resize['create_thumb'] = $createThumb;
		$resize['maintain_ratio'] = $preserveRatio;
		$resize['height']   = $height;
		$this->load->library('image_lib', $resize);
		$this->image_lib->resize();
	}
}
