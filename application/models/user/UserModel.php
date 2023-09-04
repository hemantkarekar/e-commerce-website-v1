<?php
class UserModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        $this->db->where(['id' => $id]);
        $result = $this->db->get('ecm_users')->row();
        return $result;
    }

    public function new($data)
    {
        $this->db->insert('ecm_users', $data);
    }
}
