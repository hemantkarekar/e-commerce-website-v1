<?php

class CookieModel extends CI_Model
{
    public $value = [];
    public function __construct()
    {
        $this->value["user_id"] = random_string();
    }

    public function populate($product_id)
    {
        $this->value = [
            "product_list" => []
        ];
        $cookie = array(
            'name'   => "site_product_history",
            'value'  => random_string(),
            'expire' => '60',
        );
    }
}
