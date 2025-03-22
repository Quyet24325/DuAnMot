<?php
require_once '../modle/cart.php';
class cartController extends cart
{

    public function index()
    {
        if (!empty($_SESSION['user'])) {
            $cart = $this->getAllCart();
            $sum = 0;
            foreach ($cart as $car) {
                $sum += $car['pro_var_sale_price'] * $car['quantity'];
            }
            $_SESSION['total'] = $sum;
        }

        include '../view/client/cart/cart.php';
    }
    public function addToCartOrByNow()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
            if (empty($_POST['variant_id'])) {
                $_SESSION['error'] = 'vui lòng chọn màu sắc và size sản phẩm.';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            $checkCart = $this->checkCart();
            if ($checkCart) {
                $quantity = $checkCart['quantity'] + $_POST['quantity'];
                $updateCart = $this->updateCart(
                    $_SESSION['user']['user_id'],
                    $_POST['pro_id'],
                    $_POST['variant_id'],
                    $quantity
                );
                $_SESSION['success'] = 'cập nhật giỏ hàng thành công.';
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                $addToCart = $this->addToCart(
                    $_SESSION['user']['user_id'],
                    $_POST['pro_id'],
                    $_POST['variant_id'],
                    $_POST['quantity']
                );
                $_SESSION['success'] = 'Thêm vào giỏ hàng thành công.';
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            // }
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['thanhtoan'])) {
            $_SESSION['guest'] = $this->getProductVariantId($_POST['pro_id']);
            $_SESSION['guest']['quantity'] = $_POST['quantity'];
            $_SESSION['guest']['total'] = $_POST['quantity'] * $_SESSION['guest'][0]['var_sale_price'];
            // echo '<pre>';
            // print_r($_SESSION['guest']);    

            header('location: indext.php?act=checkout');
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_cart'])) {
            if (isset($_POST['quantity'])) {
                foreach ($_POST['quantity'] as $cart_id => $quantity) {
                    $this->updateCartById($cart_id, $quantity);
                }
                header('location:' . $_SERVER['HTTP_REFERER']);
                $_SESSION['success'] = 'cập nhật giỏ hàng thành công.';
            }
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['apply_coupon'])) {
            $coupon = $this->getCouponByCode($_POST['coupon_code']);
            if (!$coupon) {
                $_SESSION['error'] = 'mã giảm giá không tồn tại.';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            if (isset($_SESSION['coupon'])) {
                $_SESSION['error'] = 'chỉ được sử dụng 1 mã giảm giá cho 1 đơn hàng.';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            if ($coupon) {
                $_SESSION['coupon'] = $coupon;
                $totalCoupon = $this->handleCoupon($coupon, $_SESSION['total']);
                $_SESSION['totalCoupon'] = $totalCoupon;
                $_SESSION['success'] = 'áp dụng mã giảm giá thành công.';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    public function delete()
    {
        try {
            $this->deleteCart($_GET['cart_id']);
            $_SESSION['success'] = 'Xóa sản phẩm thành công';
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            $_SESSION['errors'] = 'Xóa sản phẩm thất bại.';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    public function handleCoupon($coupon, $total)
    {
        if ($coupon['type'] == 'Percentage') {
            $totalCoupon = ($total * ($coupon['coupon_value'] / 100));
        } elseif ($coupon['type'] == 'Fixed Amount') {
            $totalCoupon = $coupon['coupon_value'];
        }
        return $totalCoupon;
    }
}
