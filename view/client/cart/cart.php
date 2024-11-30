<?php include '../view/client/layout/header.php' ?>

<div class="cart-main-area pt-90 pb-100">
    <div class="container">
        <h3 class="cart-page-title">Sản phẩm trong giỏ hàng</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="?act=update_cart" method="post">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>ảnh</th>
                                    <th>tên sản phẩm</th>
                                    <th>giá sản phẩm</th>
                                    <th>Màu</th>
                                    <th>size</th>
                                    <th>Số lượng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cart as $car) : ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="./images/product/<?= $car['pro_image'] ?>" width="90" height="100"></a>
                                        </td>
                                        <td class="product-name"><a href="#"><?= $car['pro_name'] ?></a></td>
                                        <td class="product-price-cart"><span class="amount"><?= number_format($car['pro_var_price'] * 1000) ?>đ</span></td>
                                        <td><?= $car['var_color_name'] ?></td>
                                        <td><?= $car['var_size_name'] ?></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="quantity[<?= $car['cart_id'] ?>]" value="<?= $car['quantity'] ?>">
                                            </div>
                                        </td>
                                        <!-- <td class="product-subtotal">$110.00</td> -->
                                        <td class="product-remove">
                                            <a href="#"><i class="fa fa-pencil"></i></a>
                                            <a href="?act=delete_cart&cart_id=<?= $car['cart_id'] ?>"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <!-- <div class="cart-shiping-update">
                                    <a href="#">Tiếp tục mua sắm</a>
                                </div> -->
                                <div class="cart-clear">
                                    <button type="submit" name="update_cart">Cập nhật giỏ hàng</button>
                                    <!-- <a href="#">Xóa giỏ hàng</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="cart-tax">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Ước tính chi phí vận chuyển và thuế</h4>
                                </div>
                                <div class="tax-wrapper">
                                    <p>Nhập điểm đến của bạn để nhận được ước tính chi phí vận chuyển.</p>
                                    <div class="tax-select-wrapper">
                                        <div class="tax-select">
                                            <label>
                                                *Thành phố
                                            </label>
                                            <select class="email s-email s-wid">
                                                <option>Hà Nội</option>
                                                <option>HCM</option>
                                                <option>Thanh Hóa</option>
                                                <option>Hải Dương</option>
                                                <option>Thái Bình</option>
                                            </select>
                                        </div>
                                        <div class="tax-select">
                                            <label>
                                                * Region / State
                                            </label>
                                            <select class="email s-email s-wid">
                                                <option>Bangladesh</option>
                                                <option>Albania</option>
                                                <option>Åland Islands</option>
                                                <option>Afghanistan</option>
                                                <option>Belgium</option>
                                            </select>
                                        </div>
                                        <div class="tax-select">
                                            <label>
                                                * Zip/Postal Code
                                            </label>
                                            <input type="text">
                                        </div>
                                        <button class="cart-btn-2" type="submit">Chấp nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="cart-tax">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Sử dụng mã giảm giá</h4>
                                </div>
                                <div class="tax-wrapper">
                                    <p>Nhập mã phiếu giảm giá nếu bạn có.</p>
                                        <input type="text" name="coupon_code" placeholder="Nhập mã phiếu giảm giá">
                                        <button class="btn btn-outline-primary cart-btn-2" type="submit" name="apply_coupon">Áp dụng phiếu giảm giá</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Tổng số giỏ hàng</h4>
                                </div>
                                <h5>Tổng số sản phẩm <span><?= number_format($sum * 1000) ?>đ</span></h5>
                                <div class="total-shipping">
                                <h5>mã giảm giá <span><?= number_format($_SESSION['totalCoupon'] * 1000) ?>đ</span></h5>
                                <div class="total-shipping">
                                    <h5>Tổng chi phí vận chuyển</h5>
                                    <ul>
                                        <li><input type="checkbox"> Standard <span>$20.00</span></li>
                                        <li><input type="checkbox"> Express <span>$30.00</span></li>
                                    </ul>
                                </div>
                                <h4 class="grand-totall-title">Tổng cộng <span><?= number_format(($sum-$_SESSION['totalCoupon'] )* 1000) ?>đ</span></h4>
                                <a href="#">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../view/client/layout/footer.php' ?>