<?php
require_once '../modle/user.php';
class profileController extends user
{
    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateProfile'])) {
            $errors=[];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên của bạn.';
            }
            if (empty($_POST['email']) && !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Vui lòng nhập email của bạn.';
            }
            if (empty($_POST['phone'])) {
                $errors['phone'] = 'Vui lòng nhập số điện thoại của bạn';
            }
            if (empty($_POST['address'])) {
                $errors['address'] = 'Vui lòng nhập địa chỉ';
            }
            if (empty($_POST['gender'])) {
                $errors['gender'] = 'Vui lòng chọn giới tính';
            }
            $_SESSION['errors'] = $errors;
            if (count($errors)>0) {
                header("location:".$_SERVER['HTTP_REFERER']);
                exit();
            }

            $user = $this->update($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['gender'] );
            if ($user) {
                $_SESSION['user'] =$this->getUserId($_SESSION['user']['user_id']);
                $_SESSION['success'] = 'Cập nhập tài khoản thành công';
                header('location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }else{
                $_SESSION['error'] = 'Cập nhập tài khoản thất bại';
                header('location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
}
