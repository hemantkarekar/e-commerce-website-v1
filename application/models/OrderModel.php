<?php
class OrderModel extends CI_Model
{

    public $order = [];

    public function __construct()
    {
        parent::__construct();   
    }

    /**
     * Create New Order
     * $details = ['order_id', 'rzp_order_id', 'rzp_payment_id', 'content'] & $userid
     * 
     * Step 1: Create New Order
     * --------------------------------------------
     * 
     * Step 2: Update the Product Inventory
     * --------------------------------------------
     * $this->InventoryModel->remove($this->product['id'])
     * 
     */
    public function new(array $details, $userid){
        $keys = [
            'order_id', 
            'rzp_order_id', 
            'rzp_payment_id', 
            'cart_id',
            'order_status'
        ];
        $values = [
            $details['order_id'],
            $details['rzp_order_id'],
            $details['rzp_payment_id'],
            $details['cart_id'],
            'Placed'
        ];
        $data = array_combine($keys, $values);
        $this->db->where(['user_id' => $userid]);
        $this->db->insert($data);
        return $this->db->affected_rows();
    }
}



?>