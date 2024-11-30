<?php include '../view/client/layout/header.php' ?>

<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li class="active">
                    <h3>Hello, <?= $_SESSION['user']['name'] ?></h3>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ms-auto me-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>1 .</span> <a data-bs-toggle="collapse" href="#my-account-1">Thông tin tài khoản cá nhân<nav></nav></a></h3>
                            </div>
                            <form action="indext.php?act=updateProfile" method="post">
                                <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Họ và Tên</label>
                                                        <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?>">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['name'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Số diện thoại</label>
                                                        <input type="tel" name="phone" value="<?= $_SESSION['user']['phone'] ?>">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['phone'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['phone'] ?></p>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Email</label>
                                                        <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['email'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Địa chỉ</label>
                                                        <input type="text" name="address" value="<?= $_SESSION['user']['address'] ?>">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['address'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['address'] ?></p>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Giới tính</label>
                                                        <select name="gender" id="gender" class="form-control">
                                                            <option value="Nam" <?= $_SESSION['user']['gender'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                                                            <option value="Nu" <?= $_SESSION['user']['gender'] == 'Nu' ? 'selected' : '' ?>>Nữ</option>
                                                        </select>
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['gender'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['gender'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="updateProfile">Cập nhập</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>2 .</span> <a data-bs-toggle="collapse" href="#my-account-2">Đổi mật khẩu </a></h3>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">
                                <form action="indext.php?act=updatePass&id=<?= $_SESSION['user']['user_id'] ?>" method="post">
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    
                                                    <div class="billing-info">
                                                        <label>Mật khẩu cũ</label>
                                                        <input type="password" name="oldPass">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['oldPass'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['oldPass'] ?></p>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Mật khẩu mới</label>
                                                        <input type="password" name="newPass">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['newPass'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['newPass'] ?></p>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Xác nhận mật khẩu mới</label>
                                                        <input type="password" name="checkNewPass">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['checkNewPass'])) { ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['checkNewPass'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="updatePass">Đổi mật khẩu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>3 .</span> <a data-bs-toggle="collapse" href="#my-account-3">Modify your address book entries </a></h3>
                            </div>
                            <div id="my-account-3" class="panel-collapse collapse" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="myaccount-info-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Address Book Entries</h4>
                                        </div>
                                        <div class="entries-wrapper">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                    <div class="entries-info text-center">
                                                        <p>Keith L. Castro </p>
                                                        <p> 559 Pratt Avenue </p>
                                                        <p> Orchards, WA 98662 </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                    <div class="entries-edit-delete text-center">
                                                        <a class="edit" href="#">Edit</a>
                                                        <a href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-back-btn">
                                            <div class="billing-back">
                                                <a href="#"><i class="fa fa-arrow-up"></i> back</a>
                                            </div>
                                            <div class="billing-btn">
                                                <button type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>3 .</span> <a href="wishlist.html">Giỏ hàng của tôi </a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
unset($_SESSION['errors']);
include '../view/client/layout/footer.php' ?>