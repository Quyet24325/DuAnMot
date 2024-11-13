<?php 
require_once '../modle/category.php';
class CategoryAdminController extends Category {
    public function index(){
        $listCategories = $this->listCategory();
        include '../view/admin/category/list.php';
    }
}
?>