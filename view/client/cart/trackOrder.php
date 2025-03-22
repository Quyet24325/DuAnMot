<?php include '../view/client/layout/header.php' ?>

<div class="cart-main-area pb-50">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">

            <form action="#">
                <div class="table-content table-responsive cart-table-content">
                    <table class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Giá tiền</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($_SESSION['user'])) { ?>
                                <?php foreach ($orders as $order) { ?>
                                    <tr>
                                        <td>#<?= $order['detail_id'] ?></td>
                                        <td><?= number_format($order['amount'] * 1000) ?>đ</td>
                                        <td><?= $order['status'] ?></td>
                                        <td class="product-wishlist-cart">
                                            <a href="indext.php?act=track_order_detail&id=<?= $order['detail_id'] ?>">Chi tiết</a>
                                            <?php if ($order['status'] == 'Pending' || $order['status'] == 'Confirmend') { ?>
                                                <button class="btn btn-danger"><a onclick="return confirm('Bạn có muốn hủy đơn hàng này không')" href="indext.php?act=cancel_order&detail_id=<?= $order['detail_id'] ?>">Hủy đơn hàng</a></button>
                                            <?php } ?>

                                        </td>

                                    </tr>
                                <?php } ?>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include '../view/client/layout/footer.php' ?>