<?php

require_once '../modle/category.php';
class CategoryAdminController extends Category
{
    public function index()
    {
        $listCategories = $this->listCategory();
        include '../view/admin/category/list.php';
    }

    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['createCategory'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên danh mục';
            }
            if (empty($_POST['status'])) {
                $errors['status'] = 'Vui lòng chọn trạng thái';
            }
            if (empty($_POST['description'])) {
                $errors['description'] = 'Vui lòng nhập mô tả ';
            }
            if (!isset($_FILES['image']) || $_FILES['image']['errors'] !== UPLOAD_ERR_OK) {
                $errors['image'] = 'Vui lòng chọn một file ảnh hợp lệ';
            }
            $_SESSION['errors'] = $errors;

            $upload = './images/category/' . $_FILES['image']['name'];
            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload)) {  
                $images = $upload;
                $createCategory = $this->create($_POST['name'], $images, $_POST['status'], $_POST['description']);
                if ($createCategory) {
                    $_SESSION['success'] = 'Thêm danh mục thành công';
                    header("Location:indext.php?act=category");
                    exit();
                } else {
                    $_SESSION['errors'] = 'Thêm danh mục thất bại';
                    header("Location:" . $_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
        }
        include '../view/admin/category/create.php';
    }
}
