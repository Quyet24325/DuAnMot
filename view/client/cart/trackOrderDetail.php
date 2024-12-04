<?php include '../view/client/layout/header.php' ?>

<section class="tp-order-area pb-50">
    <div class="container">
        <div class="tp-order-inner">
            <div class="row gx-0">
                <div class="col-lg-6">
                    <div class="tp-order-details" data-bg-color="#4F3D97" style="background-color: rgb(22, 212, 222);">
                        <div class="tp-order-details-top text-center mb-70">
                            <div class="tp-order-details-icon">
                                <span>
                                    <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M46 26V51H6V26" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M51 13.5H1V26H51V13.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M26 51V13.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M26 13.5H14.75C13.0924 13.5 11.5027 12.8415 10.3306 11.6694C9.15848 10.4973 8.5 8.9076 8.5 7.25C8.5 5.5924 9.15848 4.00269 10.3306 2.83058C11.5027 1.65848 13.0924 1 14.75 1C23.5 1 26 13.5 26 13.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M26 13.5H37.25C38.9076 13.5 40.4973 12.8415 41.6694 11.6694C42.8415 10.4973 43.5 8.9076 43.5 7.25C43.5 5.5924 42.8415 4.00269 41.6694 2.83058C40.4973 1.65848 38.9076 1 37.25 1C28.5 1 26 13.5 26 13.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="tp-order-details-content">
                                <h3 class="tp-order-details-title">Thank you for your purchase!</h3>
                            </div>
                        </div>
                        <div class="tp-order-details-item-wrapper">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="tp-order-details-item">
                                        <h4>Ngày mua:</h4>
                                        <p><?= date('d-m-Y',strtotime($detailById['created_at'])) ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="tp-order-details-item">
                                        <h4>Mã đơn hàng:</h4>
                                        <p>#<?= $detailById['detail_id'] ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="tp-order-details-item">
                                        <h4>Thanh toán</h4>
                                        <p><?= $detailById['payment'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tp-order-info-wrapper">
                        <h4 class="tp-order-info-title">Chi tiết đơn hàng</h4>

                        <div class="tp-order-info-list">
                            <ul>

                                <!-- header -->
                                <li class="tp-order-info-list-header">
                                    <h4>Sản phẩm</h4>
                                    <h4>Thông tin</h4>
                                    <h4>Giá</h4>
                                </li>

                                <!-- item list -->
                                <?php foreach ($orderById as $order) { ?>
                                    <li class="tp-order-info-list-desc">
                                        <p><span><?= $order['pro_name'] ?> x <?= $order['quantity'] ?></span></p>
                                        <span>
                                            <p>Màu:<?= $order['var_color'] ?></p>
                                            <p>Dung lượng:<?= $order['var_size'] ?></p>

                                        </span>
                                        <span><?= number_format($order['sale_price'] * 1000) ?>đ</span>
                                    </li>
                                <?php  } ?>



                                <!-- subtotal -->
                                <?php if (!empty($coupons)) { ?>
                                    <li class="tp-order-info-list-subtotal">
                                        <span>Mã giảm giá</span>
                                        <span><?= number_format($handleCoupon * 1000) ?>đ</span>
                                    </li>
                                <?php  } ?>
                                <!-- shipping -->
                                <!-- shipping -->
                                <li class="tp-order-info-list-shipping">
                                    <span>Phí vận chuyển</span>
                                    <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                        <span>
                                            <span><?= $ships['name'] ?>: <?= number_format($ships['price'] * 1000) ?>đ</span>
                                        </span>
                                    </div>
                                </li>

                                <!-- total -->
                                <li class="tp-order-info-list-total">
                                    <span>Tổng tiền</span>
                                    <span><?= number_format(( $detailById['amount'] + $ships['price'] - $handleCoupon) * 1000) ?>đ</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../view/client/layout/footer.php' ?>