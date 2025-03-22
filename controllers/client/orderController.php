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

        $user = $this->user->detailUserId($_SESSION['user']['user_id'] ?? '');
        $ships = $this->ship->getAllShip();
        if (!empty($user)) {
            $carts = $this->cart->getAllCart();
        }

        include '../view/client/checkout/checkout.php';
    }

    public function checkout()
    {
        if (!empty($_SESSION['user'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['place_order'])) {
                if ($_POST['payment'] == 'COD') {
                    $carts = $this->cart->getAllCart();
                    $orderdetail = $this->order->addOrrderDetail($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['amount'], $_POST['note'], $_POST['ship_id'], $_POST['cou_id'], $_POST['payment']);
                    if ($orderdetail) {
                        $detail_id = $this->order->getLastInsertId();
                        foreach ($carts as $cart) {
                            $this->order->addOrder($cart['pro_id'], $cart['variant_id'], $cart['quantity'], $detail_id);
                            $this->cart->deleteCart($cart['cart_id']);
                        }
                        unset($_SESSION['total']);
                        unset($_SESSION['coupon']);
                        unset($_SESSION['totalCoupon']);
                        header("location:indext.php");
                        $_SESSION['success'] = 'Đặt hàng thành công';
                        exit();
                    } else {
                        $_SESSION['error'] = 'Đặt hàng không thành công';
                        header("location:" . $_SERVER['HTTP_REFERER']);
                        exit();
                    }
                } elseif (($_POST['payment'] == 'VNPAY')) {
                    $carts = $this->cart->getAllCart();
                    $orderdetail = $this->order->addOrrderDetail($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['amount'], $_POST['note'], $_POST['ship_id'], $_POST['cou_id'], $_POST['payment']);

                    if ($orderdetail) {
                        $detail_id = $this->order->getLastInsertId();
                        foreach ($carts as $cart) {
                            $this->order->addOrder($cart['pro_id'], $cart['variant_id'], $cart['quantity'], $detail_id);
                            $this->cart->deleteCart($cart['cart_id']);
                        }
                        $this->vnpay($detail_id);
                    }
                }
            }
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['place_order'])) {
                if ($_POST['payment'] == 'COD') {
                    $guest = $this->order->createGuest($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address']);
                    if ($guest) {
                        $guestID = $this->order->getLastGuestId();
                        $orderdetail = $this->order->addOrrderDetailGuest($_POST['name'],$guestID, $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['amount'], $_POST['note'], $_POST['ship_id'], $_POST['cou_id'] ?? 0, $_POST['payment']);
                        if ($orderdetail) {
                            $detail_id = $this->order->getLastInsertId();
                            $this->order->addOrderGest($_POST['pro_id'],$guestID, $_POST['variant_id'], $_POST['quantity'], $detail_id);
                            unset($_SESSION['guest']);
                            header("location:indext.php");
                            $_SESSION['success'] = 'Đặt hàng thành công';
                            exit();
                        } else {
                            $_SESSION['error'] = 'Đặt hàng không thành công';
                            header("location:" . $_SERVER['HTTP_REFERER']);
                            exit();
                        }
                    }

                    // echo '<pre>';
                    // print_r($guestID);
                } elseif (($_POST['payment'] == 'VNPAY')) {
                    $_SESSION['error'] = 'Bạn chưa có tài khoản. Vui lòng đăngký/đăng nhập để tiếp tục giao dịch.';
                    header("location:" . $_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
        }
    }
    public function vnpay($detail_id)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/DuAnMot/public/indext.php?act=vnpay_return";
        $vnp_TmnCode = "GTGA9V2J"; //Mã website tại VNPAY 
        $vnp_HashSecret = "BN4JAWHQ42J8OL1GJXDBLTO5UDLLB1FP"; //Chuỗi bí mật

        $vnp_TxnRef = $detail_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 

        $vnp_OrderInfo = 'Noi dung thanh toan';
        $vnp_OrderType = 'Thanh toan Vnpay';
        $vnp_Amount = $_POST['amount'] * 100000;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );
        if (isset($_POST['payment'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    public function vnpayReturn()
    {
        unset($_SESSION['total']);
        unset($_SESSION['coupon']);
        unset($_SESSION['totalCoupon']);
        header("location:indext.php");
        $_SESSION['success'] = 'Đặt hàng thành công';
        exit();
    }
    public function trackOrder()
    {
        if (empty($_SESSION['user'])) {
            include '../view/client/cart/trackOrder.php';
        } else {
            $orders = $this->order->getOrderDetailByUserId();
            include '../view/client/cart/trackOrder.php';
        }
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
    public function trackOrderDetail()
    {
        $orderById = $this->order->getOrderById($_GET['id']);
        $detailById = $this->order->getOrderDetailById($_GET['id']);
        $coupons = $this->order->getCouponById($_GET['id']);
        $ships = $this->order->getShipById($_GET['id']);
        $handleCoupon = $this->handleCoupon($coupons, $detailById['amount']);
        include '../view/client/cart/trackOrderDetail.php';
    }

    public function cancel()
    {
        try {
            $this->order->cancelOrder();
            $_SESSION['success'] = 'Hủy đơn hàng thành công.';
            header("location:" . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            $_SESSION['error'] = 'Hủy đơn hàng thất bại.';
            header("location" . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
