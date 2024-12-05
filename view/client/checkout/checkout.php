<?php include '../view/client/layout/header.php' ?>




<!-- breadcrumb area start -->
<section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
   <div class="container">
      <div class="row">
         <div class="col-xxl-12">
            <div class="breadcrumb__content p-relative z-index-1">
               <h3 class="breadcrumb__title">Thanh toán</h3>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- breadcrumb area end -->

<!-- checkout area start -->
<form action="indext.php?act=place_order" method="post">
   <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
      <div class="container">
         <div class="row">
            <div class="col-lg-7  ">
               <div class="tp-checkout-bill-area border">
                  <h3 class="tp-checkout-bill-title">Chi tiết thanh toán</h3>

                  <div class="tp-checkout-bill-form">

                     <div class="tp-checkout-bill-inner">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="tp-checkout-input">
                                 <label>Họ và Tên<span>*</span></label>
                                 <input type="text" name="name" placeholder="Vui lòng nhập họ và tên" value="<?= $user['name'] ?>">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="tp-checkout-input">
                                 <label>Số điện thoại<span>*</span></label>
                                 <input type="tel" name="phone" placeholder="Vui lòng nhập số điện thoại" value="<?= $user['phone'] ?>">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="tp-checkout-input">
                                 <label>Email<span>*</span></label>
                                 <input type="email" name="email" placeholder="Vui lòng nhập email" value="<?= $user['email'] ?>">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="tp-checkout-input">
                                 <label>Địa chỉ<span>*</span></label>
                                 <input type="text" name="address" placeholder="Vui lòng nhập địa chỉ" value="<?= $user['address'] ?>">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="tp-checkout-input">
                                 <label>Ghi chú</label>
                                 <textarea name="note" placeholder="Vui lòng nhập ghi chú của bạn."></textarea>
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
            <div class="col-lg-5">
               <!-- checkout place order -->
               <div class="tp-checkout-place white-bg border">
                  <h3 class="tp-checkout-place-title">Đơn hàng của bạn</h3>

                  <div class="tp-order-info-list">
                     <ul>

                        <!-- header -->
                        <li class="tp-order-info-list-header">
                           <h4>Sản phẩm</h4>
                           <h4>Giá tiền</h4>
                        </li>

                        <!-- item list -->
                        <?php foreach ($carts as $cart) { ?>
                           <li class="tp-order-info-list-desc">
                              <p><?= $cart['pro_name'] ?> <span> x <?= $cart['quantity'] ?></span></p>
                              <span><?= number_format($cart['pro_var_sale_price'] * 1000) ?>đ</span>
                           </li>
                        <?php } ?>

                        <!-- subtotal -->
                        <li class="tp-order-info-list-subtotal">
                           <span>Giá tiền</span>
                           <input type="hidden" name="amount" value="<?= $_SESSION['total'] ?>">
                           <span><?= number_format($_SESSION['total'] * 1000) ?>đ</span>
                        </li>
                        <?php if (isset($_SESSION['coupon'])) { ?>
                           <li class="tp-order-info-list-subtotal">
                              <input type="hidden" name="cou_id" value="<?= $_SESSION['coupon']['cou_id'] ?>">
                              <span>Mã giảm giá</span>
                              <span>-<?= number_format($_SESSION['totalCoupon'] * 1000) ?>đ</span>
                           </li>
                        <?php } ?>
                        <!-- shipping -->
                        <li class="tp-order-info-list-shipping">
                           <span>Dịch vụ giao hàng</span>
                           <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                              <?php foreach ($ships as $key => $ship) { ?>
                                 <span>
                                    <input id="flat_rate_<?= $key + 1 ?>" type="radio" name="ship_id" value="<?= $ship['ship_id'] ?>">
                                    <label for="flat_rate_<?= $key + 1 ?>"><?= $ship['name'] ?> <span><?= number_format($ship['price'] * 1000) ?>đ</span></label>
                                 </span>
                              <?php } ?>

                           </div>
                        </li>

                        <!-- total -->
                        <?php if (isset($_SESSION['coupon'])) { ?>
                           <li class="tp-order-info-list-total">
                              <span>Thành tiền</span>
                              <span><?= number_format(($_SESSION['total'] - ($_SESSION['totalCoupon'] ?? 0)) * 1000) ?>đ</span>
                           </li>
                        <?php } else { ?>
                           <li class="tp-order-info-list-total">
                              <span>Thành tiền</span>
                              <span><?= number_format(($_SESSION['total'] ?? 0) * 1000) ?>đ</span>
                           </li>
                        <?php } ?>
                     </ul>
                  </div>
                  <div class="tp-checkout-payment">
                     <div class="tp-checkout-payment-item">
                        <input type="radio" id="cod" name="payment" value="COD">
                        <label for="cod">COD</label>
                     </div>
                     <div class="tp-checkout-payment-item">
                        <input type="radio" id="VNPAY" name="payment" value="VNPAY">
                        <label for="VNPAY">VNPAY</label>
                     </div>
                  </div>
                  <div class="tp-checkout-btn-wrapper">
                     <button type="submit" name="place_order" class="tp-checkout-btn w-100">Thanh toán</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</form>
<!-- checkout area end -->




<?php
unset($_SESSION['errors']);
include '../view/client/layout/footer.php' ?>