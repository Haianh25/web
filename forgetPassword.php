<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu - Pour Homme - Shoes & Leather</title>
    <link rel="shortcut icon" type="image/png" href="./Image/favicon.webp">
    <link rel="stylesheet" href="./CSS/account.css">
    <link rel="stylesheet" href="./Framework/bootstrap-4.0.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./Framework/bootstrap/css.css">
    <link rel="stylesheet" href="./Framework/bootstrap/js.js">
    <link rel="stylesheet" href="./Font/fontawesome-free-6.2.0-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,500;0,600;0,700;0,800;1,400;1,500&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <section id="breadcrump-wrapper">
        <div class="breadcrumb-overlay"></div>
        <div class="breadcrumb-content text-center">
            <h2>Tài Khoản</h2>
        </div>
    </section>

    <div id="pageContainer">
        <div class="main-container">
            <section class="page-wrapper">
                <div class="login-container">
                    <form action="" class="login-customer">
                        <h2 class="text-center customer-header">Quên Mật Khẩu?</h2>
                        <h6>nhập email của bạn mà đã liên kết với tài khoản</h6>
                        <div class="form-group">
                            <label for="email" class="form-label">Địa chỉ Email</label>
                            <input type="email" id="email" class="form-control" placeholder="abc@email.com" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="" class="form-label">Mật Khẩu</label>
                            <input type="password" id="password" class="form-control" required>
                        </div>
                        <div class="optional">
                            <p><a href="./register.html" class="customer_register_link">Đăng kí</a></p>
                            <p><a href="" class="customer_forget_password_link">Quên mật khẩu?</a></p>
                        </div> -->
                        <input class = "btn btn-dark w-100" type="submit" value="Tiếp tục">
                        
                    </form>
                </div>
            </section>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>