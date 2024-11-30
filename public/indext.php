<?php
session_start();

//==========Admin=========
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/ProductAdminController.php';
require_once '../controllers/admin/UserAdminController.php';
require_once '../controllers/admin/CouponAdminController.php';
require_once '../controllers/admin/OrderAdminController.php';
//==========clinet=========
require_once '../controllers/client/homeController.php';
require_once '../controllers/client/authControllerAdmin.php';
require_once '../controllers/client/profileController.php';
require_once '../controllers/client/orderController.php';


//==========Admin=========
$categoryAdmin = new CategoryAdminController();
$productAdmin = new ProductAdminController();
$userAdmin = new UserAdminController();
$couponAdmin = new CouponAdminController();
$orderAdmin = new OrderAdminController();

//==========clinet=========
$home = new homeController();
$auth = new authControllerAdmin();
$profile = new profileController;
$order = new orderController();


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

        // ============Order=============
    case 'order':
        $orderAdmin->listOrder();
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
        $auth->signIn();
        break;
    case 'register':
        $auth->createUser();
        break;
    case 'lognout':
        $auth->lognout();
        break;
    case 'profile':
        include '../view/client/profile/profile.php';
        break;
    case 'updatePass':
        $profile->passUpdate();
        break;
    case 'updateProfile':
        $profile->updateProfile();
        break;
    case 'product_detail':
        $home->getProductDetail();
        break;
        // ============CART=============
    case 'cart':
        include '../view/client/cart/list.php';
        break;

        // ============CHECKOUT=============
    case 'checkout':
       $order->checkout();
        break;
}
