<?php include '../view/admin/layout/header.php'; ?>
<div class="page-body-wrapper">
    <!-- Create Coupon Table start -->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <form action="indext.php?act=createrVoucher" method="post">
                    <div class="col-sm-12" class="theme-form theme-form-2 mega-form">
                        <div class="card">
                            <div class="card-body">
                                <div class="title-header option-title">
                                    <h5>Tạo mới Voucher</h5>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="form-label-title col-lg-2 col-md-3 mb-0">Tên mã giảm giá</label>
                                                <div class="col-md-9 col-lg-10">
                                                    <input class="form-control" type="text" name="name_coupon">
                                                </div>
                                                <?php if (isset($_SESSION['errors']['name_coupon'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['name_coupon'] ?></p>
                                                <?php } ?>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="form-label-title col-lg-2 col-md-3 mb-0">Loại giảm giá</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control" name="type">
                                                        <option value="">Chọn loại cho phiếu giảm giá </option>
                                                        <!-- <option value="Free Shipping">Free Shipping</option> -->
                                                        <option value="Percentage">Theo phần trăm</option>
                                                        <option value="Fixed Amount">Giá cố định</option>
                                                        <!-- <option value="Amount">Giảm theo giá tiền</option> -->
                                                    </select>
                                                </div>
                                                <?php if (isset($_SESSION['errors']['type'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['type'] ?></p>
                                                <?php } ?>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="form-label-title col-lg-2 col-md-3 mb-0">Giá trị giảm</label>
                                                <div class="col-md-9 col-lg-10">
                                                    <input class="form-control" type="text" name="coupon_value" placeholder="Nhập giá trị giảm">
                                                </div>
                                                <?php if (isset($_SESSION['errors']['coupon_value'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['coupon_value'] ?></p>
                                                <?php } ?>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Mã giảm giá</label>
                                                <div class="col-md-9 col-lg-10">
                                                    <input class="form-control" type="text" name="coupon_code">
                                                </div>
                                                <?php if (isset($_SESSION['errors']['coupon_code'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['coupon_code'] ?></p>
                                                <?php } ?>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Ngày bắt đầu</label>
                                                <div class="col-md-9 col-lg-2">
                                                    <input class="form-control" type="date" name="star_date">
                                                </div>
                                                <?php if (isset($_SESSION['errors']['star_date'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['star_date'] ?></p>
                                                <?php } ?>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Ngày kết thúc</label>
                                                <div class="col-md-9 col-lg-2">
                                                    <input class="form-control" type="date" name="end_date">
                                                </div>
                                                <?php if (isset($_SESSION['errors']['end_date'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['end_date'] ?></p>
                                                <?php } ?>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Số lượng</label>
                                                <div class="col-md-9 col-lg-10">
                                                    <input class="form-control" type="number" name="quantity">
                                                </div>
                                                <?php if (isset($_SESSION['errors']['quantity'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['quantity'] ?></p>
                                                <?php } ?>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="col-sm-2 col-form-label form-label-title">Trạng thái</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name="status">
                                                        <option value="">Chọn trạng thái</option>
                                                        <option value="Hidden">Ẩn</option>
                                                        <option value="Active">Hiện</option>
                                                        <option value="Future Plan">Future</option>
                                                    </select>
                                                </div>
                                                <?php if (isset($_SESSION['errors']['status'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['status'] ?></p>
                                                <?php } ?>
                                            </div>
                                            <div class="card">
                                                <div class=" row align-items-center">
                                                    <div class="col-sm-3">
                                                        <button type="submit" name="addCoupon" class="btn btn-primary">Thêm mã giảm giá</button>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <a class="btn btn-primary " href="indext.php?act=coupon">Quay lại</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Create Coupon Table End -->
</div>
<?php 
unset($_SESSION['errors']);  
include '../view/admin/layout/footer.php'; ?>