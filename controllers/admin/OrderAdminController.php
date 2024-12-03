<?php
require_once '../modle/order.php';
class OrderAdminController extends order
{
    public function listOrder()
    {


        $orders = $this->getAllOrderDetail();

        include '../view/admin/order/list.php';
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
    public function orderById()
    {
        $orderById = $this->getOrderById($_GET['id']);
        $detailById = $this->getOrderDetailById($_GET['id']);
        $coupons = $this->getCouponById($_GET['id']);
        $ships = $this->getShipById($_GET['id']);
        $handleCoupon = $this->handleCoupon($coupons, $detailById['amount']);
        include '../view/admin/order/edit.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_order'])) {
            $updateOrder = $this->updateOrder($_POST['status']);
            if($updateOrder){
                $_SESSION['success'] = "Cập nhập đơn hàng thành công";
                header("location:indext.php?act=order");
                exit();
            }else{
                $_SESSION['error'] = "Cập nhập đơn hàng thất bại";
                header("location:".$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

   
}
