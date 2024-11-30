<?php include '../view/client/layout/header.php' ?>



<div class="login-register-area pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ms-auto me-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a data-bs-toggle="tab" href="indext.php?act=register">
                            <h4> Đăng ký tài khoản </h4>
                        </a>
                    </div>
                    <div class="login-register-tab-list nav">  
                            <p>Bạn đã có tài khoản? </p><a href="indext.php?act=login" style="color: #3399FF;"> Sign In</a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="indext.php?act=register" method="post">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên của bạn">
                                            <?php if (isset($_SESSION['errors']['name'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn">
                                            <?php if (isset($_SESSION['errors']['email'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="pass">Password</label>
                                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Nhập mật khẩu của bạn">
                                            <?php if (isset($_SESSION['errors']['pass'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['pass'] ?></p>
                                            <?php } ?>
                                        </div>


                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="indext.php?act=login">Sign in</a>
                                            </div>
                                            <button type="submit" name="register"><span>Sign up</span></button>
                                        </div>
                                    </form>
                                </div>
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