<?php include '../view/client/layout/header.php' ?>

<main>
    <div class="slider-area">
        <div class="slider-active owl-carousel nav-style-1 owl-dot-none">
            <div class="single-slider slider-height-1 bg-purple">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-single-img slider-animated-1">
                                <img class="animated" src="client/assets/img/slider/single-slide-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height-1 bg-purple">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-single-img slider-animated-1">
                                <img class="animated" src="client/assets/img/slider/single-slide-hm1-2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="suppoer-area pt-100 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="support-wrap mb-30 support-1">
                        <div class="support-icon">
                            <img class="animated" src="client/assets/img/icon-img/support-1.png" alt="">
                        </div>
                        <div class="support-content">
                            <h5>Miễn phí vận chuyển</h5>
                            <p>Miễn phí vận chuyển cho tất cả các đơn hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="support-wrap mb-30 support-2">
                        <div class="support-icon">
                            <img class="animated" src="client/assets/img/icon-img/support-2.png" alt="">
                        </div>
                        <div class="support-content">
                            <h5>Hỗ trợ 24/7</h5>
                            <p>Miễn phí vận chuyển cho tất cả các đơn hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="support-wrap mb-30 support-3">
                        <div class="support-icon">
                            <img class="animated" src="client/assets/img/icon-img/support-3.png" alt="">
                        </div>
                        <div class="support-content">
                            <h5>Hoàn tiền</h5>
                            <p>Miễn phí vận chuyển cho tất cả các đơn hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="support-wrap mb-30 support-4">
                        <div class="support-icon">
                            <img class="animated" src="client/assets/img/icon-img/support-4.png" alt="">
                        </div>
                        <div class="support-content">
                            <h5>Đặt hàng giảm giá</h5>
                            <p>Miễn phí vận chuyển cho tất cả các đơn hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pb-60">
        <div class="container">
            <div class="section-title text-center">
                <h2>ƯU ĐÃI HÀNG NGÀY!</h2>
            </div>
            <div class="product-tab-list nav pt-30 pb-55 text-center">
                <a class="active" href="#product-2" data-bs-toggle="tab">
                    <h4>Bán chạy nhất </h4>
                </a>
            </div>
            <div class="tab-content jump">
                <div class="tab-pane active" id="product-2">
                    <div class="row">
                        <?php foreach ($product as $pro) : ?>
                            
                            <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                                <div class="product-wrap mb-25">
                                    <div class="product-img">
                                        <a href="?act=product_detail&slug=<?= $pro['pro_slug'] ?>">
                                            <img src="./images/product/<?= $pro['pro_image'] ?>" alt="product-category">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-same-action pro-wishlist">
                                                <a title="Wishlist" href="wishlist.html"><i class="pe-7s-like"></i></a>
                                            </div>
                                            <div class="pro-same-action pro-cart">
                                                <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="pro-same-action pro-quickview">
                                                <a title="Quick View" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="?act=product_detail&slug=<?= $pro['pro_slug'] ?>"><?= $pro['pro_name'] ?></a></h3>
                                        <div class="product-rating">
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-price">
                                            <span class="old"><?= number_format($pro['pro_price'] * 1000, 0, ',', '.') ?>đ</span>
                                            <span><?= number_format($pro['pro_sale_price'] * 1000, 0, ',', '.') ?>đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-area pb-55">
        <div class="container">
            <div class="section-title text-center mb-55">
                <h2>BLOG CỦA CHÚNG TÔI</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-wrap mb-30 scroll-zoom">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="client/assets/img/blog/blog-1.jpg" alt=""></a>
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-content text-center">
                                <h3><a href="blog-details.html"></a></h3>
                                <span>By Shop <a href="#">Admin</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-wrap mb-30 scroll-zoom">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="client/assets/img/blog/blog-2.jpg" alt=""></a>
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-content text-center">
                                <h3><a href="blog-details.html">Lorem ipsum dolor sit <br> amet consec.</a></h3>
                                <span>By Shop <a href="#">Admin</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-wrap mb-30 scroll-zoom">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="client/assets/img/blog/blog-3.jpg" alt=""></a>
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-content text-center">
                                <h3><a href="blog-details.html">Lorem ipsum dolor sit <br> amet consec.</a></h3>
                                <span>By Shop <a href="#">Admin</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include '../view/client/layout/footer.php' ?>