<?php include '../view/admin/layout/header.php' ?>
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title d-sm-flex d-block">
                            <h5>Products List</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a class="btn btn-solid" href="indext.php?act=product_create">Thêm sản phẩm</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package theme-table table-product" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Ảnh sản phẩm</th>
                                            <th>Tên sản phẩm và biến thể</th>
                                            <th>Danh mục</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Khuyến mại</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($getProduct as $product) { ?>                                   
                                        <tr>
                                            <td>
                                                <div class="table-image">
                                                    <img src="admin/assets/images/product/1.png" class="img-fluid"
                                                        alt="">
                                                </div>
                                            </td>

                                            <td><?=$product['name']?></td>

                                            <td><?=$product['cate_id']?></td>

                                            <td><?=$product['price']?></td>

                                            <td><?=$product['sale_price']?></td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="indext.php?act=product_edit&id=<?= $product['pro_id'] ?>">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="indext.php?act=product_delete&id=<?= $product['pro_id'] ?>">
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
    <!-- Container-fluid Ends-->
</div>

<?php include '../view/admin/layout/footer.php' ?>