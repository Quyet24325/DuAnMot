<?php
session_start();
session_destroy();
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/ProductAdminController.php';
require_once '../controllers/admin/UserAdminController.php';
require_once '../controllers/admin/CouponAdminController.php';
require_once '../controllers/client/homeController.php';
$categoryAdmin = new CategoryAdminController();
$productAdmin = new ProductAdminController();
$userAdmin = new UserAdminController();
$couponAdmin = new CouponAdminController();
$action = isset($_GET['act']) ? $_GET['act'] : 'indext';
//==========clinet=========
$home = new homeController();
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
    case 'product_delete':
        $productAdmin->deleteProduct();
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

        // ============User=============
    case 'user':
        $userAdmin->user();
        break;
    case 'edit_user':
        $userAdmin->edit();
        break;
    case 'update_role_user':
        $userAdmin->updateRole();
        break;


        // ============COUPONS=============
    case 'coupon':
        $couponAdmin->getAllCoupons();
        break;
    case 'createrVoucher':
        $couponAdmin->addCoupon();
        break;
    case 'editCoupon':
        $couponAdmin->update();
        break;
    case 'delete':
        $couponAdmin->delete();
        break;

        // ============CLIENT=============
    case 'indext':
        $home->index();
        break;
    case 'login':
        include '../view/client/auth/login.php';
        break;
    case 'regester':
        include '../view/client/auth/regester.php';
        break;
    case 'product_detail':
        $home->getProductDetail();
        break;
}
