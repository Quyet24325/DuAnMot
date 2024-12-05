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
                                        <?php foreach ($listProduct as $product) { ?>                                   
                                        <tr>
                                            <td>
                                                <div class="table-image">
                                                    <img src="./images/product/<?= $product['pro_image'] ?>" class="img-fluid"
                                                        alt="">
                                                </div>
                                            </td>

                                            <td class="text-start">
                                                <h3 style="font-weight: bold;" class="mb-2"><?=$product['pro_name']?></h3>
                                                <p class="mb-0">
                                                    <span>Dung lượng : </span>
                                                    <?php foreach ($product['variants'] as $size) { ?>
                                                       <span><?= $size['variant_size'] ?></span>
                                                    <?php } ?>
                                                </p>
                                                <p>
                                                    <span>Màu sắc : </span>
                                                    <?php foreach ($product['variants'] as $color) { ?>
                                                       <span><?= $color['variant_color'] ?></span>
                                                    <?php } ?>
                                                </p>
                                            </td>

                                            <td><?=$product['cate_name']?></td>

                                            <td><?=number_format($product['pro_price'] * 1000,0,',','.')?> VND</td>

                                            <td><?=number_format($product['pro_sale_price'] * 1000,0,',','.')?> VND</td>

                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="indext.php?act=product_edit&id=<?= $product['pro_id'] ?>">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="indext.php?act=product_delete&id=<?= $product['pro_id'] ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')">
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