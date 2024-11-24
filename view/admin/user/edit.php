<?php include '../view/admin/layout/header.php'; ?>
<div class="page-body">
    <!-- New User start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <form action="indext.php?act=update_role_user&id=<?= $getUser['user_id'] ?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Tài khoản người dùng</h5>
                                    </div>
                                    <div class="tab-content theme-form theme-form-2 mega-form" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                            <div class="row">
                                                <div class="mb-4 row align-items-center">
                                                    <img src="" alt="">
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-lg-2 col-md-3 mb-0">
                                                        Tên người dùng
                                                    </label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="text" value="<?= $getUser['name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Số điện thoại</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="number" value="<?= $getUser['phone'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Role</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <select name="role_id" id="role">
                                                            <?php foreach ($roleUsser as $role) { ?>
                                                                <option value="<?= $role['role_id']; ?>" <?= $getUser['role_id'] == $role['role_id'] ? 'selected' : '' ?> >
                                                                    <?= $role['role_type'] ?>
                                                                </option>
                                                            <?php }  ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Giới tính</label>
                                                    <div class="col-md-9 col-lg-4">
                                                        <input class="form-control" type="text" value="<?= $getUser['gender'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Địa chỉ</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="text" value="<?= $getUser['address'] ?>">
                                                    </div>
                                                </div>

                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Email</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="email" value="<?= $getUser['email'] ?>">
                                                    </div>
                                                </div>


                                            </div>
                                            <button type="submit" class="btn btn-primary" name="update_role_user">Cập nhập</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New User End -->
</div>

<?php include '../view/admin/layout/footer.php'; ?>