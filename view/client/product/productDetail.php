<?php include '../view/client/layout/header.php' ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DNQ shop - Xin chào</title>
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
</head>

<body>

    <div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="#">Chi tiết sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details">
                        <div class="product-details-img">
                            <div class="tab-content jump">
                                <div id="shop-details-1" class="tab-pane large-img-style">
                                    <img src="./images/product/<?= $productDetail['pro_image'] ?>" alt="">
                                    <div class="img-popup-wrap">
                                        <a class="img-popup" href="./images/product/<?= $productDetail['pro_image'] ?>"><i class="pe-7s-expand1"></i></a>
                                    </div>
                                </div>
                                <div id="shop-details-2" class="tab-pane active large-img-style">
                                    <img src="./images/product/<?= $productDetail['pro_image'] ?>" alt="">
                                    <div class="img-popup-wrap">
                                        <a class="img-popup" href="./images/product/<?= $productDetail['pro_image'] ?>"><i class="pe-7s-expand1"></i></a>
                                    </div>
                                </div>
                                <div id="shop-details-3" class="tab-pane large-img-style">
                                    <img src="./images/product/<?= $productDetail['pro_image'] ?>" alt="">
                                    <div class="img-popup-wrap">
                                        <a class="img-popup" href="./images/product/<?= $productDetail['pro_image'] ?>"><i class="pe-7s-expand1"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-details-tab nav">
                                <a class="shop-details-overly" href="./images/product/<?= $productDetail['pro_image'] ?>" data-bs-toggle="tab">
                                    <img src="./images/product/<?= $productDetail['pro_image'] ?>" alt="">
                                </a>
                                <!-- <a class="shop-details-overly active" href="./images/product/<?= $productDetail['pro_image'] ?>" data-bs-toggle="tab">
                                <img src="./images/product/<?= $productDetail['pro_image'] ?>" alt="">
                            </a>
                            <a class="shop-details-overly" href="./images/product/<?= $productDetail['pro_image'] ?>" data-bs-toggle="tab">
                                <img src="./images/product/<?= $productDetail['pro_image'] ?>" alt="">
                            </a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-content ml-70">
                        <h2><?= $productDetail['pro_name'] ?></h2>
                        <div class="product-details-price">
                            <span class="old"><?= number_format($productDetail['pro_price'] * 1000, 0, ',', '.') ?>đ </span>-
                            <span><?= number_format($productDetail['pro_sale_price'] * 1000, 0, ',', '.') ?>đ </span>
                        </div>
                            <div class="pro-details-rating-wrap">
                                <div class="pro-details-rating">
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <span><a href="#">3 Reviews</a></span>
                            </div>
                        <p><?= $productDetail['pro_description'] ?></p>
                        <div class="pro-details-size-color">
                            <div class="pro-details-color-wrap">
                                <span>Color:</span>
                                
                                <div class="pro-details-color-content">
                                    <?php foreach ($productDetail['variants'] as  $varrian) : ?>
                                    <ul>
                                        <li class="blue"></li>
                                    </ul>
                                    <?php endforeach; ?>
                                </div>
                                
                            </div>
                            <div class="pro-details-size">
                                <span>capacity</span>
                                <div class="pro-details-size-content">
                                    <ul>
                                        <li><a href="#">64GB</a></li>
                                        <li><a href="#">128GB</a></li>
                                        <li><a href="#">264GB</a></li>
                                        <li><a href="#">512GB</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                            </div>
                            <div class="pro-details-cart btn-hover">
                                <a href="#">Thêm vào giỏ hàng</a>
                            </div>
                            <div class="pro-details-wishlist">
                                <a href="#"><i class="fa fa-heart-o"></i></a>
                            </div>
                            <div class="pro-details-compare">
                                <a href="#"><i class="pe-7s-shuffle"></i></a>
                            </div>
                        </div>
                        <div class="pro-details-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="description-review-area pb-90">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a data-bs-toggle="tab" href="#des-details1">Additional information</a>
                    <a class="active" data-bs-toggle="tab" href="#des-details2">Description</a>
                    <a data-bs-toggle="tab" href="#des-details3">Reviews (2)</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane active">
                        <div class="product-description-wrapper">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                            <p>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt </p>
                        </div>
                    </div>
                    <div id="des-details1" class="tab-pane ">
                        <div class="product-anotherinfo-wrapper">
                            <ul>
                                <li><span>Weight</span> 400 g</li>
                                <li><span>Dimensions</span>10 x 10 x 15 cm </li>
                                <li><span>Materials</span> 60% cotton, 40% polyester</li>
                                <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress</li>
                            </ul>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="review-wrapper">
                                    <div class="single-review">
                                        <div class="review-img">
                                            <img src="client/assets/img/testimonial/1.jpg" alt="">
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>White Lewis</h4>
                                                    </div>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="review-left">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-review child-review">
                                        <div class="review-img">
                                            <img src="client/assets/img/testimonial/2.jpg" alt="">
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>White Lewis</h4>
                                                    </div>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="review-left">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper euismod vehicula. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="ratting-form-wrapper pl-50">
                                    <h3>Add a Review</h3>
                                    <div class="ratting-form">
                                        <form action="#">
                                            <div class="star-box">
                                                <span>Your rating:</span>
                                                <div class="ratting-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="rating-form-style mb-10">
                                                        <input placeholder="Name" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="rating-form-style mb-10">
                                                        <input placeholder="Email" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="rating-form-style form-submit">
                                                        <textarea name="Your Review" placeholder="Message"></textarea>
                                                        <input type="submit" value="Submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="related-product-area pb-95">
        <div class="container">
            <div class="section-title text-center mb-50">
                <h2>Sản phẩm liên quan</h2>
            </div>
            <div class="related-product-active owl-carousel owl-dot-none">
                <div class="product-wrap">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img class="default-img" src="./images/product/<?= $productDetail['pro_image'] ?>" alt="">
                            <img class="hover-img" src="./images/product/<?= $productDetail['pro_image'] ?>" alt="">
                        </a>
                        <div class="product-action">
                            <div class="pro-same-action pro-wishlist">
                                <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                            </div>
                            <div class="pro-same-action pro-cart">
                                <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i>Thêm Sản phẩm</a>
                            </div>
                            <div class="pro-same-action pro-quickview">
                                <a title="Quick View" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h3><a href="#"><?= $productDetail['pro_name'] ?></a></h3>
                        <div class="product-rating">
                            <i class="fa fa-star-o yellow"></i>
                            <i class="fa fa-star-o yellow"></i>
                            <i class="fa fa-star-o yellow"></i>
                            <i class="fa fa-star-o yellow"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="product-price">
                            <span class="old"><?= number_format($productDetail['pro_price'] * 1, 0, ',', '.') ?>đ </span>
                            <span><?= number_format($productDetail['pro_sale_price'] * 1, 0, ',', '.') ?>đ </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All JS is here
============================================ -->

    <script src="client/assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <script src="client/assets/js/vendor/jquery-v3.6.0.min.js"></script>
    <script src="client/assets/js/vendor/jquery-migrate-v3.3.2.min.js"></script>
    <script src="client/assets/js/vendor/popper.min.js"></script>
    <script src="client/assets/js/vendor/bootstrap.min.js"></script>
    <script src="client/assets/js/plugins.js"></script>
    <!-- Ajax Mail -->
    <script src="client/assets/js/ajax-mail.js"></script>
    <!-- Main JS -->
    <script src="client/assets/js/main.js"></script>
</body>

</html>
<?php include '../view/client/layout/footer.php' ?>