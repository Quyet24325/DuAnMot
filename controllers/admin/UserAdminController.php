<?php

require_once "../modle/user.php";
class UserAdminController extends user
{
    public function user()
    {
        $list_user = $this->listUsser();
        include '../view/admin/user/list.php';
    }
    public function edit()
    {
        $getUser = $this->getUserId($_GET['id']);
        $roleUsser = $this->getRole();
        include '../view/admin/user/edit.php';
        // echo "<pre>";
        // print_r($getUser);
        // echo "</pre>";
    }
    public function updateRole()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_role_user'])) {
            $roleUpdate =  $this->addRole($_POST['role_id'],$_GET['id'] );
            $_SESSION['success'] = "Cập nhập thành công";
            header("location:indext.php?act=user");
            exit();
        }else {
            $_SESSION['errors'] = "Cập nhập thất bại.";
            header("location:" . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
