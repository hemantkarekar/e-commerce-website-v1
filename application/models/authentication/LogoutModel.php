<?php

class LogoutModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('accessibility/CookieModel', "CookieModel");
        $this->load->model('accessibility/WishlistModel', "WishlistModel");
    }


    /**
     * ### Logs out the User
     * 
     * - Check if Product History Exists
     * `$this->session->product_history`
     * 
     * - Check if User Wishlist Exists
     * `$this->session->user_wishlist`
     * 
     * - Check if Cart Exists
     * `$this->cart`
     * 
     * If Any of the above exists then load those data into respective Data Tables and unset those variables.
     */
    public function logout(){
        // $this->session->unset_userdata(['user', 'product_history', 'user_wishlist'])
    }
}
