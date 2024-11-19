<?php include '../view/admin/layout/header.php' ?>
<div class="page-body">

    <!-- New Product Add Start -->
    <div class="container-fluid theme-form theme-form-2 mega-form">
        <div class="row">
            <div class="col-12">
                <form action="indext.php?act=category_edit&id=<?= $getCategory['cate_id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="card">
                            <div class="card-header-2">
                                <h5>Thêm ảnh danh mục</h5>
                            </div>
                            <div class="card-body">
                                <img src="./images/category/<?=$getCategory['image']?>" width="120px" alt="" class="mb-2">
                                <input type="file" name="image" class="form-control">
                                <input type="hidden" name="old_image" value="<?= $getCategory['image'] ?>">
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header-2">
                                <h5>Thêm danh mục</h5>
                            </div>

                            <div class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <div class="col-sm-13">
                                        <label class="form-label-title col-sm-3 mb-0">Tên danh mục</label>
                                        <input class="form-control" type="text" name="name" placeholder="Tên danh mục" value="<?=$getCategory['name']?>">
                                    </div>
                                </div>
                                <?php if (isset($_SESSION['errors']['name'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                <?php } ?>
                                <div class="mb-4 row align-items-center">
                                    <div class="col-sm-13">
                                        <label class="form-label-title col-sm-2 mb-0">Tạng thái</label>
                                        <select class="form-control" id="cater" name="status">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="Hidden" <?= $getCategory['status'] == 'Hidden' ? 'selected' : ''?>>Ẩn</option>
                                            <option value="Active" <?= $getCategory['status'] == 'Active' ? 'selected' : ''?>>Hiện</option>
                                        </select>
                                    </div>
                                    <?php if (isset($_SESSION['errors']['status'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['status'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="mb-6 row align-items-center">
                                    <div class="col-sm-13">
                                        <label class="form-label-title col-sm-5 mb-3">Mô tả</label>
                                        <textarea name="description" id="" class="form-control bg-light-subtle" placeholder="Mô tả...."><?=$getCategory['description']?></textarea>
                                    </div>
                                    <?php if (isset($_SESSION['errors']['description'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['description'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <br>
                            <button type="submit" name="updateCategory" class="btn btn-primary w-100">Cập nhập</button>
                        </div>
                        <div class="col-lg-2">
                            <a href="indext.php?act=category" class="btn btn-primary w-100">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- New Product Add End -->


</div>

<?php include '../view/admin/layout/footer.php' ?>