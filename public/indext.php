<?php
session_start();


require_once '../controllers/admin/CategoryAdminController.php';
$action = isset($_GET['act']) ? $_GET['act'] : 'indext';
$categoryAdmin = new CategoryAdminController();

switch ($action) {
        // ============ADMIN=============
    case 'admin':
        include '../view/admin/indext.php';
        break;
    case 'product':
        include '../view/admin/product/list.php';
        break;
    case 'product_create':
        include '../view/admin/product/create.php';
        break;
    case 'product_edit':
        include '../view/admin/product/edit.php';
        break;
    case 'category':
        $categoryAdmin->index();
        break;
    case 'category_create':
        $categoryAdmin->addCategory();
        break;
    case 'category_edit':
        include '../view/admin/category/edit.php';

        break;


        // ============CLIENT=============
    case 'indext':
        include '../view/client/indext.php';
        break;
    case 'login':
        include '../view/client/auth/login.php';
        break;
    case 'regester':
        include '../view/client/auth/regester.php';
        break;
}
