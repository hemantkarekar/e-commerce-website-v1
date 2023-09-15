<?php

class CartModel extends CI_Model
{
    public $result = [];
    public $registered = true;

    public $cartObject = [];
    public $user = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->user = $this->session->user;
    }

    public function add(array $products = null): bool
    {
        if (count($products) > 0 || $products != null) {
            $this->db->insert('ecm_cart', $products);
        }
        return json_encode($this->result);
    }

    public function dump(array $cart_session, $userid)
    {
        $data = [];
        $id  = random_string('alnum', 32);
        foreach ($cart_session as $cart) {
            $arr = [
                'user_id' => $userid,
                'cart_id' => $id,
                'product_id' => $cart['id'],
                'quantity' => $cart['qty'],
                'subtotal' => $cart['subtotal'],
            ];
            array_push($data, $arr);
        }
        foreach ($data as $entry) {
            $this->db->insert('ecm_cart', $entry);
        }
        $this->cart->destroy();
    }

    public function get($userid){
        $this->result = $this->get_where(['user_id' => $userid], true);
        return json_encode($this->result);
    }
    
    public function get_with_products()
    {
        $this->result = json_decode($this->get($this->user['id']), true, 4);

        $this->cartObject['cart'] = $this->result;

        for ($i = 0; $i < count($this->result); $i++) {
            $this->cartObject['cart'][$i]['product_detail'] = json_decode($this->ProductModel->get_where(['id' => $this->cartObject['cart'][$i]['product_id']]), true, 5);
        }
        return $this->cartObject;
        // return $cart;
    }

    public function get_where(array $condition, bool $bulk = true)
    {
        switch ($bulk) {
            case false:
                # code...
                if (count($condition) > 0 || $condition != null) {
                    $this->result = json_decode(json_encode($this->db->get_where('ecm_cart', $condition)->row()), true, 4);
                }
                break;

            default:
                if (count($condition) > 0 || $condition != null) {
                    $this->result = json_decode(json_encode($this->db->get_where('ecm_cart', $condition)->result()), true, 4);
                }
                # code...
                break;
        }
        return $this->result;
    }

    public function count_all(): int
    {
        if(isset($this->cart)){
            $this->result = json_decode($this->get($this->user['id']), true, 4);
            return count($this->cart->contents()) + count($this->result);
        } else{
            $this->result = json_decode($this->get($this->user['id']), true, 4);
            return count($this->result);
        }
    }

    public function update_count(array $condition)
    {
        if (count($condition) > 0 || $condition != null) {
            $this->db->set('quantity', 'quantity+1', FALSE);
            $this->db->where('id', $condition['id']);
            $this->result = $this->db->update('ecm_cart');
            $this->result = json_decode(json_encode($this->result), true, 4);
        }

        return $this->result;
    }
}
