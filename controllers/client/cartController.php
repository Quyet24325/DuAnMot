<?php
require_once '../modle/cart.php';
class cartController extends cart{
    public function addToCartOrByNow(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])){
            if(empty($_POST['variant_id'])){
                $_SERVER['error']='vui lòng chọn màu sắc và ram sản phẩm.';
                header('location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }

            $checkCart = $this->checkCart();
            if($checkCart){
                $quantity = $checkCart['quantity'] + $_POST['quantity'];
                $updateCart= $this->updateCart(
                    $_SESSION['user']['user_id'], 
                    $_POST['product_id'],
                    $_POST['variant_id'],
                    $quantity
                );
                $_SESSION['success']='cập nhật giỏ hàng thành công.';
                header('location'.$_SERVER['HTTP_REFERER']);
                exit();
            }else{
                $addToCart=$this->addToCart(
                    $_SESSION['user']['user_id'],
                    $_POST['product_id'],
                    $_POST['variant_id'],
                    $_POST['quantity']
                );
                $_SESSION['success']='Thêm vào giỏ hàng thành công.';
                header('location'.$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
}