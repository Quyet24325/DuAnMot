<?php
require_once '../modle/user.php';
class profileController extends user
{
    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateProfile'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên của bạn.';
            }
            if (empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
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
            if (count($errors) > 0) {
                header("location:" . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $user = $this->update($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['gender']);
            if ($user) {
                $_SESSION['user'] = $this->getUserId($_SESSION['user']['user_id']);
                $_SESSION['success'] = 'Cập nhập tài khoản thành công';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                $_SESSION['error'] = 'Cập nhập tài khoản thất bại';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    public function getUser()
    {
        try {
            $userId = $this->detailUserId($_GET['id']);
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function passUpdate()
    {
        $userId = $this->detailUserId($_GET['id']);
        // echo "<pre>";
        // print_r($userId);
        // echo "<pre>";


        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatePass'])) {
            $errors = [];
            $oldPass = $_POST['oldPass'];
            if (empty($_POST['newPass'])) {
                $errors['newPass'] = 'Bạn chưa nhập mật khẩu mới';
            }
            if (empty($_POST['checkNewPass'])) {
                $errors['checkNewPass'] = 'Bạn chưa xác nhận lại mật khẩu';
            }
            if (!password_verify($oldPass, $userId['pass'])) {
                $errors['oldPass'] = 'Mật khẩu của bạn không đúng';
            } 
             if ($_POST['newPass'] !== $_POST['checkNewPass']) {
                $errors['checkNewPass'] = 'Mật khẩu không khớp với mật khẩu mới';
            }
            $_SESSION['errors'] = $errors;
            if (count($errors) > 0) {
                header("location:" . $_SERVER['HTTP_REFERER']);
                exit();
            }
            $updatePass = $this->addPass($_POST['checkNewPass']);
            if ($updatePass) {
                $_SESSION['user'] = $this->getUserId($_SESSION['user']['user_id']);
                $_SESSION['success'] = 'Cập nhập mật khẩu thành công';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                $_SESSION['error'] = 'Cập nhập mật khẩu thất bại';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
}
