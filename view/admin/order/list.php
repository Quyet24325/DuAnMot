<?php include '../view/admin/layout/header.php'; ?>
<div class="page-body">
    <!-- Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Danh sách đơn hàng</h5>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package order-table theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Ngày đặt</th>
                                            <th>Trạng thái đơn</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($orders as $order) { ?>
                                            <tr data-bs-toggle="offcanvas" href="#order-details">
                                                <td>#<?= $order['detail_id'] ?></td>
                                                <td><?= number_format($order['amount'] * 1000) ?>đ</td>

                                                <td><?= date('d-M-Y', strtotime($order['created_at'])) ?></td>
                                                <?php if ($order['status'] == 'Canceled') { ?>
                                                    <td class="order-danger">
                                                        <span><?= $order['status'] ?></span>
                                                    </td>
                                                <?php } else { ?>
                                                    <td class="<?= $order['status'] == 'Pending' ? 'order-pending' : 'order-success' ?>">
                                                        <span><?= $order['status'] ?></span>
                                                    </td>
                                                <?php } ?>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="indext.php?act=edit_order&id=<?= $order['detail_id'] ?>">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="indext.php?act=edit_order&id=<?= $order['detail_id'] ?>">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
</div>
<?php include '../view/admin/layout/footer.php'; ?>