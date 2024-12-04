<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            /* Nền xám nhạt tinh tế */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            animation: fadeIn 1s ease-out;
        }

        .login-container h1 {
            font-size: 26px;
            margin-bottom: 25px;
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #2575fc;
            outline: none;
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-login:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            transform: scale(1.02);
        }

        .forgot-password {
            margin-top: 15px;
            text-align: center;
        }

        .forgot-password a {
            color: #2575fc;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #6a11cb;
            text-decoration: underline;
        }
        .text-danger{
            color: red;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>
</head>

<body>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<script type='text/javascript'>
        toastr.warning('{$_SESSION['error']}');
        </script>";

        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo "<script type='text/javascript'>
        toastr.success('{$_SESSION['success']}');
        </script>";
        unset($_SESSION['success']);
    }
    ?>
    <div class="login-container">
        <h1>Đăng Nhập Admin</h1>
        <form action="indext.php?act=auth" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Nhập email">
                <?php if (isset($_SESSION['errors']['email'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                <?php } ?>
            </div>

            <div class="form-group">
                <label for="pass">Mật khẩu</label>
                <input type="password" id="pass" name="pass" placeholder="Nhập mật khẩu">
                <?php if (isset($_SESSION['errors']['pass'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['pass'] ?></p>
                <?php } ?>
            </div>

            <button type="submit" class="btn-login" name="auth">Đăng Nhập</button>
        </form>
    </div>
</body>

</html>
<?php unset($_SESSION['errors']) ?>