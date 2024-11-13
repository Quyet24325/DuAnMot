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
                                <a href="indext.php?act=category_create" class="btn btn-primary">Thêm mới</a>
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
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Danh mục</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($listCategories as $category) { ?>
                                            <tr>
                                                <td style="width: 20px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="">
                                                        <label class="form-check-label" for="custumCheck"></label>
                                                    </div>
                                                </td>
                                                <td><?= $category['cate_id'] ?></td>
                                                <td>
                                                    <div class="category">
                                                        <div class="category_image">
                                                            <img src="admin/assets/images/product/3.png" width="80px" class="img-fluid" alt="">
                                                        </div>
                                                        <p><?= $category['name'] ?></p>
                                                    </div>
                                                </td>

                                                <td><?= $category['status'] ?></td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="indext.php?act=category_detail&id=<?= $category['cate_id'] ?>">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="indext.php?act=category_edit&id=<?= $category['cate_id'] ?>">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="indext.php?act=category_delete&id=<?= $category['cate_id'] ?>" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalToggle">
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
                </div>
            </div>
        </div>
    </div>
    <!-- All User Table Ends-->
</div>
<?php include '../view/admin/layout/footer.php' ?>