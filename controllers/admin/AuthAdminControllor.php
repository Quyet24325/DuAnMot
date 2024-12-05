<?php
require_once '../modle/user.php';
class AuthAdminController extends user
{
    public function isAdmin()
    {
        return isset($_SESSION['user_admin']) && $_SESSION['user_admin']['role_id'] == 1;
    }

    public function middleware()
    {
        if (!$this->isAdmin()) {
            $_SESSION['error'] = 'Bạn không có quyền truy cập vào trang quản trị.Vui lòng đăng nhập';
            header('location: indext.php?act=auth');
            exit();
        } else {
            return true;
        }
    }
    public function singin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['auth'])) {
            $errors = [];
            if (empty($_POST['email'])) {
                $errors['email'] = 'Vui lòng nhập email của bạn.';
            }
            if (empty($_POST['pass'])) {
                $errors['pass'] = 'Vui lòng nhập mật khẩu của tài khoản';
            }
            $_SESSION['errors'] = $errors;
            if (count($errors) > 0) {
                header("location:" . $_SERVER['HTTP_REFERER']);
                exit();
            }
            $auth = $this->authAdmin($_POST['email'], $_POST['pass']);
           
            
            if ($auth) {
                $_SESSION['user_admin'] = $auth;
                $_SESSION['success'] = 'Đăng nhập thành công';
                header('location: indext.php?act=admin');
                exit();
            } else {
                $_SESSION['error'] = 'Tài khoản của bạn không có quyền truy cập vào trang quản trị';
                header('location: indext.php');
                exit();
            }
        }
        include '../view/admin/auth/auth.php';
    }
    public function logout(){
        unset($_SESSION['user_admin']);
        header('location: indext.php?act=auth');
        exit();
    }
}
