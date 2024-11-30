<?php
// require_once '../modle/cart.php';
require_once '../modle/ship.php';
require_once '../modle/user.php';
class orderController
{
    // protected $cart;

    protected $ship;

    protected $user;

    public function __construct()
    {
        // $this->cart = new cart();
        $this->ship = new ship();
        $this->user = new user();
    }
    public function checkout()
    {
        $user=$this->user->detailUserId($_SESSION['user']['user_id']);
        $ship=$this->ship->getAllShip();
        // $cart=$this->cart->
        // echo "<pre>";
        // print_r($ship);
        // echo "<pre>";
        include '../view/client/checkout/checkout.php';
    }
}
