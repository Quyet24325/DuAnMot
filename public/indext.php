<?php
session_start();
session_destroy();
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/ProductAdminController.php';
$categoryAdmin = new CategoryAdminController();
$productAdmin = new ProductAdminController();
$action = isset($_GET['act']) ? $_GET['act'] : 'indext';
switch ($action) {
        // ============ADMIN=============
    case 'admin':
        include '../view/admin/indext.php';
        break;
    case 'product':
        $productAdmin->indext();
        break;
    case 'product_create':
        $productAdmin->createProduct();
        break;
    case 'product_postCreate':
        $productAdmin->postCreate();
        break;
    case 'update_product':
        $productAdmin->update();
        break;
    case 'product_edit':
        $productAdmin->edit();
        break;
    case 'delete_image_gallery':
        $productAdmin->delete_image_gallery();
        break;
    case 'delete_variant':
        $productAdmin->delete_variant();
        break;
    case 'category':
        $categoryAdmin->index();
        break;
    case 'category_create':
        $categoryAdmin->addCategory();
        break;
    case 'category_edit':
        $categoryAdmin->updateCategory();

        break;
    case 'category_delete':
        $categoryAdmin->deleteCategory();
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
