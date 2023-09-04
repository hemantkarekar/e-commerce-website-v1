<?php

class LoginModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function authorize(array $request)
    {
        $result = [];
        $this->db->where(['username' => $request['username']]);
        $result = $this->db->get('ecm_users')->row();
        $result = json_decode(json_encode($result), true, 5);
        if ($result['username'] == 'admin') {
            $flag = $request['password'] == $result['password'];
        } else {
            $flag = $request['password'] == $result['password'];
            // $flag = password_verify($request['password'], $result['password']);
        }
        if ($flag) {
            return $result;
        } else {
            return [];
        }
    }
}
