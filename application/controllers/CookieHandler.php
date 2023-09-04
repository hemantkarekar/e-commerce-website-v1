<?php

class CookieHandler extends CI_Controller
{
    public $statusCode = 200;
    public $output;
    public $registered = true;

    public $user = [];
    public $data = [];


    public function __construct()
    {
        parent::__construct();
    }

    public function add()
    {
        // Clean AJAX Data
        $stream_clean = xss_clean($this->input->raw_input_stream);
        $request = json_decode($stream_clean);
        $consent = $request->cookie_consent;



        if ($consent) {
            if (get_cookie("site_cookie_id", true) == null) {
                $cookie= array(
                    'name'   => "site_cookie_id",
                    'value'  => random_string(),
                    'expire' => '60',
                );
                $this->input->set_cookie($cookie);
                $response['success'] = true;
                $response['cookie'] = get_cookie("site_cookie_id", true);
            }
        }

        return $this->output
            ->set_status_header($this->statusCode)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response));
    }
}
