<?php

use Razorpay\Api\Api;
use Razorpay\Api\Order;

class RazorpayModel extends CI_Model
{
    public $public_key = "rzp_test_FVjxkeVWe8sNMs";
    public $secret_key = "ii5Q5e2f8Ge3uWcP97atF6ao";
    public $razorpay;
    function __construct()
    {
        $this->load->model('user/UserModel', 'Customer');
        $this->razorpay = new Api($this->public_key, $this->secret_key);
    }

    public function new(): Api
    {
        return $this->razorpay;
    }

    public function create_order(array $credentials) {
        $order = $this->razorpay->order->create($credentials);
        return $order;
    }

    public function order($credentials)
    {
        $this->razorpay->order->create($credentials);
    }

    public function payment(array $credentials)
    {
        $url = $this->razorpay->paymentLink->create($credentials);
        return $url->short_url;
    }
}
