<?php include '../view/admin/layout/header.php' ?>
<div class="page-body">
    <!-- All User Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Danh sách danh mục</h5>
                            <form class="d-inline-flex">
                                <a href="add-new-category.html"
                                    class="align-items-center btn btn-theme d-flex">
                                    Thêm mới
                                </a>
                            </form>
                        </div>

                        <div class="table-responsive category-table">
                            <div>
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="">
                                                    <label class="form-check-label" for="custumCheck1"></label>
                                                </div>
                                            </th>
                                            <th>Danh mục</th>
                                            <th>ID</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td style="width: 20px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="">
                                                    <label class="form-check-label" for="custumCheck"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category">
                                                    <div class="category_image">
                                                        <img src="admin/assets/images/product/3.png" width="80px" class="img-fluid" alt="">
                                                    </div>
                                                    <p>Danh mục 1</p>
                                                </div>
                                            </td>

                                            <td>
                                                <p>id</p>
                                            </td>

                                            <td>cookies</td>

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
    <!-- All User Table Ends-->
</div>
<?php include '../view/admin/layout/footer.php' ?>