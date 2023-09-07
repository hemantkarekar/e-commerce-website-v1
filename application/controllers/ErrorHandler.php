<?php

class ErrorHandler extends CI_Controller
{
    public $heading;
    public $message;
    public $data = [];
    public function error_404()
    {

        $this->load->model('ProductModel');
        $results = $this->ProductModel->get_random(['offset' => 0, 'count' => 8]);

        $this->heading = "404 Page Not Found";
        $this->message = "<p>The page you requested was not found.</p>";
        $this->data = [
            'page' => [
                'heading' => $this->heading,
                'message' => $this->message,
            ]
        ];
        $this->data = [
            'products' => [
                'featured' => json_decode($results, true, 4),
            ]
        ];
        $this->load->view('errors/html/error_404', $this->data);
    }
}
