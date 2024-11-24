<?php include '../view/admin/layout/header.php'; ?>
<div class="page-body">
    <!-- All User Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Danh sách tài khoản</h5>
                            <!-- <div class="d-inline-flex">
                                <a href="indext.php?act=create_user" class="align-items-center btn btn-theme d-flex">
                                    <i data-feather="plus"></i>Thêm mới user
                                </a>
                            </div> -->
                        </div>

                        <div class="table-responsive table-product">
                            <table class="table all-package theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>Tên người dùng</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($list_user as $user) { ?>
                                        <tr>
                                            <td>
                                                <div class="text-center user-name ">
                                                    <span><?= $user['name'] ?></span>
                                                </div>
                                            </td>

                                            <td>+84<?= $user['phone'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['role_type']?></td>
                                           
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="indext.php?act=detail&id=">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="indext.php?act=edit_user&id=<?=$user['user_id']?>">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
                                                    </li>

                                                    <!-- <li>
                                                        <a href="indext.php?act=hidden_user&id=" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle">

                                                            <i class="ri-lock-line"></i>
                                                        </a>
                                                    </li> -->
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
    <!-- All User Table Ends-->
</div>
<?php include '../view/admin/layout/footer.php'; ?>