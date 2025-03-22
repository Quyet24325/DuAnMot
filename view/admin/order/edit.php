<?php include '../view/admin/layout/header.php'; ?>
<!-- tracking section start -->
<div class="page-body">
    <!-- tracking table start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header title-header-block package-card">
                            <div>
                                <h5>Order: #<?= $detailById['detail_id'] ?></h5>
                            </div>
                            <div class="card-order-section">
                                <ul>
                                    <li><?= date('d-m-Y \a\t g:i a', strtotime($detailById['created_at'])) ?></li>
                                </ul>
                            </div>
                            <form action="indext.php?act=update_order&detail_id=<?= $detailById['detail_id'] ?>" method="post">
                                <div class="d-flex align-items-center mt-2">
                                    <select class="form-select" style="width: 150px;" aria-label="Default select example" name="status">
                                        <option value="Pending" <?= $detailById['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                        <option value="Confirmend" <?= $detailById['status'] == 'Confirmend' ? 'selected' : '' ?>>Confirmend</option>
                                        <option value="Shipped" <?= $detailById['status'] == 'Shipped' ? 'selected' : '' ?>>Shipped</option>
                                        <option value="Delivered" <?= $detailById['status'] == 'Delivered' ? 'selected' : '' ?>>Delivered</option>
                                        <option value="Canceled" <?= $detailById['status'] == 'Canceled' ? 'selected' : '' ?>>Canceled</option>
                                    </select>
                                    <button class="btn btn-primary ms-3" name="update_order">Edit</button>
                                </div>
                            </form>
                        </div>
                        <div class="bg-inner cart-section order-details-table">
                            <div class="row g-4">
                                <div class="col-xl-8">
                                    <div class="table-responsive table-details">
                                        <table class="table cart-table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th colspan="12">Thông tin của khách hàng </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="col">Tên Khách hàng</th>
                                                    <th scope="col">Số điện thoại</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Địa chỉ</th>
                                                    <th scope="col">Ghi chú</th>
                                                </tr>
                                                <tr>
                                                    <td><?= $orders[0]['name'] ?></td>
                                                    <td><?= $orders[0]['phone'] ?></td>
                                                    <td><?= $orders[0]['email'] ?></td>
                                                    <td><?= $orders[0]['address'] ?></td>
                                                    <td><?= $orders[0]['note'] ?></td>
                                                </tr>
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th colspan="12">Đơn hàng</th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($orderById as $order) : ?>
                                                <tbody>
                                                    <tr class="table-order">
                                                        <td>
                                                            <img src="./images/product/<?= $order['pro_image'] ?>" class="img-fluid blur-up lazyload" alt="">
                                                        </td>
                                                        <td>
                                                            <h5><?= $order['pro_name'] ?> x <?= $order['quantity'] ?></h5>
                                                            <p class="mt-3">Màu:<?= $order['var_color'] ?></p>
                                                            <p class="mt-1">Size:<?= $order['var_size'] ?></p>
                                                        </td>
                                                        <td>
                                                            <p>Giá tiền</p>
                                                            <h5><?= number_format($order['sale_price'] * 1000) ?>đ</h5>
                                                        </td>
                                                        <td>
                                                            <p>Tổng tiền</p>
                                                            <h5><?= number_format(($order['sale_price'] * $order['quantity']) * 1000) ?>đ</h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php endforeach ?>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="order-success">
                                        <div class="row g-4">
                                            <h4>Chi tiết hóa đơn</h4>
                                            <div class="card">
                                                <div class="card-body mb-1">
                                                    <span style="font-size: 18px;">Tổng tiền:</span>
                                                    <span class="float-end" style="font-size: 15px;"><?= number_format($detailById['amount'] * 1000) ?>đ</span>
                                                    <hr>
                                                </div>
                                                <div class="card-body mb-1">
                                                    <span style="font-size: 18px;">Giảm giá:</span>
                                                    <span class="float-end" style="font-size: 15px;"><?= number_format($handleCoupon * 1000) ?>đ</span>
                                                    <hr>
                                                </div>
                                                <div class="card-body mb-1">
                                                    <span style="font-size: 18px;">Phí giao Hàng:</span>
                                                    <span class="float-end" style="font-size: 15px;"><?= number_format($ships['price'] * 1000) ?>đ</span>
                                                    <hr>
                                                </div>
                                                <div class="card-body mb-1">
                                                    <span style="font-size: 18px;">Thành tiền:</span>
                                                    <span class="float-end" style="font-size: 15px;"><?= number_format(($ships['price'] + $detailById['amount'] - $handleCoupon) * 1000) ?>đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- section end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tracking table end -->
</div>
<!-- tracking section End -->
<?php include '../view/admin/layout/footer.php'; ?>