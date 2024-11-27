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
                                            <th>Ảnh sản phẩm</th>
                                            <th>Ngày đặt</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Số lượng</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái đơn</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <a class="d-block">
                                                    <span class="order-image">
                                                        <img src="assets/images/product/1.png"
                                                            class="img-fluid" alt="users">
                                                    </span>
                                                </a>
                                            </td>

                                            <td>Jul 20, 2022</td>

                                            <td> 406-4883635</td>

                                            <td>Paypal</td>

                                            <td>$15</td>

                                            <td class="order-success">
                                                <span>Success</span>
                                            </td>   

                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="order-detail.html">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
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