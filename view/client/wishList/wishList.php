<?php include '../view/client/layout/header.php' ?>

<div class="cart-main-area">
    <div class="container">
        <h3 class="cart-page-title">Sản phẩm Yêu thích</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="?act=update_cart" method="post">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>ảnh sản phẩm</th>
                                    <th>tên sản phẩm</th>
                                    <th>giá sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listWishList as $favorite) : ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="./images/product/<?= $favorite['image'] ?>" width="90" height="100"></a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="#"><?= $favorite['name'] ?></a>
                                        </td>
                                        <td class="product-price-cart"><span class="amount"><?= number_format($favorite['sale_price'] * 1000) ?>đ</span></td>
                                        <!-- <td><?= $car['var_color_name'] ?></td>
                                        <td><?= $car['var_size_name'] ?></td> -->
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" value="<?= $favorite['quantity'] ?>">
                                            </div>
                                        </td>
                                        <!-- <td class="product-subtotal">$110.00</td> -->
                                        <td class="product-remove">
                                            <a href="?act=product_detail&slug=<?= $favorite['slug'] ?>" class="tp-btn tp-btn-2 tp-btn-blue">Thêm vào giỏ hàng</a>
                                            <a href="#"><i class="fa fa-pencil"></i></a>
                                            <a href="?act=wishList-delete&fav_id=<?= $favorite['fav_id'] ?>"><i class="fa fa-times"></i></a>
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
                                    <a href="?act=cart">đến giỏ hàng</a>
                                    <!-- <a href="#">Xóa giỏ hàng</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../view/client/layout/footer.php' ?>