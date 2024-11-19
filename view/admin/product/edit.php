<?php include '../view/admin/layout/header.php' ?>
<div class="page-body">

    <!-- New Product Add Start -->
    <div class="container-fluid theme-form theme-form-2 mega-form">
        <form action="indext.php?act=update_product&id=<?= $product['pro_id'] ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <input type="hidden" name="pro_id" value="<?= $product['pro_id'] ?>">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Thêm ảnh sản phẩm</h5>
                                    </div>
                                    <div class="card-body mb-3">
                                        <!-- Upload nhiều ảnh -->
                                        <!-- multiple cho phép file up nhiều ảnh lên -->
                                        <?php foreach ($gallery as $value) { ?>
                                            <img src="./images/gallery_product/<?= $value['image'] ?>" width="20%">
                                            <input type="hidden" name="old_gallery_image[]" class="form-control" value="<?= $value['image'] ?>" multiple>
                                        <?php } ?>
                                    </div>
                                    <a class="col-sm-3 btn btn-dark mb-3 float-end" href="indext.php?act=delete_image_gallery&id=<?= $value['pro_id'] ?>" onclick="return confirm('Bạn có chắc chắn xóa ảnh sản phẩm không?')">Xóa ảnh sản phẩm</a>
                                    <input type="file" name="gallery_image[]" class="form-control" multiple>
                                </div>
                            </div>
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Thông tin sản phẩm</h5>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-rg-6">
                                            <label class="form-label-title col-sm-3 mb-0" for="name">Tên sản phẩm</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" id="name" name="name" onkeyup="ChangeToSlug()" value="<?= $product['pro_name'] ?>">
                                            </div>
                                        </div>
                                        <?php if (isset($_SESSION['errors']['name'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                        <?php } ?>
                                        <div class="mb-3 col-rg-6" for="product_category">
                                            <label class="col-sm-3 col-form-label form-label-title">Danh mục</label>
                                            <div class="col-sm-12">
                                                <select class="js-example-basic-single w-100" name="cate_id">
                                                    <?php foreach ($listCategory as $cate) { ?>
                                                        <option value="<?= $cate['cate_id']; ?>" <?= $product['cate_id'] == $cate['cate_id'] ? 'selected' : '' ?>>

                                                            <?= $cate['name'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 col-rg-5">
                                            <div class="col-sm-12 ">
                                                <label class="col-sm-6 col-form-label form-label-title" id="product_image">Ảnh sản phẩm </label><br>
                                                <img src="./images/product/<?= $product['pro_image'] ?>" alt="" width="150px" class="mb-3">
                                                <input type="file" name="product_image" id="" class="form-control mb-3">
                                                <input type="hidden" name="pro_old_image" class="form-control" value="<?= $product['pro_image'] ?>">

                                            </div>
                                            <?php if (isset($_SESSION['errors']['product_image'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['product_image'] ?></p>
                                            <?php } ?>
                                            <div class="col-sm-12">
                                                <label class="col-sm-6 col-form-label form-label-title">Đường dẫn</label>
                                                <input type="text" name="slug" id="slug" class="form-control" value="<?= $product['pro_slug'] ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <div class="col-sm-6">
                                            <label class="form-label-title col-sm-6 mb-2" for="product_price">Giá sản phẩm</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" id="product_price" name="product_price" value="<?= $product['pro_price'] ?>">
                                            </div>
                                        </div>
                                        <?php if (isset($_SESSION['errors']['product_price'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['product_price'] ?></p>
                                        <?php } ?>
                                        <div class="col-sm-6">
                                            <label class="form-label-title col-sm-6 mb-2" for="product_sale_price">Giá khuyến mại</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" id="product_sale_price" name="product_sale_price" value="<?= $product['pro_sale_price'] ?>">
                                            </div>
                                        </div>
                                        <?php if (isset($_SESSION['errors']['product_sale_price'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['product_sale_price'] ?></p>
                                        <?php } ?>

                                    </div>
                                    <!-- ---------------Biến thể sản phẩm--------------- -->

                                    <div id="variants">
                                        <h3>Sản phẩm biến thể:</h3>
                                        <?php foreach ($variant as $key => $value) { ?>
                                            <div class="border rounded px-2 mb-3 mt-3">
                                                <a href="indext.php?act=delete_variant&var_id=<?= $value['var_id'] ?>" class="d-flex justifi-conten float-end mt-2 me-3" style="font-size: 16px; font-weight: bold;">X</a>
                                                <div class="row mb-5">
                                                    <div class="col-lg-5">
                                                        <input type="hidden" name="var_id[]" value="<?= $value['var_id'] ?>">
                                                        <label class="col-sm-6 col-form-label form-label-title">Dung lượng</label>
                                                        <div class="sm-5">
                                                            <?php foreach ($listSize as $size) { ?>
                                                                <input type="checkbox" name="varian_size[]" id="size-<?= $size['var_size_id'] ?>-<?= $key ?>" value="<?= $size['var_size_id'] ?>" <?= $value['var_size_id'] == $size['var_size_id'] ? 'checked' : '' ?>>
                                                                <label class="form-label-title col-sm-3 mb-0" for="<?= $size['var_size_id'] ?>-<?= $key ?>"><?= $size['name'] ?></label>
                                                            <?php } ?>

                                                        </div>
                                                        <?php if (isset($_SESSION['errors']['varian_size'])) { ?>
                                                            <p class="text-danger"><?= $_SESSION['errors']['varian_size'] ?></p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <label class="col-sm-6 col-form-label form-label-title">Màu sắc</label>
                                                        <div class="sm-5">
                                                            <?php foreach ($listColor as $color) { ?>
                                                                <input type="checkbox" name="varian_color[]" id="color-<?= $color['var_color_id'] ?>-<?= $key ?>" value="<?= $color['var_color_id'] ?>" <?= $value['var_color_id'] == $color['var_color_id'] ? 'checked' : '' ?>>
                                                                <label class="form-label-title col-sm-3 mb-0" for="color-<?= $color['var_color_id'] ?>-<?= $key ?>">
                                                                    <svg height="35" width="35" xmlns="http://www.w3.org/2000/svg">
                                                                        <circle r="13   " cx="15" cy="15" fill="<?= $color['code'] ?>" stroke="black" stroke-width="3" />
                                                                    </svg>
                                                                </label>
                                                            <?php } ?>
                                                        </div>
                                                        <?php if (isset($_SESSION['errors']['varian_color'])) { ?>
                                                            <p class="text-danger"><?= $_SESSION['errors']['varian_color'] ?></p>
                                                        <?php } ?>
                                                    </div>

                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3">
                                                        <div class="sm-4">
                                                            <label class="col-sm-6 col-form-label form-label-title" for="varian_quantity">Số lượng</label>
                                                            <div class="d-flex flex-wap gap-2">
                                                                <input class="form-control" type="text" id="varian_quantity" name="varian_quantity[]" value="<?= $value['var_quantity'] ?>">
                                                            </div>

                                                            <?php if (isset($_SESSION['errors']['varian_color'])) { ?>
                                                                <?php foreach (($_SESSION['errors']['varian_quantity']) as $varian_quantity) { ?>
                                                                    <p class="text-danger"><?= $varian_quantity ?></p>
                                                                <?php }  ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <div class="col-sm-6">
                                                        <label class="form-label-title col-sm-7 mb-2" for="variant_price">Giá sản phẩm biến thể</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" id="variant_price" name="variant_price[]" placeholder="Nhập giá sản phẩm biến thể" value="<?= $value['var_price'] ?>">
                                                        </div>
                                                        <?php if (isset($_SESSION['errors']['varian_color'])) { ?>
                                                            <?php foreach (($_SESSION['errors']['variant_price']) as $variant_price) { ?>
                                                                <p class="text-danger"><?= $variant_price ?></p>
                                                            <?php }  ?>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label class="form-label-title col-sm-6 mb-2" for="variant_sale_price">Giá khuyến mại</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" id="variant_sale_price" name="variant_sale_price[]" placeholder="Nhập giá khuyến mại sản phẩm biến thể" value="<?= $value['var_sale_price'] ?>">
                                                        </div>
                                                        <?php if (isset($_SESSION['errors']['varian_color'])) { ?>
                                                            <?php foreach (($_SESSION['errors']['variant_sale_price']) as $variant_sale_price) { ?>
                                                                <p class="text-danger"><?= $variant_sale_price ?></p>
                                                            <?php }  ?>
                                                        <?php } ?>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="row g-1 mb-3">
                                        <div class="col-lg-2">
                                            <button type="button" id="add_variant" class="btn btn-primary w-150">Thêm biến thể</button>
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Mô tả sản phẩm</label>
                                        <div class="col-sm-12">
                                            <textarea name="varian_description" id="" class="form-control" placeholder="Nhập mô tả..."><?= $product['pro_description'] ?></textarea>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['errors']['varian_description'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['varian_description'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class=" row align-items-center ">
                                        <div class="col-sm-3">
                                            <button type="submit" name="update_product" class="btn btn-primary">Cập nhập sản phẩm</button>
                                        </div>
                                        <div class="col-sm-3">
                                            <a class="btn btn-primary " href="indext.php?act=product">Quay lại</a>
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
    <!-- New Product Add End -->

    <!-- ----------------------Tạo thêm biến thể----------------- -->
    <script>
        document.getElementById('add_variant').addEventListener('click', () => {
            const container = document.getElementById('variants');
            // Tạo ra một thẻ div
            const newVariant = document.createElement('div');
            newVariant.innerHTML = `
            <div class="border rounded px-2 mb-4">
            <a href="indext.php?act=delete_variant&var_id=<?= $value['var_id'] ?>" onclick="return confirm('Bạn có muấn xóa biến thể này không?')" class="d-flex justifi-conten float-end mt-2 me-3" style="font-size: 16px; font-weight: bold;">X</a>
                                            <div class="row mb-5">
                                                <div class="col-lg-5">
                                                    <label class="col-sm-6 col-form-label form-label-title" id="size-<?= $size['var_size_id'] ?>-${container.children.length}">Dung lượng</label> 
                                                        <div class="sm-5">
                                                        <?php foreach ($listSize as $size) { ?>
                                                            <input type="checkbox" name="varian_size[]" value="<?= $size['var_size_id'] ?>">
                                                            <label class="form-label-title col-sm-3 mb-0" for="size-<?= $size['var_size_id'] ?>-${container.children.length}"><?= $size['name'] ?></label>
                                                        <?php } ?>
                                                        </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <label class="col-sm-4 col-form-label form-label-title">Màu sắc</label>
                                                    <div class="sm-5">
                                                    <?php foreach ($listColor as $color) { ?>
                                                            <input type="checkbox" name="varian_color[]" id="color-<?= $color['var_color_id'] ?>-${container.children.length}" value="<?= $color['var_color_id'] ?>">
                                                            <label class="form-label-title col-sm-3 mb-0" for="color-<?= $color['var_color_id'] ?>-${container.children.length}">
                                                                <svg height="35" width="35" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle r="13   " cx="15" cy="15" fill="<?= $color['code'] ?>" stroke="black" stroke-width="3" />
                                                                </svg>
                                                            </label>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-3">
                                                    <div class="sm-4">
                                                        <label class="col-sm-6 col-form-label form-label-title" for="varian_quantity">Số lượng</label>
                                                        <div class="d-flex flex-wap gap-2">
                                                            <input class="form-control" type="text" id="varian_quantity" name="varian_quantity[]" placeholder="Nhập Số lượng">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <div class="col-sm-6">
                                                    <label class="form-label-title col-sm-7 mb-2" for="variant_price">Giá sản phẩm biến thể</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" id="variant_price" name="variant_price[]" placeholder="Nhập giá sản phẩm biến thể">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label-title col-sm-6 mb-2" for="variant_sale_price">Giá khuyến mại</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" id="variant_sale_price" name="variant_sale_price[]" placeholder="Nhập giá khuyến mại sản phẩm biến thể">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            `;
            container.appendChild(newVariant); // Thêm biến thể mới vào container
        })
    </script>

</div>
<?php include '../view/admin/layout/footer.php' ?>