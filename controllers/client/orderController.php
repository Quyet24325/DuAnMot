<?php
require_once '../modle/cart.php';
require_once '../modle/ship.php';
require_once '../modle/user.php';
require_once '../modle/order.php';
class orderController
{
    protected $cart;

    protected $ship;

    protected $user;

    protected $order;

    public function __construct()
    {
        $this->cart = new cart();
        $this->ship = new ship();
        $this->user = new user();
        $this->order = new order();
    }
    public function indext()
    {
        $user = $this->user->detailUserId($_SESSION['user']['user_id']);
        $ships = $this->ship->getAllShip();
        $carts = $this->cart->getAllCart();

        include '../view/client/checkout/checkout.php';
    }

    public function checkout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['place_order'])) {
            $carts = $this->cart->getAllCart();
            $orderdetail = $this->order->addOrrderDetail($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['amount'],$_POST['note'],$_POST['ship_id'],$_POST['cou_id'],$_POST['payment']);
            
            
            if ($orderdetail) {
                $detail_id = $this->order->getLastInsertId();
                foreach ($carts as $cart) {
                    $this->order->addOrder($cart['pro_id'],$cart['variant_id'],$cart['quantity'],$detail_id);
                    $this->cart->deleteCart($cart['cart_id']);
                }
                unset($_SESSION['total']);
                unset($_SESSION['coupon']);
                unset($_SESSION['totalCoupon']);
                header("location:indext.php");
                $_SESSION['success'] = 'Đặt hàng thành công';
                exit();
            }else{
                $_SESSION['error'] = 'Đặt hàng không thành công';
                header("location:".$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    public function trackOrder(){
        $orders = $this->order->getOrderDetailByUserId();
        include '../view/client/cart/trackOrder.php';
    }
    public function handleCoupon($coupon, $total)
    {
        if ($coupon['type'] == 'Percentage') {
            $totalCoupon = ($total * ($coupon['coupon_value'] / 100));
        } elseif ($coupon['type'] == 'Fixed Amount') {
            $totalCoupon = $coupon['coupon_value'];
        }
        return $totalCoupon ?? 0;
    }
    public function trackOrderDetail(){
        $orderById = $this->order->getOrderById($_GET['id']);
        $detailById = $this->order->getOrderDetailById($_GET['id']);
        $coupons = $this->order->getCouponById($_GET['id']);
        $ships = $this->order->getShipById($_GET['id']);
        $handleCoupon = $this->handleCoupon($coupons, $detailById['amount']);
        // echo '<pre>';
        // print_r($ships);
        // echo '<pre>';
        include '../view/client/cart/trackOrderDetail.php';
    }
    
}
