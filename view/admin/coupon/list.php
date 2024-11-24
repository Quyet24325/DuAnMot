<?php include '../view/admin/layout/header.php'; ?>
<div class="page-body-wrapper">

    <!-- Coupon list table starts-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Coupon List</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a class="btn btn-solid" href="indext.php?act=createrVoucher">Tạo mới voucher</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table all-package coupon-list-table table-hover theme-table"
                                        id="table_id">
                                        <thead>
                                            <tr>
                                                <th>Tên phiếu giảm giá</th>
                                                <th>Loại phiếu</th>
                                                <th>Code</th>
                                                <th>Ngày bắt đầu</th>
                                                <th>Ngày kết thúc</th>
                                                <th>Số lượng</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($getCoupon as $coupon) { ?>
                                                <tr>
                                                    <td><?= $coupon['name'] ?></td>
                                                    <td ><?= $coupon['type'] ?></td>
                                                    <td><?= $coupon['coupon_code'] ?></td>
                                                    <td><?= $coupon['star_date'] ?></td>
                                                    <td><?= $coupon['end_date'] ?></td>
                                                    <td><?= $coupon['quantity'] ?></td>
                                                    <td class="menu-status">
                                                        <span class="<?= $coupon['status'] == 'Hidden' ? 'danger' :'success' ?>"><?= $coupon['status'] ?></span>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="indext.php?act=editCoupon&id=<?= $coupon['cou_id'] ?>">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="indext.php?act=delete&id=<?= $coupon['cou_id'] ?>"  onclick="return confirm('Bạn có muốn xóa coupon này không?')">
                                                                    <i class="ri-delete-bin-line"></i>
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
                        <!-- Pagination End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->


    </div>
</div>
<?php include '../view/admin/layout/footer.php'; ?>