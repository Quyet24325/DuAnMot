<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/flone/flone/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Nov 2024 12:22:28 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>QND Xin chào</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="client/assets/img/favicon.png">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="client/assets/css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="client/assets/css/icons.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="client/assets/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="client/assets/css/style.css">
    <link rel="stylesheet" href="client/assets/css/main.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<script type='text/javascript'>
        toastr.warning('{$_SESSION['error']}');
        </script>";

        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo "<script type='text/javascript'>
        toastr.success('{$_SESSION['success']}');
        </script>";
        unset($_SESSION['success']);
    }
    ?>

    <header class="header-area header-padding-1 sticky-bar header-res-padding clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-6 col-4">
                    <div class="logo">
                        <a href="indext.php">
                            <!-- <img alt="" src="client/assets/img/logo/logo.png"> -->
                            <h1>QND</h1>
                        </a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li><a href="indext.php">Trang chủ </a></li>
                                <li><a href="shop.html">Giới Thiệu</a></li>
                                <li><a href="shop.html"> Sản phẩm <i class="fa fa-angle-down"></i> </a>
                                    <ul class="mega-menu">
                                        <li>
                                            <ul>
                                                <li class="mega-menu-title"><a href="#">Hãng sản xuất</a></li>
                                                <li><a href="shop.html">SamSung</a></li>
                                                <li><a href="shop-filter.html">ViVo</a></li>
                                                <li><a href="shop-grid-2-col.html">Xiaomi</a></li>
                                                <li><a href="shop-no-sidebar.html">Redmi</a></li>
                                                <li><a href="shop-grid-fw.html">OPPO </a></li>
                                                <li><a href="shop-right-sidebar.html">OnePlus</a></li>
                                                <li><a href="shop-list.html">Realme </a></li>
                                                <li><a href="shop-list-fw.html">Asus (ROG Phone) </a></li>
                                                <li><a href="shop-list-fw-2col.html">Tecno</a></li>
                                                <li><a href="shop-list-fw-2col.html">Iphone</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li class="mega-menu-img"><a href="shop.html"><img src="client/assets/img/banner/iphone-16.jpg" alt=""></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="contact.html"> Liên hệ</a></li>
                                <li><a href="indext.php?act=track_order"> Đơn hàng</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-8">
                    <div class="header-right-wrap">
                        <div class="same-style header-search">
                            <a class="search-active" href="#"><i class="pe-7s-search"></i></a>
                            <div class="search-content">
                                <form action="?act=shop" method="post">
                                    <input type="text" name="keyword" placeholder="Search" />
                                    <button class="button-search" name="search"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="same-style account-satting">

                            <?php if (!isset($_SESSION['user'])) { ?>
                                <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                                <div class="account-dropdown">
                                    <ul>
                                        <li><a href="indext.php?act=login">Đăng nhập</a></li>
                                        <li><a href="indext.php?act=register">Đăng ký</a></li>
                                    </ul>
                                </div>
                                <?php } else  if ($_SESSION['user']['role_id'] == 1) { ?>
                                    <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                                    <div class="account-dropdown">
                                        <ul>
                                            <li>Hello,<?= $_SESSION['user']['name'] ?></li>
                                            <li><a href="indext.php?act=admin">Trang quản lý</a></li>
                                            <li><a href="indext.php?act=profile">Tài khoản</a></li>
                                            <li><a href="indext.php?act=lognout">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                <?php } else { ?>
                                    <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                                    <div class="account-dropdown">
                                        <ul>
                                            <li>Hello,<?= $_SESSION['user']['name'] ?></li>  
                                            <li><a href="indext.php?act=profile">Tài khoản</a></li>
                                            <li><a href="indext.php?act=lognout">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                <?php } ?>
                        </div>
                        <div class="same-style header-wishlist">
                            <a href="?act=wishList"><i class="pe-7s-like"></i></a>
                        </div>
                        <div class="same-style cart-wrap">
                            <a href="?act=cart" class="icon-cart">
                                <i class="pe-7s-shopbag"></i>
                                <!-- <span class="count-style">02</span> -->
                            </a>
                        </div>
                    </div>
    </header>