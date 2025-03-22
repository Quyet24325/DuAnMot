<?php
session_start();

//==========Admin=========
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/ProductAdminController.php';
require_once '../controllers/admin/UserAdminController.php';
require_once '../controllers/admin/CouponAdminController.php';
require_once '../controllers/admin/OrderAdminController.php';
require_once '../controllers/admin/AuthAdminControllor.php';
//==========clinet=========
require_once '../controllers/client/homeController.php';
require_once '../controllers/client/cartController.php';
require_once '../controllers/client/authControllerAdmin.php';
require_once '../controllers/client/profileController.php';
require_once '../controllers/client/orderController.php';
require_once '../controllers/client/wishListController.php';
require_once '../controllers/client/shopController.php';


//==========Admin=========
$categoryAdmin = new CategoryAdminController();
$productAdmin = new ProductAdminController();
$userAdmin = new UserAdminController();
$couponAdmin = new CouponAdminController();
$orderAdmin = new OrderAdminController();
$authAdmin = new AuthAdminController();

//==========clinet=========
$home = new homeController();
$cart = new cartController();
$auth = new authControllerAdmin();
$profile = new profileController;
$order = new orderController();
$wishList = new wishListController();
$shop = new ShopController();

$action = isset($_GET['act']) ? $_GET['act'] : 'indext';
switch ($action) {
        // ============ADMIN=============
    case 'auth':
        $authAdmin->singin();
        break;
    case 'logout_admin':
        $authAdmin->logout();
        break;
    case 'admin':
        $authAdmin->middleware();
        include '../view/admin/indext.php';
        break;
    case 'product':
        $authAdmin->middleware();
        $productAdmin->indext();
        break;
    case 'product_create':
        $authAdmin->middleware();
        $productAdmin->createProduct();
        break;
    case 'product_postCreate':
        $authAdmin->middleware();
        $productAdmin->postCreate();
        break;
    case 'update_product':
        $authAdmin->middleware();
        $productAdmin->update();
        break;
    case 'product_edit':
        $authAdmin->middleware();
        $productAdmin->edit();
        break;
    case 'delete_image_gallery':
        $authAdmin->middleware();
        $productAdmin->delete_image_gallery();
        break;
    case 'delete_variant':
        $authAdmin->middleware();
        $productAdmin->delete_variant();
        break;
    case 'product_delete':
        $authAdmin->middleware();
        $productAdmin->deleteProduct();
        break;
    case 'category':
        $authAdmin->middleware();
        $categoryAdmin->index();
        break;
    case 'category_create':
        $authAdmin->middleware();
        $categoryAdmin->addCategory();
        break;
    case 'category_edit':
        $authAdmin->middleware();
        $categoryAdmin->updateCategory();

        break;
    case 'category_delete':
        $authAdmin->middleware();
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
    case 'edit_order':
        $orderAdmin->orderById();
        break;
    case 'update_order':
        $orderAdmin->update();
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
        $cart->index();
        break;
    case 'update_cart':
        $cart->update();
        break;
    case 'delete_cart':
        $cart->delete();
        break;
    case 'addToCart-byNow':
        $cart->addToCartOrByNow();
        break;


        // ============CHECKOUT=============
    case 'checkout':
        $order->indext();
        break;
    case 'place_order':
        $order->checkout();
        break;
    case 'track_order':
        $order->trackOrder();
        break;
    case 'track_order_detail':
        $order->trackOrderDetail();
        break;
    case 'cancel_order':
        $order->cancel();
        break;
    case 'wishList':
        $wishList->index();
        break;
    case 'wishList-add':
        $wishList->add();
        break;
    case 'wishList-delete':
        $wishList->delete();
        break;
    case 'shop':
        $shop->index();
        break;

    case 'vnpay_return':
        $order->vnpayReturn();
        break;
}
