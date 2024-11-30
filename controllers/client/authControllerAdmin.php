<?php
require_once '../modle/user.php';
class authControllerAdmin extends user
{

    public function createUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên của bạn.';
            }
            if (empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Vui lòng nhập email của bạn.';
            }
            if (empty($_POST['pass']) && strlen($_POST['pass']) < 6) {
                $errors['pass'] = 'Vui lòng nhập mật khẩu của tài khoản.Mật khẩu chứa ít nhất 6 ký tự';
            }

            $_SESSION['errors'] = $errors;
            if (count($errors) > 0) {
                header("location:" . $_SERVER['HTTP_REFERER']);
                exit();
            }
            $register = $this->register($_POST['name'], $_POST['email'], $_POST['pass']);
            if ($register) {
                $_SESSION['success'] = 'Tạo tài khoản thành công vui lòng đăng nhập';
                header('location:indext.php?act=login');
                exit();
            } else {
                $_SESSION['error'] = 'Tạo tài khoản thất bại';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        include '../view/client/auth/regester.php';
    }
    public function signIn()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $errors = [];
            if (empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Vui lòng nhập email của bạn.';
            }
            if (empty($_POST['pass']) && strlen($_POST['pass']) < 6) {
                $errors['pass'] = 'Vui lòng nhập mật khẩu của tài khoản.Mật khẩu chứa ít nhất 6 ký tự';
            }

            $_SESSION['errors'] = $errors;
            if (count($errors) > 0) {
                header("location:" . $_SERVER['HTTP_REFERER']);
                exit();
            }
            $login = $this->login($_POST['email'], $_POST['pass']);
            if ($login) {
                $_SESSION['user'] = $login;
                $_SESSION['success'] = 'Đăng nhập thành công';
                header('location:indext.php');
                exit();
            } else {
                $_SESSION['error'] = 'Đăng nhập thất bại';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        include '../view/client/auth/login.php';
    }
    public function lognout(){
       session_unset();
       session_destroy();
       header('location:indext.php?');
       exit();
    }
}
