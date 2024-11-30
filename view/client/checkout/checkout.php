<?php include '../view/client/layout/header.php' ?>


<main>

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
   <form action="" method="post">
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
                                    <input type="text" name="name" placeholder="Vui lòng nhập họ và tên" value="<?=$user['name']?>" >
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="tp-checkout-input">
                                    <label>Số điện thoại<span>*</span></label>
                                    <input type="tel" name="phone" placeholder="Vui lòng nhập số điện thoại" value="<?=$user['phone']?>">
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="tp-checkout-input">
                                    <label>Email<span>*</span></label>
                                    <input type="email" name="email" placeholder="Vui lòng nhập email" value="<?=$user['email']?>">
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="tp-checkout-input">
                                    <label>Địa chỉ<span>*</span></label>
                                    <input type="text" name="address" placeholder="Vui lòng nhập địa chỉ" value="<?=$user['address']?>">
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
                           <li class="tp-order-info-list-desc">
                              <p>Xiaomi Redmi Note 9 Global V. <span> x 2</span></p>
                              <span>$274:00</span>
                           </li>


                           <!-- subtotal -->
                           <li class="tp-order-info-list-subtotal">
                              <span>Giá tiền</span>
                              <span>$507.00</span>
                           </li>

                           <!-- shipping -->
                           <li class="tp-order-info-list-shipping">
                              <span>Mã giảm giá</span>
                              <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                 <span>
                                    <input id="flat_rate" type="radio" name="shipping">
                                    <label for="flat_rate">Flat rate: <span>$20.00</span></label>
                                 </span>
                                 <span>
                                    <input id="local_pickup" type="radio" name="shipping">
                                    <label for="local_pickup">Local pickup: <span>$25.00</span></label>
                                 </span>
                                 <span>
                                    <input id="free_shipping" type="radio" name="shipping">
                                    <label for="free_shipping">Free shipping</label>
                                 </span>
                              </div>
                           </li>

                           <!-- total -->
                           <li class="tp-order-info-list-total">
                              <span>Thành tiền</span>
                              <span>$1,476.00</span>
                           </li>
                        </ul>
                     </div>
                     <div class="tp-checkout-payment">
                        <div class="tp-checkout-payment-item">
                           <input type="radio" id="cod" name="payment">
                           <label for="cod">Cash on Delivery</label>
                           <div class="tp-checkout-payment-desc cash-on-delivery">
                              <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                           </div>
                        </div>
                        <div class="tp-checkout-payment-item paypal-payment">
                           <input type="radio" id="paypal" name="payment">
                           <label for="paypal">PayPal <img src="assets/img/icon/payment-option.png" alt=""> <a href="#">What is PayPal?</a></label>
                        </div>
                     </div>
                     <div class="tp-checkout-btn-wrapper">
                        <a href="#" class="tp-checkout-btn w-100">Thanh toán</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </form>
   <!-- checkout area end -->


</main>

<?php
unset($_SESSION['errors']);
include '../view/client/layout/footer.php' ?>