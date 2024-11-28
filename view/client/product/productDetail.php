<?php include '../view/client/layout/header.php' ?>
<style>
    .tp-product-details-variation-list button.tp-size-variation-btn {
        width: 50px;
    }
</style>
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h1>Chi tiết sản phẩm</h1>
            <span><?= $productDetail['pro_name'] ?></span>
            <span><?= $productDetail['cate_name'] ?></span>
        </div>
    </div>
</div>
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">

                <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                    <nav>
                        <div class="nav nav-tabs flex-sm-column " id="productDetailsNavThumb" role="tablist">
                            <?php foreach ($productDetail['product_gallery_images'] as $key => $gallery) {  ?>
                                <button class="nav-link <?= $key === 0 ? 'active' : '' ?>" id="nav-<?= $key + 1 ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?= $key + 1 ?>" type="button" role="tab" aria-controls="nav-<?= $key + 1 ?>" aria-selected="<?= $key === 0 ? 'true' : 'false' ?>">
                                    <img src="./images/gallery_product/<?= $gallery ?>" alt="">
                                </button>
                            <?php } ?>

                        </div>
                    </nav>
                    <div class="tab-content m-img" id="productDetailsNavContent">
                        <?php foreach ($productDetail['product_gallery_images'] as $key => $gallery) {  ?>
                            <div class="tab-pane fade show <?= $key === 0 ? 'active' : '' ?>" id="nav-<?= $key + 1 ?>" role="tabpanel" aria-labelledby="nav-<?= $key + 1 ?>-tab" tabindex="0">
                                <div class="tp-product-details-nav-main-thumb ">
                                    <img src="./images/gallery_product/<?= $gallery ?>" width="530px" alt="">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 col-md-6">
                <form action="?act=addToCart-byNow" method="post">
                    <div class="product-details-content ml-70">
                        <input type="text" name="product_id" value="<?= $productDetail['pro_id'] ?>">
                        <p><?= $productDetail['cate_name'] ?></p>
                        <h1><?= $productDetail['pro_name'] ?></h1>
                        <div class="product-details-price">
                            <span class="old price-variants me-3"><?= number_format($productDetail['pro_price'] * 1000, 0, ',', '.') ?>đ</span>
                            <span class="sale-price-variants"><?= number_format($productDetail['pro_sale_price'] * 1000, 0, ',', '.') ?>đ </span>
                            <input type="hidden" name="variant_id" id="variant_id">
                        </div>
                        <div class="pro-details-rating-wrap">
                            <div class="pro-details-rating">
                                <i class="fa fa-star-o yellow"></i>
                                <i class="fa fa-star-o yellow"></i>
                                <i class="fa fa-star-o yellow"></i>
                                <i class="fa fa-star-o yellow"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <span><a href="#">0 Reviews</a></span>
                        </div>
                        <p class="mb-3"><?= $productDetail['pro_description'] ?></p>

                        <div class="tp-product-details-variation">
                            <!-- single item -->
                            <div class="tp-product-details-variation-item">
                                <h4 class="tp-product-details-variation-title">Color :</h4>
                                <div class="tp-product-details-variation-list">
                                    <?php foreach ($productDetail['variants'] as $variant) { ?>
                                        <button type="button" class="color tp-color-variation-btn btn-color" data-color="<?= $variant['variant_color_code'] ?>">
                                            <span data-bg-color="<?= $variant['variant_color_code'] ?>"
                                                style="background-color: <?= $variant['variant_color_code'] ?>;"
                                                class="border"></span>
                                        </button>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                        <div class="tp-product-details-variation">
                            <!-- single item -->
                            <div class="tp-product-details-variation-item">
                                <h4 class="tp-product-details-variation-title">Sizze :</h4>
                                <div class="tp-product-details-variation-list ">
                                    <?php foreach ($productDetail['variants'] as $variant) { ?>
                                        <button type="button"
                                            class="size tp-size-variation-btn btn-size"
                                            data-size="<?= $variant['variant_size'] ?>">
                                            <span><?= $variant['variant_size'] ?></span>
                                        </button>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <p class="quantity-variants">Quantity :</p>
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box quantity-variants" type="text" name="quantity" value="1">
                            </div>
                            <div class="pro-details-cart btn-hover">
                                <button name="add_to_cart" class="tp-product-details-add-to-cart-btn w-100">Thêm vào giỏ hàng</button>
                            </div>
                            <div class="pro-details-cart btn-hover">
                                <button name="buy-now" class="tp-product-details-add-to-cart-btn w-100">mua ngay</button>
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
                </form>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const colorButtons = document.querySelectorAll('.tp-color-variation-btn');
        colorButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Loại bỏ class active khỏi tất cả các nút
                colorButtons.forEach(btn => btn.classList.remove('active'));
                // Thêm class active vào nút được chọn
                this.classList.add('active');
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        const sizeButtons = document.querySelectorAll('.tp-size-variation-btn');
        sizeButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Loại bỏ class active khỏi tất cả các nút
                sizeButtons.forEach(btn => btn.classList.remove('active'));
                // Thêm class active vào nút được chọn
                this.classList.add('active');
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let selectedColor = null;
        let selectedSize = null;

        const variants = <?= json_encode($productDetail['variants']) ?>;
        console.log(variants);

        const colorButtons = document.querySelectorAll('.btn-color');
        const sizeButtons = document.querySelectorAll('.btn-size');


        //Sứ lý sự kiện khi chọn màu
        colorButtons.forEach(button => {
            button.addEventListener('click', function() {
                selectedColor = this.getAttribute('data-color');
                console.log(selectedColor);
                updateSize(); //Cập nhập kích thước khả dụng
                checkPrice(); //Kiểm tra giá tiền
            })
        })

        sizeButtons.forEach(button => {
            button.addEventListener('click', function() {
                selectedSize = this.getAttribute('data-size');
                console.log(selectedSize);
                updateColor(); //Cập nhập màu khả dụng
                checkPrice(); //Kiểm tra giá tiền
            })
        })

        function checkPrice() {
            if (selectedColor && selectedSize) {
                //hàm find trả vè phần tử đầu tiên trong mảng thỏa mãn điều kiện
                const matchedVariant = variants.find(variant =>
                    variant.variant_color_code === selectedColor && variant.variant_size === selectedSize
                );

                if (matchedVariant) {
                    document.querySelector('.price-variants').textContent = formatPrice(matchedVariant.variant_price);
                    document.querySelector('.sale-price-variants').textContent = formatPrice(matchedVariant.variant_sale_price);
                    document.querySelector('.quantity-variants').textContent = matchedVariant.variant_quantity;
                    document.getElementById('variant_id').value = matchedVariant.variant_id;
                } else {
                    document.querySelector('.price-variants').textContent = '';
                    document.querySelector('.sale-price-variants').textContent = 'Hết hàng';
                    document.querySelector('.quantity-variants').textContent = 0;
                    document.getElementById('variant_id').value = '';
                }
            }
        }

        //Cập nhập màu khả dụng
        function updateColor() {
            colorButtons.forEach(button => {
                const color = button.getAttribute('data-color');
                //kiểm tra kích thước size có màu này không
                const isAvailable = variants.some(variant =>
                    variant.variant_color_code === color && variant.variant_size === selectedSize);

            })
        }

        function updateSize() {
            sizeButtons.forEach(button => {
                const size = button.getAttribute('data-size')
                //kiểm tra kích thước size có màu này không
                const isAvailable = variants.some(variant =>
                    variant.variant_color_code === selectedColor && variant.variant_size === size);
                button.disabaled = !isAvailable; //Nếu không tồn tại thì không chọn đc
                if (!isAvailable) {
                    button.classList.remove('selected');
                }
            });
            selectedSize = null;
        }

        function formatPrice(price) {
            return new Intl.NumberFormat('vi-VN').format(price * 1000) + 'đ';
        }
    });
</script>

<?php include '../view/client/layout/footer.php' ?>